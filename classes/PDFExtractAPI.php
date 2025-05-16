<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
class PDFExtractAPI
{
    private $clientId;
    private $clientSecret;
    private $accessToken;

    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function getAccessToken()
    {
        $ch = curl_init();
    
        // Preparation of data
        $postData = 'client_id=' . urlencode($this->clientId) . '&client_secret=' . urlencode($this->clientSecret);
    
        // Options cURL
        $options = [
            CURLOPT_URL => 'https://pdf-services.adobe.io/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData,
            CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded'],
            CURLOPT_SSL_VERIFYPEER => false, // Désactive SSL (à utiliser avec prudence)
        ];
    
        curl_setopt_array($ch, $options);
    
        // Executing the request
        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    
        if ($httpStatus != 200) {
            return "Failed to obtain access token. HTTP Status: $httpStatus. Response: $response\n";
        }
    
        $responseData = json_decode($response, true);
        if (isset($responseData['access_token'])) {
            $this->accessToken = $responseData['access_token'];
            return "Access Token obtained successfully.\n";
        } else {
            return "Failed to obtain access token. Response: " . print_r($responseData, true) . "\n";
        }
    }
    


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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Désactive SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo "Failed to obtain upload URI. HTTP Status: $httpStatus. Response: $response\n";
            return null;
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['uploadUri']) && isset($responseData['assetID'])) {
            $uploadUri = $responseData['uploadUri'];
            $assetId = $responseData['assetID'];
            echo "Asset upload URI obtained.\n";
        } else {
            echo "Failed to obtain upload URI. Response: " . print_r($responseData, true) . "\n";
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Désactive SSL

        $response = curl_exec($ch);
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        if ($httpStatus != 200) {
            echo "Failed to upload file. HTTP Status: $httpStatus. Response: $response\n";
            return null;
        }

        echo "File uploaded successfully.\n";
        return $assetId;
    }

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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Désactive SSL

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

        // Show full answer
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
                echo "Job created successfully. Location: $location\n";
                return $location; // Return the location URL
            case 400:
                echo "Bad Request. The request was invalid or cannot be otherwise served.\n";
                break;
            case 401:
                echo "Unauthorized. Check your API credentials.\n";
                break;
            case 404:
                echo "Resource Not Found. The specified resource was not found.\n";
                break;
            case 429:
                echo "Quota Exceeded. You have exceeded your quota for this operation.\n";
                break;
            case 500:
                echo "Internal Server Error. The server encountered an error and is unable to process your request at this time.\n";
                break;
            default:
                echo "Unexpected HTTP Status: $httpStatus. Response: $body\n";
                break;
        }

        return null;
    }

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
            echo "Failed to get job status. HTTP Status: $httpStatus. Response: $response\n";
            return ['status' => 'in progress']; // Return 'in progress' to continue polling
        }

        $responseData = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($responseData['status'])) {
            $status = $responseData['status'];
            echo "Job status: " . $status . "\n";

            if ($status === 'done') {
                if (isset($responseData['content']['downloadUri'])) {
                    $downloadUri = $responseData['content']['downloadUri'];
                    echo "Job completed successfully. Download URI: $downloadUri\n";
                    return ['status' => 'done', 'downloadUri' => $downloadUri]; // Return the download URI
                } else {
                    echo "Job completed but download URI is missing in the response.\n";
                    return ['status' => 'in progress']; // Continue polling
                }
            } elseif ($status === 'in progress') {
                echo "Job is still in progress. Continue polling...\n";
                return ['status' => 'in progress'];
            } elseif ($status === 'failed') {
                echo "Job failed.\n";
                return ['status' => 'failed'];
            }
        } else {
            echo "Failed to decode JSON response or status field is missing. Response: " . print_r($response, true) . "\n";
            return ['status' => 'in progress']; // Return 'in progress' to continue polling
        }

        return null;
    }

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
            echo "Failed to download asset. HTTP Status: $httpStatus. Response: $response\n";
            return null;
        }

        echo "Asset downloaded successfully.\n";
        return $response;
    }

    public function extraireTexte($contenu)
    {
        // Decoding JSON content into a PHP array
        $donnees = json_decode($contenu, true);

        // Check that data has been correctly decoded
        if ($donnees === null) {
            die("Erreur lors du décodage du fichier JSON.");
        }

        // Initialize a variable to store extracted text
        $texteComplet = "ok";

        // Check if the key “elements” exists and is an array
        if (isset($donnees["elements"]) && is_array($donnees["elements"])) {
            // Browse elements
            foreach ($donnees["elements"] as $element) {
                // Check if the “Text” key exists in the element
                if (isset($element["Text"])) {
                    // Add text to complete string
                    $texteComplet .= $element["Text"] . "\n\n";
                }
            }
        }

        // Return to full text
        return trim($texteComplet);
    }

    public function processPDF($filePath)
    {
        $this->getAccessToken();
        $assetId = $this->uploadAsset($filePath);
        if ($assetId === null) {
            return "Err code 1";
        }

        $locationUrl = $this->createJob($assetId);
        if ($locationUrl === null) {
            return "Err code 2";
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
                return "Err code 4";
            }
        }

        if ($downloadUri !== null) {
            $result = $this->downloadAsset($downloadUri);
            $text = $this->extraireTexte($result);
            return $text;
        }
        return "Err code 5";
    }
}


?>