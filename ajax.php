<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
require_once('../../config.php');

require_login();
global $CFG, $USER, $COURSE, $DB, $PAGE;

// Clean any previous output
if (ob_get_level() > 0) {
    ob_end_clean();
}
ob_start();

function sanitize_chatbot_input($input) {
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

function send_json_response($data, $status_code = 200) {
    global $CFG;

    if (headers_sent($file, $line)) {
        error_log(get_string('headers_already_sent', 'block_uteluqchatbot') . " {$file}:{$line}");
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
        exit();
    }

    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    if (!ob_start()) {
        error_log(get_string('failed_to_start_output_buffer', 'block_uteluqchatbot'));
        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => get_string('server_error_output_buffer_failed', 'block_uteluqchatbot')], JSON_UNESCAPED_UNICODE);
        exit();
    }

    http_response_code($status_code);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-cache, must-revalidate, no-store, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0');

    if (isset($data['answer']) && is_string($data['answer'])) {
        if (!mb_check_encoding($data['answer'], 'UTF-8')) {
            error_log(get_string('answer_not_utf8', 'block_uteluqchatbot'));
            $converted_answer = mb_convert_encoding($data['answer'], 'UTF-8', mb_detect_encoding($data['answer']));
            if ($converted_answer !== false) {
                $data['answer'] = $converted_answer;
            }
        }
    } elseif ($status_code === 200 && !isset($data['error']) && !isset($data['answer'])) {
        error_log(get_string('no_answer_or_error_field', 'block_uteluqchatbot'));
    }

    $json_output = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $json_error_msg = json_last_error_msg();
        error_log(get_string('json_encode_error', 'block_uteluqchatbot') . $json_error_msg);

        ob_end_clean();
        ob_start();

        http_response_code(500);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'error' => get_string('server_error_json_encode_failed', 'block_uteluqchatbot'),
            'details' => $json_error_msg
        ], JSON_UNESCAPED_UNICODE);

        ob_end_flush();
        exit();
    }

    ob_end_clean();
    echo $json_output;
    exit();
}

try {
    $raw_input = file_get_contents('php://input');
    if ($raw_input === false) {
        send_json_response(['error' => get_string('error_reading_input', 'block_uteluqchatbot')], 400);
    }
    $input = json_decode($raw_input, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        send_json_response(['error' => get_string('invalid_json', 'block_uteluqchatbot') . ': ' . json_last_error_msg()], 400);
    }

    if (!isset($input['question']) || !isset($input['sesskey']) || !isset($input['userid']) || !isset($input['courseid'])) {
        send_json_response(['error' => get_string('missing_parameters', 'block_uteluqchatbot')], 400);
    }

    $question_raw = $input['question'];
    $userid = (int)$input['userid'];
    $courseid = (int)$input['courseid'];
    $sesskey = $input['sesskey'];
    $sans_rag = isset($input['sansRag']) && ($input['sansRag'] === true || $input['sansRag'] === 1 || $input['sansRag'] === 'true' || $input['sansRag'] === '1');

    $question = sanitize_chatbot_input(trim($question_raw));

    if (empty($question)) {
        send_json_response(['error' => get_string('invalid_question_after_sanitize', 'block_uteluqchatbot')], 400);
    }

    if (!confirm_sesskey($sesskey)) {
        send_json_response(['error' => get_string('invalid_session', 'block_uteluqchatbot')], 403);
    }

    $weaviate_api_url = get_config('block_uteluqchatbot', 'weaviate_api_url');
    $weaviate_api_key = get_config('block_uteluqchatbot', 'weaviate_api_key');
    $cohere_api_key = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

    if (empty($weaviate_api_url) || empty($cohere_api_key)) {
        error_log(get_string('weaviate_cohere_not_configured', 'block_uteluqchatbot'));
        send_json_response(['error' => get_string('weaviate_cohere_not_configured', 'block_uteluqchatbot')], 500);
    }

    $weaviate_connector = new \block_uteluqchatbot\weaviate_connector(
        $weaviate_api_url,
        $weaviate_api_key,
        $cohere_api_key
    );

    $context = context_course::instance($courseid);
    $course_record = $DB->get_record('course', ['id' => $courseid]);
    if (!$course_record) {
        send_json_response(['error' => get_string('invalid_course_id', 'block_uteluqchatbot')], 400);
    }
    $course_name = $course_record->fullname;
    $collection_name = 'Collection_course_' . $courseid;

    if ($sans_rag === true) {
        $rag_results = $weaviate_connector->get_cohere_response($question, $cohere_api_key);
    } else {
        $rag_results = $weaviate_connector->get_question_answer($course_name, $collection_name, $question, $userid, $courseid);
    }

    $answer = $rag_results;

    if (is_null($answer) || $answer === false) {
        error_log(get_string('empty_response_from_api', 'block_uteluqchatbot'));
        send_json_response(['error' => get_string('empty_response_from_api', 'block_uteluqchatbot')], 500);
    }

    if ($answer === "") {
        error_log(get_string('empty_string_as_answer', 'block_uteluqchatbot'));
    }

    $max_conversations = 10;

    $record = new stdClass();
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

        send_json_response([
            'status' => 'success',
            'answer' => $answer
        ]);

    } catch (dml_exception $db_error) {
        error_log(get_string('database_error_saving_conversation', 'block_uteluqchatbot') . $db_error->getMessage());
        send_json_response(['error' => get_string('error_saving_conversation', 'block_uteluqchatbot') . ': ' . $db_error->getMessage()], 500);
    }

} catch (Exception $e) {
    error_log(get_string('general_exception', 'block_uteluqchatbot') . $e->getMessage());
    send_json_response(['error' => get_string('generic_server_error', 'block_uteluqchatbot')], 500);
} finally {
    if (ob_get_level() > 0) {
        ob_end_flush();
    }
}
