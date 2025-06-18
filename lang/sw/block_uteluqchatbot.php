<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & Université GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Ongeza kichaguzi kipya cha chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Ongeza kichaguzi kipya cha chatbot kwenye Ukurasa wa Mwanzo';

$string['weaviate_cohere_not_configured'] = 'Funguo ya API ya Cohere haijasanidiwa au si sahihi. Tafadhali angalia mipangilio.';


// Open AI
$string['openai_api_key'] = 'Ufunguo wa API wa OpenAI';
$string['openai_api_key_desc'] = 'Ingiza ufunguo wako wa API wa OpenAI hapa.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Nambari ya Mteja wa Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Ingiza nambari yako ya mteja wa Adobe PDF Services hapa.';

$string['adobe_pdf_client_secret'] = 'Siri ya Mteja wa Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Ingiza siri yako ya mteja wa Adobe PDF Services hapa.';

// Weaviate
$string['weaviate_api_url'] = 'URL ya API ya Weaviate';
$string['weaviate_api_url_desc'] = 'Ingiza URL ya API ya Weaviate hapa.';

$string['weaviate_api_key'] = 'Ufunguo wa API wa Weaviate';
$string['weaviate_api_key_desc'] = 'Ingiza ufunguo wako wa API wa Weaviate hapa.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Ufunguo wa API wa Modeli ya Ualika wa Cohere';
$string['cohere_embedding_api_key_desc'] = 'Ingiza ufunguo wako wa API wa Modeli ya Ualika wa Cohere hapa.';

$string['max_conversations'] = 'Idadi ya makusanyiko ya juu kwa mtumiaji';
$string['max_conversations_desc'] = 'Idadi ya makusanyiko yenye kuwekwa kwa mtumiaji. Ikiwepo, makusanyiko ya zamani yatahkiwisha.';

// Test button strings
$string['test_api_keys'] = 'Jaribu Ufunguo wa API';
$string['test_api_keys_desc'] = 'Bonyeza ili kujaribu ufunguo wa API ulioagizwa';
$string['test_api_keys_label'] = 'Jaribu Ufunguo';

$string['uteluqchatbot:manage'] = 'Bainisha mipangilio ya chatbot';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Faili zimepotea.';
$string['errorcreatingcollection'] = 'Hitilafu yakatokea wakati wa kunda makusanyiko: ';
$string['fileexceedsmaxsizeini'] = 'Faili inaongezeka ukubwa wake kuliko ulioagizwa katika php.ini';
$string['fileexceedsmaxsizeform'] = 'Faili inaongezeka ukubwa wake kuliko ulioagizwa katika fomu ya HTML';
$string['filepartiallyuploaded'] = 'Faili limeongezwa sehemu tu';
$string['nofileuploaded'] = 'Hakuna faili lililoongezwa';
$string['missingtmpfolder'] = 'Tofauti ya mudati inapotea';
$string['failedtowritetodisk'] = 'Kupoteza kuweka faili kwenye diski';
$string['phpextensionstoppedupload'] = 'Ukurasa wa msingi wa PHP umewazuia kuweka faili';
$string['unknownuploaderror'] = 'Hitilafu isiyojulikana ya kuweka';
$string['uploaderror'] = 'Hitilafu ya kuweka: ';
$string['errorindexingfile'] = 'Hitilafu yakatokea wakati wa kuweka faili kwenye ukurasa: ';
$string['allfilesindexed'] = 'Faili zote zimewekwa kwenye ukurasa kwa mafanikio.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Hitilafu ya uhusiano uliotokea wakati wa kuthibitisha API ya OpenAI.';
$string['openai_invalid_key'] = 'Ufunguo wa API wa OpenAI si sahihi. Namba ya hitilafu: ';
$string['openai_valid_key'] = 'Ufunguo wa API wa OpenAI ni sahihi na inaendelea.';
$string['adobe_invalid_credentials'] = 'Nambari ya mteja au siri ya mteja ya Adobe PDF Services si sahihi.';
$string['adobe_valid_credentials'] = 'Nambari ya mteja na siri ya mteja ya Adobe PDF Services ni sahihi na inaendelea.';
$string['weaviate_connection_error'] = 'Hitilafu ya uhusiano na Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL au ufunguo wa API wa Weaviate si sahihi au kuna hitilafu. Namba ya hitilafu: ';
$string['weaviate_valid_key_and_url'] = 'URL na ufunguo wa API wa Weaviate ni sahihi na inaendelea.';
$string['back'] = 'Nyuma';

