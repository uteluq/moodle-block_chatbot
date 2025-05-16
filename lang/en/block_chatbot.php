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


$string['chatbot:default_prompt'] = "Context of the situation:
The learner is taking a course on {$coursename}. Your role is to support them by providing precise, relevant, and adapted answers for their learning.
Mission:
As an assistant, your mission is to help the learner understand the course concepts on {$coursename} by answering their questions, relying on the provided context to formulate a response. [[ history ]].
You must formulate clear, precise, and relevant answers, ensuring you only convey information from the course. If an answer cannot be found in the provided context, strictly reply: " I am calibrated according to the course content carefully selected by your teacher. If you want more information, we invite you to contact them. "
If the learner writes sentences showing they did not understand a concept or a previous explanation, check [[ history ]] to identify what was misunderstood, then rephrase your explanation with more simplicity and concrete examples.
Instructions:
1. Detect emotions in the learner's question and adopt an empathetic and caring tone.
2. Respond clearly and in a structured way.
3. Explain the concept with examples if necessary.
4. Do not make any assumptions outside the provided context.
New learner question  [[ question ]]  ";