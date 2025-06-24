<?php
/**
 * Weaviate Connector class for Moodle.
 *
 * @package    block_uteluqchatbot
 * @subpackage weaviateconnector
 * @copyright  2025 Université TÉLUQ and the UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_uteluqchatbot;


/**
 * Class weaviate_connector
 *
 * This class manages all interactions with a Weaviate instance,
 * including connection, document indexing, semantic search,
 * and content generation.
 */
class weaviate_connector
{
    /** @var string Weaviate instance URL */
    private $api_url;

    private $last_prompt;

    /** @var string API Key for Weaviate authentication */
    private $api_key;

    /** @var string API Key for Cohere authentication */
    private $cohere_api_key;

    /** @var string|null Stores the last error occurred */
    private ?string $last_error = null;

    /** @var int Batch size for batch indexing */
    private int $batch_size = 100;

    /**
     * Constructor
     *
     * Initializes a new instance of the Weaviate connector
     *
     * @param string $api_url Weaviate instance URL
     * @param string $api_key Weaviate API Key
     * @param string $cohere_api_key Cohere API Key
     */
    public function __construct(string $api_url, string $api_key, string $cohere_api_key)
    {
        $this->api_url = rtrim($api_url, '/');
        $this->api_key = $api_key;
        $this->cohere_api_key = $cohere_api_key;
    }

    /**
     * Function to call the Cohere API
     *
     * @param string $question Question to ask
     * @param string $api_key API Key for Cohere
     * @return string|null Generated text or null in case of error
     */
    public function get_cohere_response(string $question, string $api_key): ?string
    {
        $url = 'https://api.cohere.com/v2/chat';
        // Prepare data for the request
        $data = [
            'model' => 'command-r-03-2024',
            'messages' => [
                ['role' => 'user', 'content' => $question]
            ]
        ];

        // Initialize cURL
        $ch = curl_init($url);

        // Configure cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $api_key,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        // Create a temporary file to store debug information
        $debug_file = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $debug_file);

        // Execute the request
        $response = curl_exec($ch);

        // Retrieve debug information
        rewind($debug_file);
        $debug_info = stream_get_contents($debug_file);

