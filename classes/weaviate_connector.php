<?php
/**
 * Weaviate Connector class for Moodle.
 *
 * @package    block_uteluqchatbot
 * @subpackage weaviateconnector
 * @copyright  2025 Université TÉLUQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../../../config.php');
require_login();

/**
 * Class WeaviateConnector
 *
 * This class manages all interactions with a Weaviate instance,
 * including connection, document indexing, semantic search,
 * and content generation.
 */
class WeaviateConnector
{
    /** @var string Weaviate instance URL */
    private string $apiUrl;

    private string $lastPrompt;

    /** @var string API Key for Weaviate authentication */
    private string $apiKey;

    /** @var string API Key for Cohere authentication */
    private string $cohereApiKey;

    /** @var string|null Stores the last error occurred */
    private ?string $lastError = null;

    /** @var int Batch size for batch indexing */
    private int $batchSize = 100;

    /**
     * Constructor
     *
     * Initializes a new instance of the Weaviate connector
     *
     * @param string $apiUrl Weaviate instance URL
     * @param string $apiKey Weaviate API Key
     * @param string $cohereApiKey Cohere API Key
     */
    public function __construct(string $apiUrl, string $apiKey, string $cohereApiKey)
    {
        $this->apiUrl = rtrim($apiUrl, '/');
        $this->apiKey = $apiKey;
        $this->cohereApiKey = $cohereApiKey;
    }

    /**
     * Function to call the Cohere API
     *
     * @param string $question Question to ask
     * @param string $apiKey API Key for Cohere
     * @return string|null Generated text or null in case of error
     */
    public function getCohereResponse(string $question, string $apiKey): ?string
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
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Re-enable SSL verification
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Verbose mode for more information

