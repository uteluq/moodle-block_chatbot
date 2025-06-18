<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & Université GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Tilføj en ny chatbot-blok';
$string['uteluqchatbot:myaddinstance'] = 'Tilføj en ny chatbot-blok til dashboardet';

$string['weaviate_cohere_not_configured'] = 'Cohere API-nøglen er enten ikke konfigureret eller ugyldig. Kontroller venligst indstillingerne.';


// Open AI
$string['openai_api_key'] = 'OpenAI API-nøgle';
$string['openai_api_key_desc'] = 'Indtast din OpenAI API-nøgle her.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF Services klient-ID';
$string['adobe_pdf_client_id_desc'] = 'Indtast dit Adobe PDF Services klient-ID her.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services klient-hemmelighed';
$string['adobe_pdf_client_secret_desc'] = 'Indtast din Adobe PDF Services klient-hemmelighed her.';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Indtast URL\'en for Weaviate API her.';

$string['weaviate_api_key'] = 'Weaviate API-nøgle';
$string['weaviate_api_key_desc'] = 'Indtast din Weaviate API-nøgle her.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Cohere Embedding Model API-nøgle';
$string['cohere_embedding_api_key_desc'] = 'Indtast din API-nøgle for Cohere Embedding Model her.';

$string['max_conversations'] = 'Maksimum antal samtaler pr. bruger';
$string['max_conversations_desc'] = 'Det maksimale antal samtaler gemt pr. bruger. Hvis overskredet, slettes den ældste samtale.';

// Test button strings
$string['test_api_keys'] = 'Test API-nøgler';
$string['test_api_keys_desc'] = 'Klik for at teste de konfigurerede API-nøgler';
$string['test_api_keys_label'] = 'Test nøgler';

$string['uteluqchatbot:manage'] = 'Administrer chatbot-indstillinger';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Filer mangler.';
$string['errorcreatingcollection'] = 'Fejl ved oprettelse af samling: ';
$string['fileexceedsmaxsizeini'] = 'Filen overstiger den maksimale størrelse defineret i php.ini';
$string['fileexceedsmaxsizeform'] = 'Filen overstiger den maksimale størrelse specificeret i HTML-formularen';
$string['filepartiallyuploaded'] = 'Filen blev kun delvist uploadet';
$string['nofileuploaded'] = 'Ingen fil blev uploadet';
$string['missingtmpfolder'] = 'Den midlertidige mappe mangler';
$string['failedtowritetodisk'] = 'Mislykkedes at skrive filen til disken';
$string['phpextensionstoppedupload'] = 'En PHP-udvidelse stoppede filuploadet';
$string['unknownuploaderror'] = 'Ukendt upload-fejl';
$string['uploaderror'] = 'Upload-fejl: ';
$string['errorindexingfile'] = 'Fejl ved indeksering af fil: ';
$string['allfilesindexed'] = 'Alle filer er blevet indekseret succesfuldt.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Forbindelsesfejl under verificering af OpenAI API.';
$string['openai_invalid_key'] = 'OpenAI API-nøglen er ugyldig. Fejlkode: ';
$string['openai_valid_key'] = 'OpenAI API-nøglen er gyldig og funktionel.';
$string['adobe_invalid_credentials'] = 'Klient-ID eller klient-hemmelighed for Adobe PDF Services er ugyldig.';
$string['adobe_valid_credentials'] = 'Klient-ID og klient-hemmelighed for Adobe PDF Services er gyldige og funktionelle.';
$string['weaviate_connection_error'] = 'Forbindelsesfejl til Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate API URL eller nøgle er ugyldig eller en fejl opstod. Fejlkode: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate API URL og nøgle er gyldige og funktionelle.';
$string['back'] = 'Tilbage';

// For add_prompt.php
$string['invalid_sesskey'] = 'Ugyldig sesskey';
$string['database_write_error'] = 'Database skrivefejl: ';

