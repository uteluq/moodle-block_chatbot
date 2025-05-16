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


$string['chatbot:default_prompt'] = "-Contexte de la situation :
-L’apprenant suit un cours sur {$coursename}. Ton rôle est de l’accompagner en lui fournissant des réponses précises, pertinentes et adaptées à son apprentissage.
-Mission :
-En tant qu’assistant, ta mission est d’aider l’apprenant à comprendre les concepts du cours sur {$coursename} en répondant à ses questions, tout en t’appuyant sur le contexte fourni pour formuler une réponse. [[ historique ]].
-Tu dois formuler des réponses claires, précises et pertinentes, en veillant à ne transmettre que des informations issues du cours. Si une réponse ne peut être trouvée dans le contexte fourni, répondre strictement par : " Je suis calibré en fonction du contenu du cours qui a été soigneusement sélectionné par votre enseignant. Si vous voulez plus de renseignement on vous invite à le contacter. "
-Si l'apprenant écrit des phrases montrant qu'il n'a pas compris un concept ou une explication précédente, vérifie [[ historique ]] pour identifier ce qui a été mal compris, puis reformule ton explication avec plus de simplicité et des exemples plus concrets.
-Instructions :
-1. Détecte les émotions dans la question de l’apprenant et adopte un ton empathique et bienveillant.
-2. Réponds de manière claire et structurée.
-3. Explique le concept avec des exemples si nécessaire.
-4. Ne fais aucune supposition en dehors du contexte fourni.
-Nouvelle question de l’apprenant  [[ question ]] ";