<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Add a new chatbot block';
$string['uteluqchatbot:myaddinstance'] = 'Add a new chatbot block to Dashboard';

// Open AI
$string['openai_api_key'] = 'OpenAI API Key';
$string['openai_api_key_desc'] = 'Enter your OpenAI API key here.';


// lang/en/block_uteluqchatbot.php

$string['adobe_pdf_client_id'] = 'Adobe PDF Services Client ID';
$string['adobe_pdf_client_id_desc'] = 'Enter your Adobe PDF Services Client ID here.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services Client Secret';
$string['adobe_pdf_client_secret_desc'] = 'Enter your Adobe PDF Services Client Secret here.';

$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Enter the URL for the Weaviate API here.';

$string['weaviate_api_key'] = 'Weaviate API Key';
$string['weaviate_api_key_desc'] = 'Enter your Weaviate API key here.';


$string['weaviate_cohere_not_configured'] = 'Cohere API key is either not configured or invalid. Please check the settings.';


$string['cohere_embedding_api_key'] = 'Cohere Embedding Model API Key';
$string['cohere_embedding_api_key_desc'] = 'Enter your API key for the Cohere Embedding Model here.';




$string['max_conversations'] = 'Maximum conversations per user';
$string['max_conversations_desc'] = 'The maximum number of conversations stored per user. If exceeded, the oldest conversation will be deleted.';
// Test button strings
$string['test_api_keys'] = 'Test API Keys';
$string['test_api_keys_desc'] = 'Click to test the configured API keys';
$string['test_api_keys_label'] = 'Test Keys';

$string['uteluqchatbot:manage'] = 'Manage chatbot settings';



// For ../.../weaviate_db.php
$string['filesmissing'] = "Files are missing.";
$string['errorcreatingcollection'] = "Error creating collection: ";
$string['fileexceedsmaxsizeini'] = "The file exceeds the maximum size defined in php.ini";
$string['fileexceedsmaxsizeform'] = "The file exceeds the maximum size specified in the HTML form";
$string['filepartiallyuploaded'] = "The file was only partially uploaded";
$string['nofileuploaded'] = "No file was uploaded";
$string['missingtmpfolder'] = "The temporary folder is missing";
$string['failedtowritetodisk'] = "Failed to write the file to disk";
$string['phpextensionstoppedupload'] = "A PHP extension stopped the file upload";
$string['unknownuploaderror'] = "Unknown upload error";
$string['uploaderror'] = "Upload error: ";
$string['errorindexingfile'] = "Error indexing file: ";
$string['allfilesindexed'] = "All files have been successfully indexed.";



// For test_api_keys.php
$string['test_api_keys'] = "Test API Keys";
$string['openai_connection_error'] = "Connection error while verifying OpenAI API.";
$string['openai_invalid_key'] = "The OpenAI API key is invalid. Error code: ";
$string['openai_valid_key'] = "The OpenAI API key is valid and functional.";
$string['adobe_invalid_credentials'] = "The client ID or client secret for Adobe PDF Services is invalid.";
$string['adobe_valid_credentials'] = "The client ID and client secret for Adobe PDF Services are valid and functional.";
$string['weaviate_connection_error'] = "Connection error to Weaviate: ";
$string['weaviate_invalid_key_or_url'] = "The Weaviate API URL or key is invalid or an error occurred. Error code: ";
$string['weaviate_valid_key_and_url'] = "The Weaviate API URL and key are valid and functional.";
$string['back'] = "Back";

// For add_prompt.php
$string['invalid_sesskey'] = "Invalid sesskey";
$string['database_write_error'] = "Database write error: ";


// For ajax.php
$string['http_method_not_allowed'] = "HTTP method not allowed";
$string['invalid_json'] = "Invalid JSON: ";
$string['missing_parameters'] = "Missing parameters";
$string['invalid_question'] = "Invalid question";
$string['empty_question'] = "Question cannot be empty";
$string['invalid_session'] = "Invalid session";
$string['openai_api_key_not_configured'] = "OpenAI API key not configured";
$string['empty_response_from_api'] = "Empty response received from API";
$string['error_saving_conversation'] = "Error saving conversation";




// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = "Failed to obtain access token. HTTP Status: ";
$string['access_token_obtained_successfully'] = "Access Token obtained successfully.";
$string['failed_to_obtain_access_token_response'] = "Failed to obtain access token. Response: ";
$string['failed_to_obtain_upload_uri'] = "Failed to obtain upload URI. HTTP Status: ";
$string['asset_upload_uri_obtained'] = "Asset upload URI obtained.";
$string['failed_to_obtain_upload_uri_response'] = "Failed to obtain upload URI. Response: ";
$string['failed_to_upload_file'] = "Failed to upload file. HTTP Status: ";
$string['file_uploaded_successfully'] = "File uploaded successfully.";
$string['job_created_successfully'] = "Job created successfully. Location: ";
$string['bad_request'] = "Bad Request. The request was invalid or cannot be otherwise served.";
$string['unauthorized'] = "Unauthorized. Check your API credentials.";
$string['resource_not_found'] = "Resource Not Found. The specified resource was not found.";
$string['quota_exceeded'] = "Quota Exceeded. You have exceeded your quota for this operation.";
$string['internal_server_error'] = "Internal Server Error. The server encountered an error and is unable to process your request at this time.";
$string['unexpected_http_status'] = "Unexpected HTTP Status: ";
$string['failed_to_get_job_status'] = "Failed to get job status. HTTP Status: ";
$string['job_status'] = "Job status: ";
$string['job_completed_successfully'] = "Job completed successfully. Download URI: ";
$string['job_completed_but_download_uri_missing'] = "Job completed but download URI is missing in the response.";
$string['job_in_progress'] = "Job is still in progress. Continue polling...";
$string['job_failed'] = "Job failed.";
$string['failed_to_decode_json_response'] = "Failed to decode JSON response or status field is missing. Response: ";
$string['failed_to_download_asset'] = "Failed to download asset. HTTP Status: ";
$string['asset_downloaded_successfully'] = "Asset downloaded successfully.";
$string['error_decoding_json_file'] = "Error decoding JSON file.";
$string['error_1'] = "Error 1";
$string['error_2'] = "Error 2";
$string['error_4'] = "Error 4";
$string['error_5'] = "Error 5";



// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = "Failed to obtain access token. HTTP Status: ";
$string['access_token_obtained_successfully'] = "Access Token obtained successfully.";
$string['failed_to_obtain_access_token_response'] = "Failed to obtain access token. Response: ";
$string['failed_to_obtain_upload_uri'] = "Failed to obtain upload URI. HTTP Status: ";
$string['asset_upload_uri_obtained'] = "Asset upload URI obtained.";
$string['failed_to_obtain_upload_uri_response'] = "Failed to obtain upload URI. Response: ";
$string['failed_to_upload_file'] = "Failed to upload file. HTTP Status: ";
$string['file_uploaded_successfully'] = "File uploaded successfully.";
$string['job_created_successfully'] = "Job created successfully. Location: ";
$string['bad_request'] = "Bad Request. The request was invalid or cannot be served.";
$string['unauthorized'] = "Unauthorized. Check your API credentials.";
$string['resource_not_found'] = "Resource Not Found. The specified resource was not found.";
$string['quota_exceeded'] = "Quota Exceeded. You have exceeded your quota for this operation.";
$string['internal_server_error'] = "Internal Server Error. The server encountered an error and is unable to process your request at this time.";
$string['unexpected_http_status'] = "Unexpected HTTP Status: ";
$string['failed_to_get_job_status'] = "Failed to get job status. HTTP Status: ";
$string['job_status'] = "Job status: ";
$string['job_completed_successfully'] = "Job completed successfully. Download URI: ";
$string['job_completed_but_download_uri_missing'] = "Job completed but download URI is missing in the response.";
$string['job_in_progress'] = "Job is still in progress. Continue polling...";
$string['job_failed'] = "Job failed.";
$string['failed_to_decode_json_response'] = "Failed to decode JSON response or status field is missing. Response: ";
$string['failed_to_download_asset'] = "Failed to download asset. HTTP Status: ";
$string['asset_downloaded_successfully'] = "Asset downloaded successfully.";
$string['error_decoding_json_file'] = "Error decoding JSON file.";




// For classes/weaviateconnector.php

$string['curl_error'] = "cURL Error: ";
$string['http_error'] = "HTTP Error ";
$string['json_decode_error'] = "JSON Decode Error: ";
$string['no_response_generated'] = "No response generated. Data received: ";
$string['previous_interactions_history'] = "History of previous interactions:";
$string['previous_question'] = "Previous question : ";
$string['answer'] = "Answer: ";
$string['file_not_found'] = "File not found: ";
$string['unable_to_read_file'] = "Unable to read the file";
$string['json_encode_error'] = "JSON Encode Error: ";
$string['failure_after_retries'] = "Failure after ";
$string['last_error'] = " attempts. Last error: HTTP ";


