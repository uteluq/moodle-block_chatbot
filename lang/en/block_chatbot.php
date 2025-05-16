<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Add a new chatbot block';
$string['chatbot:myaddinstance'] = 'Add a new chatbot block to Dashboard';

// Open AI
$string['openai_api_key'] = 'OpenAI API Key';
$string['openai_api_key_desc'] = 'Enter your OpenAI API key here.';


// lang/en/block_chatbot.php

$string['adobe_pdf_client_id'] = 'Adobe PDF Services Client ID';
$string['adobe_pdf_client_id_desc'] = 'Enter your Adobe PDF Services Client ID here.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services Client Secret';
$string['adobe_pdf_client_secret_desc'] = 'Enter your Adobe PDF Services Client Secret here.';

$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Enter the URL for the Weaviate API here.';

$string['weaviate_api_key'] = 'Weaviate API Key';
$string['weaviate_api_key_desc'] = 'Enter your Weaviate API key here.';




$string['cohere_embedding_api_key'] = 'Cohere Embedding Model API Key';
$string['cohere_embedding_api_key_desc'] = 'Enter your API key for the Cohere Embedding Model here.';




$string['max_conversations'] = 'Maximum conversations per user';
$string['max_conversations_desc'] = 'The maximum number of conversations stored per user. If exceeded, the oldest conversation will be deleted.';
// Test button strings
$string['test_api_keys'] = 'Test API Keys';
$string['test_api_keys_desc'] = 'Click to test the configured API keys';
$string['test_api_keys_label'] = 'Test Keys';

$string['chatbot:manage'] = 'Manage chatbot settings';


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