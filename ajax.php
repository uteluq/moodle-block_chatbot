<?php

/**
 * @copyright 2025 Université TÉLUQ
 */
require_once('../../config.php');

require_login();
global $CFG, $USER, $COURSE, $DB, $PAGE;

// Clean any previous output
// This is a good first step.
if (ob_get_level() > 0) { // Check if buffer exists before trying to clean
    ob_end_clean(); // Cleans and turns off buffering
}
ob_start(); // Start a new buffer immediately to catch any stray output

// Set HTTP headers - these might be overridden if send_json_response is called later
// It's generally better to set these right before the final output.
// header('Content-Type: application/json; charset=utf-8');
// header('Cache-Control: no-cache, must-revalidate');

// Configure debugging
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable error display to browser to avoid JSON contamination
ini_set('log_errors', 1);    // Ensure errors are logged
// Consider setting ini_set('error_log', '/path/to/your/php_errors.log'); if not set globally

require_once($CFG->dirroot . '/blocks/chatbot/classes/weaviate_connector.php');

/**
 * Sanitize input to prevent XSS and other attacks.
 * @param string $input The input string to sanitize.
 * @return string The sanitized input.
 */
function sanitizeChatbotInput($input) {
    // Remove potentially dangerous tags
    $dangerousTags = ['script', 'iframe', 'object', 'embed', 'style', 'form', 'input', 'applet', 'link', 'meta'];
    foreach ($dangerousTags as $tag) {
        $input = preg_replace('/<\s*\/?\s*' . $tag . '[^>]*>/i', '', $input);
    }

    // Remove attributes containing JavaScript (more robustly)
    $input = preg_replace('/\s*on\w+\s*=\s*("([^"]*)"|\'([^\']*)\'|[^\s>]+)/i', '', $input);

    // Remove JavaScript URLs
    $input = preg_replace('/javascript\s*:/i', '', $input);

    // Block calls to dangerous functions (basic attempt, might not be exhaustive)
    $dangerousFunctions = ['eval', 'system', 'exec', 'passthru', 'shell_exec', 'base64_decode', 'phpinfo', 'proc_open', 'popen'];
    foreach ($dangerousFunctions as $func) {
        // Look for function name possibly followed by parentheses
        $input = preg_replace('/\b' . preg_quote($func, '/') . '\s*\(/i', '', $input);
    }

    // Limit length
    $input = mb_substr($input, 0, 100000, 'UTF-8');

    // Convert special characters to HTML entities to prevent XSS.
    // ENT_QUOTES will convert both double and single quotes.
    // ENT_HTML5 is good practice if outputting to HTML5 contexts, otherwise ENT_HTML401.
    $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    // The previous htmlspecialchars_decode was likely neutralizing the htmlspecialchars.
    // If the goal is to output safe HTML, only htmlspecialchars is needed.
    // If the goal is to strip all HTML and then use, the preg_replace for tags is the main tool.
    // For chatbot input, we generally want plain text or very restricted HTML.
    // The current approach aims to strip dangerous HTML and then encode special chars.

    return $input;
}

/**
 * Send a clean JSON response.
 * @param array $data The data to send as JSON.
 * @param int $status_code The HTTP status code.
 */
