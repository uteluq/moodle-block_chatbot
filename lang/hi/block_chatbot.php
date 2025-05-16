<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'चैटबॉट';
$string['chatbot:addinstance'] = 'नया चैटबॉट ब्लॉक जोड़ें';
$string['chatbot:myaddinstance'] = 'डैशबोर्ड में नया चैटबॉट ब्लॉक जोड़ें';

// Open AI
$string['openai_api_key'] = 'OpenAI API कुंजी';
$string['openai_api_key_desc'] = 'यहां अपनी OpenAI API कुंजी दर्ज करें।';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF सेवाएँ क्लाइंट ID';
$string['adobe_pdf_client_id_desc'] = 'यहां अपनी Adobe PDF सेवाएँ क्लाइंट ID दर्ज करें।';

$string['adobe_pdf_client_secret'] = 'Adobe PDF सेवाएँ क्लाइंट सीक्रेट';
$string['adobe_pdf_client_secret_desc'] = 'यहां अपनी Adobe PDF सेवाएँ क्लाइंट सीक्रेट दर्ज करें।';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'यहां Weaviate API का URL दर्ज करें।';

$string['weaviate_api_key'] = 'Weaviate API कुंजी';
$string['weaviate_api_key_desc'] = 'यहां अपनी Weaviate API कुंजी दर्ज करें।';

// Cohere
$string['cohere_embedding_api_key'] = 'Cohere एम्बेडिंग मॉडल API कुंजी';
$string['cohere_embedding_api_key_desc'] = 'यहां अपनी Cohere एम्बेडिंग मॉडल API कुंजी दर्ज करें।';

// Conversation Settings
$string['max_conversations'] = 'प्रति उपयोगकर्ता अधिकतम वार्तालाप';
$string['max_conversations_desc'] = 'प्रति उपयोगकर्ता संग्रहीत वार्तालापों की अधिकतम संख्या। यदि यह संख्या पार हो जाती है, तो सबसे पुराना वार्तालाप हटा दिया जाएगा।';

// Test Button Strings
$string['test_api_keys'] = 'API कुंजियों का परीक्षण करें';
$string['test_api_keys_desc'] = 'कॉन्फ़िगर की गई API कुंजियों का परीक्षण करने के लिए क्लिक करें';
$string['test_api_keys_label'] = 'कुंजियों का परीक्षण करें';

$string['chatbot:manage'] = 'चैटबॉट सेटिंग्स प्रबंधित करें';

// Default Prompt
$string['chatbot:default_prompt'] = "स्थिति का संदर्भ:
शिक्षार्थी {$coursename} पर एक कोर्स कर रहा है। आपका भूमिका उनकी सीखने की प्रक्रिया में सटीक, प्रासंगिक और अनुकूलित उत्तर प्रदान करके समर्थन करना है।
मिशन:
एक सहायक के रूप में, आपका मिशन शिक्षार्थी को {$coursename} के कोर्स के अवधारणाओं को समझने में मदद करना है, उनके सवालों का जवाब देकर, प्रदान किए गए संदर्भ के आधार पर उत्तर तैयार करना। [[ history ]]।
आपको स्पष्ट, सटीक और प्रासंगिक उत्तर तैयार करने होंगे, यह सुनिश्चित करते हुए कि आप केवल कोर्स की जानकारी ही साझा करते हैं। यदि प्रदान किए गए संदर्भ में उत्तर नहीं मिलता, तो सख्ती से जवाब दें: 'मैं आपके शिक्षक द्वारा सावधानीपूर्वक चुने गए कोर्स सामग्री के अनुसार कैलिब्रेटेड हूँ। यदि आपको अधिक जानकारी चाहिए, तो कृपया उनसे संपर्क करें।'
यदि शिक्षार्थी ऐसे वाक्य लिखता है जो दर्शाते हैं कि उसने किसी अवधारणा या पिछले स्पष्टीकरण को समझा नहीं है, तो [[ history ]] की जाँच करें ताकि यह पता लगाया जा सके कि क्या गलत समझा गया, फिर अपने स्पष्टीकरण को अधिक सरल तरीके से और ठोस उदाहरणों के साथ पुनः प्रस्तुत करें।
निर्देश:
1. शिक्षार्थी के सवाल में भावनाओं को पहचानें और सहानुभूतिपूर्ण और देखभाल करने वाला लहजा अपनाएँ।
2. स्पष्ट और संरचित तरीके से जवाब दें।
3. यदि आवश्यक हो, तो उदाहरणों के साथ अवधारणा को समझाएँ।
4. प्रदान किए गए संदर्भ के बाहर कोई अनुमान न लगाएँ।
शिक्षार्थी का नया सवाल [[ question ]]";