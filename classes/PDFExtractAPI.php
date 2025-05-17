<?php
/**
 * PDF Extract API class for Moodle.
 *
 * @package    local
 * @subpackage pdfextractapi
 * @copyright  2025 Université TÉLUQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class PDFExtractAPI
{
    private $clientId;
    private $clientSecret;
    private $accessToken;

    /**
     * Constructor for PDFExtractAPI.
     *
     * @param string $clientId The client ID for the API.
     * @param string $clientSecret The client secret for the API.
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Get the access token for the API.
     *
     * @return string The result message.
     */
    public function getAccessToken()
    {
        $ch = curl_init();

        // Prepare the data
        $postData = 'client_id=' . urlencode($this->clientId) . '&client_secret=' . urlencode($this->clientSecret);

        // cURL options
        $options = [
            CURLOPT_URL => 'https://pdf-services.adobe.io/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_SSL_VERIFYPEER => false, // Disable SSL (use with caution)
        ];

        curl_setopt_array($ch, $options);

        // Execute the request
        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            return get_string('failed_to_obtain_access_token', 'local_pdfextractapi') . $httpStatus;
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['access_token'])) {
            $this->accessToken = $responseData['access_token'];
            return get_string('access_token_obtained_successfully', 'local_pdfextractapi');
        } else {
            return get_string('failed_to_obtain_access_token_response', 'local_pdfextractapi') . print_r($responseData, true);
        }
    }

    /**
     * Upload an asset to the API.
     *
     * @param string $filePath The path to the file to upload.
     * @param string $mediaType The media type of the file.
     * @return string|null The asset ID or null if failed.
     */
    public function uploadAsset($filePath, $mediaType = 'application/pdf')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://pdf-services.adobe.io/assets');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'mediaType' => $mediaType,
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-API-Key: ' . $this->clientId,
            'Authorization: Bearer ' . $this->accessToken,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo get_string('failed_to_obtain_upload_uri', 'local_pdfextractapi') . $httpStatus . ". Response: $response\n";
            return null;
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['uploadUri']) && isset($responseData['assetID'])) {
            $uploadUri = $responseData['uploadUri'];
            $assetId = $responseData['assetID'];
            echo get_string('asset_upload_uri_obtained', 'local_pdfextractapi');
        } else {
            echo get_string('failed_to_obtain_upload_uri_response', 'local_pdfextractapi') . print_r($responseData, true);
            return null;
        }

        // Upload the file to the pre-signed URI
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $uploadUri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/pdf',
        ]);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_INFILE, fopen($filePath, 'r'));
        curl_setopt($ch, CURLOPT_INFILESIZE, filesize($filePath));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo get_string('failed_to_upload_file', 'local_pdfextractapi') . $httpStatus . ". Response: $response\n";
            return null;
        }

        echo get_string('file_uploaded_successfully', 'local_pdfextractapi');
        return $assetId;
    }

    /**
     * Create a job for the API.
     *
     * @param string $assetId The asset ID.
     * @return string|null The location URL or null if failed.
     */
    public function createJob($assetId)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://pdf-services.adobe.io/operation/extractpdf");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'assetID' => $assetId,
            'getCharBounds' => false,
            'includeStyling' => false,
            'elementsToExtract' => ['text'], // Extract text only
            'tableOutputFormat' => 'xlsx',
            'renditionsToExtract' => [], // No renditions
            'includeHeaderFooter' => false,
            'tagEncapsulatedText' => [], // No tagged text
            'notifiers' => [],
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken,
            'x-api-key: ' . $this->clientId,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL

        // Capture response headers
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        // Get the headers from the response
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $headerSize);
        $body = substr($response, $headerSize);

        curl_close($ch);

        // Display the full response
        echo "Response Headers: " . print_r($headers, true) . "\n";
        echo "Response Body: " . print_r($body, true) . "\n";

        // Extract the location header
        if (preg_match('/location: ([^\r\n]+)/i', $headers, $matches)) {
            $location = trim($matches[1]);
        } else {
            $location = null;
        }

        switch ($httpStatus) {
            case 201:
                echo get_string('job_created_successfully', 'local_pdfextractapi') . $location;
                return $location; // Return the location URL
            case 400:
                echo get_string('bad_request', 'local_pdfextractapi');
                break;
            case 401:
                echo get_string('unauthorized', 'local_pdfextractapi');
                break;
            case 404:
                echo get_string('resource_not_found', 'local_pdfextractapi');
                break;
            case 429:
                echo get_string('quota_exceeded', 'local_pdfextractapi');
                break;
            case 500:
                echo get_string('internal_server_error', 'local_pdfextractapi');
                break;
            default:
                echo get_string('unexpected_http_status', 'local_pdfextractapi') . $httpStatus . ". Response: $body\n";
                break;
        }

        return null;
    }

    /**
     * Get the job status from the API.
     *
     * @param string $statusUrl The status URL.
     * @return array The job status.
     */
    public function getJobStatus($statusUrl)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $statusUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken,
            'x-api-key: ' . $this->clientId,
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo get_string('failed_to_get_job_status', 'local_pdfextractapi') . $httpStatus . ". Response: $response\n";
            return ['status' => 'in progress']; // Return 'in progress' to continue polling
        }

        $responseData = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($responseData['status'])) {
            $status = $responseData['status'];
            echo get_string('job_status', 'local_pdfextractapi') . $status . "\n";

            if ($status === 'done') {
                if (isset($responseData['content']['downloadUri'])) {
                    $downloadUri = $responseData['content']['downloadUri'];
                    echo get_string('job_completed_successfully', 'local_pdfextractapi') . $downloadUri;
                    return ['status' => 'done', 'downloadUri' => $downloadUri]; // Return the download URI
                } else {
                    echo get_string('job_completed_but_download_uri_missing', 'local_pdfextractapi');
                    return ['status' => 'in progress']; // Continue polling
                }
            } elseif ($status === 'in progress') {
                echo get_string('job_in_progress', 'local_pdfextractapi');
                return ['status' => 'in progress'];
            } elseif ($status === 'failed') {
                echo get_string('job_failed', 'local_pdfextractapi');
                return ['status' => 'failed'];
            }
        } else {
            echo get_string('failed_to_decode_json_response', 'local_pdfextractapi') . print_r($response, true);
            return ['status' => 'in progress']; // Return 'in progress' to continue polling
        }

        return null;
    }

    /**
     * Download an asset from the API.
     *
     * @param string $downloadUri The download URI.
     * @return string|null The asset content or null if failed.
     */
    public function downloadAsset($downloadUri)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $downloadUri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo get_string('failed_to_download_asset', 'local_pdfextractapi') . $httpStatus . ". Response: $response\n";
            return null;
        }

        echo get_string('asset_downloaded_successfully', 'local_pdfextractapi');
        return $response;
    }

    /**
     * Extract text from the content.
     *
     * @param string $contenu The content to extract text from.
     * @return string The extracted text.
     */
    public function extraireTexte($contenu)
    {
        // Decode the JSON content into a PHP array
        $donnees = json_decode($contenu, true);

        // Check if the data was correctly decoded
        if ($donnees === null) {
            die(get_string('error_decoding_json_file', 'local_pdfextractapi'));
        }

        // Initialize a variable to store the extracted text
        $texteComplet = "ok";

        // Check if the "elements" key exists and is an array
        if (isset($donnees["elements"]) && is_array($donnees["elements"])) {
            // Loop through the elements
            foreach ($donnees["elements"] as $element) {
                // Check if the "Text" key exists in the element
                if (isset($element["Text"])) {
                    // Add the text to the complete string
                    $texteComplet .= $element["Text"] . "\n\n";
                }
            }
        }

        // Return the complete text
        return trim($texteComplet);
    }

    /**
     * Process a PDF file.
     *
     * @param string $filePath The path to the PDF file.
     * @return string The result message.
     */
    public function processPDF($filePath)
    {
        $this->getAccessToken();
        $assetId = $this->uploadAsset($filePath);
        if ($assetId === null) {
            return "Erreur 1";
        }

        $locationUrl = $this->createJob($assetId);
        if ($locationUrl === null) {
            return "Erreur 2";
        }

        $status = 'in progress';
        $downloadUri = null;

        while ($status === 'in progress') {
            sleep(1); // Wait for 5 seconds before polling again
            $jobStatus = $this->getJobStatus($locationUrl);
            if (is_array($jobStatus) && isset($jobStatus['status'])) {
                $status = $jobStatus['status'];
                if ($status === 'done' && isset($jobStatus['downloadUri'])) {
                    $downloadUri = $jobStatus['downloadUri']; // getJobStatus returns the download URI when done
                    break;
                } elseif ($status === 'failed') {
                    throw new Exception('Job failed');
                }
            } else {
                return "Erreur 4";
            }
        }

        if ($downloadUri !== null) {
            $result = $this->downloadAsset($downloadUri);
            $text = $this->extraireTexte($result);
            return $text;
        } else {
            // echo "Job did not complete successfully.\n";
        }
        return "Erreur 5";
    }
}
