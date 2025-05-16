<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Ƙara sabon shingen chatbot';
$string['chatbot:myaddinstance'] = 'Ƙara sabon shingen chatbot zuwa Dashboard';

// Open AI
$string['openai_api_key'] = 'Maɓallin API na OpenAI';
$string['openai_api_key_desc'] = 'Shigar da maɓallin API na OpenAI a nan.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID na Abokin Ciniki na Ayyukan PDF na Adobe';
$string['adobe_pdf_client_id_desc'] = 'Shigar da ID na Abokin Ciniki na Ayyukan PDF na Adobe a nan.';

$string['adobe_pdf_client_secret'] = 'Sirrin Abokin Ciniki na Ayyukan PDF na Adobe';
$string['adobe_pdf_client_secret_desc'] = 'Shigar da Sirrin Abokin Ciniki na Ayyukan PDF na Adobe a nan.';

// Weaviate
$string['weaviate_api_url'] = 'URL na API na Weaviate';
$string['weaviate_api_url_desc'] = 'Shigar da URL na API na Weaviate a nan.';

$string['weaviate_api_key'] = 'Maɓallin API na Weaviate';
$string['weaviate_api_key_desc'] = 'Shigar da maɓallin API na Weaviate a nan.';

// Cohere
$string['cohere_embedding_api_key'] = 'Maɓallin API na Samfurin Haɗawa na Cohere';
$string['cohere_embedding_api_key_desc'] = 'Shigar da maɓallin API na Samfurin Haɗawa na Cohere a nan.';

// Conversation Settings
$string['max_conversations'] = 'Matsakaicin adadin tattaunawa ga kowane mai amfani';
$string['max_conversations_desc'] = 'Matsakaicin adadin tattaunawar da aka adana ga kowane mai amfani. Idan an wuce, tattaunawar mafi tsufa za a goge ta.';

// Test Button Strings
$string['test_api_keys'] = 'Gwada Maɓallan API';
$string['test_api_keys_desc'] = 'Danna don gwada maɓallan API da aka saita';
$string['test_api_keys_label'] = 'Gwada Maɓallan';

$string['chatbot:manage'] = 'Sarrafa saitunan chatbot';

// Default Prompt
$string['chatbot:default_prompt'] = "Yanayin halin:
Dalibi yana ɗaukar kwasa-kwasan game da {$coursename}. Aikinka shine ka tallafa masa ta hanyar samar da amsoshi masu daidai, masu dacewa, da kuma waɗanda suka dace da karatunsa.
Manufa:
A matsayinka na mataimaki, manufarka ita ce ka taimaka wa dalibi ya fahimci ra'ayoyin kwasa-kwasan game da {$coursename} ta hanyar amsa tambayoyinsa, bisa ga yanayin da aka bayar don tsara amsa. [[ history ]].
Dole ne ka tsara amsoshi masu haske, daidai, kuma masu dacewa, ka tabbatar cewa kana isar da bayanan kwasa-kwasa kawai. Idan ba a samu amsa a cikin yanayin da aka bayar ba, ka amsa da ƙarfi: 'An daidaita ni bisa ga abubuwan kwasa-kwasa da malaminka ya zaɓa a hankali. Idan kana son ƙarin bayani, muna gayyatarka ka tuntuɓe shi.'
Idan dalibi ya rubuta jimloli da ke nuna cewa bai fahimci ra'ayi ko bayani na baya ba, duba [[ history ]] don gano abin da aka ji da shi, sannan ka sake bayyana bayaninka cikin sauƙi da kuma misalai na gaske.
Umarni:
1. Gano motsin zuciya a cikin tambayar dalibi kuma ka ɗauki sautin tausayi da kulawa.
2. Amsa a fili kuma cikin tsari.
3. Bayyana ra'ayi tare da misalai idan ya cancanta.
4. Kada ka yi zato fiye da yanayin da aka bayar.
Sabuwar tambaya daga dalibi [[ question ]]";