<?php
/**
 * External service for saving prompts
 * @copyright 2025 UNIVERSITÉ TÉLUQ & Université GASTON BERGER DE SAINT-LOUIS
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

class save_prompt extends external_api {

    /**
     * Define parameters for the external function
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'prompttext' => new external_value(PARAM_RAW, 'The prompt text'),
            'userid' => new external_value(PARAM_INT, 'User ID'),
            'courseid' => new external_value(PARAM_INT, 'Course ID'),
        ]);
    }

    /**
     * Execute the external function
     */
    public static function execute($prompttext, $userid, $courseid) {
        global $DB, $USER;

        // Validate parameters
        $params = self::validate_parameters(self::execute_parameters(), [
            'prompttext' => $prompttext,
            'userid' => $userid,
            'courseid' => $courseid,
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
            // Check if a prompt already exists for this user
            $existing_prompt = $DB->get_record('block_uteluqchatbot_prompts', ['userid' => $params['userid']]);

            $record = new \stdClass();
            $record->prompt = $params['prompttext'];
            $record->userid = $params['userid'];
            $record->courseid = $params['courseid'];
            $record->timemodified = time();

            if ($existing_prompt) {
                // Update the existing prompt
                $record->id = $existing_prompt->id;
                $DB->update_record('block_uteluqchatbot_prompts', $record);
            } else {
                // Create a new prompt
                $record->timecreated = time();
                $DB->insert_record('block_uteluqchatbot_prompts', $record);
            }

            return [
                'status' => 'success',
                'message' => get_string('prompt_saved_successfully', 'block_uteluqchatbot')
            ];

        } catch (dml_exception $e) {
            return [
                'status' => 'error',
                'error' => get_string('database_write_error', 'block_uteluqchatbot') . $e->getMessage()
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
    public static function execute_returns() {
        return new external_single_structure([
            'status' => new external_value(PARAM_TEXT, 'Status of the request'),
            'message' => new external_value(PARAM_TEXT, 'Success message', VALUE_OPTIONAL),
            'error' => new external_value(PARAM_TEXT, 'Error message if any', VALUE_OPTIONAL),
        ]);
    }
}