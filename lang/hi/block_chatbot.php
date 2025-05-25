<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'चैटबॉट';
$string['chatbot:addinstance'] = 'नया चैटबॉट ब्लॉक जोड़ें';
$string['chatbot:myaddinstance'] = 'डैशबोर्ड में नया चैटबॉट ब्लॉक जोड़ें';

// Open AI
$string['openai_api_key'] = 'OpenAI API कुंजी';
$string['openai_api_key_desc'] = 'अपनी OpenAI API कुंजी यहाँ दर्ज करें।';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF सेवाएँ क्लाइंट आईडी';
$string['adobe_pdf_client_id_desc'] = 'अपनी Adobe PDF सेवाएँ क्लाइंट आईडी यहाँ दर्ज करें।';

$string['adobe_pdf_client_secret'] = 'Adobe PDF सेवाएँ क्लाइंट सीक्रेट';
$string['adobe_pdf_client_secret_desc'] = 'अपनी Adobe PDF सेवाएँ क्लाइंट सीक्रेट यहाँ दर्ज करें।';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Weaviate API का URL यहाँ दर्ज करें।';

$string['weaviate_api_key'] = 'Weaviate API कुंजी';
$string['weaviate_api_key_desc'] = 'अपनी Weaviate API कुंजी यहाँ दर्ज करें।';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Cohere एम्बेडिंग मॉडल API कुंजी';
$string['cohere_embedding_api_key_desc'] = 'Cohere एम्बेडिंग मॉडल के लिए अपनी API कुंजी यहाँ दर्ज करें।';

$string['max_conversations'] = 'प्रति उपयोगकर्ता अधिकतम बातचीत';
$string['max_conversations_desc'] = 'प्रति उपयोगकर्ता संग्रहीत अधिकतम बातचीत की संख्या। यदि यह सीमा पार हो जाती है, तो सबसे पुरानी बातचीत हटा दी जाएगी।';

// Test button strings
$string['test_api_keys'] = 'API कुंजियाँ टेस्ट करें';
$string['test_api_keys_desc'] = 'कॉन्फ़िगर की गई API कुंजियों का परीक्षण करने के लिए क्लिक करें';
$string['test_api_keys_label'] = 'कुंजियाँ टेस्ट करें';

$string['chatbot:manage'] = 'चैटबॉट सेटिंग्स प्रबंधित करें';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'फ़ाइलें गायब हैं।';
$string['errorcreatingcollection'] = 'संग्रह बनाते समय त्रुटि: ';
$string['fileexceedsmaxsizeini'] = 'फ़ाइल php.ini में परिभाषित अधिकतम आकार से अधिक है';
$string['fileexceedsmaxsizeform'] = 'फ़ाइल HTML फ़ॉर्म में निर्दिष्ट अधिकतम आकार से अधिक है';
$string['filepartiallyuploaded'] = 'फ़ाइल केवल आंशिक रूप से अपलोड की गई थी';
$string['nofileuploaded'] = 'कोई फ़ाइल अपलोड नहीं की गई';
$string['missingtmpfolder'] = 'अस्थायी फ़ोल्डर गायब है';
$string['failedtowritetodisk'] = 'डिस्क पर फ़ाइल लिखने में विफल';
$string['phpextensionstoppedupload'] = 'एक PHP एक्सटेंशन ने फ़ाइल अपलोड रोक दिया';
$string['unknownuploaderror'] = 'अज्ञात अपलोड त्रुटि';
$string['uploaderror'] = 'अपलोड त्रुटि: ';
$string['errorindexingfile'] = 'फ़ाइल इंडेक्सिंग त्रुटि: ';
$string['allfilesindexed'] = 'सभी फ़ाइलें सफलतापूर्वक इंडेक्स की गई हैं।';

// For test_api_keys.php
$string['openai_connection_error'] = 'OpenAI API सत्यापित करते समय कनेक्शन त्रुटि हुई।';
$string['openai_invalid_key'] = 'OpenAI API कुंजी अमान्य है। त्रुटि कोड: ';
$string['openai_valid_key'] = 'OpenAI API कुंजी मान्य और कार्यात्मक है।';
$string['adobe_invalid_credentials'] = 'Adobe PDF सेवाओं के लिए क्लाइंट आईडी या क्लाइंट सीक्रेट अमान्य है।';
$string['adobe_valid_credentials'] = 'Adobe PDF सेवाओं के लिए क्लाइंट आईडी और क्लाइंट सीक्रेट मान्य और कार्यात्मक हैं।';
$string['weaviate_connection_error'] = 'Weaviate से कनेक्शन त्रुटि: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate API URL या कुंजी अमान्य है या त्रुटि हुई है। त्रुटि कोड: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate API URL और कुंजी मान्य और कार्यात्मक हैं।';
$string['back'] = 'वापस';

