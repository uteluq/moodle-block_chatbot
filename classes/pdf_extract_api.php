<?php
/**
 * PDF Extract API class for Moodle.
 *
 * @package    block_uteluqchatbot
 * @subpackage pdfextractapi
 * @copyright  2025 Université TÉLUQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_uteluqchatbot;


class pdf_extract_api
{
    private $client_id;
    private $client_secret;
    private $access_token;

    /**
     * Constructor for pdf_extract_api.
     *
     * @param string $client_id The client ID for the API.
     * @param string $client_secret The client secret for the API.
     */
    public function __construct($client_id, $client_secret)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    /**
     * Get the access token for the API.
     *
     * @return string The result message.
     */
    public function get_access_token()
    {
        $ch = curl_init();

        // Prepare the data
        $post_data = 'client_id=' . urlencode($this->client_id) . '&client_secret=' . urlencode($this->client_secret);

        // cURL options
        $options = [
            CURLOPT_URL => 'https://pdf-services.adobe.io/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_data,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_SSL_VERIFYPEER => false,
        ];

        curl_setopt_array($ch, $options);

        // Execute the request
        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($http_status != 200) {
            return get_string('failed_to_obtain_access_token', 'block_uteluqchatbot') . $http_status;
        }

        $response_data = json_decode($response, true);
        if (isset($response_data['access_token'])) {
            $this->access_token = $response_data['access_token'];
            return get_string('access_token_obtained_successfully', 'block_uteluqchatbot');
        } else {
            return get_string('failed_to_obtain_access_token_response', 'block_uteluqchatbot') . print_r($response_data, true);
        }
    }

    /**
     * Upload an asset to the API.
     *
     * @param string $file_path The path to the file to upload.
     * @param string $media_type The media type of the file.
     * @return string|null The asset ID or null if failed.
     */
    public function upload_asset($file_path, $media_type = 'application/pdf')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://pdf-services.adobe.io/assets');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['mediaType' => $media_type]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'X-API-Key: ' . $this->client_id,
            'Authorization: Bearer ' . $this->access_token,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($http_status != 200) {
            echo get_string('failed_to_obtain_upload_uri', 'block_uteluqchatbot') . $http_status . ". Response: $response\n";
            return null;
        }

        $response_data = json_decode($response, true);
        if (isset($response_data['uploadUri']) && isset($response_data['assetID'])) {
            $upload_uri = $response_data['uploadUri'];
            $asset_id = $response_data['assetID'];
            echo get_string('asset_upload_uri_obtained', 'block_uteluqchatbot');
        } else {
            echo get_string('failed_to_obtain_upload_uri_response', 'block_uteluqchatbot') . print_r($response_data, true);
            return null;
        }

        // Upload the file to the pre-signed URI
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $upload_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PUT, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/pdf']);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_INFILE, fopen($file_path, 'r'));
        curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($http_status != 200) {
            echo get_string('failed_to_upload_file', 'block_uteluqchatbot') . $http_status . ". Response: $response\n";
            return null;
        }

        echo get_string('file_uploaded_successfully', 'block_uteluqchatbot');
        return $asset_id;
    }

    /**
     * Create a job for the API.
     *
     * @param string $asset_id The asset ID.
     * @return string|null The location URL or null if failed.
     */
    public function create_job($asset_id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://pdf-services.adobe.io/operation/extractpdf");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'assetID' => $asset_id,
            'getCharBounds' => false,
            'includeStyling' => false,
            'elementsToExtract' => ['text'],
            'tableOutputFormat' => 'xlsx',
            'renditionsToExtract' => [],
            'includeHeaderFooter' => false,
            'tagEncapsulatedText' => [],
            'notifiers' => [],
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->access_token,
            'x-api-key: ' . $this->client_id,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, 1);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        curl_close($ch);

        if (preg_match('/location: ([^\r\n]+)/i', $headers, $matches)) {
            $location = trim($matches[1]);
        } else {
            $location = null;
        }

        switch ($http_status) {
            case 201:
                echo get_string('job_created_successfully', 'block_uteluqchatbot') . $location;
                return $location;
            case 400:
                echo get_string('bad_request', 'block_uteluqchatbot');
                break;
            case 401:
                echo get_string('unauthorized', 'block_uteluqchatbot');
                break;
            case 404:
                echo get_string('resource_not_found', 'block_uteluqchatbot');
                break;
            case 429:
                echo get_string('quota_exceeded', 'block_uteluqchatbot');
                break;
            case 500:
                echo get_string('internal_server_error', 'block_uteluqchatbot');
                break;
            default:
                echo get_string('unexpected_http_status', 'block_uteluqchatbot') . $http_status . ". Response: $body\n";
                break;
        }

        return null;
    }

    /**
     * Get the job status from the API.
     *
     * @param string $status_url The status URL.
     * @return array The job status.
     */
    public function get_job_status($status_url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $status_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->access_token,
            'x-api-key: ' . $this->client_id,
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($http_status != 200) {
            echo get_string('failed_to_get_job_status', 'block_uteluqchatbot') . $http_status . ". Response: $response\n";
            return ['status' => 'in progress'];
        }

        $response_data = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($response_data['status'])) {
            $status = $response_data['status'];
            echo get_string('job_status', 'block_uteluqchatbot') . $status . "\n";

            if ($status === 'done') {
                if (isset($response_data['content']['downloadUri'])) {
                    $download_uri = $response_data['content']['downloadUri'];
                    echo get_string('job_completed_successfully', 'block_uteluqchatbot') . $download_uri;
                    return ['status' => 'done', 'downloadUri' => $download_uri];
                } else {
                    echo get_string('job_completed_but_download_uri_missing', 'block_uteluqchatbot');
                    return ['status' => 'in progress'];
                }
            } elseif ($status === 'in progress') {
                echo get_string('job_in_progress', 'block_uteluqchatbot');
                return ['status' => 'in progress'];
            } elseif ($status === 'failed') {
                echo get_string('job_failed', 'block_uteluqchatbot');
                return ['status' => 'failed'];
            }
        } else {
            echo get_string('failed_to_decode_json_response', 'block_uteluqchatbot') . print_r($response, true);
            return ['status' => 'in progress'];
        }

        return null;
    }

    /**
     * Download an asset from the API.
     *
     * @param string $download_uri The download URI.
     * @return string|null The asset content or null if failed.
     */
    public function download_asset($download_uri)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $download_uri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($http_status != 200) {
            echo get_string('failed_to_download_asset', 'block_uteluqchatbot') . $http_status . ". Response: $response\n";
            return null;
        }

        echo get_string('asset_downloaded_successfully', 'block_uteluqchatbot');
        return $response;
    }

    /**
     * Extract text from the content.
     *
     * @param string $contenu The content to extract text from.
     * @return string The extracted text.
     */
    public function extraire_texte($contenu)
    {
        $donnees = json_decode($contenu, true);
        if ($donnees === null) {
            die(get_string('error_decoding_json_file', 'block_uteluqchatbot'));
        }

        $texte_complet = "ok";
        if (isset($donnees["elements"]) && is_array($donnees["elements"])) {
            foreach ($donnees["elements"] as $element) {
                if (isset($element["Text"])) {
                    $texte_complet .= $element["Text"] . "\n\n";
                }
            }
        }

        return trim($texte_complet);
    }

    /**
     * Process a PDF file.
     *
     * @param string $file_path The path to the PDF file.
     * @return string The result message.
     */
    public function process_pdf($file_path)
    {
        $this->get_access_token();
        $asset_id = $this->upload_asset($file_path);
        if ($asset_id === null) {
            return get_string('error_uploading_asset', 'block_uteluqchatbot');
        }

        $location_url = $this->create_job($asset_id);
        if ($location_url === null) {
            return get_string('error_creating_job', 'block_uteluqchatbot');
        }

        $status = 'in progress';
        $download_uri = null;

        while ($status === 'in progress') {
            sleep(1);
            $job_status = $this->get_job_status($location_url);
            if (is_array($job_status) && isset($job_status['status'])) {
                $status = $job_status['status'];
                if ($status === 'done' && isset($job_status['downloadUri'])) {
                    $download_uri = $job_status['downloadUri'];
                    break;
                } elseif ($status === 'failed') {
                    throw new \Exception(get_string('job_failed', 'block_uteluqchatbot'));
                }
            }
        }

        if ($download_uri !== null) {
            $result = $this->download_asset($download_uri);
            $text = $this->extraire_texte($result);
            return $text;
        }
        return get_string('error_processing_pdf', 'block_uteluqchatbot');
    }
}
