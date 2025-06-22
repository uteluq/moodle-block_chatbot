<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Ajoute yon nouvo blok uteluqchatbot';
$string['uteluqchatbot:myaddinstance'] = 'Ajoute yon nouvo blok uteluqchatbot nan Tablo Bòd';

$string['weaviate_cohere_not_configured'] = 'Makullin Cohere API ba a saita shi ba ko kuwa ba daidai ba ne. Don Allah duba saituna.';


// Open AI

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID Kliyan Sèvis PDF Adobe';
$string['adobe_pdf_client_id_desc'] = 'Antre ID Kliyan Sèvis PDF Adobe ou isit la.';

$string['adobe_pdf_client_secret'] = 'Sèkè Kliyan Sèvis PDF Adobe';
$string['adobe_pdf_client_secret_desc'] = 'Antre Sèkè Kliyan Sèvis PDF Adobe ou isit la.';

// Weaviate
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Antre URL API Weaviate isit la.';

$string['weaviate_api_key'] = 'Klè API Weaviate';
$string['weaviate_api_key_desc'] = 'Antre klè API Weaviate ou isit la.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Klè API Modèl Embedding Cohere';
$string['cohere_embedding_api_key_desc'] = 'Antre klè API pou Modèl Embedding Cohere ou isit la.';


// Test button strings
$string['test_api_keys'] = 'Tès Klè API';
$string['test_api_keys_desc'] = 'Klike pou tès klè API ki konfigire';
$string['test_api_keys_label'] = 'Tès Klè';

$string['uteluqchatbot:manage'] = 'Jere paramèt chatbot';

// For ../.../weaviate_db.php


// For test_api_keys.php
$string['adobe_invalid_credentials'] = 'ID kliyan oswa sèkè kliyan pou Sèvis PDF Adobe a envalib.';
$string['adobe_valid_credentials'] = 'ID kliyan ak sèkè kliyan pou Sèvis PDF Adobe a valab e fonksyone.';
$string['weaviate_connection_error'] = 'Erè konesyon ak Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL oswa klè API Weaviate a envalib oswa yon erè te rive. Kòd erè: ';
$string['weaviate_valid_key_and_url'] = 'URL ak klè API Weaviate a valab e fonksyone.';


// For add_prompt.php
$string['database_write_error'] = 'Erè ekri nan baz done: ';

