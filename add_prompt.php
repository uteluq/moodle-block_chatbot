<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/blocks/chatbot/classes/openai_service.php');
require_login();

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $input = json_decode(file_get_contents('php://input'), true);


    $prompttext = $input['prompttext'];
    $sesskey = $input['sesskey'];
    $userid = $input['userid'];
    $courseid = $input['courseid'];

    if (!confirm_sesskey($sesskey)) {
        throw new Exception('Invalid sesskey');
    }

    // Check if a prompt already exists for this user
    $existing_prompt = $DB->get_record('block_chatbot_prompts', array('userid' => $userid));

    $record = new stdClass();

    $record->prompt = $prompttext;
    $record->userid = $userid;
    $record->courseid = $courseid;
    $record->timemodified = time();

    try {
        if ($existing_prompt) {
            $record->id = $existing_prompt->id;
            $DB->update_record('block_chatbot_prompts', $record);
        } else {
            $record->timecreated = time();
            $DB->insert_record('block_chatbot_prompts', $record);
        }
        $response = ['success' => true];
    } catch (Exception $db_error) {
        throw new Exception('Database write error: ' . $db_error->getMessage());
    }
} catch (Exception $e) {
    $response = ['error' => $e->getMessage()];
}

header('Content-Type: application/json');
echo json_encode($response);