<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_login();
require_capability('moodle/site:config', context_system::instance());

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/blocks/uteluqchatbot/test_api_keys.php');
$PAGE->set_title(get_string('test_api_keys', 'block_uteluqchatbot'));
$PAGE->set_heading(get_string('test_api_keys', 'block_uteluqchatbot'));



function getAccessTokenAdobePDFServices($clientId, $clientSecret)
{
    $ch = curl_init();

    // Prepare data
    $postData = 'client_id=' . urlencode($clientId) . '&client_secret=' . urlencode($clientSecret);

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
        return [
            'success' => false,
            'message' => get_string('adobe_invalid_credentials', 'block_uteluqchatbot')
        ];
    }
    curl_close($ch);

    if ($httpStatus != 200) {
        return [
            'success' => false,
            'message' => get_string('adobe_invalid_credentials', 'block_uteluqchatbot')
        ];
    }

    $responseData = json_decode($response, true);
    if (isset($responseData['access_token'])) {
        return [
            'success' => true,
            'message' => get_string('adobe_valid_credentials', 'block_uteluqchatbot')
        ];
    } else {
        return [
            'success' => false,
            'message' => get_string('adobe_invalid_credentials', 'block_uteluqchatbot')
        ];
    }
}

/**
 * Retrieves the list of available collections (classes) in Weaviate
 *
 * @return array Array containing the status of the operation, a message, and the collections data
 */
function getCollectionsWeaviate($apiUrl, $apiKey): array
{
    // Construct the URL to retrieve the schema
    $endpoint = $apiUrl . '/v1/schema';

    // Configure and execute the CURL request
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $apiKey
        ]
    ]);

    // Execute the request and retrieve the response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Handle CURL errors
    if (curl_errno($ch)) {
        $errorMessage = curl_error($ch);
        curl_close($ch);
        return [
            'success' => false,
            'message' => get_string('weaviate_connection_error', 'block_uteluqchatbot') . $errorMessage,
            'data' => []
        ];
    }

    curl_close($ch);

    // Check HTTP response code
    if ($httpCode !== 200) {
        return [
            'success' => false,
            'message' => get_string('weaviate_invalid_key_or_url', 'block_uteluqchatbot') . $httpCode,
            'data' => []
        ];
    }

    // Decode the JSON response
    $schema = json_decode($response, true);

    // Check if JSON decoding was successful
    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            'success' => false,
            'message' => get_string('weaviate_invalid_key_or_url', 'block_uteluqchatbot'),
            'data' => []
        ];
    }

    // Extract collection names
    $collections = [];
    if (isset($schema['classes']) && is_array($schema['classes'])) {
        foreach ($schema['classes'] as $class) {
            if (isset($class['class'])) {
                $collections[] = [
                    'name' => $class['class'],
                    'description' => $class['description'] ?? '',
                    'properties' => $class['properties'] ?? [],
                    'vectorizer' => $class['vectorizer'] ?? 'none'
                ];
            }
        }

        return [
            'success' => true,
            'message' => get_string('weaviate_valid_key_and_url', 'block_uteluqchatbot'),
            'data' => $collections
        ];
    }

    return [
        'success' => false,
        'message' => get_string('weaviate_invalid_key_or_url', 'block_uteluqchatbot'),
        'data' => []
    ];
}

// Retrieve keys
$weaviate_api_url = get_config('block_uteluqchatbot', 'weaviate_api_url');
$weaviate_api_key = get_config('block_uteluqchatbot', 'weaviate_api_key');
$adobe_pdf_client_id = get_config('block_uteluqchatbot', 'adobe_pdf_client_id');
$adobe_pdf_client_secret = get_config('block_uteluqchatbot', 'adobe_pdf_client_secret');
$cohere_embedding_api_key = get_config('block_uteluqchatbot', 'cohere_embedding_api_key');

// Test keys
$results = [
    'weaviate' => getCollectionsWeaviate($weaviate_api_url, $weaviate_api_key),
    'adobe pdf services' => getAccessTokenAdobePDFServices($adobe_pdf_client_id, $adobe_pdf_client_secret)
];

// Display results
echo $OUTPUT->header();

foreach ($results as $service => $result) {
    $message_class = $result['success'] ? 'alert alert-success' : 'alert alert-danger';
    echo html_writer::div(
        html_writer::tag('strong', ucfirst($service) . ': ') . $result['message'],
        $message_class
    );
}

echo html_writer::div(
    $OUTPUT->single_button(
        new moodle_url('/admin/settings.php', ['section' => 'blocksettingchatbot']),
        get_string('back'),
        'get'
    ),
    'mt-3'
);

echo $OUTPUT->footer();