        // Create a temporary file to store debug information
        $debugFile = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $debugFile);

        // Execute the request
        $response = curl_exec($ch);

        // Retrieve debug information
        rewind($debugFile);
        $debugInfo = stream_get_contents($debugFile);

        // Check for cURL errors
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);

        // Close the cURL session
        curl_close($ch);

        // Detailed log
        error_log('HTTP Status Code: ' . $httpCode);
        error_log('cURL Debug Info: ' . $debugInfo);
        error_log('Raw Response: ' . $response);

        // Error handling
        if ($curlError) {
            return get_string('curl_error', 'block_uteluqchatbot') . $curlError;
        }

        // Check HTTP status code
        if ($httpCode !== 200) {
            return get_string('http_error', 'block_uteluqchatbot') . $httpCode . ': ' . $response;
        }

        // Decode the JSON response
        $responseData = json_decode($response, true);

        // Check for JSON decoding errors
        if (json_last_error() !== JSON_ERROR_NONE) {
            return get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg() .
                ' - Raw response: ' . $response;
        }

        // Extract the response
        if (isset($responseData['message']['content'][0]['text'])) {
            $this->lastPrompt = $question;
            return $responseData['message']['content'][0]['text'];
        }

        // Return an error message if no response is generated
        return get_string('no_response_generated', 'block_uteluqchatbot') . print_r($responseData, true);
    }

    /**
     * Sends a request to get answers related to a question and a collection
     *
     * @param string $coursename Course name
     * @param string $collection Target collection name
     * @param string $question Question asked
     * @param int $user_id User ID
     * @param int $course_id Course ID
     * @return string|null Generated text or null in case of error
     */
    public function getQuestionAnswer($coursename, string $collection, string $question, $user_id, $course_id): ?string
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

        
        $task = str_replace('[[ coursename ]]', $coursename, $task);
        $task = str_replace('[[ question ]]', $question, $task);
        $task = str_replace('[[ history ]]', $historique, $task);




        // Properly encode the prompt for inclusion in the GraphQL query
        $task = json_encode($task); // This properly handles escaping
        $task = substr($task, 1, -1); // Remove the quotes at the beginning and end

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
            'Authorization: Bearer ' . $this->apiKey,
            'X-Cohere-Api-Key: ' . $this->cohereApiKey
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl . '/v1/graphql');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($query));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch) || $httpCode !== 200) {
            $this->lastError = curl_error($ch) ?: get_string('http_code', 'block_uteluqchatbot') . $httpCode;
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'])) {
            return $decodedResponse['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'];
        }

        $this->lastError = get_string('invalid_response_format', 'block_uteluqchatbot');
        return null;
    }

    /**
     * Deletes an existing collection (class) in Weaviate
     *
     * @param string $className Name of the collection to delete
     * @return bool True if deletion is successful, False otherwise
     */
    public function deleteCollection(string $className): bool
    {
        // Construct the URL for schema deletion
        $endpoint = $this->apiUrl . '/v1/schema/' . urlencode($className);

        // Configure and execute the CURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        // 200 or 204 are success codes for deletion
        if ($httpCode !== 200 && $httpCode !== 204) {
            $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": " . $response;
            return false;
        }

        return true;
    }

    /**
     * Checks if a collection already exists in Weaviate
     *
     * @param string $className Name of the collection to check
     * @return bool True if the collection exists, False otherwise
     */
    public function collectionExists(string $className): bool
    {
        // Construct the URL to retrieve the schema
        $endpoint = $this->apiUrl . '/v1/schema';

        // Configure and execute the CURL request
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        if ($httpCode !== 200) {
            $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": " . $response;
            return false;
        }

        // Decode the JSON response
        $schema = json_decode($response, true);

        // Check for the presence of the collection in the schema
        if (isset($schema['classes'])) {
            foreach ($schema['classes'] as $class) {
                if ($class['class'] === $className) {
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
     * @param string $className Name of the collection to create
     * @param string $vectorizer Name of the vectorizer (default text2vec-cohere)
     * @param array $moduleConfig Additional module configuration
     * @return bool True if creation is successful, False otherwise
     */
    public function createCollection(
        string $className,
        string $vectorizer = "text2vec-cohere",
        array $moduleConfig = []
    ): bool {
        // Construct the URL for schema creation
        $endpoint = $this->apiUrl . '/v1/schema';

        // Prepare the collection configuration
        $data = [
            'class' => $className,
            'vectorizer' => $vectorizer,
            'moduleConfig' => array_merge(
                [
                    $vectorizer => [],
                    'generative-cohere' => []
                ],
                $moduleConfig
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
                'Authorization: Bearer ' . $this->apiKey
            ]
        ]);

        // Execute the request and retrieve the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Handle CURL errors
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Check HTTP response code
        if ($httpCode !== 200) {
            $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": " . $response;
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
    private function cleanText(string $text): string
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
     * @param int $chunkSize Approximate desired size for each chunk
     * @return array Array of text chunks
     */
    private function chunkText(string $text, int $chunkSize = 300): array
    {
        $words = explode(' ', $text);
        $chunks = [];
        $currentChunk = [];
        $currentLength = 0;

        foreach ($words as $word) {
            $wordLength = strlen($word);
            // If adding the word exceeds the size limit and there are already words
            if ($currentLength + $wordLength + 1 > $chunkSize && !empty($currentChunk)) {
                $chunks[] = implode(' ', $currentChunk);
                $currentChunk = [];
                $currentLength = 0;
            }
            $currentChunk[] = $word;
            $currentLength += $wordLength + 1; // +1 for the space
        }

        // Add the last chunk if there are remaining words
        if (!empty($currentChunk)) {
            $chunks[] = implode(' ', $currentChunk);
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
     * @param string $generationTask Instruction for generation
     * @param array $fields Fields to return in the results
     * @param int $limit Maximum number of results
     * @return array|null Results with generated content or null if error
     */
    public function semanticSearchWithGeneration(
        string $collection,
        string $concept,
        string $generationTask,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphqlEndpoint = $this->apiUrl . '/v1/graphql';

        // Prepare the list of fields for the GraphQL query
        $fieldsString = implode(' ', $fields);
        // Escape quotes in the generation task
        $escapedTask = str_replace('"', '\\"', $generationTask);

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
                        $fieldsString
                        _additional {
                            generate(
                                groupedResult: {
                                    task: \"$escapedTask\"
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
        $ch = curl_init($graphqlEndpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($query),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey,
                'X-Cohere-Api-Key: ' . $this->cohereApiKey
            ]
        ]);

        // Retrieve and verify the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Check HTTP code
        if ($httpCode !== 200) {
            $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": $response";
            return null;
        }

        // Decode the JSON response
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->lastError = get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }

    /**
     * Indexes a text file in Weaviate with retry mechanism
     *
     * Reads, cleans, splits, and indexes the content of a text file
     *
     * @param string $filePath Path to the file to index
     * @param string $collection Target collection name
     * @param string $courseId Course ID
     * @return bool True if successful, False if error
     */
    public function indexTextFile(string $filePath, string $collection, string $courseId): bool
    {
        global $CFG;

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Check if the file exists
        if (!file_exists($filePath)) {
            $this->lastError = get_string('file_not_found', 'block_uteluqchatbot') . $filePath;
            return false;
        }

        // Read the file
        $text = file_get_contents($filePath);
        if ($text === false) {
            $this->lastError = get_string('unable_to_read_file', 'block_uteluqchatbot');
            return false;
        }

        // Prepare the text
        $cleanedText = $this->cleanText($text);
        $cleanedText = $text;
        $chunks = $this->chunkText($cleanedText);

        // Configure for batch indexing
        $batchEndpoint = $this->apiUrl . '/v1/batch/objects';
        $currentBatch = [];
        $success = true;

        // Retry parameters
        $maxRetries = 5;        // Maximum number of attempts
        $retryDelay = 1;        // Initial delay between attempts (in seconds)
        $maxRetryDelay = 5;    // Maximum delay between attempts (in seconds)

        // Process each chunk
        $objectCount = 0;

        foreach ($chunks as $chunk) {
            $object = [
                'class' => $collection,
                'properties' => [
                    'texte' => $chunk,
                    'cours' => $courseId,
                    'filepath' => $filePath,
                ]
            ];
            $currentBatch[] = $object;
            $objectCount++;

            // If the batch is full or it's the last chunk
            if ($objectCount >= $this->batchSize || $chunk === end($chunks)) {
                // Manually construct JSON to avoid potential issues with json_encode
                $jsonObjects = [];
                foreach ($currentBatch as $obj) {
                    $jsonObj = json_encode($obj);
                    if ($jsonObj === false) {
                        $this->lastError = get_string('json_encode_error', 'block_uteluqchatbot') . json_last_error_msg();
                        return false;
                    }
                    $jsonObjects[] = $jsonObj;
                }

                $jsonData = '{"objects":[' . implode(',', $jsonObjects) . ']}';

                // Set up retry logic
                $retry = 0;
                $currentDelay = $retryDelay;
                $requestSuccess = false;

                while (!$requestSuccess && $retry <= $maxRetries) {
                    if ($retry > 0) {
                        sleep($currentDelay);
                        // Exponential backoff
                        $currentDelay = min($currentDelay * 2, $maxRetryDelay);
                    }

                    $ch = curl_init($batchEndpoint);
                    curl_setopt_array($ch, [
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $jsonData,
                        CURLOPT_HTTPHEADER => [
                            'Content-Type: application/json',
                            'Authorization: Bearer ' . $this->apiKey,
                            'X-Cohere-Api-Key: ' . $this->cohereApiKey
                        ],
                        CURLOPT_TIMEOUT => 30, // 30-second timeout
                    ]);

                    $response = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    if (curl_errno($ch)) {
                        curl_close($ch);
                        $retry++;
                        continue;
                    }

                    // Check if it's a temporary server error (500, 502, 503, 504)
                    if ($httpCode >= 500 && $httpCode < 600) {
                        curl_close($ch);
                        $retry++;
                        continue;
                    }
                    // Other HTTP errors
                    elseif ($httpCode < 200 || $httpCode >= 300) {
                        $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": $response";
                        curl_close($ch);
                        return false;
                    }

                    // If we get here, the request was successful
                    curl_close($ch);
                    $requestSuccess = true;
                }

                // If all attempts failed
                if (!$requestSuccess) {
                    $this->lastError = get_string('failure_after_retries', 'block_uteluqchatbot') . $maxRetries . get_string('last_error', 'block_uteluqchatbot') . $httpCode;
                    return false;
                }

                // Reset the batch
                $currentBatch = [];
                $objectCount = 0;

                // Pause for 5 seconds between each batch send
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
    public function formatSearchResults(array $results): array
    {
        $formattedResults = [];

        foreach ($results as $result) {
            $formattedResult = [
                // Filter main data (without _additional)
                'data' => array_filter($result, function ($key) {
                    return $key !== '_additional';
                }, ARRAY_FILTER_USE_KEY),
                'generated_content' => null,
                'generation_error' => null
            ];

            // Extract generated content if it exists
            if (isset($result['_additional']['generate'])) {
                $formattedResult['generated_content'] =
                    $result['_additional']['generate']['groupedResult'] ?? null;
                $formattedResult['generation_error'] =
                    $result['_additional']['generate']['error'] ?? null;
            }

            $formattedResults[] = $formattedResult;
        }

        return $formattedResults;
    }

    /**
     * Sets the batch size for indexing
     *
     * @param int $size New batch size
     */
    public function setBatchSize(int $size): void
    {
        $this->batchSize = $size;
    }

    /**
     * Retrieves the last error occurred
     *
     * @return string|null Error message or null if no error
     */
    public function getLastError(): ?string
    {
        return $this->lastError;
    }

    /**
     * Retrieves the last prompt
     *
     * @return string|null Last prompt or null if none
     */
    public function getLastPrompt(): ?string
    {
        return $this->lastPrompt;
    }

    /**
     * Performs a semantic search in a Weaviate collection.
     *
     * This method queries the Weaviate database to obtain results based
     * on a semantic search using a given concept.
     *
     * @param string $collection Name of the collection to query
     * @param string $concept Concept to search for (e.g., "biology", "technology", etc.)
     * @param array $fields Fields to return in the results
     * @param int $limit Maximum number of results to return
     * @return array|null Semantic search results or null in case of error
     */
    public function semanticSearch(
        string $collection,
        string $concept,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphqlEndpoint = $this->apiUrl . '/v1/graphql';

        // Prepare the list of fields for the GraphQL query
        $fieldsString = implode(' ', $fields);

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
                    $fieldsString
                }
            }
        }"
        ];

        // Execute the request via CURL
        $ch = curl_init($graphqlEndpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($query),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey,
                'X-Cohere-Api-Key: ' . $this->cohereApiKey
            ]
        ]);

        // Retrieve and verify the response
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Check HTTP code
        if ($httpCode !== 200) {
            $this->lastError = get_string('http_error', 'block_uteluqchatbot') . $httpCode . ": $response";
            return null;
        }

        // Decode the JSON response
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->lastError = get_string('json_decode_error', 'block_uteluqchatbot') . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }
}