// For add_prompt.php
$string['invalid_sesskey'] = 'अमान्य sesskey';
$string['database_write_error'] = 'डेटाबेस लिखने में त्रुटि: ';

// For ajax.php
$string['http_method_not_allowed'] = 'HTTP विधि अनुमत नहीं है';
$string['invalid_json'] = 'अमान्य JSON: ';
$string['missing_parameters'] = 'पैरामीटर गायब हैं';
$string['invalid_question'] = 'अमान्य प्रश्न';
$string['empty_question'] = 'प्रश्न खाली नहीं हो सकता';
$string['invalid_session'] = 'अमान्य सत्र';
$string['openai_api_key_not_configured'] = 'OpenAI API कुंजी कॉन्फ़िगर नहीं की गई है';
$string['empty_response_from_api'] = 'API से खाली प्रतिक्रिया प्राप्त हुई';
$string['error_saving_conversation'] = 'बातचीत सहेजते समय त्रुटि';

// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = 'एक्सेस टोकन प्राप्त करने में विफल। HTTP स्थिति: ';
$string['access_token_obtained_successfully'] = 'एक्सेस टोकन सफलतापूर्वक प्राप्त किया गया।';
$string['failed_to_obtain_access_token_response'] = 'एक्सेस टोकन प्राप्त करने में विफल। प्रतिक्रिया: ';
$string['failed_to_obtain_upload_uri'] = 'अपलोड URI प्राप्त करने में विफल। HTTP स्थिति: ';
$string['asset_upload_uri_obtained'] = 'एसेट अपलोड URI प्राप्त किया गया।';
$string['failed_to_obtain_upload_uri_response'] = 'अपलोड URI प्राप्त करने में विफल। प्रतिक्रिया: ';
$string['failed_to_upload_file'] = 'फ़ाइल अपलोड करने में विफल। HTTP स्थिति: ';
$string['file_uploaded_successfully'] = 'फ़ाइल सफलतापूर्वक अपलोड की गई।';
$string['job_created_successfully'] = 'कार्य सफलतापूर्वक बनाया गया। स्थान: ';
$string['bad_request'] = 'खराब अनुरोध। अनुरोध अमान्य है या अन्यथा सेवा नहीं किया जा सकता है।';
$string['unauthorized'] = 'अनधिकृत। अपने API क्रेडेंशियल्स जाँचें।';
$string['resource_not_found'] = 'संसाधन नहीं मिला। निर्दिष्ट संसाधन नहीं मिला।';
$string['quota_exceeded'] = 'कोटा समाप्त। आपने इस ऑपरेशन के लिए अपना कोटा समाप्त कर दिया है।';
$string['internal_server_error'] = 'आंतरिक सर्वर त्रुटि। सर्वर को एक त्रुटि मिली है और वह इस समय आपका अनुरोध प्रसंस्करण नहीं कर सकता है।';
$string['unexpected_http_status'] = 'अप्रत्याशित HTTP स्थिति: ';
$string['failed_to_get_job_status'] = 'कार्य स्थिति प्राप्त करने में विफल। HTTP स्थिति: ';
$string['job_status'] = 'कार्य स्थिति: ';
$string['job_completed_successfully'] = 'कार्य सफलतापूर्वक पूर्ण हुआ। डाउनलोड URI: ';
$string['job_completed_but_download_uri_missing'] = 'कार्य पूर्ण हुआ लेकिन प्रतिक्रिया में डाउनलोड URI गायब है।';
$string['job_in_progress'] = 'कार्य अभी भी प्रगति में है। पोलिंग जारी रखें...';
$string['job_failed'] = 'कार्य विफल हुआ।';
$string['failed_to_decode_json_response'] = 'JSON प्रतिक्रिया डिकोड करने में विफल या स्थिति फ़ील्ड गायब है। प्रतिक्रिया: ';
$string['failed_to_download_asset'] = 'एसेट डाउनलोड करने में विफल। HTTP स्थिति: ';
$string['asset_downloaded_successfully'] = 'एसेट सफलतापूर्वक डाउनलोड किया गया।';
$string['error_decoding_json_file'] = 'JSON फ़ाइल डिकोड करने में त्रुटि।';

