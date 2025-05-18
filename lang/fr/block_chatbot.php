<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Ajouter un nouveau bloc chatbot';
$string['chatbot:myaddinstance'] = 'Ajouter un nouveau bloc chatbot au tableau de bord';
$string['openai_api_key'] = 'Clé API OpenAI';
$string['openai_api_key_desc'] = 'Entrez votre clé API OpenAI';
$string['api_error'] = 'Erreur lors de la communication avec OpenAI';



// lang/fr/block_chatbot.php

$string['adobe_pdf_client_id'] = 'Identifiant Client Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Entrez votre identifiant client Adobe PDF Services ici.';

$string['adobe_pdf_client_secret'] = 'Secret Client Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Entrez votre secret client Adobe PDF Services ici.';

$string['weaviate_api_url'] = 'URL de l\'API Weaviate';
$string['weaviate_api_url_desc'] = 'Entrez l\'URL de l\'API Weaviate ici.';

$string['weaviate_api_key'] = 'Clé API Weaviate';
$string['weaviate_api_key_desc'] = 'Entrez votre clé API Weaviate ici.';




$string['cohere_embedding_api_key'] = 'Clé API Cohere Embedding Model';
$string['cohere_embedding_api_key_desc'] = 'Entrez votre clé API pour le modèle Cohere Embedding ici.';




$string['max_conversations'] = 'Nombre maximum de conversations par utilisateur';
$string['max_conversations_desc'] = 'Le nombre maximum de conversations stockées par utilisateur. Si ce nombre est dépassé, la conversation la plus ancienne sera supprimée.';


$string['placeholder_question'] = 'Posez votre question ici...';
$string['send_button'] = 'Envoyer';
$string['add_prompt_button'] = 'Ajouter un prompt';
$string['modal_title'] = 'Ajouter/Modifier un prompt personnalisé';
$string['prompt_name_label'] = 'Nom du prompt';
$string['prompt_name_placeholder'] = 'Entrez le nom du prompt';
$string['prompt_description_label'] = 'Description';
$string['prompt_description_placeholder'] = 'Entrez une description';
$string['prompt_text_label'] = 'Texte du prompt';
$string['prompt_text_placeholder'] = 'Entrez le texte du prompt';
$string['save_button'] = 'Enregistrer';
$string['error'] = 'Erreur';
$string['prompt_added'] = 'Prompt ajouté avec succès';

$string['test_api_keys'] = 'Tester les clés API';
$string['test_api_keys_desc'] = 'Cliquez pour tester les clés API configurées';
$string['test_api_keys_label'] = 'Tester les clés';

$string['chatbot:manage'] = 'Gérer les paramètres du chatbot';



// For weaviate_db.php
$string['filesmissing'] = "Fichiers manquants.";
$string['errorcreatingcollection'] = "Erreur lors de la création de la collection: ";
$string['fileexceedsmaxsizeini'] = "Le fichier dépasse la taille maximale définie dans php.ini";
$string['fileexceedsmaxsizeform'] = "Le fichier dépasse la taille maximale spécifiée dans le formulaire HTML";
$string['filepartiallyuploaded'] = "Le fichier n'a été que partiellement téléchargé";
$string['nofileuploaded'] = "Aucun fichier n'a été téléchargé";
$string['missingtmpfolder'] = "Le dossier temporaire est manquant";
$string['failedtowritetodisk'] = "Échec de l'écriture du fichier sur le disque";
$string['phpextensionstoppedupload'] = "Une extension PHP a arrêté le téléchargement du fichier";
$string['unknownuploaderror'] = "Erreur inconnue de téléchargement";
$string['uploaderror'] = "Erreur lors du téléchargement: ";
$string['errorindexingfile'] = "Erreur lors de l'indexation du fichier: ";
$string['allfilesindexed'] = "Tous les fichiers ont été indexés avec succès.";


// For test_api_keys.php
$string['test_api_keys'] = "Tester les clés API";
$string['openai_connection_error'] = "Erreur de connexion lors de la vérification de l'API OpenAI.";
$string['openai_invalid_key'] = "La clé API OpenAI est invalide. Code d'erreur: ";
$string['openai_valid_key'] = "La clé API OpenAI est valide et fonctionnelle.";
$string['adobe_invalid_credentials'] = "Le client ID ou le client secret pour Adobe PDF Services est invalide.";
$string['adobe_valid_credentials'] = "Le client ID et le client secret pour Adobe PDF Services sont valides et fonctionnels.";
$string['weaviate_connection_error'] = "Erreur de connexion à Weaviate: ";
$string['weaviate_invalid_key_or_url'] = "L'URL de l'API Weaviate ou la clé Weaviate est invalide ou une erreur est survenue. Code d'erreur: ";
$string['weaviate_valid_key_and_url'] = "L'URL de l'API Weaviate ainsi que la clé Weaviate sont valides et fonctionnelles.";
$string['back'] = "Retour";


