<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');
require_login();




global $CFG, $USER, $COURSE, $DB, $PAGE;

// Nettoyer toute sortie précédente
ob_clean();
if (ob_get_length())
    ob_end_clean();

// Définir les en-têtes HTTP
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-cache, must-revalidate');

require_once($CFG->dirroot . '/blocks/chatbot/classes/weaviate_connector.php');


// Configuration du débogage
error_reporting(E_ALL);
ini_set('display_errors', 0); // Désactiver l'affichage des erreurs pour éviter la contamination du JSON

// Chemin vers le fichier de log
// $log_file = $CFG->dirroot . '/blocks/chatbot/custom_debug.log';

function sanitizeChatbotInput($input) {
    // Supprimer les balises potentiellement dangereuses
    $dangerousTags = ['script', 'iframe', 'object', 'embed', 'style', 'form', 'input'];
    foreach ($dangerousTags as $tag) {
        $input = preg_replace('/<\/?' . $tag . '[^>]*>/i', '', $input);
    }

    // Supprimer les attributs contenant du JavaScript
    $input = preg_replace('/\s*on\w+\s*=\s*["\'][^"\']*["\']/i', '', $input);
    
    // Supprimer les URLs JavaScript
    $input = preg_replace('/javascript:\s*/i', '', $input);

    // Bloquer les appels à des fonctions dangereuses
    $dangerousFunctions = ['eval', 'system', 'exec', 'passthru', 'shell_exec', 'base64_decode'];
    foreach ($dangerousFunctions as $func) {
        $input = preg_replace('/\b' . preg_quote($func, '/') . '\s*\(/i', '', $input);
    }

    // Limiter la longueur
    $input = mb_substr($input, 0, 1000, 'UTF-8');

    // Convertir en entités HTML uniquement pour les balises, sans affecter les apostrophes et guillemets
    $input = htmlspecialchars($input, ENT_NOQUOTES, 'UTF-8');

    // Décoder les entités HTML pour éviter le problème des apostrophes
    $input = htmlspecialchars_decode($input, ENT_NOQUOTES);

    return $input;
}



// Fonction pour envoyer une réponse JSON propre
function send_json_response($data, $status_code = 200)
{

    global $log_file;

    // Nettoyer à nouveau pour s'assurer qu'il n'y a pas de sortie
    if (ob_get_length())
        ob_end_clean();

    // Log de la réponse avant envoi
    // error_log('Envoi réponse JSON: ' . json_encode($data), 3, $log_file);

    http_response_code($status_code);
        // Réponse réussie
        $answer = $data['answer'];
    
        if (!mb_detect_encoding($answer, 'UTF-8', true)) {
            $data['answer'] = utf8_encode($answer); // Forcer l'encodage en UTF-8.
        }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}

try {
    // Vérifier la méthode HTTP
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        send_json_response(['error' => 'Méthode HTTP non autorisée'], 405);
    }

    // Lire l'entrée
    $raw_input = file_get_contents('php://input');
    // error_log('Raw input: ' . $raw_input, 3, $log_file);



    $input = json_decode($raw_input, true);
    // error_log('Input reçu: ' . print_r($input, true), 3, $log_file);
    $userid = $input['userid'];
    $courseid = $input['courseid'];
    $sansRag = (int) $input['sansRag'];
    $sansRag = $sansRag === 1;

    // error_log('Valeur de sansRag : ' . $sansRag, 3, $log_file);


    // error_log(PHP_EOL .'USER ID: ' . $courseid . ' COURSE ID ' . $userid, 3, $log_file);
    // error_log(PHP_EOL  . ' COURSE ID ' . $userid, 3, $log_file);

    if (json_last_error() !== JSON_ERROR_NONE) {
        send_json_response(['error' => 'JSON invalide: ' . json_last_error_msg()], 400);
    }

    if (!isset($input['question']) || !isset($input['sesskey'])) {
        send_json_response(['error' => 'Paramètres manquants'], 400);
    }

    $question = trim($input['question']);

    // Exemple d'utilisation