// For classes/weaviateconnector.php
$string['curl_error'] = 'cURL त्रुटि: ';
$string['http_error'] = 'HTTP त्रुटि ';
$string['json_decode_error'] = 'JSON डिकोड त्रुटि: ';
$string['no_response_generated'] = 'कोई प्रतिक्रिया उत्पन्न नहीं हुई। प्राप्त डेटा: ';
$string['previous_interactions_history'] = 'पिछले इंटरएक्शन का इतिहास:';
$string['previous_question'] = 'पिछला प्रश्न: ';
$string['answer'] = 'उत्तर: ';
$string['file_not_found'] = 'फ़ाइल नहीं मिली: ';
$string['unable_to_read_file'] = 'फ़ाइल पढ़ने में असमर्थ';
$string['json_encode_error'] = 'JSON एन्कोड त्रुटि: ';
$string['failure_after_retries'] = 'पुनः प्रयास के बाद विफलता ';
$string['last_error'] = ' प्रयास। अंतिम त्रुटि: HTTP ';

// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
स्थिति संदर्भ:
छात्र [[ coursename ]] कोर्स में भाग ले रहा है। आपका कार्य उनका समर्थन करना है और उनकी सीख के अनुरूप सटीक, प्रासंगिक और अनुकूलित प्रतिक्रियाएँ प्रदान करना है।
मिशन:
एक सहायक के रूप में, आपका मिशन छात्र को कोर्स X की अवधारणाओं को समझने में मदद करना है और उनके प्रश्नों का उत्तर देना है, जबकि प्रदान किए गए संदर्भ का उपयोग करके प्रतिक्रिया तैयार करना है। [[ history ]].
आपको स्पष्ट, सटीक और प्रासंगिक उत्तर देने होंगे, और सुनिश्चित करना होगा कि आप केवल कोर्स की जानकारी ही प्रस्तुत करें। यदि कोई उत्तर प्रदान किए गए संदर्भ में नहीं मिलता है, तो सख्ती से यह कहें: "मैं आपके शिक्षक द्वारा सावधानी से चयनित कोर्स सामग्री के आधार पर कैलिब्रेट किया गया हूँ। यदि आप अधिक जानकारी चाहते हैं, तो कृपया उनसे संपर्क करें।"
यदि छात्र ऐसे वाक्य लिखता है जो दर्शाते हैं कि उन्होंने किसी अवधारणा या पिछले स्पष्टीकरण को नहीं समझा है, तो [[ history ]] की जाँच करें कि क्या गलत समझा गया था, फिर अपने स्पष्टीकरण को अधिक सरल और ठोस उदाहरणों के साथ पुनः तैयार करें।
निर्देश:
1. छात्र के प्रश्न में भावनाओं का पता लगाएँ और एक सहानुभूतिपूर्ण और देखभाल करने वाले स्वर को अपनाएँ।
2. स्पष्ट और संरचित तरीके से प्रतिक्रिया दें।
3. आवश्यकता होने पर अवधारणा को उदाहरणों के साथ समझाएँ।
4. प्रदान किए गए संदर्भ के बाहर कोई उत्तर न दें।
5. आपकी प्रतिक्रिया में निम्नलिखित चार सहानुभूति घटकों को शामिल करना चाहिए:
   - संज्ञानात्मक घटक: दिखाएँ कि आप छात्र के दृष्टिकोण, तर्क और इरादों को समझते हैं। उनके विचारों को पुनः व्यक्त करके अपनी समझ की पुष्टि करें। उनके द्वारा कही गई बातों से संबंधित सुझाव दें, बिना अपने तर्क को थोपे।
   - भावनात्मक घटक: छात्र की भावनात्मक स्थिति (निराशा, संदेह, संतुष्टि, तनाव, आदि) के प्रति संवेदनशील रहें। उनकी भावनाओं को उपयुक्त शब्दों या सरल उपमाओं के साथ प्रतिबिंबित या सत्यापित करें। दया दिखाएँ।
   - दृष्टिकोण घटक: एक गर्म, सम्मानजनक और प्रोत्साहित करने वाले दृष्टिकोण को अपनाएँ। खुलेपन दिखाएँ, उनके प्रयासों की सराहना करें और किसी भी निर्णय से बचें। आपका स्वर मित्रवत और ईमानदार होना चाहिए।
   - समायोजन घटक: छात्र की बातचीत के विकास के अनुसार अपनी प्रतिक्रियाओं को समायोजित करें। उनके स्तर और मूड के अनुरूप शब्दावली और शैली का उपयोग करें। उन्हें बातचीत का नेतृत्व करने दें, विषय को कभी भी थोपे नहीं।