// For add_prompt.php
$string['invalid_sesskey'] = 'Ufunguo wa kuweka si sahihi';
$string['database_write_error'] = 'Hitilafu ya kuweka kwenye makumbusho: ';

// For ajax.php
$string['http_method_not_allowed'] = 'Mbinu ya HTTP haikruhusiwe';
$string['invalid_json'] = 'JSON isiyo sahihi: ';
$string['missing_parameters'] = 'Paramita zimepotea';
$string['invalid_question'] = 'Swali isiyo sahihi';
$string['empty_question'] = 'Swali haikupasi kuwa tupu';
$string['invalid_session'] = 'Kukutana isiyo sahihi';
$string['openai_api_key_not_configured'] = 'Ufunguo wa API wa OpenAI hajagizwa';
$string['empty_response_from_api'] = 'Jibu la tupu limepokelewa kutoka API';
$string['error_saving_conversation'] = 'Hitilafu yakatokea wakati wa kuhifadhi makusanyiko';
$string['invalid_question_after_sanitize'] = 'Swali batili baada ya usafi.';
$string['empty_string_as_answer'] = 'Mstari tupu umepokelewa kama jibu.';
$string['database_error_saving_conversation'] = 'Kosa la hifadhidata wakati wa kuokota mazungumzo: ';
$string['error_saving_conversation'] = 'Kosa wakati wa kuokota mazungumzo';
$string['error_reading_input'] = 'Kosa wakati wa kusoma data.';
$string['generic_server_error'] = 'Kosa jenerali ya seva.';
$string['invalid_course_id'] = 'Kitambulisho cha kozi batili.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Kupoteza kuhifadhi ufunguo wa kuweka. Hali ya HTTP: ';
$string['access_token_obtained_successfully'] = 'Ufunguo wa kuweka ulihifadhiwa kwa mafanikio.';
$string['failed_to_obtain_access_token_response'] = 'Kupoteza kuhifadhi ufunguo wa kuweka. Jibu: ';
$string['failed_to_obtain_upload_uri'] = 'Kupoteza kuhifadhi URI ya kuweka. Hali ya HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI ya kuweka kipato kimehifadhiwa.';
$string['failed_to_obtain_upload_uri_response'] = 'Kupoteza kuhifadhi URI ya kuweka. Jibu: ';
$string['failed_to_upload_file'] = 'Kupoteza kuweka faili. Hali ya HTTP: ';
$string['file_uploaded_successfully'] = 'Faili limewekwa kwa mafanikio.';
$string['job_created_successfully'] = 'Kaz kazi limeundwa kwa mafanikio. Mahali: ';
$string['bad_request'] = 'Ombi mbaya. Ombi haikruhusiwe au haikuwezi kushughulikiwa.';
$string['unauthorized'] = 'Bila ruhusa. Thakita ufunguo wako wa API.';
$string['resource_not_found'] = 'Rasilimali haikupatikana. Rasilimali ulioagizwa haikupatikana.';
$string['quota_exceeded'] = 'Kiwango cha juu kimeongezeka. Umeongezeka kiwango chako cha juu kwa kazi hii.';
$string['internal_server_error'] = 'Hitilafu ya ndani ya seva. Seva imepata hitilafu na haikuwezi kushughulikia ombi lako sasa.';
$string['unexpected_http_status'] = 'Hali ya HTTP isiyotazamka: ';
$string['failed_to_get_job_status'] = 'Kupoteza kuhifadhi hali ya kazi. Hali ya HTTP: ';
$string['job_status'] = 'Hali ya kazi: ';
$string['job_completed_successfully'] = 'Kazi imekwisha kwa mafanikio. URI ya kupakua: ';
$string['job_completed_but_download_uri_missing'] = 'Kazi imekwisha lakini URI ya kupakua inapotea katika jibu.';
$string['job_in_progress'] = 'Kazi bado inaendelea. Endelea kushiriki...';
$string['job_failed'] = 'Kazi imekosa.';
$string['failed_to_decode_json_response'] = 'Kupoteza kufungua jibu la JSON au sehemu ya hali inapotea. Jibu: ';
$string['failed_to_download_asset'] = 'Kupoteza kupakua kipato. Hali ya HTTP: ';
$string['asset_downloaded_successfully'] = 'Kipato kimepakuliwa kwa mafanikio.';
$string['error_decoding_json_file'] = 'Hitilafu yakatokea wakati wa kufungua faili ya JSON.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'Hitilafu ya cURL: ';
$string['http_error'] = 'Hitilafu ya HTTP ';
$string['json_decode_error'] = 'Hitilafu ya kufungua JSON: ';
$string['no_response_generated'] = 'Hakuna jibu lililotoa. Data lililopatikana: ';
$string['previous_interactions_history'] = 'Historia ya mawasiliano ya zamani:';
$string['previous_question'] = 'Swali la zamani: ';
$string['answer'] = 'Jibu: ';
$string['file_not_found'] = 'Faili haikupatikana: ';
$string['unable_to_read_file'] = 'Haikuwezi kusoma faili';
$string['json_encode_error'] = 'Hitilafu ya kuweka JSON: ';
$string['failure_after_retries'] = 'Kupoteza baada ya ';
$string['last_error'] = ' majaribio. Hitilafu ya mwisho: HTTP ';
$string['invalid_response_format'] = 'Fomati batili ya jibu.';
$string['http_code'] = 'Msimbo wa HTTP: ';



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Mazingira ya Mwadamu:
Mwanafunzi anafanya masomo ya [[ coursename ]]. Kazi yako ni kumshelp kwa kutoa majibu yanayo sahihi, yanayo faida na yenye kutegemea kwa masomo yake.
Kaz kazi:
Kama msaada, kazi yako ni kumshelp mwanafunzi kuelewa mada za masomo ya X kwa kutoa majibu kwa maswali yake, wakati mwingi wa kutumia mazingira ulioandaliwa ili kutoa jibu. [[ historia ]].
Unapaswa kutoa majibu yanayo sahihi, yanayo faida na yenye kutegemea, kutoa habari tu ya masomo. Ikiwa majibu hayawezi kupatikana katika mazingira ulioandaliwa, jibu kwa ujasiri: "Nimeagizwa kwa mada ya masomo uliochaguliwa kwa makini na mwalimu wako. Ikiwa unataka habari zaidi, unakaribishwa kuwasiliana nao."
Ikiwa mwanafunzi anachukua maneno yanayoonyesha kwamba hawezi kuelewa mada au maelezo ya zamani, angalia [[ historia ]] ili kuelewa kwamba kuna ufisadi, kisha ufungue tena maelezo yako kwa usahihi na mifano ya kweli.
Maelekezo:
1. Kambia hisia katika swali la mwanafunzi na chagua hisia inayoongezeka na kusaidia.
2. Jibu kwa njia inayo sahihi na inayoandaliwa.
3. Eleza mada kwa mifano, ikiwa ni lazima.
4. Usitoe majibu ya nje ya mazingira ulioandaliwa.
5. Jibu lako lazima lialike katika sehemu nne za hisia:
   - Sehemu ya Kielelezo: Onyesha kwamba unuelewa mwangaza, maelezo na makusanyiko ya mwanafunzi. Fungua tena mawazo yake ili kuthibitisha uelewa wako. Toa mashwara yanayoendelea kwa aliyoelezea, bila kuweka maelezo yako.
   - Sehemu ya Hisia: Kuwa na hisia kwa hali ya hisia ya mwanafunzi (kufanya, kushindwa, kufurahia, kushindwa, n.k.). Onyesha au thibitisha hisia zake kwa maneno au mifano ya rahisi. Toa furaha.
   - Sehemu ya Utawala: Chagua utawala unaoongezeka, unaoheshimu na unaoendelea. Onyesha ufunguzi, thamia kazi zake na ijivunie. Utawala wako unapaswa kuwa wa kusaidia na wa kweli.
   - Sehemu ya Kubadilisha: Badilisha majibu yako kwa kuwepo kwa mawasiliano ya mwanafunzi. Tumia lugha na utawala unaoendelea kwa kiwango chake na hisia zake. Mwachuze kuwasiliana, usiwaze mada.
