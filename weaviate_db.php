<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once('../../config.php');

// Activer la mise en tampon dès le début
ob_start();

global $CFG, $USER, $COURSE, $DB, $PAGE;

// Récupérer l'utilisateur actuel
$currentUserId = $USER->id;
$username = $USER->username;

// Pour vérifier si c'est un enseignant dans le cours actuel
$context = context_course::instance($COURSE->id);
$isTeacher = has_capability('moodle/course:update', $context, $currentUserId);

// $log_file = $CFG->dirroot . '/blocks/chatbot/custom_debug.log';

require_login();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once($CFG->dirroot . '/blocks/chatbot/classes/weaviate_connector.php');
require_once($CFG->dirroot . '/blocks/chatbot/classes/PDFExtractAPI.php');

// Configuration des clés API et URL de Weaviate
$apiUrl = get_config('block_chatbot', 'weaviate_api_url');
$apiKey = get_config('block_chatbot', 'weaviate_api_key');
$cohereApiKey = get_config('block_chatbot', 'cohere_embedding_api_key');

// Initialisation de l'objet WeaviateConnector
$connector = new WeaviateConnector($apiUrl, $apiKey, $cohereApiKey);

try {
    // Vérification des données du formulaire
    if (empty($_FILES['files'])) {
        // error_log('Erreur lors de l\'indexation des fichiers: Fichiers manquants.', 3, $log_file);
        throw new Exception("Fichiers manquants.");
    }

    $uploadedFiles = $_FILES['files'];

    $userid = $_POST['userid'];
    $courseid = $_POST['courseid'];


    $courseName = 'Collection_course_' . $courseid;
    $connector->deleteCollection($courseName);
    $checkIfCreated = $connector->collectionExists($courseName);
   
    // error_log('Est-ce que la collection existe ?  ' . $checkIfCreated, 3, $log_file);

    // Création de la collection si elle n'existe pas
    if ($checkIfCreated == false && !$connector->createCollection($courseName)) {
        // error_log('Erreur lors de la création de la collection: ' . $connector->getLastError(), 3, $log_file);
        throw new Exception("Erreur lors de la création de la collection: " . $connector->getLastError());
    }

    // Vérification des erreurs de téléchargement
    // foreach ($uploadedFiles['error'] as $key => $error) {
    //     if ($error !== UPLOAD_ERR_OK) {
    //         error_log('Erreur lors de l\'indexation d\'un fichier: Erreur lors du téléchargement.' . $error, 3, $log_file);
    //         throw new Exception("Erreur lors du téléchargement d'un fichier.");
    //     }
    // }

    // Vérification des erreurs de téléchargement
foreach ($uploadedFiles['error'] as $key => $error) {
    if ($error !== UPLOAD_ERR_OK) {
        $message = match($error) {
            UPLOAD_ERR_INI_SIZE => "Le fichier dépasse la taille maximale définie dans php.ini",
            UPLOAD_ERR_FORM_SIZE => "Le fichier dépasse la taille maximale spécifiée dans le formulaire HTML",
            UPLOAD_ERR_PARTIAL => "Le fichier n'a été que partiellement téléchargé",
            UPLOAD_ERR_NO_FILE => "Aucun fichier n'a été téléchargé",
            UPLOAD_ERR_NO_TMP_DIR => "Le dossier temporaire est manquant",
            UPLOAD_ERR_CANT_WRITE => "Échec de l'écriture du fichier sur le disque",
            UPLOAD_ERR_EXTENSION => "Une extension PHP a arrêté le téléchargement du fichier",
            default => "Erreur inconnue de téléchargement"
        };
        
        // error_log("Erreur lors de l'indexation d'un fichier: $message (code: $error)", 3, $log_file);
        throw new Exception("Erreur lors du téléchargement: $message");
    }
}

    // Utiliser la variable globale $CFG->dataroot pour construire le chemin du répertoire de stockage
    $uploadDir = $CFG->dataroot . '/filedir/';

    foreach ($uploadedFiles['tmp_name'] as $key => $fileTmpName) {
        $fileName = $uploadedFiles['name'][$key];
        $newFileName = uniqid('file_', true) . '-' . $fileName;
        $destination = $uploadDir . $newFileName;

        // Déplacer le fichier vers le répertoire de destination
        move_uploaded_file($fileTmpName, $destination);

        $adobe_pdf_client_id = get_config('block_chatbot', 'adobe_pdf_client_id');
        $adobe_pdf_client_secret = get_config('block_chatbot', 'adobe_pdf_client_secret');

        // Extraction du contenu du fichier
        $pdfExtractor = new PDFExtractAPI($adobe_pdf_client_id, $adobe_pdf_client_secret);
        $extractedText = $pdfExtractor->processPDF($destination);

        // error_log('Adobe API : ' . $extractedText, 3, $log_file);
        // error_log('Adobe API File: ' . $destination, 3, $log_file);

        // Générer un nom unique pour le fichier texte
        $newFileTxtName = uniqid('file_', true) . '-' . $fileName . '.txt';
        $destinationTxt = $uploadDir . $newFileTxtName;

        if (file_put_contents($destinationTxt, $extractedText) !== false) {
            // echo "Le texte a été enregistré avec succès dans le fichier $destinationTxt.";
        } else {
            // echo "Une erreur s'est produite lors de l'enregistrement du fichier texte.";
        }

        $in = $connector->indexTextFile($destinationTxt, $courseName, $courseName);
        // error_log('\n Valeur de retour ' . $in, 3, $log_file);

        if (!$in) {
            // error_log('Erreur lors de l\'indexation du fichier: ' . $connector->getLastError(), 3, $log_file);
            throw new Exception("Erreur lors de l'indexation du fichier: " . $connector->getLastError());
        }
        // unlink($destinationTxt);
        // unlink($destination);
    }

    // Réponse réussie
    $response = ['success' => true, 'message' => "Tous les fichiers ont été indexés avec succès."];
    $message = $response['message'];

    if (!mb_detect_encoding($message, 'UTF-8', true)) {
        // error_log("Le message n'est pas en UTF-8 : " . $message, 3, $log_file);
        $response['message'] = utf8_encode($message); // Forcer l'encodage en UTF-8.
    }
    // error_log('Fin Indexation ', 3, $log_file);

    // error_log('Fin Indexation - Response: ' . print_r($response, true), 3, $log_file);
} catch (Exception $e) {
    // Gestion des erreurs
    $response = ['error' => $e->getMessage()];
    // error_log('Exception lancée: ' . $e->getMessage(), 3, $log_file);
}

// Vider tout le contenu mis en mémoire tampon
while (ob_get_level()) {
    ob_end_clean();
}

// Définir le header pour le type de contenu JSON
header('Content-Type: application/json');

// Enregistrement dans le log
// error_log('Response JSON: ' . json_encode($response, JSON_UNESCAPED_UNICODE), 3, $log_file);

// Affichage du JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);
// $json = json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);
// if ($json === false) {
//     error_log("Erreur JSON partielle : " . json_last_error_msg(), 3, $log_file);
//     echo json_encode(['error' => "Erreur JSON partielle : " . json_last_error_msg()]);
//     exit;
// }
// echo $json;

exit;