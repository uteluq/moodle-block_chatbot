<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_login();

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Decode the JSON input from the request
    $input = json_decode(file_get_contents('php://input'), true);

    $prompt_text = $input['prompttext'];
    $sess_key = $input['sesskey'];
    $user_id = $input['userid'];
    $course_id = $input['courseid'];

    // Validate the session key
    if (!confirm_sesskey($sess_key)) {
        throw new Exception(get_string('invalid_sesskey', 'block_uteluqchatbot'));
    }

    // Check if a prompt already exists for this user
    $existing_prompt = $DB->get_record('block_uteluqchatbot_prompts', array('userid' => $user_id));

    $record = new stdClass();

    $record->prompt = $prompt_text;
    $record->userid = $user_id;
    $record->courseid = $course_id;
    $record->timemodified = time();

    try {
        if ($existing_prompt) {
            // Update the existing prompt
            $record->id = $existing_prompt->id;
            $DB->update_record('block_uteluqchatbot_prompts', $record);
        } else {
            // Create a new prompt
            $record->timecreated = time();
            $DB->insert_record('block_uteluqchatbot_prompts', $record);
        }
        $response = ['success' => true];
    } catch (Exception $db_error) {
        // Handle database errors
        throw new Exception(get_string('database_write_error', 'block_uteluqchatbot') . $db_error->getMessage());
    }
} catch (Exception $e) {
    // Handle exceptions and prepare error response
    $response = ['error' => $e->getMessage()];
}

// Set the header for JSON content type
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
