<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */

require_once('../../config.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->libdir . '/filelib.php');

require_login();
require_capability('moodle/site:config', context_system::instance());

$PAGE->set_context(context_system::instance());
$PAGE->set_url('/blocks/uteluqchatbot/test_api_keys.php');
$PAGE->set_title(get_string('test_api_keys', 'block_uteluqchatbot'));
$PAGE->set_heading(get_string('test_api_keys', 'block_uteluqchatbot'));

function get_access_token_adobe_pdf_services($client_id, $client_secret)
{
    // Initialize Moodle's curl class
    $curl = new curl();

    // Prepare data
    $post_data = 'client_id=' . urlencode($client_id) . '&client_secret=' . urlencode($client_secret);

    // cURL options using Moodle's curl class
    $options = [
        'returntransfer' => true,
        'post' => true,
        'postfields' => $post_data,
        'httpheader' => ['Content-Type: application/x-www-form-urlencoded'],
        'ssl_verifypeer' => false, // Disable SSL (use with caution)
    ];

    // Execute the request
    $response = $curl->post('https://pdf-services.adobe.io/token', $post_data, $options);
    $http_status = $curl->get_info()['http_code'];

    if ($curl->get_errno()) {
        return [
            'success' => false,
            'message' => get_string('adobe_invalid_credentials', 'block_uteluqchatbot')
        ];
    }

    if ($http_status != 200) {
        return [
            'success' => false,
            'message' => get_string('adobe_invalid_credentials', 'block_uteluqchatbot')
        ];
    }

    $response_data = json_decode($response, true);
    if (isset($response_data['access_token'])) {
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
 * @param string $api_url The base URL of the Weaviate instance
 * @param string $api_key The API key for authentication
 * @return array Array containing the status of the operation, a message, and the collections data
 */
function get_collections_weaviate($api_url, $api_key): array
{
    // Construct the URL to retrieve the schema
    $endpoint = $api_url . '/v1/schema';

    // Initialize Moodle's curl class
    $curl = new curl();

    // Configure cURL options using Moodle's curl class
    $options = [
        'returntransfer' => true,
        'ssl_verifypeer' => false,
        'httpheader' => [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        ]
    ];

    // Execute the request and retrieve the response
    $response = $curl->get($endpoint, [], $options);
    $http_code = $curl->get_info()['http_code'];

    // Handle CURL errors
    if ($curl->get_errno()) {
        $error_message = $curl->error;
        return [
            'success' => false,
            'message' => get_string('weaviate_connection_error', 'block_uteluqchatbot') . $error_message,
            'data' => []
        ];
    }

    // Check HTTP response code
    if ($http_code !== 200) {
        return [
            'success' => false,
            'message' => get_string('weaviate_invalid_key_or_url', 'block_uteluqchatbot') . $http_code,
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
    'weaviate' => get_collections_weaviate($weaviate_api_url, $weaviate_api_key),
    'adobe pdf services' => get_access_token_adobe_pdf_services($adobe_pdf_client_id, $adobe_pdf_client_secret)
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