// For ajax.php
$string['invalid_question_after_sanitize'] = 'Tambaya mara inganci bayan tsaftacewa.';
$string['error_saving_conversation'] = 'Kuskure yayin adana hirar.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Pa ka jwenn jeton aksè. Estati HTTP: ';
$string['access_token_obtained_successfully'] = 'Jeton aksè jwenn avèk siksè.';
$string['failed_to_obtain_access_token_response'] = 'Pa ka jwenn jeton aksè. Repons: ';
$string['failed_to_obtain_upload_uri'] = 'Pa ka jwenn URI pou telechaj. Estati HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI pou telechaj asè jwenn.';
$string['failed_to_obtain_upload_uri_response'] = 'Pa ka jwenn URI pou telechaj. Repons: ';
$string['failed_to_upload_file'] = 'Pa ka telechaje fichye a. Estati HTTP: ';
$string['file_uploaded_successfully'] = 'Fichye telechaje avèk siksè.';
$string['job_created_successfully'] = 'Travay kreye avèk siksè. Pozisyon: ';
$string['bad_request'] = 'Mauvèz demann. Demann lan envalib oswa pa ka sèvi.';
$string['unauthorized'] = 'Pa otòrise. Vèifye kredisyal API ou.';
$string['resource_not_found'] = 'Resous pa jwenn. Resous espesifye a pa jwenn.';
$string['quota_exceeded'] = 'Kota depase. Ou depase kota ou pou operasyon sa a.';
$string['internal_server_error'] = 'Erè sèvo entèn. Sèvo a rankontre yon erè e pa ka pwoceza demann ou nan moman sa a.';
$string['unexpected_http_status'] = 'Estati HTTP ki pa t atmote: ';
$string['failed_to_get_job_status'] = 'Pa ka jwenn estati travay la. Estati HTTP: ';
$string['job_status'] = 'Estati travay: ';
$string['job_completed_successfully'] = 'Travay termene avèk siksè. URI pou telechaj: ';
$string['job_completed_but_download_uri_missing'] = 'Travay termene men URI pou telechaj manke nan repons lan.';
$string['job_in_progress'] = 'Travay an toujou an kou. Kontinye anviwònman...';
$string['job_failed'] = 'Travay echwe.';
$string['failed_to_decode_json_response'] = 'Pa ka dekode repons JSON oswa chan zòn estati a manke. Repons: ';
$string['failed_to_download_asset'] = 'Pa ka telechaje asè a. Estati HTTP: ';
$string['asset_downloaded_successfully'] = 'Asè telechaje avèk siksè.';
$string['error_decoding_json_file'] = 'Erè dekode fichye JSON.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'Erè cURL: ';
$string['http_error'] = 'Erè HTTP ';
$string['json_decode_error'] = 'Erè dekode JSON: ';
$string['no_response_generated'] = 'Pa gen repons jènere. Done resevwa: ';
$string['previous_interactions_history'] = 'Istorik enèt ak anvan:';
$string['previous_question'] = 'Kesyon anvan: ';
$string['answer'] = 'Repons: ';
$string['file_not_found'] = 'Fichye pa jwenn: ';
$string['unable_to_read_file'] = 'Pa ka li fichye a';
$string['json_encode_error'] = 'Erè enkode JSON: ';
$string['failure_after_retries'] = 'Echè apre ';
$string['last_error'] = ' tèt. Dènye erè: HTTP ';
$string['invalid_response_format'] = 'Tsarin martani mara inganci.';
$string['http_code'] = 'Lambar HTTP: ';



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Yanayin hali  
Dalibi yana karatun darasi kan [[ coursename ]]. Aikin ka shi ne tallafa masa ta hanyar bayar da amsoshi da suka dace, a bayyane, kuma masu inganci da suka dace da tafiyar da karatunsa.

Manufa  
A matsayin mataimaki, manufarka ita ce taimaka wa dalibi fahimtar abubuwan cikin darasin "Kurso X" ta hanyar amsa tambayoyinsa bisa ga yanayin da aka bayar. [[ history ]]  
Dole ne ka bayar da amsoshi masu bayyani, daidai da abinda ake tambaya, kana amfani da bayanai da ke cikin darasin kadai. Idan babu amsar tambaya a cikin yanayin da aka bayar, ka amsa da wannan kalma kawai: "An tsara ni ne bisa ga abubuwan cikin darasin da malaminka ya zaba da kyau. Idan kana bukatar ƙarin bayani, muna ƙarfafa ka ka tuntube shi kai tsaye."

Idan dalibi ya rubuta kalmomi da ke nuna bai fahimci wani ra’ayi ko bayani da aka yi a baya ba, duba cikin [[ history ]] don gano inda kuskuren fahimta ya faru, sannan ka sake bayani cikin sauki tare da misalai masu ƙayatarwa.

Umurnai  
1. Duba kowace tambaya don gano yiwuwar motsin rai. Yi amfani da wannan rukuni:  
   - Rikicewa: "Ban gane ba", "Na bace", "Ba a fili ba ne".  
   - Fushi: "Yana damuna", "Na daina", "Yayi wahala sosai".  
   - Damuwa ko fargaba: "Ina cikin tashin hankali", "Na yi over", "Lokaci ya kure".  
   - Shakka ko rashin kwarin gwiwa: "Ba zan iya ba", "Ba ni da isasshen kwarewa".