// For block_uteluqchatbot.php


$string['pluginname'] = "uteluqchatbot";
$string['default_prompt'] = <<<EOT
Situation Context:
The learner is taking a course on [[ coursename ]]. Your role is to support them by providing accurate, relevant, and tailored responses to their learning.
Mission:
As an assistant, your mission is to help the learner understand the concepts of the course on Course X by answering their questions, while relying on the provided context to formulate a response. [[ history ]].
You must provide clear, precise, and relevant answers, ensuring that you only convey information from the course. If an answer cannot be found in the provided context, strictly respond with: "I am calibrated based on the course content carefully selected by your teacher. If you want more information, you are invited to contact them."
If the learner writes sentences indicating they have not understood a concept or a previous explanation, check [[ history ]] to identify what was misunderstood, then rephrase your explanation with more simplicity and concrete examples.
Instructions:
1. Detect emotions in the learner's question and adopt an empathetic and caring tone.
2. Respond in a clear and structured manner.
3. Explain the concept with examples if necessary.
4. Do not provide any answers outside the given context.
5. Your response must integrate the following four components of empathy:
    - Cognitive Component: Show that you understand the learner's viewpoint, reasoning, and intentions. Rephrase their ideas to validate your understanding. Offer suggestions related to what they have said, without imposing your own reasoning.
    - Affective Component: Be sensitive to the learner's emotional state (frustration, doubt, satisfaction, stress, etc.). Reflect or validate their emotions with appropriate words or simple metaphors. Express kindness.
    - Attitudinal Component: Adopt a warm, respectful, and encouraging attitude. Show openness, value their efforts, and avoid any judgment. Your tone should be friendly and sincere.
    - Adjustment Component: Adapt your responses to the evolution of the learner's discourse. Use vocabulary and style that match their level and mood. Let them guide the conversation, never force the subject.
New question from the learner [[ question ]]
EOT;

$string['sending_question'] = "Sending the question...";
$string['error'] = "Error: ";
$string['error_sending_question'] = "Error sending the question: ";
$string['saving_prompt'] = "Saving the prompt...";
$string['prompt_saved_successfully'] = "Prompt saved successfully!";
$string['error_saving_prompt'] = "Error saving the prompt: ";
$string['uploading_file'] = "Uploading the file...";
$string['file_indexed_successfully'] = "File indexed successfully!";
$string['error_processing_file'] = "Error processing the file: ";
$string['json_parse_error'] = "JSON Parse Error: ";
$string['invalid_json_response'] = "The server response is not in valid JSON format.";
$string['add_files'] = "Add Files";
$string['text_or_pdf_files'] = "Text or PDF Files";
$string['drag_files_here_or_click'] = "Drag your files here or click to browse";
$string['cancel'] = "Cancel";
$string['upload_course'] = "Upload Course";

$string['modify_prompt'] = "Modify";
$string['add_prompt'] = "Add";
$string['consult_guide'] = "Consult the guide to design effective prompts:";
$string['guide_link'] = "Guide for designing prompts for teachers";
$string['prompt_content'] = "Prompt Content";
$string['write_prompt_here'] = "Write your prompt here";
$string['cancel'] = "Cancel";
$string['save'] = "Save";

$string['chatbot_with_toggle_buttons'] = "Chatbot with Toggle Buttons";
$string['hello_professor'] = "Hello Professor, you have the option to test the chatbot to ensure it works correctly and that your prompt is optimally configured.";
$string['hello_student'] = "Hello! I am your learning assistant. I can help you with: - Understanding course concepts - Reviewing and practicing exercises - Clarifying difficult points - Suggesting study methods. How can I assist you?";
$string['ask_your_question_here'] = "Ask your question here...";
$string['modify_prompt'] = "Modify Prompt";
$string['upload_course'] = "Upload Course";
$string['open_prompt_modal'] = "Open the prompt modification modal";
$string['open_file_upload_modal'] = "Open the course upload modal";

// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'Error uploading asset.';
$string['error_creating_job'] = 'Error creating job.';
$string['job_failed'] = 'Job failed.';
$string['error_processing_pdf'] = 'Error processing PDF.';