// For ajax.php
$string['http_method_not_allowed'] = 'HTTP-metode ikke tilladt';
$string['invalid_json'] = 'Ugyldigt JSON: ';
$string['missing_parameters'] = 'Manglende parametre';
$string['invalid_question'] = 'Ugyldigt spørgsmål';
$string['empty_question'] = 'Spørgsmål kan ikke være tomt';
$string['invalid_session'] = 'Ugyldig session';
$string['openai_api_key_not_configured'] = 'OpenAI API-nøgle ikke konfigureret';
$string['empty_response_from_api'] = 'Tomt svar modtaget fra API';
$string['error_saving_conversation'] = 'Fejl ved gemning af samtale';
$string['invalid_question_after_sanitize'] = 'Ugyldigt spørgsmål efter rensning.';
$string['empty_string_as_answer'] = 'En tom streng blev modtaget som svar.';
$string['database_error_saving_conversation'] = 'Databasefejl ved gemning af samtale: ';
$string['error_saving_conversation'] = 'Fejl ved gemning af samtale';
$string['error_reading_input'] = 'Fejl ved læsning af input.';
$string['generic_server_error'] = 'Generel serverfejl.';
$string['invalid_course_id'] = 'Ugyldigt kursus-ID.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Mislykkedes at få adgangstoken. HTTP-status: ';
$string['access_token_obtained_successfully'] = 'Adgangstoken opnået succesfuldt.';
$string['failed_to_obtain_access_token_response'] = 'Mislykkedes at få adgangstoken. Svar: ';
$string['failed_to_obtain_upload_uri'] = 'Mislykkedes at få upload-URI. HTTP-status: ';
$string['asset_upload_uri_obtained'] = 'Upload-URI for aktiv opnået.';
$string['failed_to_obtain_upload_uri_response'] = 'Mislykkedes at få upload-URI. Svar: ';
$string['failed_to_upload_file'] = 'Mislykkedes at uploade fil. HTTP-status: ';
$string['file_uploaded_successfully'] = 'Fil uploadet succesfuldt.';
$string['job_created_successfully'] = 'Job oprettet succesfuldt. Placering: ';
$string['bad_request'] = 'Dårlig anmodning. Anmodningen var ugyldig eller kan ikke behandles.';
$string['unauthorized'] = 'Ikke autoriseret. Tjek dine API-legitimationer.';
$string['resource_not_found'] = 'Ressource ikke fundet. Den angivne ressource blev ikke fundet.';
$string['quota_exceeded'] = 'Kvote overskredet. Du har overskredet din kvote for denne operation.';
$string['internal_server_error'] = 'Intern serverfejl. Serveren stødte på en fejl og kan ikke behandle din anmodning på nuværende tidspunkt.';
$string['unexpected_http_status'] = 'Uventet HTTP-status: ';
$string['failed_to_get_job_status'] = 'Mislykkedes at få jobstatus. HTTP-status: ';
$string['job_status'] = 'Jobstatus: ';
$string['job_completed_successfully'] = 'Job fuldført succesfuldt. Download-URI: ';
$string['job_completed_but_download_uri_missing'] = 'Job fuldført, men download-URI mangler i svaret.';
$string['job_in_progress'] = 'Job er stadig i gang. Fortsæt med at afspørge...';
$string['job_failed'] = 'Job mislykkedes.';
$string['failed_to_decode_json_response'] = 'Mislykkedes at dekode JSON-svar eller statusfelt mangler. Svar: ';
$string['failed_to_download_asset'] = 'Mislykkedes at downloade aktiv. HTTP-status: ';
$string['asset_downloaded_successfully'] = 'Aktiv downloadet succesfuldt.';
$string['error_decoding_json_file'] = 'Fejl ved dekodering af JSON-fil.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'cURL-fejl: ';
$string['http_error'] = 'HTTP-fejl ';
$string['json_decode_error'] = 'JSON-dekodering fejl: ';
$string['no_response_generated'] = 'Intet svar genereret. Modtagne data: ';
$string['previous_interactions_history'] = 'Historik over tidligere interaktioner:';
$string['previous_question'] = 'Tidligere spørgsmål: ';
$string['answer'] = 'Svar: ';
$string['file_not_found'] = 'Fil ikke fundet: ';
$string['unable_to_read_file'] = 'Ikke i stand til at læse filen';
$string['json_encode_error'] = 'JSON-kodning fejl: ';
$string['failure_after_retries'] = 'Fejl efter ';
$string['last_error'] = ' forsøg. Sidste fejl: HTTP ';
$string['invalid_response_format'] = 'Ugyldigt responsformat.';
$string['http_code'] = 'HTTP-kode: ';


// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Situationskontekst:
Læreren tager et kursus om [[ coursename ]]. Din rolle er at støtte dem ved at give præcise, relevante og tilpassede svar på deres læring.
Mission:
Som assistent er din mission at hjælpe læreren med at forstå konceptet i kursus X ved at besvare deres spørgsmål, mens du samtidig forlader dig på den givne kontekst for at formulere et svar. [[ history ]].
Du skal give klare, præcise og relevante svar, og sikre, at du kun formidler information fra kursusset. Hvis et svar ikke kan findes i den givne kontekst, skal du svare med: "Jeg er kalibreret ud fra kursusindholdet, der er nøje udvalgt af din lærer. Hvis du ønsker flere oplysninger, er du velkommen til at kontakte dem."
Hvis læreren skriver sætninger, der angiver, at de ikke har forstået et koncept eller en tidligere forklaring, skal du tjekke [[ history ]] for at identificere, hvad der blev misforstået, og derefter omformulere din forklaring med mere enkelhed og konkrete eksempler.
Instruktioner:
1. Opdag emotioner i lærerens spørgsmål og tag en empati- og omsorgsfuld tone.
2. Svare på en klar og struktureret måde.
3. Forklar konceptet med eksempler, hvis nødvendigt.
4. Giv ikke nogen svar uden for den givne kontekst.
5. Dit svar skal integrere følgende fire komponenter af empati:
   - Kognitiv komponent: Vis, at du forstår lærerens synspunkt, begrundelse og hensigter. Omformulér deres idéer for at validere din forståelse. Tilbyd forslag relateret til, hvad de har sagt, uden at påtvinge din egen begrundelse.
   - Affektiv komponent: Vær følsom over for lærerens følelsesmæssige tilstand (frustration, tvivl, tilfredshed, stress, osv.). Afspejle eller valider deres følelser med passende ord eller simple metaforer. Udtryk venlighed.
   - Holdningsmæssig komponent: Tag en varm, respektfuld og opmuntrende holdning. Vis åbenhed, værdsæt deres indsats og undgå enhver dom. Din tone skal være venlig og oprigtig.
   - Tilpasningsmæssig komponent: Tilpas dine svar til udviklingen af lærerens diskurs. Brug ordforråd og stil, der matcher deres niveau og stemning. Lad dem styre samtalen, aldrig påtvinge emnet.
