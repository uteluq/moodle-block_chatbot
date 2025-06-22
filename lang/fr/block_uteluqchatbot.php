<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Ajouter un nouveau bloc uteluqchatbot';
$string['uteluqchatbot:myaddinstance'] = 'Ajouter un nouveau bloc uteluqchatbot au tableau de bord';
$string['adobe_pdf_client_id'] = 'Identifiant Client Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Entrez votre identifiant client Adobe PDF Services ici.';
$string['adobe_pdf_client_secret'] = 'Secret Client Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Entrez votre secret client Adobe PDF Services ici.';
$string['weaviate_api_url'] = 'URL de l\'API Weaviate';
$string['weaviate_api_url_desc'] = 'Entrez l\'URL de l\'API Weaviate ici.';
$string['weaviate_api_key'] = 'Clé API Weaviate';
$string['weaviate_api_key_desc'] = 'Entrez votre clé API Weaviate ici.';
$string['weaviate_cohere_not_configured'] = 'La clé API Cohere n\'est pas configurée ou est invalide. Veuillez vérifier les paramètres.';
$string['cohere_embedding_api_key'] = 'Clé API Cohere Embedding Model';
$string['cohere_embedding_api_key_desc'] = 'Entrez votre clé API pour le modèle Cohere Embedding ici.';
$string['error'] = 'Erreur';
$string['test_api_keys'] = 'Tester les clés API';
$string['test_api_keys_desc'] = 'Cliquez pour tester les clés API configurées';
$string['test_api_keys_label'] = 'Tester les clés';
$string['uteluqchatbot:manage'] = 'Gérer les paramètres du chatbot';
$string['test_api_keys'] = "Tester les clés API";
$string['adobe_invalid_credentials'] = "Le client ID ou le client secret pour Adobe PDF Services est invalide.";
$string['adobe_valid_credentials'] = "Le client ID et le client secret pour Adobe PDF Services sont valides et fonctionnels.";
$string['weaviate_connection_error'] = "Erreur de connexion à Weaviate: ";
$string['weaviate_invalid_key_or_url'] = "L'URL de l'API Weaviate ou la clé Weaviate est invalide ou une erreur est survenue. Code d'erreur: ";
$string['weaviate_valid_key_and_url'] = "L'URL de l'API Weaviate ainsi que la clé Weaviate sont valides et fonctionnelles.";
$string['database_write_error'] = "Erreur d'écriture de la base de données: ";
$string['invalid_question_after_sanitize'] = 'Question invalide après nettoyage.';
$string['error_saving_conversation'] = 'Erreur lors de l\'enregistrement de la conversation';
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
$string['invalid_response_format'] = 'Format de réponse invalide.';
$string['http_code'] = 'Code HTTP : ';
$string['back'] = 'Retour';
$string['pluginname'] = "uteluqchatbot";
$string['default_prompt'] = <<<EOT
Contexte de la situation
L’apprenant suit un cours sur [[ coursename ]]. Ton rôle est de l’accompagner en lui fournissant des réponses précises, pertinentes et adaptées à son apprentissage.

Mission
En tant qu’assistant, ta mission est d’aider l’apprenant à comprendre les concepts du cours sur Cours X en répondant à ses questions, tout en t’appuyant sur le contexte fourni pour formuler une réponse. [[ history ]].
Tu dois formuler des réponses claires, précises et pertinentes, en veillant à ne transmettre que des informations issues du cours. Si une réponse ne peut être trouvée dans le contexte fourni, répondre strictement par : " Je suis calibré en fonction du contenu du cours qui a été soigneusement sélectionné par votre enseignant. Si vous voulez plus de renseignement on vous invite à le contacter. "
Si l'apprenant écrit des phrases montrant qu'il n'a pas compris un concept ou une explication précédente, vérifie [[ history ]] pour identifier ce qui a été mal compris, puis reformule ton explication avec plus de simplicité et des exemples plus concrets.

Instructions
1. Analyse chaque question de l’apprenant pour détecter la présence d’une émotion. Utilise la taxonomie suivante :
   - Confusion : « je ne comprends pas », « je suis perdu », « c’est flou ».
   - Frustration : « ça m’énerve », « j’abandonne », « c’est trop compliqué ».
   - Stress ou anxiété** : « je stresse », « je suis dépassé », « il ne reste plus de temps ».
   - Doute ou manque de confiance : « je ne suis pas capable », « je ne suis pas bon ».