function send_json_response($data, $status_code = 200) {
    global $CFG; // For logging path if needed

    // Check if headers have already been sent (indicates premature output)
    if (headers_sent($file, $line)) {
        error_log("Chatbot API: Headers already sent from {$file}:{$line}. Cannot send JSON response properly. Prior output detected.");
        // Attempt to clean again, though it's likely too late to set new headers.
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        // We can't reliably set headers now. The client will likely get mixed content.
        // For debugging, we might try to echo the JSON anyway, but it's a sign of a deeper issue.
        echo "";
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
        exit();
    }

    // Clear all output buffers that might have been started by other parts of the code.
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    // Start a new, clean output buffer specifically for this JSON response.
    if (!ob_start()) {
        error_log("Chatbot API: Failed to start output buffer for JSON response.");
        // Fallback or error handling if ob_start fails
        http_response_code(500); // Internal Server Error
        // Still try to send a JSON error message, but without buffer control.
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['error' => 'Server error: Output buffering failed.'], JSON_UNESCAPED_UNICODE);
        exit();
    }

    http_response_code($status_code);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-cache, must-revalidate, no-store, max-age=0');
    header('Pragma: no-cache'); // For HTTP/1.0 compatibility
    header('Expires: 0'); // Proxies

    // Ensure $data['answer'] is UTF-8 if it exists and is a string
    if (isset($data['answer']) && is_string($data['answer'])) {
        if (!mb_check_encoding($data['answer'], 'UTF-8')) {
            error_log('Chatbot API: Answer is not UTF-8. Attempting to convert. Original encoding: ' . mb_detect_encoding($data['answer']));
            $converted_answer = mb_convert_encoding($data['answer'], 'UTF-8', mb_detect_encoding($data['answer']));
            if ($converted_answer !== false) {
                $data['answer'] = $converted_answer;
            } else {
                error_log('Chatbot API: Failed to convert answer to UTF-8. Using original potentially problematic string.');
                // Potentially replace with an error message or a safe placeholder
                // $data['answer'] = "Error: Could not encode answer to UTF-8.";
            }
        }
    } else if ($status_code === 200 && !isset($data['error']) && !isset($data['answer'])) {
        error_log('Chatbot API: send_json_response called with 200 status but no "answer" or "error" field in data.');
    }

    $json_output = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

    if (json_last_error() !== JSON_ERROR_NONE) {
        $json_error_msg = json_last_error_msg();
        error_log('Chatbot API: JSON Encode Error - ' . $json_error_msg . '. Data was: ' . print_r($data, true));
        
        // Clean the buffer we started for the (failed) JSON attempt
        ob_end_clean(); 
        // Start a new buffer for the error message
        ob_start(); 

        http_response_code(500); // Internal Server Error
        // Ensure Content-Type is still JSON for this error response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'error' => 'Server error: Failed to encode JSON response.',
            'details' => $json_error_msg
        ], JSON_UNESCAPED_UNICODE);
        
        ob_end_flush(); // Send the error JSON
        exit();
    }

    // Successfully encoded JSON. Clean our buffer and send the output.
    ob_end_clean();
    echo $json_output;
    exit();
}