Nyt spørgsmål fra læreren [[ question ]]
EOT;

$string['sending_question'] = 'Sender spørgsmål...';
$string['error'] = 'Fejl: ';
$string['error_sending_question'] = 'Fejl ved sending af spørgsmål: ';
$string['saving_prompt'] = 'Gemmer prompt...';
$string['prompt_saved_successfully'] = 'Prompt gemt succesfuldt!';
$string['error_saving_prompt'] = 'Fejl ved gemning af prompt: ';
$string['uploading_file'] = 'Uploader fil...';
$string['file_indexed_successfully'] = 'Fil indekseret succesfuldt!';
$string['error_processing_file'] = 'Fejl ved behandling af fil: ';
$string['json_parse_error'] = 'JSON-analyseringsfejl: ';
$string['invalid_json_response'] = 'Serverens svar er ikke i gyldigt JSON-format.';
$string['add_files'] = 'Tilføj filer';
$string['text_or_pdf_files'] = 'Tekst- eller PDF-filer';
$string['drag_files_here_or_click'] = 'Træk dine filer hertil eller klik for at gennemse';
$string['cancel'] = 'Annuller';
$string['upload_course'] = 'Upload kursus';

$string['modify_prompt'] = 'Rediger';
$string['add_prompt'] = 'Tilføj';
$string['consult_guide'] = 'Konsulter guidet for at designe effektive prompts:';
$string['guide_link'] = 'Guide til design af prompts for lærere';
$string['prompt_content'] = 'Prompt-indhold';
$string['write_prompt_here'] = 'Skriv din prompt her';
$string['save'] = 'Gem';

$string['chatbot_with_toggle_buttons'] = 'Chatbot med skifteknapper';
$string['hello_professor'] = 'Hej professor, du har mulighed for at teste chatbotten for at sikre, at den fungerer korrekt og at din prompt er optimalt konfigureret.';
$string['hello_student'] = 'Hej! Jeg er din læringsassistent. Jeg kan hjælpe dig med: - Forståelse af kursuskoncepter - Gennemgang og øvelser - Klarification af svære punkter - Forslag til studie metoder. Hvordan kan jeg hjælpe dig?';
$string['ask_your_question_here'] = 'Stil dit spørgsmål her...';
$string['modify_prompt'] = 'Rediger prompt';
$string['upload_course'] = 'Upload kursus';
$string['open_prompt_modal'] = 'Åbn prompt-redigeringens modal';
$string['open_file_upload_modal'] = 'Åbn kursus-upload modal';

// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Fejl ved upload af asset.';
$string['error_creating_job'] = 'Fejl ved oprettelse af job.';
$string['job_failed'] = 'Jobbet mislykkedes.';
$string['error_processing_pdf'] = 'Fejl ved behandling af PDF.';


$string['headers_already_sent'] = 'Headers er allerede sendt.';
$string['failed_to_start_output_buffer'] = 'Kunne ikke starte outputbuffer.';
$string['server_error_output_buffer_failed'] = 'Serverfejl: Outputbuffer mislykkedes.';
$string['answer_not_utf8'] = 'Svar er ikke i UTF-8.';
$string['no_answer_or_error_field'] = 'Ingen svar- eller fejlmarkering.';
$string['json_encode_error'] = 'JSON-kodefejl: ';
$string['server_error_json_encode_failed'] = 'Serverfejl: JSON-kodning mislykkedes.';
$string['empty_response_from_api'] = 'Tomt svar fra API.';
$string['empty_string_as_answer'] = 'Tom streng modtaget som svar.';
$string['database_error_saving_conversation'] = 'Databasefejl ved gemning af samtale: ';
$string['general_exception'] = 'Generel undtagelse: ';
