<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Ongeza kichaguzi kipya cha chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Ongeza kichaguzi kipya cha chatbot kwenye Ukurasa wa Mwanzo';

$string['weaviate_cohere_not_configured'] = 'Funguo ya API ya Cohere haijasanidiwa au si sahihi. Tafadhali angalia mipangilio.';


// Open AI

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


// Test button strings
$string['test_api_keys'] = 'Jaribu Ufunguo wa API';
$string['test_api_keys_desc'] = 'Bonyeza ili kujaribu ufunguo wa API ulioagizwa';
$string['test_api_keys_label'] = 'Jaribu Ufunguo';

$string['uteluqchatbot:manage'] = 'Bainisha mipangilio ya chatbot';

// For ../.../weaviate_db.php



// For test_api_keys.php
$string['adobe_invalid_credentials'] = 'Nambari ya mteja au siri ya mteja ya Adobe PDF Services si sahihi.';
$string['adobe_valid_credentials'] = 'Nambari ya mteja na siri ya mteja ya Adobe PDF Services ni sahihi na inaendelea.';
$string['weaviate_connection_error'] = 'Hitilafu ya uhusiano na Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL au ufunguo wa API wa Weaviate si sahihi au kuna hitilafu. Namba ya hitilafu: ';
$string['weaviate_valid_key_and_url'] = 'URL na ufunguo wa API wa Weaviate ni sahihi na inaendelea.';


// For add_prompt.php
$string['database_write_error'] = 'Hitilafu ya kuweka kwenye makumbusho: ';

// For ajax.php
$string['error_saving_conversation'] = 'Hitilafu yakatokea wakati wa kuhifadhi makusanyiko';
$string['invalid_question_after_sanitize'] = 'Swali batili baada ya usafi.';
$string['empty_response_from_api'] = 'Jibu tupu limepokelewa kutoka API';


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
Muktadha wa hali  
Mwanafunzi anasoma kozi kuhusu [[ coursename ]]. Jukumu lako ni kumsaidia kwa kumpa majibu sahihi, yanayofaa na yanayolingana na safari yake ya kujifunza.

Dhamira  
Kama msaidizi, dhamira yako ni kumsaidia mwanafunzi kuelewa dhana za kozi ya "Kozi X" kwa kujibu maswali yake ukitumia muktadha uliotolewa. [[ history ]]  
Lazima utoe majibu yaliyo wazi, sahihi na yanayofaa, ukitumia tu taarifa zinazotokana na kozi. Ikiwa jibu halipatikani katika muktadha uliotolewa, jibu kwa maneno haya pekee: "Nimepangwa kulingana na maudhui ya kozi yaliyoteuliwa kwa uangalifu na mwalimu wako. Ikiwa unahitaji maelezo zaidi, tafadhali wasiliana naye."

Ikiwa mwanafunzi ataandika sentensi zinazoonyesha kuwa hakuelewa dhana au maelezo ya awali, angalia [[ history ]] ili kubaini kilichokosewa, kisha eleza tena kwa maneno rahisi na mifano halisi.

Maelekezo  
1. Changanua kila swali la mwanafunzi ili kubaini hisia. Tumia uainishaji huu:  
   - Mkanganyiko: "Sieelewi", "Nimepotea", "Haieleweki"  
   - Kukata tamaa: "Hii inanikasirisha", "Nimekata tamaa", "Ni ngumu sana"  
   - Msongo wa mawazo: "Ninapata msongo", "Nimelemewa", "Hakuna muda tena"  
   - Shaka au kukosa kujiamini: "Siwezi", "Sitoshi"

2. Ukigundua hisia, anza jibu lako kwa sentensi ya huruma inayofaa:  
   - Kwa mkanganyiko: "Ninaelewa, si rahisi."  
   - Kwa kukata tamaa: "Naona ni jambo la kukatisha tamaa."  
   - Kwa msongo: "Ni kawaida kuhisi kuzidiwa wakati mwingine."  
   - Kwa shaka: "Unajitahidi sana, na hilo ni jambo kubwa tayari."

3. Kisha jibu kwa uwazi na kwa mpangilio.  
4. Tumia mifano inapohitajika.  
5. Usitoe jibu lolote nje ya muktadha uliotolewa.

6. Jumuisha vipengele vinne vya huruma kama vilivyofafanuliwa katika [Jedwali la Springer 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1):  
   - Kipengele cha kiakili: Onyesha kuwa unaelewa mtazamo wa mwanafunzi.  
   - Kipengele cha kihisia: Tambua na uthibitishe hisia zake kwa maneno ya upole au sitiari rahisi.  
   - Kipengele cha mtazamo: Kuwa na mtazamo wa joto, wa heshima na wa kuunga mkono.  
   - Kipengele cha ulinganifu: Rekebisha msamiati na mtindo wako kulingana na mwanafunzi. Mruhusu aongoze mazungumzo.

7. Dumisha sauti ya huruma, heshima na motisha katika mazungumzo yote.

Swali jipya kutoka kwa mwanafunzi  
[[ question ]]
EOT;
$string['file_size_exceeds_limit'] = 'Ukubwa wa faili unazidi kikomo cha 10MB';

