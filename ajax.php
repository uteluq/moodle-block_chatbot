<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_login();




global $CFG, $USER, $COURSE, $DB, $PAGE;

// Clean any previous output
ob_clean();
if (ob_get_length())
    ob_end_clean();

// Set HTTP headers
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

require_once($CFG->dirroot . '/blocks/chatbot/classes/weaviate_connector.php');


// Debug configuration
error_reporting(E_ALL);
ini_set('display_errors', 0); // Disable error display to avoid contaminating JSON

function sanitizeChatbotInput($input) {
    // Remove potentially dangerous tags
    $dangerousTags = ['script', 'iframe', 'object', 'embed', 'style', 'form', 'input'];
    foreach ($dangerousTags as $tag) {
        $input = preg_replace('/<\/?' . $tag . '[^>]*>/i', '', $input);
    }

    // Remove attributes containing JavaScript
    $input = preg_replace('/\s*on\w+\s*=\s*["\'][^"\']*["\']/i', '', $input);
    
    // Remove JavaScript URLs
    $input = preg_replace('/javascript:\s*/i', '', $input);

    // Block calls to dangerous functions
    $dangerousFunctions = ['eval', 'system', 'exec', 'passthru', 'shell_exec', 'base64_decode'];
    foreach ($dangerousFunctions as $func) {
        $input = preg_replace('/\b' . preg_quote($func, '/') . '\s*\(/i', '', $input);
    }

    // Limit length
    $input = mb_substr($input, 0, 1000, 'UTF-8');

    // Convert to HTML entities for tags only, without affecting quotes
    $input = htmlspecialchars($input, ENT_NOQUOTES, 'UTF-8');

    // Decode HTML entities to avoid apostrophe issues
    $input = htmlspecialchars_decode($input, ENT_NOQUOTES);

    return $input;
}



// Function to send a clean JSON response
function send_json_response($data, $status_code = 200)
{

    global $log_file;

    // Clean again to ensure no output
    if (ob_get_length())
        ob_end_clean();

    // Log the response before sending
    // error_log('Sending JSON response: ' . json_encode($data), 3, $log_file);

    http_response_code($status_code);
        // Successful response
        $answer = $data['answer'];
    
        if (!mb_detect_encoding($answer, 'UTF-8', true)) {
            $data['answer'] = utf8_encode($answer); // Force encoding to UTF-8.
        }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}

try {
    // Check HTTP method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        send_json_response(['error' => 'HTTP method not allowed'], 405);
    }

    // Lire l'entrée
    $raw_input = file_get_contents('php://input');



    $input = json_decode($raw_input, true);
    // error_log('Input reçu: ' . print_r($input, true), 3, $log_file);
    $userid = $input['userid'];
    $courseid = $input['courseid'];
    $sansRag = (int) $input['sansRag'];
    $sansRag = $sansRag === 1;

    if (json_last_error() !== JSON_ERROR_NONE) {
        send_json_response(['error' => 'Invalid JSON: ' . json_last_error_msg()], 400);
    }

    if (!isset($input['question']) || !isset($input['sesskey'])) {
        send_json_response(['error' => 'Missing parameters'], 400);
    }

    $question = trim($input['question']);

    // Example usage
try {
    $question = sanitizeChatbotInput($question);
    
    // Additional check
    if (empty($question)) {
        throw new Exception("Invalid question");
    }
    
    // Use the sanitized question
    // ... rest of chatbot processing
    
} catch (Exception $e) {
    error_log('Chatbot sanitization error: ' . $e->getMessage());
    die('Invalid question');
    $sesskey = $input['sesskey'];

    if (empty($question)) {
        send_json_response(['error' => 'The question cannot be empty'], 400);
    }

    if (!confirm_sesskey($sesskey)) {
        send_json_response(['error' => 'Invalid session'], 403);
    }

 





    // Retrieve the API key
    $api_key = get_config('block_chatbot', 'openai_api_key');
    if (empty($api_key)) {
        send_json_response(['error' => 'OpenAI API key not configured'], 500);
    }


    $apiUrl = get_config('block_chatbot', 'weaviate_api_url');
    $apiKey = get_config('block_chatbot', 'weaviate_api_key');
    $cohereApiKey = get_config('block_chatbot', 'cohere_embedding_api_key');

    $weaviateConnector = new WeaviateConnector(
        $apiUrl, // Your Weaviate instance URL
        $apiKey,  // Your Weaviate API key
        cohereApiKey: $cohereApiKey // Your Cohere API key
    );

    // To check if the user is a teacher in the current course
    $context = context_course::instance($COURSE->id);
    $isTeacher = has_capability('moodle/course:update', $context, $currentUserId);
    $courseName = $DB->get_record('course', array('id' => $courseid))->fullname;
    $collectionName = 'Collection_course_' . $courseid;




$ragResults = "";

if($sansRag === true) {
    $ragResults = $weaviateConnector->getCohereResponse($question, $cohereApiKey);

} else {

    $ragResults = $weaviateConnector->getQuestionAnswer($courseName, $collectionName, $question,  $userid, $courseid);
}
    $answer = $ragResults;



    if (empty($answer)) {
        send_json_response(['error' => 'Empty response received from the OpenAI API'], 500);
    }
    $max_conversations =  10;

    $record = new stdClass();
    $record->userid = $userid;
    $record->courseid = $courseid;
    $record->question = $question;
    $record->answer = $answer;
    $record->timecreated = time();

    try {
        // Handle conversation limit
        $count = $DB->count_records('block_chatbot_conversations', ['userid' => $userid]);

        if ($count >= $max_conversations) {
            $oldest = $DB->get_record_sql(
                "SELECT id FROM {block_chatbot_conversations} 
                WHERE userid = :userid 
                ORDER BY timecreated ASC 
                LIMIT 1",
                ['userid' => $userid]
            );

            if ($oldest) {
                $DB->delete_records('block_chatbot_conversations', ['id' => $oldest->id]);
            }
        }

        // Insert the new conversation
        $DB->insert_record('block_chatbot_conversations', $record);

        // Send the response
        send_json_response([
            'status' => 'success',
            'answer' => $answer
        ]);

    } catch (dml_exception $db_error) {
        send_json_response([
            'error' => 'Error saving conversation'
        ], 500);
    }

    // Send the response
    send_json_response([
        'status' => 'success',
        'answer' => $answer
    ]);

} catch (Exception $e) {
    send_json_response([
        'error' => $e->getMessage()
    ], 500);
}