छात्र का नया प्रश्न [[ question ]]
EOT;

$string['sending_question'] = 'प्रश्न भेज रहा है...';
$string['error'] = 'त्रुटि: ';
$string['error_sending_question'] = 'प्रश्न भेजते समय त्रुटि: ';
$string['saving_prompt'] = 'प्रॉम्प्ट सहेज रहा है...';
$string['prompt_saved_successfully'] = 'प्रॉम्प्ट सफलतापूर्वक सहेजा गया!';
$string['error_saving_prompt'] = 'प्रॉम्प्ट सहेजते समय त्रुटि: ';
$string['uploading_file'] = 'फ़ाइल अपलोड हो रही है...';
$string['file_indexed_successfully'] = 'फ़ाइल सफलतापूर्वक इंडेक्स की गई!';
$string['error_processing_file'] = 'फ़ाइल प्रसंस्करण में त्रुटि: ';
$string['json_parse_error'] = 'JSON पार्स त्रुटि: ';
$string['invalid_json_response'] = 'सर्वर प्रतिक्रिया मान्य JSON प्रारूप में नहीं है।';
$string['add_files'] = 'फ़ाइलें जोड़ें';
$string['text_or_pdf_files'] = 'टेक्स्ट या PDF फ़ाइलें';
$string['drag_files_here_or_click'] = 'अपनी फ़ाइलें यहाँ खींचें या ब्राउज़ करने के लिए क्लिक करें';
$string['cancel'] = 'रद्द करें';
$string['upload_course'] = 'कोर्स अपलोड करें';

$string['modify_prompt'] = 'संशोधित करें';
$string['add_prompt'] = 'जोड़ें';
$string['consult_guide'] = 'प्रभावी प्रॉम्प्ट डिज़ाइन करने के लिए गाइड कंसल्ट करें:';
$string['guide_link'] = 'शिक्षकों के लिए प्रॉम्प्ट डिज़ाइन करने की गाइड';
$string['prompt_content'] = 'प्रॉम्प्ट सामग्री';
$string['write_prompt_here'] = 'अपना प्रॉम्प्ट यहाँ लिखें';
$string['save'] = 'सहेजें';

$string['chatbot_with_toggle_buttons'] = 'टॉगल बटन के साथ चैटबॉट';
$string['hello_professor'] = 'नमस्ते प्रोफेसर, आपके पास चैटबॉट का परीक्षण करने का विकल्प है ताकि सुनिश्चित किया जा सके कि यह सही ढंग से काम कर रहा है और आपका प्रॉम्प्ट अनुकूलित है।';
$string['hello_student'] = 'नमस्ते! मैं आपका सीखने का सहायक हूँ। मैं आपकी मदद कर सकता हूँ: - कोर्स अवधारणाओं को समझने में - अभ्यास और प्रश्नों की समीक्षा करने में - कठिन बिंदुओं को स्पष्ट करने में - अध्ययन विधियों का सुझाव देने में। मैं आपकी कैसे सहायता कर सकता हूँ?';
$string['ask_your_question_here'] = 'अपना प्रश्न यहाँ पूछें...';
$string['modify_prompt'] = 'प्रॉम्प्ट संशोधित करें';
$string['upload_course'] = 'कोर्स अपलोड करें';
$string['open_prompt_modal'] = 'प्रॉम्प्ट संशोधन मॉडल खोलें';
$string['open_file_upload_modal'] = 'कोर्स अपलोड मॉडल खोलें';


// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'एसेट अपलोड करने में त्रुटि।';
$string['error_creating_job'] = 'जॉब बनाने में त्रुटि।';
$string['job_failed'] = 'जॉब विफल।';
$string['error_processing_pdf'] = 'पीडीएफ प्रोसेस करने में त्रुटि।';