try {
    $question = sanitizeChatbotInput($question);
    
    // Vérification supplémentaire
    if (empty($question)) {
        throw new Exception("Question invalide");
    }
    
    // Utilisation de la question sanitisée
    // ... reste du traitement du chatbot
    
} catch (Exception $e) {
    error_log('Erreur de sanitisation du chatbot : ' . $e->getMessage());
    die('Question invalide');
}
    $sesskey = $input['sesskey'];

    if (empty($question)) {
        send_json_response(['error' => 'La question ne peut pas être vide'], 400);
    }

    if (!confirm_sesskey($sesskey)) {
        send_json_response(['error' => 'Session invalide'], 403);
    }

 





    // Récupérer la clé API
    $api_key = get_config('block_chatbot', 'openai_api_key');
    if (empty($api_key)) {
        send_json_response(['error' => 'Clé API OpenAI non configurée'], 500);
    }

    // Initialiser OpenAI et obtenir la réponse
    // $openai = new block_chatbot\openai_service($api_key);
    // $answer = $openai->get_response($question);
// Configuration des clés API et URL de Weaviate
    $apiUrl = get_config('block_chatbot', 'weaviate_api_url');
    $apiKey = get_config('block_chatbot', 'weaviate_api_key');
    $cohereApiKey = get_config('block_chatbot', 'cohere_embedding_api_key');

    $weaviateConnector = new WeaviateConnector(
        $apiUrl, // URL de votre instance Weaviate
        $apiKey,  // Votre clé API Weaviate
        cohereApiKey: $cohereApiKey // Votre clé API Cohere
    );

    // Pour vérifier si c'est un enseignant dans le cours actuel
    $context = context_course::instance($COURSE->id);
    $isTeacher = has_capability('moodle/course:update', $context, $currentUserId);
    $courseName = $DB->get_record('course', array('id' => $courseid))->fullname;
    $collectionName = 'Collection_course_' . $courseid;




    // Appeler la méthode
// $ragResults = $weaviateConnector->ragSearchWithBestResult($courseName, $question, $courseName);
// $answer =  $ragResults['generated_content'];

$ragResults = "";

if($sansRag === true) {
    // error_log(PHP_EOL . 'Cohere Model Call', 3, $log_file);
    $ragResults = $weaviateConnector->getCohereResponse($question, $cohereApiKey);

} else {
    // error_log(PHP_EOL . 'Weaviate  Call', 3, $log_file);

    $ragResults = $weaviateConnector->getQuestionAnswer($courseName, $collectionName, $question,  $userid, $courseid);
}
    $answer = $ragResults;



    if (empty($answer)) {
        send_json_response(['error' => 'Réponse vide reçue de l\'API OpenAI'], 500);
    }

    // error_log(PHP_EOL .'Prompt envoyé: ' . PHP_EOL . $weaviateConnector->getLastPrompt() . PHP_EOL . PHP_EOL, 3, $log_file);


    // error_log(PHP_EOL . 'Réponse reçue: ' . PHP_EOL .  $answer, 3, $log_file);

    // error_log(PHP_EOL . '-------------------------------------------------------------------', 3, $log_file);

    // Enregistrer la conversation
    $max_conversations =  10;

    $record = new stdClass();
    $record->userid = $userid;
    $record->courseid = $courseid;
    $record->question = $question;
    $record->answer = $answer;
    $record->timecreated = time();

    try {
        // Gérer la limite de conversations
        $count = $DB->count_records('block_chatbot_conversations', ['userid' => $userid]);

        if ($count >= $max_conversations) {
            $oldest = $DB->get_record_sql(
                "SELECT id FROM {block_chatbot_conversations} 
                WHERE userid = :userid 
                ORDER BY timecreated ASC 
                LIMIT 1",
                ['userid' => $userid]
            );

            if ($oldest) {
                $DB->delete_records('block_chatbot_conversations', ['id' => $oldest->id]);
            }
        }

        // Insérer la nouvelle conversation
        $DB->insert_record('block_chatbot_conversations', $record);

        // Envoyer la réponse
        send_json_response([
            'status' => 'success',
            'answer' => $answer
        ]);

    } catch (dml_exception $db_error) {
        // error_log('Erreur DB: ' . $db_error->getMessage(), 3, $log_file);
        send_json_response([
            'error' => 'Erreur lors de l\'enregistrement de la conversation'
        ], 500);
    }

    // Envoyer la réponse
    send_json_response([
        'status' => 'success',
        'answer' => $answer
    ]);

} catch (Exception $e) {
    // error_log('Erreur générale: ' . $e->getMessage(), 3, $log_file);
    send_json_response([
        'error' => $e->getMessage()
    ], 500);
}