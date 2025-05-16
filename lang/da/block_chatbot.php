<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Tilføj en ny chatbot-blok';
$string['chatbot:myaddinstance'] = 'Tilføj en ny chatbot-blok til Dashboard';

// Open AI
$string['openai_api_key'] = 'OpenAI API-nøgle';
$string['openai_api_key_desc'] = 'Indtast din OpenAI API-nøgle her.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF Services Klient-ID';
$string['adobe_pdf_client_id_desc'] = 'Indtast dit Adobe PDF Services Klient-ID her.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services Klienthemmelighed';
$string['adobe_pdf_client_secret_desc'] = 'Indtast din Adobe PDF Services Klienthemmelighed her.';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API-URL';
$string['weaviate_api_url_desc'] = 'Indtast URL'en til Weaviate API her.';

$string['weaviate_api_key'] = 'Weaviate API-nøgle';
$string['weaviate_api_key_desc'] = 'Indtast din Weaviate API-nøgle her.';

// Cohere
$string['cohere_embedding_api_key'] = 'Cohere Indlejringsmodel API-nøgle';
$string['cohere_embedding_api_key_desc'] = 'Indtast din API-nøgle til Cohere Indlejringsmodel her.';

// Conversation Settings
$string['max_conversations'] = 'Maksimalt antal samtaler pr. bruger';
$string['max_conversations_desc'] = 'Det maksimale antal samtaler, der gemmes pr. bruger. Hvis dette overskrides, slettes den ældste samtale.';

// Test Button Strings
$string['test_api_keys'] = 'Test API-nøgler';
$string['test_api_keys_desc'] = 'Klik for at teste de konfigurerede API-nøgler';
$string['test_api_keys_label'] = 'Test nøgler';

$string['chatbot:manage'] = 'Administrer chatbot-indstillinger';

// Default Prompt
$string['chatbot:default_prompt'] = "Kontekst for situationen:
Den lærende tager et kursus om {$coursename}. Din rolle er at støtte dem ved at give præcise, relevante og tilpassede svar til deres læring.
Mission:
Som assistent er din mission at hjælpe den lærende med at forstå kursuskoncepterne om {$coursename} ved at besvare deres spørgsmål og basere svarene på den givne kontekst for at formulere et svar. [[ history ]].
Du skal formulere klare, præcise og relevante svar og sikre, at du kun videregiver information fra kurset. Hvis et svar ikke kan findes i den givne kontekst, skal du svare strengt: 'Jeg er kalibreret i henhold til kursusindholdet, der er nøje udvalgt af din lærer. Hvis du ønsker mere information, opfordrer vi dig til at kontakte dem.'
Hvis den lærende skriver sætninger, der viser, at de ikke forstod et koncept eller en tidligere forklaring, skal du tjekke [[ history ]] for at identificere, hvad der blev misforstået, og derefter omformulere din forklaring på en enklere måde med konkrete eksempler.
Instruktioner:
1. Opdag følelser i den lærendes spørgsmål og brug en empatisk og omsorgsfuld tone.
2. Svar klart og struktureret.
3. Forklar konceptet med eksempler, hvis det er nødvendigt.
4. Gør ingen antagelser ud over den givne kontekst.
Nyt spørgsmål fra den lærende [[ question ]]";