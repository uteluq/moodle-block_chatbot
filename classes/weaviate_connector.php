<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once(__DIR__ . '/../../../config.php');
require_login();
/**
 * Classe WeaviateConnector
 * 
 * Cette classe gère toutes les interactions avec une instance Weaviate,
 * incluant la connexion, l'indexation de documents, la recherche sémantique
 * et la génération de contenu.
 */
class WeaviateConnector
{

    /** @var string URL de l'instance Weaviate */
    private string $apiUrl;

    private string $lastPrompt;

    /** @var string Clé API pour l'authentification Weaviate */
    private string $apiKey;

    /** @var string Clé API pour l'authentification Cohere */
    private string $cohereApiKey;

    /** @var string|null Stocke la dernière erreur survenue */
    private ?string $lastError = null;

    /** @var int Taille des lots pour l'indexation par batch */
    private int $batchSize = 100;

    /**
     * Constructeur
     * 
     * Initialise une nouvelle instance du connecteur Weaviate
     * 
     * @param string $apiUrl URL de l'instance Weaviate
     * @param string $apiKey Clé API Weaviate
     * @param string $cohereApiKey Clé API Cohere
     */
    public function __construct(string $apiUrl, string $apiKey, string $cohereApiKey)
    {
        $this->apiUrl = rtrim($apiUrl, '/');
        $this->apiKey = $apiKey;
        $this->cohereApiKey = $cohereApiKey;
    }

    // Fonction pour appeler l'API Cohere
    public function getCohereResponse(string $question, string $apiKey): ?string
    {
        $url = 'https://api.cohere.com/v2/chat';
        // Préparation des données pour la requête
        $data = [
            // 'model' => 'command-r-plus-08-2024',
            'model' => 'command-r-03-2024',
            'messages' => [
                ['role' => 'user', 'content' => $question]
            ]
        ];

        // Initialisation de cURL
        $ch = curl_init($url);

        // Configuration des options cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Réactivez la vérification SSL
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Mode verbose pour plus d'informations

        // Création d'un fichier temporaire pour stocker les informations de débogage
        $debugFile = fopen('php://temp', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $debugFile);

        // Exécution de la requête
        $response = curl_exec($ch);

        // Récupération des informations de débogage
        rewind($debugFile);
        $debugInfo = stream_get_contents($debugFile);

        // Vérification des erreurs cURL
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);

        // Fermeture de la session cURL
        curl_close($ch);

        // Log détaillé
        error_log('HTTP Status Code: ' . $httpCode);
        error_log('cURL Debug Info: ' . $debugInfo);
        error_log('Raw Response: ' . $response);

        // Gestion des erreurs
        if ($curlError) {
            return 'Erreur cURL : ' . $curlError;
        }

        // Vérification du code de statut HTTP
        if ($httpCode !== 200) {
            return 'Erreur HTTP ' . $httpCode . ': ' . $response;
        }

        // Décodage de la réponse JSON
        $responseData = json_decode($response, true);

        // Vérification des erreurs de décodage JSON
        if (json_last_error() !== JSON_ERROR_NONE) {
            return 'Erreur de décodage JSON : ' . json_last_error_msg() .
                ' - Réponse brute : ' . $response;
        }

        // Extraction de la réponse
        if (isset($responseData['message']['content'][0]['text'])) {
            $this->lastPrompt = $question;
            return $responseData['message']['content'][0]['text'];
        }

