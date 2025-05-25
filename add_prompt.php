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

    $prompttext = $input['prompttext'];
    $sesskey = $input['sesskey'];
    $userid = $input['userid'];
    $courseid = $input['courseid'];

    // Validate the session key
    if (!confirm_sesskey($sesskey)) {
        throw new Exception(get_string('invalid_sesskey', 'block_uteluqchatbot'));
    }

    // Check if a prompt already exists for this user
    $existing_prompt = $DB->get_record('block_uteluqchatbot_prompts', array('userid' => $userid));

    $record = new stdClass();

    $record->prompt = $prompttext;
    $record->userid = $userid;
    $record->courseid = $courseid;
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