try {
    // Check HTTP method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        send_json_response(['error' => get_string('http_method_not_allowed', 'block_uteluqchatbot')], 405);
    }

    // Read input
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

    $question_raw = $input['question']; // Keep raw for logging if needed, then sanitize
    $userid = (int)$input['userid']; // Cast to int for safety
    $courseid = (int)$input['courseid']; // Cast to int for safety
    $sesskey = $input['sesskey'];
    // Ensure sansRag is treated as boolean correctly
    $sansRag = isset($input['sansRag']) && ($input['sansRag'] === true || $input['sansRag'] === 1 || $input['sansRag'] === 'true' || $input['sansRag'] === '1');

    // Sanitize the question
    $question = sanitizeChatbotInput(trim($question_raw));



    if (empty($question)) { // Check after sanitization
        // If sanitizeChatbotInput can return an empty string from a non-empty input due to stripping
        // this check is important.
        send_json_response(['error' => get_string('invalid_question_after_sanitize', 'block_uteluqchatbot')], 400);
    }
    
    // Session key confirmation
    if (!confirm_sesskey($sesskey)) {
        send_json_response(['error' => get_string('invalid_session', 'block_uteluqchatbot')], 403);
    }

    // Retrieve API key for OpenAI (if used directly, otherwise for Weaviate/Cohere)
    // $api_key = get_config('block_uteluqchatbot', 'openai_api_key');
    // if (empty($api_key)) {
    //     send_json_response(['error' => get_string('openai_api_key_not_configured', 'block_uteluqchatbot')], 500);
    // }

    // Configure Weaviate API keys and URL
    $weaviateApiUrl = get_config('block_uteluqchatbot', 'weaviate_api_url');
    $weaviateApiKey = get_config('block_uteluqchatbot', 'weaviate_api_key');
    $cohereApiKey = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

    if (empty($weaviateApiUrl) || empty($cohereApiKey)) { // Weaviate API key might be optional depending on setup
        error_log('Chatbot API: Weaviate URL or Cohere API key is not configured.');
        send_json_response(['error' => get_string('weaviate_cohere_not_configured', 'block_uteluqchatbot')], 500);
    }
    
    $weaviateConnector = new WeaviateConnector(
        $weaviateApiUrl,
        $weaviateApiKey,
        $cohereApiKey
    );

    $context = context_course::instance($courseid); // Use $courseid from input
    // $isTeacher = has_capability('moodle/course:update', $context, $USER->id); // $USER->id should be used if checking logged-in user
                                                                              // If using $userid from input, ensure it's validated/authorized
    
    $courseRecord = $DB->get_record('course', array('id' => $courseid));
    if (!$courseRecord) {
        send_json_response(['error' => get_string('invalid_course_id', 'block_uteluqchatbot')], 400);
    }
    $courseName = $courseRecord->fullname;
    $collectionName = 'Collection_course_' . $courseid; // Ensure this naming convention is consistent

    $ragResults = "";



    if ($sansRag === true) {
        $ragResults = $weaviateConnector->getCohereResponse($question, $cohereApiKey);
    } else {
        $ragResults = $weaviateConnector->getQuestionAnswer($courseName, $collectionName, $question, $userid, $courseid);
    }

    $answer = $ragResults;



    // Check if $answer is truly empty or indicates an error from the connector.
    // An empty string "" might be a valid (though perhaps unhelpful) answer.
    // null or false often indicate an actual failure in the connector.
    if (is_null($answer) || $answer === false) {
        error_log("Chatbot API: Empty or error response from Weaviate/Cohere. Answer was: " . var_export($answer, true));
        send_json_response(['error' => get_string('empty_response_from_api', 'block_uteluqchatbot')], 500);
    }
    // If an empty string is also an error, add: || $answer === ""
    if ($answer === "") {
         // Decide if an empty string is an error or a valid (empty) response
         // For now, let's assume it might be valid, but log it.
         error_log("Chatbot API: Received an empty string as answer from Weaviate/Cohere for question: {$question}");
    }


    // Save the conversation
    $max_conversations = 10; // Consider making this configurable

    $record = new stdClass();
    $record->userid = $userid; // Use validated $userid from input
    $record->courseid = $courseid; // Use validated $courseid from input
    $record->question = $question; // Use sanitized question
    $record->answer = is_string($answer) ? $answer : json_encode($answer); // Ensure answer is string for DB
    $record->timecreated = time();

    try {
        $count = $DB->count_records('block_uteluqchatbot_conversations', ['userid' => $userid, 'courseid' => $courseid]);

        if ($count >= $max_conversations) {
            // Moodle's $DB methods expect an array of IDs for delete_records_select or similar.
            // Or get the oldest records and delete them one by one or by a list of IDs.
            $oldest_ids = $DB->get_fieldset_sql(
                "SELECT id FROM {block_uteluqchatbot_conversations}
                 WHERE userid = :userid AND courseid = :courseid
                 ORDER BY timecreated ASC",
                ['userid' => $userid, 'courseid' => $courseid],
                0, // Offset
                $count - $max_conversations + 1 // Limit (number of records to delete)
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
            'answer' => $answer // Send the original $answer from the connector
        ]);

    } catch (dml_exception $db_error) {
        error_log('Chatbot API: Database error while saving conversation - ' . $db_error->getMessage());
        send_json_response(['error' => get_string('error_saving_conversation', 'block_uteluqchatbot') . ': ' . $db_error->getMessage()], 500);
    }

} catch (Exception $e) {
    error_log('Chatbot API: General exception - ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
    // Avoid sending detailed exception messages to the client in production for security.
    send_json_response(['error' => get_string('generic_server_error', 'block_uteluqchatbot') . ' Trace: ' . $e->getTraceAsString()], 500); // Added trace for debugging
} finally {
    // Ensure the output buffer started at the very beginning is cleaned up if not already handled.
    if (ob_get_level() > 0) {
        ob_end_flush(); // Or ob_end_clean() if no output is desired from this final stage.
    }
}

?>