Swali jipya la mwanafunzi [[ question ]]
EOT;

$string['sending_question'] = 'Kutoa swali...';
$string['error'] = 'Hitilafu: ';
$string['error_sending_question'] = 'Hitilafu yakatokea wakati wa kutoa swali: ';
$string['saving_prompt'] = 'Kuhifadhi kutoa...';
$string['prompt_saved_successfully'] = 'Kutoa kimehifadhiwa kwa mafanikio!';
$string['error_saving_prompt'] = 'Hitilafu yakatokea wakati wa kuhifadhi kutoa: ';
$string['uploading_file'] = 'Kuweka faili...';
$string['file_indexed_successfully'] = 'Faili limewekwa kwenye ukurasa kwa mafanikio!';
$string['error_processing_file'] = 'Hitilafu yakatokea wakati wa kushughulikia faili: ';
$string['json_parse_error'] = 'Hitilafu ya kufungua JSON: ';
$string['invalid_json_response'] = 'Jibu la seva haiko katika muundo wa JSON.';
$string['add_files'] = 'Ongeza Faili';
$string['text_or_pdf_files'] = 'Faili za Matini au PDF';
$string['drag_files_here_or_click'] = 'Leta faili zako hapa au bonyeza ili kufungua';
$string['cancel'] = 'Katiza';
$string['upload_course'] = 'Pakia Masomo';

