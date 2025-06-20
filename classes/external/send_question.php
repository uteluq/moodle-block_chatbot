<?php
/**
 * External service for sending questions to chatbot
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */

namespace block_uteluqchatbot\external;

use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use context_course;
use invalid_parameter_exception;
use dml_exception;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class send_question extends external_api
{

    /**
     * Define parameters for the external function
     */
    public static function execute_parameters()
    {
        return new external_function_parameters([
            'question' => new external_value(PARAM_RAW, 'The question to send'),
            'userid' => new external_value(PARAM_INT, 'User ID'),
            'courseid' => new external_value(PARAM_INT, 'Course ID'),
            'sansrag' => new external_value(PARAM_BOOL, 'Without RAG', VALUE_DEFAULT, false),
        ]);
    }

    /**
     * Execute the external function
     * 
     * @param string $question The user's question or query to be processed
     * @param int $userid The ID of the user asking the question
     * @param int $courseid The ID of the course context where the question is asked
     * @param bool $sansrag Optional. Whether to execute without RAG (Retrieval-Augmented Generation). 
     *                      If true, bypasses document retrieval. Default is false.
     * @return array Response array containing the chatbot's answer and metadata
     * @throws Exception If validation fails or processing encounters an error
     */
    public static function execute($question, $userid, $courseid, $sansrag = false)
    {
        global $DB, $USER;

        // Validate parameters
        $params = self::validate_parameters(self::execute_parameters(), [
            'question' => $question,
            'userid' => $userid,
            'courseid' => $courseid,
            'sansrag' => $sansrag,
        ]);

        // Security checks
        require_login();

        // Check if user can access this course
        $context = context_course::instance($params['courseid']);
        self::validate_context($context);

        // Verify user is the same as the one making the request
        if ($USER->id != $params['userid']) {
            throw new invalid_parameter_exception('Invalid user');
        }

        try {
            // Sanitize input
            $question = self::sanitize_chatbot_input(trim($params['question']));

            if (empty($question)) {
                throw new invalid_parameter_exception(get_string('invalid_question_after_sanitize', 'block_uteluqchatbot'));
            }

            // Get configuration
            $weaviate_api_url = get_config('block_uteluqchatbot', 'weaviate_api_url');
            $weaviate_api_key = get_config('block_uteluqchatbot', 'weaviate_api_key');
            $cohere_api_key = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

            if (empty($weaviate_api_url) || empty($cohere_api_key)) {
                throw new \moodle_exception('weaviate_cohere_not_configured', 'block_uteluqchatbot');
            }

            // Initialize connector
            $weaviate_connector = new \block_uteluqchatbot\weaviate_connector(
                $weaviate_api_url,
                $weaviate_api_key,
                $cohere_api_key
            );

            // Get course information
            $course_record = $DB->get_record('course', ['id' => $params['courseid']], '*', MUST_EXIST);
            $course_name = $course_record->fullname;
            $collection_name = 'Collection_course_' . $params['courseid'];

            // Get answer
            if ($params['sansrag']) {
                $answer = $weaviate_connector->get_cohere_response($question, $cohere_api_key);
            } else {
                $answer = $weaviate_connector->get_question_answer($course_name, $collection_name, $question, $params['userid'], $params['courseid']);
            }

            if (is_null($answer) || $answer === false) {
                throw new \moodle_exception('empty_response_from_api', 'block_uteluqchatbot');
            }

            // Save conversation
            self::save_conversation($params['userid'], $params['courseid'], $question, $answer);

            return [
                'status' => 'success',
                'answer' => is_string($answer) ? $answer : json_encode($answer)
            ];

        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Define return values for the external function
     */
    public static function execute_returns()
    {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'Status of the request'),
            'answer' => new external_value(PARAM_RAW, 'The chatbot answer', VALUE_OPTIONAL),
            'error' => new external_value(PARAM_TEXT, 'Error message if any', VALUE_OPTIONAL),
        ]);
    }

    /**
     * Sanitize chatbot input
     * 
     * Cleans and validates user input to prevent security vulnerabilities
     * such as XSS attacks, SQL injection, and malicious content injection.
     * 
     * @param string $input The raw user input string to be sanitized
     * @return string The sanitized and safe input string
     * @since 1.0.0
     */
    private static function sanitize_chatbot_input($input)
    {
        $dangerous_tags = ['script', 'iframe', 'object', 'embed', 'style', 'form', 'input', 'applet', 'link', 'meta'];
        foreach ($dangerous_tags as $tag) {
            $input = preg_replace('/<\s*\/?\s*' . $tag . '[^>]*>/i', '', $input);
        }

        $input = preg_replace('/\s*on\w+\s*=\s*("([^"]*)"|\'([^\']*)\'|[^\s>]+)/i', '', $input);
        $input = preg_replace('/javascript\s*:/i', '', $input);

        $dangerous_functions = ['eval', 'system', 'exec', 'passthru', 'shell_exec', 'base64_decode', 'phpinfo', 'proc_open', 'popen'];
        foreach ($dangerous_functions as $func) {
            $input = preg_replace('/\b' . preg_quote($func, '/') . '\s*\(/i', '', $input);
        }

        $input = mb_substr($input, 0, 100000, 'UTF-8');
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return $input;
    }

    /**
     * Save conversation to database
     * 
     * Stores the chatbot conversation (question and answer) in the database
     * for history tracking, analytics, and user reference purposes.
     * 
     * @param int $userid The ID of the user who asked the question
     * @param int $courseid The ID of the course where the conversation took place
     * @param string $question The original question asked by the user
     * @param string $answer The chatbot's response to the question
     * @return bool True if conversation was saved successfully, false otherwise
     * @throws dml_exception If database operation fails
     */
    private static function save_conversation($userid, $courseid, $question, $answer)
    {
        global $DB;

        $max_conversations = 10;

        $record = new \stdClass();
        $record->userid = $userid;
        $record->courseid = $courseid;
        $record->question = $question;
        $record->answer = is_string($answer) ? $answer : json_encode($answer);
        $record->timecreated = time();

        try {
            $count = $DB->count_records('block_uteluqchatbot_conversations', ['userid' => $userid, 'courseid' => $courseid]);

            if ($count >= $max_conversations) {
                $oldest_ids = $DB->get_fieldset_sql(
                    "SELECT id FROM {block_uteluqchatbot_conversations}
                     WHERE userid = :userid AND courseid = :courseid
                     ORDER BY timecreated ASC",
                    ['userid' => $userid, 'courseid' => $courseid],
                    0,
                    $count - $max_conversations + 1
                );

                if ($oldest_ids) {
                    foreach ($oldest_ids as $old_id) {
                        $DB->delete_records('block_uteluqchatbot_conversations', ['id' => $old_id]);
                    }
                }
            }

            $DB->insert_record('block_uteluqchatbot_conversations', $record);

        } catch (dml_exception $e) {
            throw new \moodle_exception('error_saving_conversation', 'block_uteluqchatbot', '', $e->getMessage());
        }
    }
}