$string['back'] = 'Rudi';
$string['sending_question'] = 'Kutoa swali...';
$string['error'] = 'Hitilafu: ';
$string['error_sending_question'] = 'Hitilafu yakatokea wakati wa kutoa swali: ';
$string['saving_prompt'] = 'Kuhifadhi kutoa...';
$string['prompt_saved_successfully'] = 'Kutoa kimehifadhiwa kwa mafanikio!';
$string['error_saving_prompt'] = 'Hitilafu yakatokea wakati wa kuhifadhi kutoa: ';
$string['uploading_file'] = 'Kuweka faili...';
$string['file_indexed_successfully'] = 'Faili limewekwa kwenye ukurasa kwa mafanikio!';
$string['error_processing_file'] = 'Hitilafu yakatokea wakati wa kushughulikia faili: ';
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


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Kosa katika kupakia rasilimali.';
$string['error_creating_job'] = 'Kosa katika kuunda kazi.';
$string['job_failed'] = 'Kazi imeshindwa.';
$string['error_processing_pdf'] = 'Kosa katika kutenda PDF.';


$string['json_encode_error'] = 'Kosa la kuweka JSON: ';
$string['no_files_selected'] = 'Hakuna faili zilizochaguliwa';

$string['course_id'] = 'Kitambulisho cha kozi';
$string['file_name'] = 'Jina la faili';
$string['file_content_base64'] = 'Maudhui ya faili (yamekodwa kwa base64)';
$string['insufficient_permissions'] = 'Ruhusa za kutosha za kupakia faili';
$string['missing_api_configuration'] = 'Upangaji wa API unaohitajika haupo';
$string['weaviate_connector_not_found'] = 'Darasa la WeaviateConnector halipo';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Hitilafu ya kuunda mkusanyiko: ';
$string['unknown_error'] = 'Hitilafu isiyojulikana';
$string['failed_create_upload_directory'] = 'Imeshindwa kuunda saraka ya kupakia';
$string['empty_filename'] = 'Jina tupu la faili limetolewa';
$string['unsupported_file_type'] = 'Aina ya faili isiyotegemezwa: ';
$string['invalid_file_data'] = 'Data batili ya faili kwa: ';
$string['failed_save_file'] = 'Imeshindwa kuhifadhi faili: ';
$string['adobe_pdf_credentials_not_configured'] = 'Hati za uthibitisho za Adobe PDF API hazijapangwa';
$string['pdf_extractor_not_found'] = 'Darasa la kuchukua PDF halipo';
$string['failed_extract_pdf_text'] = 'Imeshindwa kutoa maandishi kutoka PDF: ';
$string['failed_save_extracted_text'] = 'Imeshindwa kuhifadhi faili la maandishi yaliyochukuliwa: ';
$string['error_indexing_file_unknown'] = 'Hitilafu ya kuongeza faili kwenye orodha ';
$string['files_indexed_successfully'] = ' faili zimeongezwa kwenye orodha kwa mafanikio';
$string['errors_occurred'] = '. Makosa: ';
$string['no_files_processed'] = 'Hakuna faili zilizochakatwa. Makosa: ';
$string['operation_successful'] = 'Uendeshaji umefanikiwa';
$string['response_message'] = 'Ujumbe wa majibu';
$string['processed_files_count'] = 'Idadi ya faili zilizochakatwa';
$string['sending_question_fallback'] = 'Inatuma swali...';
$string['error_colon_fallback'] = 'Hitilafu: ';
$string['error_sending_question_fallback'] = 'Hitilafu ya kutuma swali: ';
$string['saving_prompt_fallback'] = 'Inahifadhi prompt...';
$string['prompt_saved_successfully_fallback'] = 'Prompt imehifadhiwa kwa mafanikio!';
$string['error_saving_prompt_fallback'] = 'Hitilafu ya kuhifadhi prompt: ';
$string['no_files_selected_fallback'] = 'Hakuna faili zilizochaguliwa.';
$string['uploading_files_fallback'] = 'Inapakia faili...';
$string['files_indexed_successfully_fallback'] = 'Faili zimeongezwa kwenye orodha kwa mafanikio!';
$string['error_processing_files_fallback'] = 'Hitilafu ya kuchakata faili: ';
$string['unknown_error_occurred'] = 'Hitilafu isiyojulikana imetokea';
$string['server_response_error'] = 'Hitilafu ya majibu ya seva. Angalia console kwa maelezo.';
$string['server_error_check_console'] = 'Hitilafu ya seva - angalia console kwa maelezo';
$string['files_converted_debug'] = 'Faili zimebadilishwa kuwa base64:';
$string['sending_ajax_request_debug'] = 'Inatuma ombi la AJAX:';
$string['upload_response_received_debug'] = 'Majibu ya upakiaji yamepokelewa:';
$string['response_type_debug'] = 'Aina ya majibu:';
$string['upload_error_details_debug'] = 'Maelezo ya hitilafu ya upakiaji:';
$string['error_object_debug'] = 'Kitu cha hitilafu:';
$string['raw_server_response_debug'] = 'Majibu ghafi ya seva:';