<?php
/**
 * @copyright 2025 Université TÉLUQ
 */



require_once('../../config.php');

// Enable output buffering at the start
ob_start();

global $CFG, $USER, $COURSE, $DB, $PAGE;

// Get the current user
$currentUserId = $USER->id;
$username = $USER->username;

// Check if the user is a teacher in the current course
$context = context_course::instance($COURSE->id);
$isTeacher = has_capability('moodle/course:update', $context, $currentUserId);

require_login();

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Configuration of API keys and Weaviate URL
$apiUrl = get_config('block_uteluqchatbot', 'weaviate_api_url');
$apiKey = get_config('block_uteluqchatbot', 'weaviate_api_key');
$cohereApiKey = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

// Initialize WeaviateConnector object
$connector = new \block_uteluqchatbot\weaviate_connector($apiUrl, $apiKey, $cohereApiKey);

try {
    // Check form data
    if (empty($_FILES['files'])) {
        throw new Exception(get_string('filesmissing', 'block_uteluqchatbot'));
    }

    $uploadedFiles = $_FILES['files'];

    $userid = required_param('userid', PARAM_INT);
    $courseid = required_param('courseid', PARAM_INT);


    $courseName = 'Collection_course_' . $courseid;
    $connector->delete_collection($courseName);
    $checkIfCreated = $connector->collection_exists($courseName);

    // Create the collection if it does not exist
    if ($checkIfCreated == false && !$connector->create_collection($courseName)) {
        throw new Exception(get_string('errorcreatingcollection', 'block_uteluqchatbot') . $connector->get_last_error());
    }
    // Check for upload errors
    foreach ($uploadedFiles['error'] as $key => $error) {
        if ($error !== UPLOAD_ERR_OK) {
            switch ($error) {
                case UPLOAD_ERR_INI_SIZE:
                    $message = get_string('fileexceedsmaxsizeini', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = get_string('fileexceedsmaxsizeform', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $message = get_string('filepartiallyuploaded', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $message = get_string('nofileuploaded', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = get_string('missingtmpfolder', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = get_string('failedtowritetodisk', 'block_uteluqchatbot');
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $message = get_string('phpextensionstoppedupload', 'block_uteluqchatbot');
                    break;
                default:
                    $message = get_string('unknownuploaderror', 'block_uteluqchatbot');
            }

            throw new Exception(get_string('uploaderror', 'block_uteluqchatbot') . $message);
        }
    }



    // Create or get a temporary directory for the plugin under /moodledata/temp/block_uteluqchatbot
    $temppath = make_temp_directory('block_uteluqchatbot');

    // Define the path where uploaded files will be temporarily stored.
    $uploadDir = $temppath . '/uploads';



    // If the uploads subdirectory doesn't exist, create it with proper permissions (0777).
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }



    foreach ($uploadedFiles['tmp_name'] as $key => $fileTmpName) {
        $fileName = $uploadedFiles['name'][$key];
        $newFileName = uniqid('file_', true) . '-' . $fileName;
        $destination = $uploadDir . $newFileName;




        // Move the file to the destination directory
        move_uploaded_file($fileTmpName, $destination);



        $adobe_pdf_client_id = get_config('block_uteluqchatbot', 'adobe_pdf_client_id');
        $adobe_pdf_client_secret = get_config('block_uteluqchatbot', 'adobe_pdf_client_secret');



        // Extract the file content
        $pdfExtractor = new \block_uteluqchatbot\pdf_extract_api($adobe_pdf_client_id, $adobe_pdf_client_secret);
        $extractedText = $pdfExtractor->process_pdf($destination);


        // Generate a unique name for the text file
        $newFileTxtName = uniqid('file_', true) . '-' . $fileName . '.txt';
        $destinationTxt = $uploadDir . $newFileTxtName;

        if (file_put_contents($destinationTxt, $extractedText) !== false) {
            // Text successfully saved to file
        } else {
            // Error saving text file
        }

        $in = $connector->index_text_file($destinationTxt, $courseName, $courseName);

        if (!$in) {
            throw new Exception(get_string('errorindexingfile', 'block_uteluqchatbot') . $connector->get_last_error());
        }
        unlink($destinationTxt);
        unlink($destination);
    }

    // Successful response
    $response = ['success' => true, 'message' => get_string('allfilesindexed', 'block_uteluqchatbot')];
    $message = $response['message'];

    if (!mb_detect_encoding($message, 'UTF-8', true)) {
        $response['message'] = utf8_encode($message); // Force UTF-8 encoding
    }
} catch (Exception $e) {
    // Error handling
    $response = ['error' => $e->getMessage()];
}

// Flush all buffered output
while (ob_get_level()) {
    ob_end_clean();
}

// Set the header for JSON content type
header('Content-Type: application/json');

// Output the JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit;