        // Check for cURL errors
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);

        // Close the cURL session
        curl_close($ch);

        // Detailed log
        error_log('HTTP Status Code: ' . $http_code);
        error_log('cURL Debug Info: ' . $debug_info);
        error_log('Raw Response: ' . $response);

        // Error handling
        if ($curl_error) {
            return get_string('curl_error', 'block_uteluqchatbot') . $curl_error;
        }

        // Check HTTP status code
        if ($http_code !== 200) {
            return get_string('http_error', 'block_uteluqchatbot') . $http_code . ': ' . $response;
        }

        // Decode the JSON response
        $response_data = json_decode($response, true);

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            return get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg() .
                ' - Raw response: ' . $response;
        }

        // Extract the response
        if (isset($response_data['message']['content'][0]['text'])) {
            $this->last_prompt = $question;
            return $response_data['message']['content'][0]['text'];
        }

        // Return an error message if no response is generated
        return get_string('no_response_generated', 'block_uteluqchatbot') . print_r($response_data, true);
    }

    /**
     * Sends a request to get answers related to a question and a collection
     *
     * @param string $course_name Course name
     * @param string $collection Target collection name
     * @param string $question Question asked
     * @param int $user_id User ID
     * @param int $course_id Course ID
     * @return string|null Generated text or null in case of error
     */
    public function get_question_answer($course_name, string $collection, string $question, $user_id, $course_id): ?string
    {
        global $COURSE, $DB, $USER;

        // Query with integer values
        $task = $DB->get_record('block_uteluqchatbot_prompts', array('userid' => $user_id, 'courseid' => $course_id))->prompt;

        // Get the last 10 conversations of the user
        $last_conversations = $DB->get_records_sql(
            "SELECT question, answer
            FROM {block_uteluqchatbot_conversations}
            WHERE userid = :userid
            ORDER BY timecreated DESC
            LIMIT 10",
            ['userid' => $user_id]
        );

        // Initialize variables to avoid errors if less than 2 conversations
        $historique = "";

        // Convert the result to an indexed array
        $conversations = array_values($last_conversations);

        // Build the history format
        if (count($conversations) > 0) {
            $historique = get_string('previous_interactions_history', 'block_uteluqchatbot') . "\n\n";

            foreach ($conversations as $index => $conversation) {
                $num = $index + 1;
                $historique .= get_string('previous_question', 'block_uteluqchatbot', $num) . $conversation->question . "\n";
                $historique .= get_string('answer', 'block_uteluqchatbot') . $conversation->answer . "\n\n";
            }
        }
        // Determine the prompt to use
        if (!$task) {
            $task = get_string('default_prompt', 'block_uteluqchatbot');
        }

        $task = str_replace('[[ coursename ]]', $course_name, $task);
        $task = str_replace('[[ question ]]', $question, $task);
        $task = str_replace('[[ history ]]', $historique, $task);

        // Properly encode the prompt for inclusion in the GraphQL query
        $task = json_encode($task);
        $task = substr($task, 1, -1);

        $question = json_encode($question);
        $question = substr($question, 1, -1);
        $query = [
            'query' => "{
                Get {
                    $collection (
                        limit: 10
                        nearText: {
                            concepts: [\"$question\"]
                        }
                    ) {
                        texte
                        cours
                        _additional {
                            generate(
                                groupedResult: {
                                    task: \"$task\"
                                }
                            ) {
                                groupedResult
                                error
                            }
                        }
                    }
                }
            }"
        ];

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->api_key,
            'X-Cohere-Api-Key: ' . $this->cohere_api_key
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url . '/v1/graphql');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) || $http_code !== 200) {
            $this->last_error = curl_error($ch) ?: get_string('http_code', 'block_uteluqchatbot') . $http_code;
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        $decoded_response = json_decode($response, true);
        if (isset($decoded_response['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'])) {
            return $decoded_response['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'];
        }

        $this->last_error = get_string('invalid_response_format', 'block_uteluqchatbot');
        return null;
    }

    /**
     * Deletes an existing collection (class) in Weaviate
     *
     * @param string $class_name Name of the collection to delete
     * @return bool True if deletion is successful, False otherwise
     */
    public function delete_collection(string $class_name): bool
    {
        // Construct the URL for schema deletion
        $endpoint = $this->api_url . '/v1/schema/' . urlencode($class_name);

        // Configure and execute the CURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        if ($http_code !== 200 && $http_code !== 204) {
            $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": " . $response;
            return false;
        }

        return true;
    }

    /**
     * Checks if a collection already exists in Weaviate
     *
     * @param string $class_name Name of the collection to check
     * @return bool True if the collection exists, False otherwise
     */
    public function collection_exists(string $class_name): bool
    {
        // Construct the URL to retrieve the schema
        $endpoint = $this->api_url . '/v1/schema';

        // Configure and execute the CURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        if ($http_code !== 200) {
            $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": " . $response;
            return false;
        }

        // Decode the JSON response
        $schema = json_decode($response, true);

        // Check for the presence of the collection in the schema
        if (isset($schema['classes'])) {
            foreach ($schema['classes'] as $class) {
                if ($class['class'] === $class_name) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Creates a new collection (class) in Weaviate
     *
     * This method configures a new collection with a vectorizer
     * and specific modules for text processing
     *
     * @param string $class_name Name of the collection to create
     * @param string $vectorizer Name of the vectorizer (default text2vec-cohere)
     * @param array $module_config Additional module configuration
     * @return bool True if creation is successful, False otherwise
     */
    public function create_collection(
        string $class_name,
        string $vectorizer = "text2vec-cohere",
        array $module_config = []
    ): bool {
        // Construct the URL for schema creation
        $endpoint = $this->api_url . '/v1/schema';

        // Prepare the collection configuration
        $data = [
            'class' => $class_name,
            'vectorizer' => $vectorizer,
            'moduleConfig' => array_merge(
                [
                    $vectorizer => [],
                    'generative-cohere' => []
                ],
                $module_config
            )
        ];

        // Configure and execute the CURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        if ($http_code !== 200) {
            $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": " . $response;
            return false;
        }

        return true;
    }

    /**
     * Cleans the input text for indexing in Weaviate
     *
     * Normalizes spaces and removes problematic characters
     * while preserving useful special characters
     *
     * @param string $text Text to clean
     * @return string Cleaned text
     */
    private function clean_text(string $text): string
    {
        // Convert non-UTF8 or invalid characters
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // Remove invisible control characters (except newlines and tabs)
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text);

        // Normalize newlines
        $text = str_replace(["\r\n", "\r"], "\n", $text);

        // Normalize multiple spaces into a single space
        $text = preg_replace('/[ \t]+/', ' ', $text);

        // Limit consecutive newlines to a maximum of two
        $text = preg_replace('/\n{3,}/', "\n\n", $text);

        // Remove spaces at the beginning and end
        $text = trim($text);

        // Escape characters that could cause problems in JSON queries
        $text = str_replace(['\\', "\f", "\b"], ['\\\\', '', ''], $text);

        return $text;
    }

    /**
     * Splits the text into chunks of similar size
     *
     * @param string $text Text to split
     * @param int $chunk_size Approximate desired size for each chunk
     * @return array Array of text chunks
     */
    private function chunk_text(string $text, int $chunk_size = 300): array
    {
        $words = explode(' ', $text);
        $chunks = [];
        $current_chunk = [];
        $current_length = 0;

        foreach ($words as $word) {
            $word_length = strlen($word);
            if ($current_length + $word_length + 1 > $chunk_size && !empty($current_chunk)) {
                $chunks[] = implode(' ', $current_chunk);
                $current_chunk = [];
                $current_length = 0;
            }
            $current_chunk[] = $word;
            $current_length += $word_length + 1;
        }

        if (!empty($current_chunk)) {
            $chunks[] = implode(' ', $current_chunk);
        }

        return $chunks;
    }

    /**
     * Performs a semantic search with content generation
     *
     * This method combines semantic search with the generation
     * of new content based on the results
     *
     * @param string $collection Name of the collection to query
     * @param string $concept Concept to search for
     * @param string $generation_task Instruction for generation
     * @param array $fields Fields to return in the results
     * @param int $limit Maximum number of results
     * @return array|null Results with generated content or null if error
     */
    public function semantic_search_with_generation(
        string $collection,
        string $concept,
        string $generation_task,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphql_endpoint = $this->api_url . '/v1/graphql';

        // Prepare the list of fields for the GraphQL query
        $fields_string = implode(' ', $fields);
        // Escape quotes in the generation task
        $escaped_task = str_replace('"', '\\"', $generation_task);

        // Construct the GraphQL query
        $query = [
            'query' => "{
                Get {
                    $collection (
                        limit: $limit
                        nearText: {
                            concepts: [\"$concept\"]
                        }
                    ) {
                        $fields_string
                        _additional {
                            generate(
                                groupedResult: {
                                    task: \"$escaped_task\"
                                }
                            ) {
                                groupedResult
                                error
                            }
                        }
                    }
                }
            }"
        ];

        // Execute the request via CURL
        $ch = curl_init($graphql_endpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($query),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key,
                'X-Cohere-Api-Key: ' . $this->cohere_api_key
            ]
        ]);

        // Retrieve and verify the response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Check HTTP code
        if ($http_code !== 200) {
            $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": $response";
            return null;
        }

        // Decode the JSON response
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->last_error = get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }

    /**
     * Indexes a text file in Weaviate with retry mechanism
     *
     * Reads, cleans, splits, and indexes the content of a text file
     *
     * @param string $file_path Path to the file to index
     * @param string $collection Target collection name
     * @param string $course_id Course ID
     * @return bool True if successful, False if error
     */
    public function index_text_file(string $file_path, string $collection, string $course_id): bool
    {
        global $CFG;

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Check if the file exists
        if (!file_exists($file_path)) {
            $this->last_error = get_string('file_not_found', 'block_uteluqchatbot') . $file_path;
            return false;
        }

        // Read the file
        $text = file_get_contents($file_path);
        if ($text === false) {
            $this->last_error = get_string('unable_to_read_file', 'block_uteluqchatbot');
            return false;
        }

        // Prepare the text
        $cleaned_text = $this->clean_text($text);
        $cleaned_text = $text;
        $chunks = $this->chunk_text($cleaned_text);

        // Configure for batch indexing
        $batch_endpoint = $this->api_url . '/v1/batch/objects';
        $current_batch = [];
        $success = true;

        // Retry parameters
        $max_retries = 5;
        $retry_delay = 1;
        $max_retry_delay = 5;

        // Process each chunk
        $object_count = 0;

        foreach ($chunks as $chunk) {
            $object = [
                'class' => $collection,
                'properties' => [
                    'texte' => $chunk,
                    'cours' => $course_id,
                    'filepath' => $file_path,
                ]
            ];
            $current_batch[] = $object;
            $object_count++;

            // If the batch is full or it's the last chunk
            if ($object_count >= $this->batch_size || $chunk === end($chunks)) {
                // Manually construct JSON to avoid potential issues with json_encode
                $json_objects = [];
                foreach ($current_batch as $obj) {
                    $json_obj = json_encode($obj);
                    if ($json_obj === false) {
                        $this->last_error = get_string('json_encode_error', 'block_uteluqchatbot') . json_last_error_msg();
                        return false;
                    }
                    $json_objects[] = $json_obj;
                }

                $json_data = '{"objects":[' . implode(',', $json_objects) . ']}';

                // Set up retry logic
                $retry = 0;
                $current_delay = $retry_delay;
                $request_success = false;

                while (!$request_success && $retry <= $max_retries) {
                    if ($retry > 0) {
                        sleep($current_delay);
                        $current_delay = min($current_delay * 2, $max_retry_delay);
                    }

                    $ch = curl_init($batch_endpoint);
                    curl_setopt_array($ch, [
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $json_data,
                        CURLOPT_HTTPHEADER => [
                            'Content-Type: application/json',
                            'Authorization: Bearer ' . $this->api_key,
                            'X-Cohere-Api-Key: ' . $this->cohere_api_key
                        ],
                        CURLOPT_TIMEOUT => 30,
                    ]);

                    $response = curl_exec($ch);
                    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    if (curl_errno($ch)) {
                        curl_close($ch);
                        $retry++;
                        continue;
                    }

                    if ($http_code >= 500 && $http_code < 600) {
                        curl_close($ch);
                        $retry++;
                        continue;
                    } elseif ($http_code < 200 || $http_code >= 300) {
                        $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": $response";
                        curl_close($ch);
                        return false;
                    }

                    curl_close($ch);
                    $request_success = true;
                }

                if (!$request_success) {
                    $this->last_error = get_string('failure_after_retries', 'block_uteluqchatbot') . $max_retries . get_string('last_error', 'block_uteluqchatbot') . $http_code;
                    return false;
                }

                $current_batch = [];
                $object_count = 0;

                sleep(1);
            }
        }

        return $success;
    }

    /**
     * Formats the search results
     *
     * Separates the data and generated content into a more readable format
     *
     * @param array $results Raw search results
     * @return array Formatted results
     */
    public function format_search_results(array $results): array
    {
        $formatted_results = [];

        foreach ($results as $result) {
            $formatted_result = [
                'data' => array_filter($result, function ($key) {
                    return $key !== '_additional';
                }, ARRAY_FILTER_USE_KEY),
                'generated_content' => null,
                'generation_error' => null
            ];

            if (isset($result['_additional']['generate'])) {
                $formatted_result['generated_content'] =
                    $result['_additional']['generate']['groupedResult'] ?? null;
                $formatted_result['generation_error'] =
                    $result['_additional']['generate']['error'] ?? null;
            }

            $formatted_results[] = $formatted_result;
        }

        return $formatted_results;
    }

    /**
     * Sets the batch size for indexing
     *
     * @param int $size New batch size
     */
    public function set_batch_size(int $size): void
    {
        $this->batch_size = $size;
    }

    /**
     * Retrieves the last error occurred
     *
     * @return string|null Error message or null if no error
     */
    public function get_last_error(): ?string
    {
        return $this->last_error;
    }

    /**
     * Retrieves the last prompt
     *
     * @return string|null Last prompt or null if none
     */
    public function get_last_prompt(): ?string
    {
        return $this->last_prompt;
    }

    /**
     * Performs a semantic search in a Weaviate collection.
     *
     * This method queries the Weaviate database to obtain results based
     * on a semantic search using a given concept.
     *
     * @param string $collection Name of the collection to query
     * @param string $concept Concept to search for
     * @param array $fields Fields to return in the results
     * @param int $limit Maximum number of results to return
     * @return array|null Semantic search results or null in case of error
     */
    public function semantic_search(
        string $collection,
        string $concept,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphql_endpoint = $this->api_url . '/v1/graphql';

        // Prepare the list of fields for the GraphQL query
        $fields_string = implode(' ', $fields);

        // Construct the GraphQL query
        $query = [
            'query' => "{
            Get {
                $collection (
                    limit: $limit
                    nearText: {
                        concepts: [\"$concept\"]
                    }
                ) {
                    $fields_string
                }
            }
        }"
        ];

        // Execute the request via CURL
        $ch = curl_init($graphql_endpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($query),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->api_key,
                'X-Cohere-Api-Key: ' . $this->cohere_api_key
            ]
        ]);

        // Retrieve and verify the response
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Check HTTP code
        if ($http_code !== 200) {
            $this->last_error = get_string('http_error', 'block_uteluqchatbot') . $http_code . ": $response";
            return null;
        }

        // Decode the JSON response
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->last_error = get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }
}