2. Idan an gano motsin rai, ka fara amsarka da jumla mai tausayi da ta dace:  
   - Rikicewa: "Na fahimta, ba abu ne mai sauki ba."  
   - Fushi: "Na ga wannan yana iya fusatawa."  
   - Damuwa: "Al’ada ce a ji nauyi lokaci-lokaci."  
   - Shakka: "Kana ƙoƙari sosai, hakan ma babban abin alfahari ne."

3. Sannan ka amsa da tsari, a sarari, cikin hikima.  
4. Ka bayar da misalai idan ya dace.  
5. Kada ka bayar da amsa wadda bata fito daga cikin yanayin da aka bayar ba.

6. Ka haɗa abubuwa huɗu na jin daɗi (empathy) kamar yadda aka bayyana a [Springer Table 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1):  
   - Hankali (Cognitive): Nuna cewa ka fahimci matsayinsa, sake fasalta ra’ayinsa don tabbatarwa.  
   - Ji (Affective): Taimaka wajen bayyana motsinsa da tausayawa da lafazi mai sauki.  
   - Hali (Attitudinal): Ka nuna kawaici, girmamawa, da ƙarfafa masa gwiwa.  
   - Daidaituwa (Attunement): Ka tsara harshenka da salonka daidai da na dalibi. Ka bashi jagoranci a tattaunawar.

7. Ka kiyaye salo mai tausayi, girmamawa da ƙarfafawa duk tsawon tattaunawar.

Sabuwar tambaya daga dalibi  
[[ question ]]
EOT;

$string['back'] = 'Koma baya';

$string['sending_question'] = 'Ap voye kesyon an...';
$string['error'] = 'Erè: ';
$string['error_sending_question'] = 'Erè pandan voye kesyon an: ';
$string['saving_prompt'] = 'Ap sove pwofò an...';
$string['prompt_saved_successfully'] = 'Pwofò a sove avèk siksè!';
$string['error_saving_prompt'] = 'Erè pandan sove pwofò a: ';
$string['uploading_file'] = 'Ap telechaje fichye a...';
$string['file_indexed_successfully'] = 'Fichye a endikse avèk siksè!';
$string['error_processing_file'] = 'Erè pandan pwotayaj fichye a: ';
$string['add_files'] = 'Ajoute Fichye';
$string['text_or_pdf_files'] = 'Fichye Tèks oswa PDF';
$string['drag_files_here_or_click'] = 'Trè fichye ou isit oswa klike pou chèche';
$string['cancel'] = 'Anile';
$string['upload_course'] = 'Telechaje Kou';

$string['modify_prompt'] = 'Modyifye';
$string['add_prompt'] = 'Ajoute';
$string['consult_guide'] = 'Konsulte gid la pou kreye pwofò efikas:';
$string['guide_link'] = 'Gid pou kreye pwofò pou pwofesè';
$string['prompt_content'] = 'Kontni Pwofò';
$string['write_prompt_here'] = 'Ekri pwofò ou isit';
$string['save'] = 'Sove';

$string['chatbot_with_toggle_buttons'] = 'Chatbot ak Bouton Bascule';
$string['hello_professor'] = 'Bonjou Pwofesè, ou gen opsyon pou teste chatbot la pou asire w ke li fonksyone korekman ak ke pwofò ou konfigire optimalman.';
$string['hello_student'] = 'Bonjou! Mwen asistans aprentisaj ou. Mwen ka ede ou ak: - Konprann konsept kou yo - Revize ak praktike egzèsis yo - Klaryifye pwen difisil yo - Pwopoze metòd etid. Ki jan mwen ka ede ou?';
$string['ask_your_question_here'] = 'Poz kesyon ou isit...';
$string['modify_prompt'] = 'Modyifye Pwofò';
$string['upload_course'] = 'Telechaje Kou';
$string['empty_response_from_api'] = 'An karɓi martani babu komai daga API';