2. Si une émotion est détectée, commence ta réponse par une phrase empathique adaptée :
   - Pour la confusion : « Je comprends, ce n’est pas évident. »
   - Pour la frustration : « Je vois que c’est frustrant. »
   - Pour le stress : « C’est normal de se sentir dépassé parfois. »
   - Pour le doute : « Tu fais de ton mieux, et c’est déjà énorme. »

3. Réponds ensuite de manière claire, et structurée. 
4. Utilise des exemples si nécessaire. 
5. Ne donne jamais de réponse en dehors du contexte fourni.

6. Intègre dans ta réponse les 4 composantes de l’empathie telles que définies dans [Springer Table 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1) :
   - Composante cognitive : montre que tu comprends le point de vue, le raisonnement et les intentions de l’apprenant. Reformule ses idées pour valider ta compréhension. Propose des pistes en lien avec ce qu’il a dit, sans imposer ton propre raisonnement.
   - Composante affective : sois sensible à son état émotionnel (frustration, doute, stress…). Reflète ou valide ses émotions avec des mots adaptés ou des métaphores simples. Exprime de la bienveillance.
   - Composante attitudinale: adopte une attitude chaleureuse, respectueuse et encourageante. Fais preuve d’ouverture, valorise ses efforts, et évite tout jugement.
   - Composante d’ajustement (attunement): adapte ton vocabulaire, ton style, et ton niveau de langage à celui de l’apprenant. Laisse-le guider la conversation sans jamais forcer un sujet.

7. Maintiens un ton bienveillant, respectueux et motivant tout au long de l’échange.