$string['modify_prompt'] = 'Badilisha';
$string['add_prompt'] = 'Ongeza';
$string['consult_guide'] = 'Tafuta mwongozo wa kutoa maelezo ya kutosha:';
$string['guide_link'] = 'Mwongozo wa kutoa maelezo kwa walimu';
$string['prompt_content'] = 'Yaliyoandaliwa ya Kutoa';
$string['write_prompt_here'] = 'Andika kutoa kwako hapa';
$string['save'] = 'Hifadhi';

$string['chatbot_with_toggle_buttons'] = 'Chatbot na Vituo vya Kubadilisha';
$string['hello_professor'] = 'Habari Mwalimu, una nafasi ya kujaribu chatbot ili kuthibitisha kwamba inaendelea kwa ufanisi na kwamba kutoa kwako kimeagizwa kwa ufanisi.';
$string['hello_student'] = 'Habari! Mimi ni msaada wako wa masomo. Ninaweza kukuza katika: - Kuelewa mada ya masomo - Kuthibitisha na kufanya kazi za masomo - Kutoa maelezo ya sehemu ambazo ni chungu - Kutoa njia za kujifunza. Ninaweza kukuza jinsi gani?';
$string['ask_your_question_here'] = 'Tafuta swali lako hapa...';
$string['modify_prompt'] = 'Badilisha Kutoa';
$string['upload_course'] = 'Pakia Masomo';
$string['open_prompt_modal'] = 'Fungua dirisha ya kubadilisha kutoa';
$string['open_file_upload_modal'] = 'Fungua dirisha ya kuweka masomo';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Kosa katika kupakia rasilimali.';
$string['error_creating_job'] = 'Kosa katika kuunda kazi.';
$string['job_failed'] = 'Kazi imeshindwa.';
$string['error_processing_pdf'] = 'Kosa katika kutenda PDF.';

$string['headers_already_sent'] = 'Kichwa kimepelekwa tayari.';
$string['failed_to_start_output_buffer'] = 'Imeshindwa kuanza buffer ya matokeo.';
$string['server_error_output_buffer_failed'] = 'Kosa la seva: Buffer ya matokeo imeshindwa.';
$string['answer_not_utf8'] = 'Jibu siyo katika UTF-8.';
$string['no_answer_or_error_field'] = 'Hakuna sehemu ya jibu au kosa.';
$string['json_encode_error'] = 'Kosa la kuweka JSON: ';
$string['server_error_json_encode_failed'] = 'Kosa la seva: Kuweka JSON imeshindwa.';
$string['empty_response_from_api'] = 'Jibu tupu kutoka API.';
$string['empty_string_as_answer'] = 'Mstari tupu umepokelewa kama jibu.';
$string['database_error_saving_conversation'] = 'Kosa la hifadhidata wakati wa kuokota mazungumzo: ';
$string['general_exception'] = 'Kosa la jumla: ';