// For add_prompt.php
$string['invalid_sesskey'] = "Clé de session invalide";
$string['database_write_error'] = "Erreur d'écriture de la base de données: ";

// For ajax.php
$string['http_method_not_allowed'] = "Méthode HTTP non autorisée";
$string['invalid_json'] = "JSON invalide: ";
$string['missing_parameters'] = "Paramètres manquants";
$string['invalid_question'] = "Question invalide";
$string['empty_question'] = "La question ne peut pas être vide";
$string['invalid_session'] = "Session invalide";
$string['openai_api_key_not_configured'] = "Clé API OpenAI non configurée";
$string['empty_response_from_api'] = "Réponse vide reçue de l'API";
$string['error_saving_conversation'] = "Erreur lors de l'enregistrement de la conversation";


// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = "Échec de l'obtention du jeton d'accès. Code HTTP: ";
$string['access_token_obtained_successfully'] = "Jeton d'accès obtenu avec succès.";
$string['failed_to_obtain_access_token_response'] = "Échec de l'obtention du jeton d'accès. Réponse: ";
$string['failed_to_obtain_upload_uri'] = "Échec de l'obtention de l'URI de téléchargement. Code HTTP: ";
$string['asset_upload_uri_obtained'] = "URI de téléchargement de l'actif obtenue.";
$string['failed_to_obtain_upload_uri_response'] = "Échec de l'obtention de l'URI de téléchargement. Réponse: ";
$string['failed_to_upload_file'] = "Échec du téléchargement du fichier. Code HTTP: ";
$string['file_uploaded_successfully'] = "Fichier téléchargé avec succès.";
$string['job_created_successfully'] = "Travail créé avec succès. Emplacement: ";
$string['bad_request'] = "Mauvaise requête. La requête était invalide ou ne peut être servie.";
$string['unauthorized'] = "Non autorisé. Vérifiez vos informations d'identification API.";
$string['resource_not_found'] = "Ressource introuvable. La ressource spécifiée est introuvable.";
$string['quota_exceeded'] = "Quota dépassé. Vous avez dépassé votre quota pour cette opération.";
$string['internal_server_error'] = "Erreur interne du serveur. Le serveur a rencontré une erreur et ne peut pas traiter votre demande à ce moment.";
$string['unexpected_http_status'] = "Code HTTP inattendu: ";
$string['failed_to_get_job_status'] = "Échec de l'obtention du statut du travail. Code HTTP: ";
$string['job_status'] = "Statut du travail: ";
$string['job_completed_successfully'] = "Travail terminé avec succès. URI de téléchargement: ";
$string['job_completed_but_download_uri_missing'] = "Travail terminé mais l'URI de téléchargement est manquante dans la réponse.";
$string['job_in_progress'] = "Travail toujours en cours. Continuer le sondage...";
$string['job_failed'] = "Travail échoué.";
$string['failed_to_decode_json_response'] = "Échec du décodage de la réponse JSON ou le champ de statut est manquant. Réponse: ";
$string['failed_to_download_asset'] = "Échec du téléchargement de l'actif. Code HTTP: ";
$string['asset_downloaded_successfully'] = "Actif téléchargé avec succès.";
$string['error_decoding_json_file'] = "Erreur de décodage du fichier JSON.";



// For classes/weaviateconnector.php
$string['curl_error'] = "Erreur cURL : ";
$string['http_error'] = "Erreur HTTP ";
$string['json_decode_error'] = "Erreur de décodage JSON : ";
$string['no_response_generated'] = "Aucune réponse générée. Données reçues : ";
$string['previous_interactions_history'] = "Historique des interactions précédentes :";
$string['previous_question'] = "Question précédente : ";
$string['answer'] = "Réponse : ";
$string['file_not_found'] = "Fichier introuvable : ";
$string['unable_to_read_file'] = "Impossible de lire le fichier";
$string['json_encode_error'] = "Erreur d'encodage JSON : ";
$string['failure_after_retries'] = "Échec après ";
$string['last_error'] = " tentatives. Dernière erreur : HTTP ";