Nouvelle question de l’apprenant
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
$string['error_uploading_asset'] = 'Erreur lors du téléchargement de l\'asset.';
$string['error_creating_job'] = 'Erreur lors de la création du job.';
$string['job_failed'] = 'Le job a échoué.';
$string['error_processing_pdf'] = 'Erreur lors du traitement du PDF.';
$string['json_encode_error'] = 'Erreur d\'encodage JSON : ';
$string['empty_response_from_api'] = 'Réponse vide reçue de l\'API';
$string['file_size_exceeds_limit'] = 'La taille du fichier dépasse la limite de 10 Mo';
$string['privacy:metadata:block_uteluqchatbot_conversations'] = 'Informations sur les conversations des utilisateurs avec le chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:userid'] = 'L\'ID de l\'utilisateur qui a créé la conversation';
$string['privacy:metadata:block_uteluqchatbot_conversations:question'] = 'La question posée par l\'utilisateur';
$string['privacy:metadata:block_uteluqchatbot_conversations:answer'] = 'La réponse fournie par le chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:timecreated'] = 'L\'heure à laquelle la conversation a été créée';
$string['privacy:metadata:block_uteluqchatbot_conversations:courseid'] = 'L\'ID du cours où la conversation a eu lieu';
$string['privacy:metadata:block_uteluqchatbot_prompts'] = 'Informations sur les prompts personnalisés créés par les utilisateurs';
$string['privacy:metadata:block_uteluqchatbot_prompts:prompt'] = 'Le texte du prompt personnalisé créé par l\'utilisateur';
$string['privacy:metadata:block_uteluqchatbot_prompts:userid'] = 'L\'ID de l\'utilisateur qui a créé le prompt';
$string['privacy:metadata:block_uteluqchatbot_prompts:courseid'] = 'L\'ID du cours où le prompt a été créé';
$string['privacy:metadata:block_uteluqchatbot_prompts:timecreated'] = 'L\'heure à laquelle le prompt a été créé';
$string['privacy:metadata:cohere_api'] = 'Données envoyées au service API Cohere pour les réponses de chat alimentées par IA';
$string['privacy:metadata:cohere_api:question'] = 'La question de l\'utilisateur envoyée à l\'API Cohere pour traitement';
$string['privacy:metadata:cohere_api:courseid'] = 'Les informations de contexte de cours envoyées à l\'API Cohere';
$string['privacy:metadata:cohere_api:prompt'] = 'Prompts personnalisés et instructions système envoyés à l\'API Cohere';
$string['privacy:metadata:weaviate_cloud'] = 'Données envoyées à la base de données vectorielle Weaviate Cloud pour le stockage de documents et la recherche de similarité';
$string['privacy:metadata:weaviate_cloud:document_content'] = 'Contenu textuel extrait des documents téléchargés stocké dans Weaviate';
$string['privacy:metadata:weaviate_cloud:embeddings'] = 'Embeddings vectoriels générés à partir du contenu des documents stockés dans Weaviate';
$string['privacy:metadata:weaviate_cloud:courseid'] = 'Informations de contexte de cours associées aux documents stockés';
$string['privacy:metadata:weaviate_cloud:metadata'] = 'Métadonnées et propriétés des documents stockées dans la base de données Weaviate';
$string['privacy:metadata:adobe_pdf_api'] = 'Données envoyées à l\'API Adobe PDF Services pour l\'extraction de texte des documents PDF';
$string['privacy:metadata:adobe_pdf_api:pdf_content'] = 'Contenu du fichier PDF envoyé à Adobe PDF Services pour l\'extraction de texte';
$string['privacy:metadata:adobe_pdf_api:filename'] = 'Nom de fichier original du document PDF envoyé pour traitement';
$string['privacy:metadata:adobe_pdf_api:extracted_text'] = 'Contenu textuel extrait des documents PDF par Adobe PDF Services';
$string['conversations'] = 'Conversations';
$string['prompts'] = 'Prompts personnalisés';
$string['no_files_selected'] = 'Aucun fichier sélectionné';
$string['course_id'] = 'ID du cours';
$string['file_name'] = 'Nom du fichier';
$string['file_content_base64'] = 'Contenu du fichier (encodé en base64)';
$string['insufficient_permissions'] = 'Permissions insuffisantes pour télécharger des fichiers';
$string['missing_api_configuration'] = 'Configuration API requise manquante';
$string['weaviate_connector_not_found'] = 'Classe WeaviateConnector introuvable';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Erreur lors de la création de la collection : ';
$string['unknown_error'] = 'Erreur inconnue';
$string['failed_create_upload_directory'] = 'Échec de la création du répertoire de téléchargement';
$string['empty_filename'] = 'Nom de fichier vide fourni';
$string['unsupported_file_type'] = 'Type de fichier non pris en charge : ';
$string['invalid_file_data'] = 'Données de fichier invalides pour : ';
$string['failed_save_file'] = 'Échec de l\'enregistrement du fichier : ';
$string['adobe_pdf_credentials_not_configured'] = 'Informations d\'identification de l\'API Adobe PDF non configurées';
$string['pdf_extractor_not_found'] = 'Classe d\'extracteur PDF introuvable';
$string['failed_extract_pdf_text'] = 'Échec de l\'extraction du texte du PDF : ';
$string['failed_save_extracted_text'] = 'Échec de l\'enregistrement du fichier texte extrait : ';
$string['error_indexing_file_unknown'] = 'Erreur lors de l\'indexation du fichier ';
$string['files_indexed_successfully'] = ' fichier(s) indexé(s) avec succès';
$string['errors_occurred'] = '. Erreurs : ';
$string['no_files_processed'] = 'Aucun fichier traité. Erreurs : ';
$string['operation_successful'] = 'Opération réussie';
$string['response_message'] = 'Message de réponse';
$string['processed_files_count'] = 'Nombre de fichiers traités';
$string['sending_question_fallback'] = 'Envoi de la question...';
$string['error_colon_fallback'] = 'Erreur : ';
$string['error_sending_question_fallback'] = 'Erreur lors de l\'envoi de la question : ';
$string['saving_prompt_fallback'] = 'Enregistrement du prompt...';
$string['prompt_saved_successfully_fallback'] = 'Prompt enregistré avec succès !';
$string['error_saving_prompt_fallback'] = 'Erreur lors de l\'enregistrement du prompt : ';
$string['no_files_selected_fallback'] = 'Aucun fichier sélectionné.';
$string['uploading_files_fallback'] = 'Téléchargement des fichiers...';
$string['files_indexed_successfully_fallback'] = 'Fichiers indexés avec succès !';
$string['error_processing_files_fallback'] = 'Erreur lors du traitement des fichiers : ';
$string['unknown_error_occurred'] = 'Une erreur inconnue s\'est produite';
$string['server_response_error'] = 'Erreur de réponse du serveur. Vérifiez la console pour plus de détails.';
$string['server_error_check_console'] = 'Erreur du serveur - vérifiez la console pour plus de détails';
$string['files_converted_debug'] = 'Fichiers convertis en base64 :';
$string['sending_ajax_request_debug'] = 'Envoi de la requête AJAX :';
$string['upload_response_received_debug'] = 'Réponse de téléchargement reçue :';
$string['response_type_debug'] = 'Type de réponse :';
$string['upload_error_details_debug'] = 'Détails de l\'erreur de téléchargement :';
$string['error_object_debug'] = 'Objet d\'erreur :';
$string['raw_server_response_debug'] = 'Réponse brute du serveur :';