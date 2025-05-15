<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_once($CFG->dirroot . '/blocks/chatbot/classes/openai_service.php');
require_login();

error_reporting(E_ALL);
ini_set('display_errors', 1);
// $log_file = $CFG->dirroot . '/blocks/chatbot/custom_debug.log';

try {
    $input = json_decode(file_get_contents('php://input'), true);
    // error_log('Input reçu: ' . print_r($input, true), 3, $log_file);


    $prompttext = $input['prompttext'];
    $sesskey = $input['sesskey'];
    $userid = $input['userid'];
    $courseid = $input['courseid'];

    // $userid = $USER->id;
    // $courseid = $COURSE->id;

    if (!confirm_sesskey($sesskey)) {
        throw new Exception('Invalid sesskey');
    }

    // Vérifier si un prompt existe déjà pour cet utilisateur
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
            // error_log('Prompt mis à jour avec succès', 3, $log_file);
        } else {
            $record->timecreated = time();
            $DB->insert_record('block_chatbot_prompts', $record);
            // error_log('Prompt créé avec succès', 3, $log_file);
        }
        $response = ['success' => true];
    } catch (Exception $db_error) {
        // error_log('Erreur d\'écriture vers la base de données: ' . $db_error->getMessage(), 3, $log_file);
        throw new Exception('Erreur d\'écriture vers la base de données: ' . $db_error->getMessage());
    }
} catch (Exception $e) {
    // error_log('Erreur chatbot: ' . $e->getMessage(), 3, $log_file);
    $response = ['error' => $e->getMessage()];
}

header('Content-Type: application/json');
echo json_encode($response);