        // Retourne un message d'erreur si aucune réponse n'est générée
        return 'Aucune réponse générée. Données reçues : ' . print_r($responseData, true);
    }



    /**
     * Envoie une requête pour récupérer des réponses liées à une question et une collection
     *
     * @param string $collection Nom de la collection cible
     * @param string $question Question posée
     * @return string|null Texte généré ou null en cas d'erreur
     */
    public function getQuestionAnswer($coursename, string $collection, string $question, $user_id, $course_id): ?string
    {

        global $COURSE, $DB, $USER;



        // Requête avec des valeurs entières
        $task = $DB->get_record('block_chatbot_prompts', array('userid' => $user_id, 'courseid' => $course_id))->prompt;

        // Récupérer les deux dernières conversations de l'utilisateur
        $last_conversations = $DB->get_records_sql(
            "SELECT question, answer 
            FROM {block_chatbot_conversations} 
            WHERE userid = :userid 
            ORDER BY timecreated DESC 
            LIMIT 10",
            ['userid' => $user_id]
        );

        // Initialiser les variables pour éviter les erreurs si moins de 2 conversations
        $historique = "";
        $question1 = '';
        $reponse1 = '';
        $question2 = '';
        $reponse2 = '';

        // Convertir le résultat en tableau indexé
        $conversations = array_values($last_conversations);

        // Construire le format d'historique
        if (count($conversations) > 0) {
            $historique = "Historique des interactions précédentes :\n\n";

            foreach ($conversations as $index => $conversation) {
                $num = $index + 1;
                $historique .= "Question précédente $num : " . $conversation->question . "\n";
                $historique .= "Réponse : " . $conversation->answer . "\n\n";
            }
        }
        // Déterminer le prompt à utiliser
        if (!$task) {
            $task = <<<EOT
Contexte de la situation :
L’apprenant suit un cours sur {$coursename}. Ton rôle est de l’accompagner en lui fournissant des réponses précises, pertinentes et adaptées à son apprentissage.
Mission :
En tant qu’assistant, ta mission est d’aider l’apprenant à comprendre les concepts du cours sur {$coursename} en répondant à ses questions, tout en t’appuyant sur le contexte fourni pour formuler une réponse. [[ historique ]].
Tu dois formuler des réponses claires, précises et pertinentes, en veillant à ne transmettre que des informations issues du cours. Si une réponse ne peut être trouvée dans le contexte fourni, répondre strictement par : " Je suis calibré en fonction du contenu du cours qui a été soigneusement sélectionné par votre enseignant. Si vous voulez plus de renseignement on vous invite à le contacter. "
Si l'apprenant écrit des phrases montrant qu'il n'a pas compris un concept ou une explication précédente, vérifie [[ historique ]] pour identifier ce qui a été mal compris, puis reformule ton explication avec plus de simplicité et des exemples plus concrets.
Instructions :
1. Détecte les émotions dans la question de l’apprenant et adopte un ton empathique et bienveillant.
2. Réponds de manière claire et structurée.
3. Explique le concept avec des exemples si nécessaire.
4. Ne fais aucune supposition en dehors du contexte fourni.
Nouvelle question de l’apprenant  [[ question ]] 
EOT;
        }



        $task = str_replace('[[ question ]]', $question, $task);
        $task = str_replace('[[ historique ]]', $historique, $task);







        $this->lastPrompt = $task;

        // Encodez proprement le prompt pour l'intégrer dans la requête GraphQL
        $task = json_encode($task); // Cela gère correctement l'échappement
        $task = substr($task, 1, -1); // Retire les guillemets au début et à la fin

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
            $this->lastError = curl_error($ch) ?: "HTTP Code $httpCode";
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        $decodedResponse = json_decode($response, true);
        if (isset($decodedResponse['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'])) {
            return $decodedResponse['data']['Get'][$collection][0]['_additional']['generate']['groupedResult'];
        }

        $this->lastError = "Invalid response format";
        return null;
    }

    /**
     * Supprime une collection (classe) existante dans Weaviate
     * 
     * @param string $className Nom de la collection à supprimer
     * @return bool True si la suppression est réussie, False sinon
     */
    public function deleteCollection(string $className): bool
    {
        // Construction de l'URL pour la suppression de schéma
        $endpoint = $this->apiUrl . '/v1/schema/' . urlencode($className);

        // Configuration et exécution de la requête CURL
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

        // Exécution de la requête et récupération de la réponse
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Gestion des erreurs CURL
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Vérification du code de réponse HTTP
        // 200 ou 204 sont des codes de succès pour une suppression
        if ($httpCode !== 200 && $httpCode !== 204) {
            $this->lastError = "Erreur HTTP $httpCode: " . $response;
            return false;
        }

        return true;
    }

    /**
     * Vérifie si une collection existe déjà dans Weaviate
     * 
     * @param string $className Nom de la collection à vérifier
     * @return bool True si la collection existe, False sinon
     */
    public function collectionExists(string $className): bool
    {
        // Construction de l'URL pour récupérer le schéma
        $endpoint = $this->apiUrl . '/v1/schema';

        // Configuration et exécution de la requête CURL
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

        // Exécution de la requête et récupération de la réponse
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Gestion des erreurs CURL
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Vérification du code de réponse HTTP
        if ($httpCode !== 200) {
            $this->lastError = "Erreur HTTP $httpCode: " . $response;
            return false;
        }

        // Décodage de la réponse JSON
        $schema = json_decode($response, true);

        // Vérification de la présence de la collection dans le schéma
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
     * Crée une nouvelle collection (classe) dans Weaviate
     * 
     * Cette méthode configure une nouvelle collection avec un vectorizer
     * et des modules spécifiques pour le traitement du texte
     * 
     * @param string $className Nom de la collection à créer
     * @param string $vectorizer Nom du vectorizer (par défaut text2vec-cohere)
     * @param array $moduleConfig Configuration supplémentaire des modules
     * @return bool True si la création est réussie, False sinon
     */
    public function createCollection(
        string $className,
        string $vectorizer = "text2vec-cohere",
        array $moduleConfig = []
    ): bool {
        // Construction de l'URL pour la création de schéma
        $endpoint = $this->apiUrl . '/v1/schema';

        // Préparation de la configuration de la collection
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

        // Configuration et exécution de la requête CURL
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

        // Exécution de la requête et récupération de la réponse
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Gestion des erreurs CURL
        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return false;
        }

        curl_close($ch);

        // Vérification du code de réponse HTTP
        if ($httpCode !== 200) {
            $this->lastError = "Erreur HTTP $httpCode: " . $response;
            return false;
        }

        return true;
    }

    /**
     * Nettoie le texte en entrée pour l'indexation dans Weaviate
     * 
     * Normalise les espaces et retire les caractères problématiques
     * tout en préservant les caractères spéciaux utiles
     * 
     * @param string $text Texte à nettoyer
     * @return string Texte nettoyé
     */
    private function cleanText(string $text): string
    {
        // Convertit les caractères non-UTF8 ou invalides
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // Supprime les caractères de contrôle invisibles (sauf les sauts de ligne et tabs)
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $text);

        // Normalise les sauts de ligne
        $text = str_replace(["\r\n", "\r"], "\n", $text);

        // Normalise les espaces multiples en un seul espace
        $text = preg_replace('/[ \t]+/', ' ', $text);

        // Limite les sauts de ligne consécutifs à deux maximum
        $text = preg_replace('/\n{3,}/', "\n\n", $text);

        // Supprime les espaces au début et à la fin
        $text = trim($text);

        // Échappe les caractères qui pourraient causer des problèmes dans les requêtes JSON
        $text = str_replace(['\\', "\f", "\b"], ['\\\\', '', ''], $text);

        return $text;
    }
    // private function cleanText(string $text): string {
    //     // Convertir le texte en UTF-8 pour éviter les problèmes d'encodage
    //     $text = mb_convert_encoding($text, 'UTF-8', 'auto');

    //     // Supprimer les caractères non imprimables (par exemple : retours chariot, tabulations, etc.)
    //     $text = preg_replace('/[\x00-\x1F\x7F]/u', '', $text);

    //     // Normaliser les espaces multiples en un seul espace
    //     $text = preg_replace('/\s+/', ' ', $text);

    //     // Supprimer les espaces au début et à la fin
    //     $text = trim($text);

    //     // Garder uniquement les caractères alphanumériques, emojis et certains symboles
    //     // Nous incluons les emojis et les caractères Unicode dans la liste autorisée
    //     $text = preg_replace('/[^\p{L}\p{N}\s\.,!?\-\'\"\p{So}]+/u', '', $text);

    //     return $text;
    // }



    /**
     * Découpe le texte en chunks de taille similaire
     * 
     * @param string $text Texte à découper
     * @param int $chunkSize Taille approximative souhaitée pour chaque chunk
     * @return array Tableau de chunks de texte
     */
    private function chunkText(string $text, int $chunkSize = 300): array
    {
        $words = explode(' ', $text);
        $chunks = [];
        $currentChunk = [];
        $currentLength = 0;

        foreach ($words as $word) {
            $wordLength = strlen($word);
            // Si l'ajout du mot dépasse la taille limite et qu'on a déjà des mots
            if ($currentLength + $wordLength + 1 > $chunkSize && !empty($currentChunk)) {
                $chunks[] = implode(' ', $currentChunk);
                $currentChunk = [];
                $currentLength = 0;
            }
            $currentChunk[] = $word;
            $currentLength += $wordLength + 1; // +1 pour l'espace
        }

        // Ajoute le dernier chunk s'il reste des mots
        if (!empty($currentChunk)) {
            $chunks[] = implode(' ', $currentChunk);
        }

        return $chunks;
    }

    /**
     * Effectue une recherche sémantique avec génération de contenu
     * 
     * Cette méthode combine la recherche sémantique avec la génération
     * de nouveau contenu basé sur les résultats
     * 
     * @param string $collection Nom de la collection à interroger
     * @param string $concept Concept à rechercher
     * @param string $generationTask Instruction pour la génération
     * @param array $fields Champs à retourner dans les résultats
     * @param int $limit Nombre maximum de résultats
     * @return array|null Résultats avec contenu généré ou null si erreur
     */
    public function semanticSearchWithGeneration(
        string $collection,
        string $concept,
        string $generationTask,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphqlEndpoint = $this->apiUrl . '/v1/graphql';

        // Prépare la liste des champs pour la requête GraphQL
        $fieldsString = implode(' ', $fields);
        // Échappe les guillemets dans la tâche de génération
        $escapedTask = str_replace('"', '\\"', $generationTask);

        // Construction de la requête GraphQL
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

        // Exécution de la requête via CURL
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

        // Récupération et vérification de la réponse
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Vérification du code HTTP
        if ($httpCode !== 200) {
            $this->lastError = "Erreur HTTP $httpCode: $response";
            return null;
        }

        // Décodage de la réponse JSON
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->lastError = "Erreur de décodage JSON: " . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }
    /**
     * Indexe un fichier texte dans Weaviate avec mécanisme de réessai
     * 
     * Lit, nettoie, découpe et indexe le contenu d'un fichier texte
     * 
     * @param string $filePath Chemin vers le fichier à indexer
     * @param string $collection Nom de la collection cible
     * @param string $courseId Identifiant du cours
     * @return bool True si succès, False si erreur
     */
    public function indexTextFile(string $filePath, string $collection, string $courseId): bool
    {
        global $CFG;
        // $log_file = $CFG->dirroot . '/blocks/chatbot/custom_debug.log';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        // error_log('Indexation: Début du processus', 3, $log_file);

        // Vérification de l'existence du fichier
        if (!file_exists($filePath)) {
            $this->lastError = "Le fichier n'existe pas: $filePath";
            return false;
        }

        // Lecture du fichier
        $text = file_get_contents($filePath);
        if ($text === false) {
            $this->lastError = "Impossible de lire le fichier";
            return false;
        }

        // Préparation du texte
        $cleanedText = $this->cleanText($text);
        $cleanedText = $text;
        $chunks = $this->chunkText($cleanedText);

        // Configuration pour l'indexation par lots
        $batchEndpoint = $this->apiUrl . '/v1/batch/objects';
        $currentBatch = [];
        $success = true;

        // Paramètres de réessai
        $maxRetries = 5;        // Nombre maximum de tentatives
        $retryDelay = 1;        // Délai initial entre les tentatives (en secondes)
        $maxRetryDelay = 5;    // Délai maximum entre les tentatives (en secondes)

        // Traitement de chaque chunk
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

            // Si le lot est plein ou c'est le dernier chunk
            if ($objectCount >= $this->batchSize || $chunk === end($chunks)) {
                // Construction manuelle du JSON pour éviter les problèmes potentiels avec json_encode
                $jsonObjects = [];
                foreach ($currentBatch as $obj) {
                    $jsonObj = json_encode($obj);
                    if ($jsonObj === false) {
                        $this->lastError = "Erreur d'encodage JSON: " . json_last_error_msg();
                        return false;
                    }
                    $jsonObjects[] = $jsonObj;
                }

                $jsonData = '{"objects":[' . implode(',', $jsonObjects) . ']}';

                // Mise en place de la logique de réessai
                $retry = 0;
                $currentDelay = $retryDelay;
                $requestSuccess = false;

                while (!$requestSuccess && $retry <= $maxRetries) {
                    if ($retry > 0) {
                        // error_log("Tentative #$retry après échec. Attente de $currentDelay secondes...", 3, $log_file);
                        // sleep($currentDelay);
                        // Augmentation exponentielle du délai (backoff exponentiel)
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
                        CURLOPT_TIMEOUT => 30, // Timeout de 30 secondes
                    ]);

                    $response = curl_exec($ch);
                    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                    if (curl_errno($ch)) {
                        // error_log("Erreur CURL à la tentative #$retry: " . curl_error($ch), 3, $log_file);
                        curl_close($ch);
                        $retry++;
                        continue;
                    }

                    // Vérification si c'est une erreur temporaire du serveur (500, 502, 503, 504)
                    if ($httpCode >= 500 && $httpCode < 600) {
                        // error_log("Erreur serveur $httpCode à la tentative #$retry: $response", 3, $log_file);
                        curl_close($ch);
                        $retry++;
                        continue;
                    }
                    // Autres erreurs HTTP
                    elseif ($httpCode < 200 || $httpCode >= 300) {
                        $this->lastError = "Erreur HTTP $httpCode: $response";
                        // error_log($this->lastError, 3, $log_file);
                        curl_close($ch);
                        return false;
                    }

                    // Si on arrive ici, la requête a réussi
                    // error_log("Lot indexé avec succès (HTTP $httpCode)", 3, $log_file);
                    curl_close($ch);
                    $requestSuccess = true;
                }

                // Si toutes les tentatives ont échoué
                if (!$requestSuccess) {
                    $this->lastError = "Échec après $maxRetries tentatives. Dernière erreur: HTTP $httpCode";
                    // error_log($this->lastError, 3, $log_file);
                    return false;
                }

                // Réinitialisation du lot
                $currentBatch = [];
                $objectCount = 0;

                // Pause de 5 secondes entre chaque envoi de lot
                // error_log("Pause de 5 secondes avant le prochain lot...", 3, $log_file);
                // sleep(1);
            }
        }

        // error_log('Indexation: Processus terminé avec succès', 3, $log_file);
        return $success;
    }



    /**
     * Formatte les résultats de la recherche
     * 
     * Sépare les données et le contenu généré dans un format plus lisible
     * 
     * @param array $results Résultats bruts de la recherche
     * @return array Résultats formattés
     */
    public function formatSearchResults(array $results): array
    {
        $formattedResults = [];

        foreach ($results as $result) {
            $formattedResult = [
                // Filtrage des données principales (sans _additional)
                'data' => array_filter($result, function ($key) {
                    return $key !== '_additional';
                }, ARRAY_FILTER_USE_KEY),
                'generated_content' => null,
                'generation_error' => null
            ];

            // Extraction du contenu généré s'il existe
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
     * Définit la taille des lots pour l'indexation
     * 
     * @param int $size Nouvelle taille de lot
     */
    public function setBatchSize(int $size): void
    {
        $this->batchSize = $size;
    }

    /**
     * Récupère la dernière erreur survenue
     * 
     * @return string|null Message d'erreur ou null si aucune erreur
     */
    public function getLastError(): ?string
    {
        return $this->lastError;
    }

    /**
     * Récupère la dernière erreur survenue
     * 
     * @return string|null Message d'erreur ou null si aucune erreur
     */
    public function getLastPrompt(): ?string
    {
        return $this->lastPrompt;
    }

    /**
     * Effectue une recherche sémantique dans une collection Weaviate.
     * 
     * Cette méthode interroge la base de données Weaviate pour obtenir des résultats basés
     * sur une recherche sémantique en utilisant un concept donné.
     * 
     * @param string $collection Nom de la collection à interroger
     * @param string $concept Concept à rechercher (par exemple : "biologie", "technologie", etc.)
     * @param array $fields Champs à retourner dans les résultats
     * @param int $limit Nombre maximum de résultats à retourner
     * @return array|null Résultats de la recherche sémantique ou null en cas d'erreur
     */
    public function semanticSearch(
        string $collection,
        string $concept,
        array $fields = ['texte', 'cours'],
        int $limit = 3
    ): ?array {
        $graphqlEndpoint = $this->apiUrl . '/v1/graphql';

        // Prépare la liste des champs pour la requête GraphQL
        $fieldsString = implode(' ', $fields);

        // Construction de la requête GraphQL
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

        // Exécution de la requête via CURL
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

        // Récupération et vérification de la réponse
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $this->lastError = curl_error($ch);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        // Vérification du code HTTP
        if ($httpCode !== 200) {
            $this->lastError = "Erreur HTTP $httpCode: $response";
            return null;
        }

        // Décodage de la réponse JSON
        $result = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->lastError = "Erreur de décodage JSON: " . json_last_error_msg();
            return null;
        }

        return $result['data']['Get'][$collection] ?? [];
    }




}