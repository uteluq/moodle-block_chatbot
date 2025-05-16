<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Ongeza Bloku Mpya ya Chatbot';
$string['chatbot:myaddinstance'] = 'Ongeza Bloku Mpya ya Chatbot kwenye Dashibodi';

// Open AI
$string['openai_api_key'] = 'Ufunguo wa API wa OpenAI';
$string['openai_api_key_desc'] = 'Ingiza ufunguo wako wa API wa OpenAI hapa.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Kitambulisho cha Mteja wa Huduma za PDF za Adobe';
$string['adobe_pdf_client_id_desc'] = 'Ingiza Kitambulisho cha Mteja wa Huduma za PDF za Adobe hapa.';

$string['adobe_pdf_client_secret'] = 'Siri ya Mteja wa Huduma za PDF za Adobe';
$string['adobe_pdf_client_secret_desc'] = 'Ingiza Siri ya Mteja wa Huduma za PDF za Adobe hapa.';

// Weaviate
$string['weaviate_api_url'] = 'URL ya API ya Weaviate';
$string['weaviate_api_url_desc'] = 'Ingiza URL ya API ya Weaviate hapa.';

$string['weaviate_api_key'] = 'Ufunguo wa API wa Weaviate';
$string['weaviate_api_key_desc'] = 'Ingiza ufunguo wako wa API wa Weaviate hapa.';

// Cohere
$string['cohere_embedding_api_key'] = 'Ufunguo wa API wa Modeli ya Kupachika ya Cohere';
$string['cohere_embedding_api_key_desc'] = 'Ingiza ufunguo wako wa API wa Modeli ya Kupachika ya Cohere hapa.';

// Conversation Settings
$string['max_conversations'] = 'Idadi ya Juu ya Mazungumzo kwa kila Mtumiaji';
$string['max_conversations_desc'] = 'Idadi ya juu ya mazungumzo yanayohifadhiwa kwa kila mtumiaji. Ikiwa itazidi, mazungumzo ya zamani zaidi yatafutwa.';

// Test Button Strings
$string['test_api_keys'] = 'Jaribu Vifunguo vya API';
$string['test_api_keys_desc'] = 'Bonyeza kujaribu vifunguo vya API vilivyosanidiwa';
$string['test_api_keys_label'] = 'Jaribu Vifunguo';

$string['chatbot:manage'] = 'Dhibiti Mipangilio ya Chatbot';

// Default Prompt
$string['chatbot:default_prompt'] = "Muktadha wa Hali:
Mwanafunzi anachukua kozi kuhusu {$coursename}. Jukumu lako ni kumsaidia kwa kutoa majibu sahihi, yanayofaa, na yaliyorekebishwa kwa ajili ya kujifunza kwake.
Misheni:
Kama msaidizi, misheni yako ni kumsaidia mwanafunzi kuelewa dhana za kozi kuhusu {$coursename} kwa kujibu maswali yake, kwa kutegemea muktadha uliotolewa ili kuunda jibu. [[ history ]].
Lazima uunde majibu yaliyo wazi, sahihi na yanayofaa, ukihakikisha kuwa unapassha habari za kozi pekee. Ikiwa jibu halipatikani katika muktadha uliotolewa, jibu kwa ukali: 'Nimekalibratwa kulingana na maudhui ya kozi yaliyochaguliwa kwa makini na mwalimu wako. Ikiwa unataka maelezo zaidi, tunakualika uwasiliane naye.'
Ikiwa mwanafunzi anaandika sentensi zinazoonyesha kuwa hakuielewa dhana au maelezo ya awali, angalia [[ history ]] ili kutambua kilichoeleweka vibaya, kisha uunda upya maelezo yako kwa njia rahisi zaidi na mifano ya wazi.
Maagizo:
1. Tambua hisia katika swali la mwanafunzi na utumie sauti ya huruma na ya kujali.
2. Jibu kwa uwazi na kwa njia iliyopangwa.
3. Eleza dhana kwa mifano ikiwa ni lazima.
4. Usifanye makisio yoyote nje ya muktadha uliotolewa.
Swali jipya la mwanafunzi [[ question ]]";