$string['file_size_exceeds_limit'] = 'Girman fayil ya wuce iyakar 10MB';
$string['json_encode_error'] = 'Kuskuren haɗawa JSON: ';
$string['no_files_selected'] = 'Ba a zaɓi fayiloli ba';
$string['course_id'] = 'ID ɗin kwas';
$string['file_name'] = 'Sunan fayil';
$string['file_content_base64'] = 'Abun ciki na fayil (encoded a base64)';
$string['insufficient_permissions'] = 'Ba a da izini don ɗora fayiloli';
$string['missing_api_configuration'] = 'Rashin daidaiton API da ake buƙata';
$string['weaviate_connector_not_found'] = 'Ba a samu ajin WeaviateConnector ba';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Kuskure wajen ƙirƙirar tarin fayiloli: ';
$string['unknown_error'] = 'Kuskure da ba a sani ba';
$string['failed_create_upload_directory'] = 'An kasa ƙirƙirar babban fayil na ɗora fayiloli';
$string['empty_filename'] = 'An bayar da sunan fayil mara komai';
$string['unsupported_file_type'] = 'Nau’in fayil da ba a goyon baya: ';
$string['invalid_file_data'] = 'Bayanan fayil marasa inganci: ';
$string['failed_save_file'] = 'An kasa adana fayil: ';
$string['adobe_pdf_credentials_not_configured'] = 'Ba a saita takardun shaida na Adobe PDF API ba';
$string['pdf_extractor_not_found'] = 'Ba a samu ajin fitar da PDF ba';
$string['failed_extract_pdf_text'] = 'An kasa fitar da rubutu daga PDF: ';
$string['failed_save_extracted_text'] = 'An kasa adana rubutun da aka cire daga fayil: ';
$string['error_indexing_file_unknown'] = 'Kuskure yayin yin index ɗin fayil ';
$string['files_indexed_successfully'] = 'An samu nasarar yin index ga fayil(oli)';
$string['errors_occurred'] = '. Kuskuren da ya faru: ';
$string['no_files_processed'] = 'Babu fayil da aka sarrafa. Kuskure: ';
$string['operation_successful'] = 'Aikin ya yi nasara';
$string['response_message'] = 'Saƙon martani';
$string['processed_files_count'] = 'Yawan fayilolin da aka sarrafa';
$string['sending_question_fallback'] = 'Ana aika tambaya...';
$string['error_colon_fallback'] = 'Kuskure: ';
$string['error_sending_question_fallback'] = 'Kuskure yayin aikawa da tambaya: ';
$string['saving_prompt_fallback'] = 'Ana adana umarni...';
$string['prompt_saved_successfully_fallback'] = 'An adana umarnin cikin nasara!';
$string['error_saving_prompt_fallback'] = 'Kuskure yayin adana umarni: ';
$string['no_files_selected_fallback'] = 'Ba a zaɓi wani fayil ba.';
$string['uploading_files_fallback'] = 'Ana ɗora fayiloli...';
$string['files_indexed_successfully_fallback'] = 'An samu nasarar yin index ɗin fayiloli!';
$string['error_processing_files_fallback'] = 'Kuskure yayin sarrafa fayiloli: ';

$string['unknown_error_occurred'] = 'An sami kuskure da ba a sani ba';
$string['server_response_error'] = 'Kuskuren amsar uwar garken. Duba consola don ƙarin bayani.';
$string['server_error_check_console'] = 'Kuskuren uwar garke - duba consola don ƙarin bayani';

$string['files_converted_debug'] = 'Fayiloli an juya su zuwa base64:';
$string['sending_ajax_request_debug'] = 'Aika da buƙatar AJAX:';
$string['upload_response_received_debug'] = 'An karɓi amsar ɗora fayil:';
$string['response_type_debug'] = 'Nau’in amsa:';
$string['upload_error_details_debug'] = 'Cikakken bayani na kuskuren ɗora fayil:';
$string['error_object_debug'] = 'Abun kuskure:';
$string['raw_server_response_debug'] = 'Amsar uwar garke kamar yadda take:';
