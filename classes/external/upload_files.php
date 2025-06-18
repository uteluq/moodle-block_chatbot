<?php
/**
 * External API for file upload and indexing
 * @copyright 2025 UNIVERSITÉ TÉLUQ & Université GASTON BERGER DE SAINT-LOUIS
 */

namespace block_uteluqchatbot\external;

use external_api;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;
use context_course;
use Exception;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

class upload_files extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function execute_parameters() {
        return new external_function_parameters([
            'courseid' => new external_value(PARAM_INT, 'Course ID'),
            'files' => new external_multiple_structure(
                new external_single_structure([
                    'filename' => new external_value(PARAM_TEXT, 'File name'),
                    'filecontent' => new external_value(PARAM_RAW, 'File content (base64 encoded)'),
                ])
            )
        ]);
    }

    /**
     * Get file extension
     * @param string $filename
     * @return string
     */
    private static function get_file_extension($filename) {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }

    /**
     * Check if file is PDF
     * @param string $filename
     * @return bool
     */
    private static function is_pdf($filename) {
        return self::get_file_extension($filename) === 'pdf';
    }

    /**
     * Check if file is text file
     * @param string $filename
     * @return bool
     */
    private static function is_text_file($filename) {
        $textExtensions = ['txt', 'text', 'md'];
        return in_array(self::get_file_extension($filename), $textExtensions);
    }

    /**
     * Execute the file upload and indexing
     * @param int $courseid
     * @param array $files
     * @return array
     */
    public static function execute($courseid, $files) {
        global $CFG, $USER, $DB;

        // Clean any output that might pollute the JSON response
        if (ob_get_level()) {
            ob_end_clean();
        }
        ob_start();

        try {
            // Validate parameters
            $params = self::validate_parameters(self::execute_parameters(), [
                'courseid' => $courseid,
                'files' => $files
            ]);

            // Validate context and capabilities
            $context = context_course::instance($params['courseid']);
            self::validate_context($context);
            
            // Check capabilities with more flexible requirement
            try {
                require_capability('moodle/course:update', $context);
            } catch (Exception $e) {
                // Try alternative capabilities
                if (has_capability('moodle/course:managefiles', $context) || 
                    has_capability('moodle/course:view', $context) || 
                    is_enrolled($context, $USER->id)) {
                    // OK
                } else {
                    throw new Exception('Insufficient permissions to upload files');
                }
            }

            // Configuration of API keys and Weaviate URL
            $apiUrl = get_config('block_uteluqchatbot', 'weaviate_api_url');
            $apiKey = get_config('block_uteluqchatbot', 'weaviate_api_key');
            $cohereApiKey = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

            // Validate required configurations
            if (empty($apiUrl) || empty($apiKey) || empty($cohereApiKey)) {
                throw new Exception('Missing required API configuration');
            }

            // Check if classes exist
            if (!class_exists('\block_uteluqchatbot\weaviate_connector')) {
                throw new Exception('WeaviateConnector class not found');
            }

            // Initialize WeaviateConnector object
            $connector = new \block_uteluqchatbot\weaviate_connector($apiUrl, $apiKey, $cohereApiKey);

            $courseName = 'Collection_course_' . $params['courseid'];
            
            // Delete existing collection and recreate it
            $connector->delete_collection($courseName);
            
            $checkIfCreated = $connector->collection_exists($courseName);

            // Create the collection
            if (!$connector->create_collection($courseName)) {
                $error = $connector->get_last_error();
                throw new Exception('Error creating collection: ' . ($error ? $error : 'Unknown error'));
            }

            // Create or get a temporary directory for the plugin
            $temppath = make_temp_directory('block_uteluqchatbot');
            $uploadDir = $temppath . '/uploads/';

            // If the uploads subdirectory doesn't exist, create it
            if (!file_exists($uploadDir)) {
                if (!mkdir($uploadDir, 0777, true)) {
                    throw new Exception('Failed to create upload directory');
                }
            }

            $processedFiles = 0;
            $errors = [];

            foreach ($params['files'] as $index => $file) {
                try {
                    // Validate filename
                    if (empty($file['filename'])) {
                        throw new Exception('Empty filename provided');
                    }

                    // Check if file type is supported
                    if (!self::is_pdf($file['filename']) && !self::is_text_file($file['filename'])) {
                        throw new Exception('Unsupported file type: ' . $file['filename']);
                    }

                    // Decode base64 content
                    $fileContent = base64_decode($file['filecontent']);
                    if ($fileContent === false) {
                        throw new Exception('Invalid file data for: ' . $file['filename']);
                    }

                    // Generate unique filename
                    $newFileName = uniqid('file_', true) . '-' . clean_filename($file['filename']);
                    $destination = $uploadDir . $newFileName;

                    // Save file temporarily
                    if (file_put_contents($destination, $fileContent) === false) {
                        throw new Exception('Failed to save file: ' . $file['filename']);
                    }

                    $extractedText = '';
                    $destinationTxt = '';

                    // Process based on file type
                    if (self::is_pdf($file['filename'])) {
                        // PDF processing
                        $adobe_pdf_client_id = get_config('block_uteluqchatbot', 'adobe_pdf_client_id');
                        $adobe_pdf_client_secret = get_config('block_uteluqchatbot', 'adobe_pdf_client_secret');

                        if (empty($adobe_pdf_client_id) || empty($adobe_pdf_client_secret)) {
                            throw new Exception('Adobe PDF API credentials not configured');
                        }

                        // Check if PDF extractor class exists
                        if (!class_exists('\block_uteluqchatbot\pdf_extract_api')) {
                            throw new Exception('PDF extractor class not found');
                        }

                        $pdfExtractor = new \block_uteluqchatbot\pdf_extract_api($adobe_pdf_client_id, $adobe_pdf_client_secret);
                        $extractedText = $pdfExtractor->process_pdf($destination);

                        if (empty($extractedText)) {
                            throw new Exception('Failed to extract text from PDF: ' . $file['filename']);
                        }

                        // Generate a unique name for the text file
                        $newFileTxtName = uniqid('file_', true) . '-' . $file['filename'] . '.txt';
                        $destinationTxt = $uploadDir . $newFileTxtName;

                        if (file_put_contents($destinationTxt, $extractedText) === false) {
                            throw new Exception('Failed to save extracted text file: ' . $file['filename']);
                        }

                    } else if (self::is_text_file($file['filename'])) {
                        // Text file processing - use the file directly
                        $destinationTxt = $destination;
                        $extractedText = $fileContent;
                    }

                    // Index the text file
                    $indexed = $connector->index_text_file($destinationTxt, $courseName, $courseName);

                    if (!$indexed) {
                        $error = $connector->get_last_error();
                        throw new Exception('Error indexing file ' . $file['filename'] . ': ' . ($error ? $error : 'Unknown error'));
                    }

                    // Clean up temporary files
                    if (file_exists($destinationTxt) && $destinationTxt !== $destination) {
                        unlink($destinationTxt);
                    }
                    if (file_exists($destination)) {
                        unlink($destination);
                    }

                    $processedFiles++;

                } catch (Exception $e) {
                    $errors[] = $file['filename'] . ': ' . $e->getMessage();
                    
                    // Clean up files in case of error
                    if (isset($destinationTxt) && file_exists($destinationTxt) && $destinationTxt !== $destination) {
                        unlink($destinationTxt);
                    }
                    if (isset($destination) && file_exists($destination)) {
                        unlink($destination);
                    }
                }
            }

            // Return results
            if ($processedFiles > 0) {
                $message = $processedFiles . ' file(s) indexed successfully';
                if (!empty($errors)) {
                    $message .= '. Errors: ' . implode('; ', $errors);
                }
                
                return [
                    'success' => true,
                    'message' => $message,
                    'processedfiles' => $processedFiles
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'No files processed. Errors: ' . implode('; ', $errors),
                    'processedfiles' => 0
                ];
            }

        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
                'processedfiles' => 0
            ];
        } finally {
            // Clean output buffer before returning JSON
            if (ob_get_level()) {
                ob_end_clean();
            }
        }
    }

    /**
     * Returns description of method result value
     * @return external_single_structure
     */
    public static function execute_returns() {
        return new external_single_structure([
            'success' => new external_value(PARAM_BOOL, 'Whether the operation was successful'),
            'message' => new external_value(PARAM_TEXT, 'Response message'),
            'processedfiles' => new external_value(PARAM_INT, 'Number of files processed')
        ]);
    }
}