// For block_chatbot.php
$string['pluginname'] = "Chatbot";
$string['default_prompt'] = <<<EOT
Contexte de la situation :
L’apprenant suit un cours sur [[ coursename ]]. Ton rôle est de l’accompagner en lui fournissant des réponses précises, pertinentes et adaptées à son apprentissage.
Mission :
En tant qu’assistant, ta mission est d’aider l’apprenant à comprendre les concepts du cours sur Cours X en répondant à ses questions, tout en t’appuyant sur le contexte fourni pour formuler une réponse. [[ history ]].
Tu dois formuler des réponses claires, précises et pertinentes, en veillant à ne transmettre que des informations issues du cours. Si une réponse ne peut être trouvée dans le contexte fourni, répondre strictement par : " Je suis calibré en fonction du contenu du cours qui a été soigneusement sélectionné par votre enseignant. Si vous voulez plus de renseignement on vous invite à le contacter. "
Si l'apprenant écrit des phrases montrant qu'il n'a pas compris un concept ou une explication précédente, vérifie [[ history ]] pour identifier ce qui a été mal compris, puis reformule ton explication avec plus de simplicité et des exemples plus concrets.
Instructions
1.Détecte les émotions dans la question de l’apprenant et adopte un ton empathique et bienveillant.
2. Réponds de manière claire et structurée.  
3. Explique le concept avec des exemples si nécessaire.  
4. Ne donne aucune réponse en dehors du contexte fourni.  
5. Ta réponse doit intégrer les 4 composantes de l’empathie suivantes :
    -Composante cognitive : Montre que tu comprends le point de vue, le raisonnement et les intentions de l’apprenant. Reformule ses idées pour valider ta compréhension. Propose des pistes en lien avec ce qu’il a dit, sans imposer ton propre raisonnement.
    -Composante affective : Sois sensible à l’état émotionnel de l’apprenant (frustration, doute, satisfaction, stress…). Reflète ou valide ses émotions par des mots adaptés ou des métaphores simples. Exprime de la bienveillance.
    -Composante attitudinale : Adopte une attitude chaleureuse, respectueuse et encourageante. Fais preuve d’ouverture, valorise ses efforts et évite tout jugement. Ton ton doit être amical et sincère.
    -Composante d’ajustement : Adapte tes réponses à l’évolution du discours de l’apprenant. Utilise un vocabulaire et un style qui correspondent à son niveau et à son humeur. Laisse-le guider la conversation, ne force jamais le sujet.
Nouvelle question de l’apprenant [[ question ]]
EOT;
$string['sending_question'] = "Envoi de la question...";
$string['error'] = "Erreur: ";
$string['error_sending_question'] = "Erreur lors de l'envoi de la question: ";
$string['saving_prompt'] = "Enregistrement du prompt...";
$string['prompt_saved_successfully'] = "Prompt enregistré avec succès!";
$string['error_saving_prompt'] = "Erreur lors de l'enregistrement du prompt: ";
$string['uploading_file'] = "Téléchargement du fichier en cours...";
$string['file_indexed_successfully'] = "Fichier indexé avec succès!";
$string['error_processing_file'] = "Erreur lors du traitement du fichier: ";
$string['json_parse_error'] = "Erreur de parsing JSON: ";
$string['invalid_json_response'] = "La réponse du serveur n'est pas au format JSON valide.";
$string['add_files'] = "Ajouter des fichiers";
$string['text_or_pdf_files'] = "Fichiers texte ou PDF";
$string['drag_files_here_or_click'] = "Glissez vos fichiers ici ou cliquez pour parcourir";
$string['cancel'] = "Annuler";
$string['upload_course'] = "Charger le cours";
$string['modify_prompt'] = "Modifier";
$string['add_prompt'] = "Ajouter";
$string['consult_guide'] = "Consultez le guide pour concevoir des prompts efficaces :";
$string['guide_link'] = "Guide pour concevoir des prompts destiné à l’enseignant";
$string['prompt_content'] = "Contenu du prompt";
$string['write_prompt_here'] = "Écrivez votre prompt ici";
$string['cancel'] = "Annuler";
$string['save'] = "Enregistrer";


$string['chatbot_with_toggle_buttons'] = "Chatbot avec Toggle Boutons";
$string['hello_professor'] = "Bonjour Professeur, vous avez la possibilité de tester le chatbot afin de vous assurer qu'il fonctionne correctement et que votre prompt est configuré de manière optimale.";
$string['hello_student'] = "Bonjour ! Je suis votre assistant d'apprentissage. Je peux vous aider à : - Comprendre les concepts du cours - Réviser et pratiquer les exercices - Clarifier des points difficiles - Suggérer des méthodes d'étude. Quelle aide puis-je vous apporter ?";
$string['ask_your_question_here'] = "Posez votre question ici...";
$string['modify_prompt'] = "Modifier le prompt";
$string['upload_course'] = "Charger le cours";
$string['open_prompt_modal'] = "Ouvrir la modale de modification du prompt";
$string['open_file_upload_modal'] = "Ouvrir la modale de chargement de cours";

// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'Erreur lors du téléchargement de l\'asset.';
$string['error_creating_job'] = 'Erreur lors de la création du job.';
$string['job_failed'] = 'Le job a échoué.';
$string['error_processing_pdf'] = 'Erreur lors du traitement du PDF.';
