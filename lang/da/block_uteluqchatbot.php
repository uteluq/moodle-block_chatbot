<?php
/**
 * @copyright 2025 Université TÉLUQ and the Université Gaston-Berger
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Tilføj en ny chatbot-blok';
$string['uteluqchatbot:myaddinstance'] = 'Tilføj en ny chatbot-blok til dashboardet';
$string['weaviate_cohere_not_configured'] = 'Cohere API-nøglen er enten ikke konfigureret eller ugyldig. Kontroller venligst indstillingerne.';
$string['adobe_pdf_client_id'] = 'Adobe PDF Services klient-ID';
$string['adobe_pdf_client_id_desc'] = 'Indtast dit Adobe PDF Services klient-ID her.';
$string['adobe_pdf_client_secret'] = 'Adobe PDF Services klient-hemmelighed';
$string['adobe_pdf_client_secret_desc'] = 'Indtast din Adobe PDF Services klient-hemmelighed her.';
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Indtast URL\'en for Weaviate API her.';
$string['weaviate_api_key'] = 'Weaviate API-nøgle';
$string['weaviate_api_key_desc'] = 'Indtast din Weaviate API-nøgle her.';
$string['cohere_embedding_api_key'] = 'Cohere Embedding Model API-nøgle';
$string['cohere_embedding_api_key_desc'] = 'Indtast din API-nøgle for Cohere Embedding Model her.';
$string['test_api_keys'] = 'Test API-nøgler';
$string['test_api_keys_desc'] = 'Klik for at teste de konfigurerede API-nøgler';
$string['test_api_keys_label'] = 'Test nøgler';
$string['uteluqchatbot:manage'] = 'Administrer chatbot-indstillinger';
$string['adobe_invalid_credentials'] = 'Klient-ID eller klient-hemmelighed for Adobe PDF Services er ugyldig.';
$string['adobe_valid_credentials'] = 'Klient-ID og klient-hemmelighed for Adobe PDF Services er gyldige og funktionelle.';
$string['weaviate_connection_error'] = 'Forbindelsesfejl til Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate API URL eller nøgle er ugyldig eller en fejl opstod. Fejlkode: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate API URL og nøgle er gyldige og funktionelle.';
$string['database_write_error'] = 'Database skrivefejl: ';
$string['invalid_question_after_sanitize'] = 'Ugyldigt spørgsmål efter rensning.';
$string['error_saving_conversation'] = 'Fejl ved gemning af samtale';
$string['empty_response_from_api'] = 'Tomt svar modtaget fra API';
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
$string['default_prompt'] = <<<EOT
Situationskontekst
Læreren følger et kursus om [[ coursename ]]. Din rolle er at støtte dem ved at give præcise, relevante og lærerettede svar.

Mission
Som assistent er din mission at hjælpe læreren med at forstå begreber i kurset "Kursus X" ved at besvare deres spørgsmål baseret på den givne kontekst. [[ history ]]
Du skal formulere klare, præcise og relevante svar og kun videreformidle information, der stammer fra kurset. Hvis et svar ikke findes i konteksten, skal du udelukkende svare: "Jeg er kalibreret efter kursusindholdet, som omhyggeligt er udvalgt af din underviser. Hvis du vil have flere oplysninger, opfordrer vi dig til at kontakte vedkommende."

Hvis eleven skriver noget, der viser, at et koncept ikke er forstået, skal du tjekke [[ history ]] og omformulere forklaringen med større enkelhed og mere konkrete eksempler.

Instruktioner
1. Analyser hvert spørgsmål for tegn på følelser, brug følgende taksonomi:
   - Forvirring: "Jeg forstår det ikke", "Jeg er fortabt", "Det er uklart".
   - Frustration: "Det irriterer mig", "Jeg giver op", "Det er for svært".
   - Stress/angst: "Jeg er stresset", "Jeg er overvældet", "Der er ikke tid nok".
   - Tvivl: "Jeg kan ikke", "Jeg er ikke god nok".

2. Hvis en følelse opdages, start med en empatisk sætning:
   - For forvirring: "Det forstår jeg godt, det er ikke nemt."
   - Ved frustration: "Det kan jeg se er frustrerende."
   - Ved stress: "Det er helt normalt at føle sig overvældet."
   - Ved tvivl: "Du gør dit bedste, og det er allerede meget."

3. Svar derefter klart og struktureret.  
4. Brug eksempler om nødvendigt.  
5. Giv aldrig svar uden for den angivne kontekst.

6. Inddrag de fire komponenter af empati som defineret i [Springer Table 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1)

7. Bevar en venlig, respektfuld og motiverende tone hele vejen igennem.

Nyt spørgsmål fra eleven  
[[ question ]]
EOT;
$string['file_size_exceeds_limit'] = 'Filens størrelse overstiger grænsen på 10 MB';
$string['back'] = 'Tilbage';
$string['sending_question'] = 'Sender spørgsmål...';
$string['error'] = 'Fejl: ';
$string['error_sending_question'] = 'Fejl ved sending af spørgsmål: ';
$string['saving_prompt'] = 'Gemmer prompt...';
$string['prompt_saved_successfully'] = 'Prompt gemt succesfuldt!';
$string['error_saving_prompt'] = 'Fejl ved gemning af prompt: ';
$string['uploading_file'] = 'Uploader fil...';
$string['file_indexed_successfully'] = 'Fil indekseret succesfuldt!';
$string['error_processing_file'] = 'Fejl ved behandling af fil: ';
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
$string['error_uploading_asset'] = 'Fejl ved upload af asset.';
$string['error_creating_job'] = 'Fejl ved oprettelse af job.';
$string['job_failed'] = 'Jobbet mislykkedes.';
$string['error_processing_pdf'] = 'Fejl ved behandling af PDF.';
$string['json_encode_error'] = 'JSON-kodefejl: ';
$string['no_files_selected'] = 'Ingen filer valgt';
$string['course_id'] = 'Kursus-ID';
$string['file_name'] = 'Filnavn';
$string['file_content_base64'] = 'Filindhold (base64-kodet)';
$string['insufficient_permissions'] = 'Utilstrækkelige tilladelser til at uploade filer';
$string['missing_api_configuration'] = 'Manglende påkrævet API-konfiguration';
$string['weaviate_connector_not_found'] = 'WeaviateConnector-klasse ikke fundet';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Fejl ved oprettelse af samling: ';
$string['unknown_error'] = 'Ukendt fejl';
$string['failed_create_upload_directory'] = 'Kunne ikke oprette upload-mappe';
$string['empty_filename'] = 'Tomt filnavn angivet';
$string['unsupported_file_type'] = 'Ikke-understøttet filtype: ';
$string['invalid_file_data'] = 'Ugyldig fildata for: ';
$string['failed_save_file'] = 'Kunne ikke gemme fil: ';
$string['adobe_pdf_credentials_not_configured'] = 'Adobe PDF API-legitimationsoplysninger ikke konfigureret';
$string['pdf_extractor_not_found'] = 'PDF-ekstraktørklasse ikke fundet';
$string['failed_extract_pdf_text'] = 'Kunne ikke udtrække tekst fra PDF: ';
$string['failed_save_extracted_text'] = 'Kunne ikke gemme udtrukket tekstfil: ';
$string['error_indexing_file_unknown'] = 'Fejl ved indeksering af fil ';
$string['files_indexed_successfully'] = ' fil(er) indekseret succesfuldt';
$string['errors_occurred'] = '. Fejl: ';
$string['no_files_processed'] = 'Ingen filer behandlet. Fejl: ';
$string['operation_successful'] = 'Operation vellykket';
$string['response_message'] = 'Responsbesked';
$string['processed_files_count'] = 'Antal behandlede filer';
$string['sending_question_fallback'] = 'Sender spørgsmålet...';
$string['error_colon_fallback'] = 'Fejl: ';
$string['error_sending_question_fallback'] = 'Fejl ved afsendelse af spørgsmål: ';
$string['saving_prompt_fallback'] = 'Gemmer prompten...';
$string['prompt_saved_successfully_fallback'] = 'Prompt gemt succesfuldt!';
$string['error_saving_prompt_fallback'] = 'Fejl ved gemning af prompt: ';
$string['no_files_selected_fallback'] = 'Ingen filer valgt.';
$string['uploading_files_fallback'] = 'Uploader filer...';
$string['files_indexed_successfully_fallback'] = 'Filer indekseret succesfuldt!';
$string['error_processing_files_fallback'] = 'Fejl ved behandling af filer: ';
$string['unknown_error_occurred'] = 'En ukendt fejl opstod';
$string['server_response_error'] = 'Server respons fejl. Tjek konsollen for detaljer.';
$string['server_error_check_console'] = 'Server fejl - tjek konsollen for detaljer';
$string['files_converted_debug'] = 'Filer konverteret til base64:';
$string['sending_ajax_request_debug'] = 'Sender AJAX-anmodning:';
$string['upload_response_received_debug'] = 'Upload-respons modtaget:';
$string['response_type_debug'] = 'Responstype:';
$string['upload_error_details_debug'] = 'Upload fejl detaljer:';
$string['error_object_debug'] = 'Fejlobjekt:';
$string['raw_server_response_debug'] = 'Rå server respons:';
$string['conversations'] = 'Samtaler';
$string['prompts'] = 'Oplæg';
$string['privacy:metadata:block_uteluqchatbot_conversations'] = 'Information om brugersamtaler med chatbotten';
$string['privacy:metadata:block_uteluqchatbot_conversations:userid'] = 'ID\'et for brugeren, der oprettede samtalen';
$string['privacy:metadata:block_uteluqchatbot_conversations:question'] = 'Spørgsmålet stillet af brugeren';
$string['privacy:metadata:block_uteluqchatbot_conversations:answer'] = 'Svaret givet af chatbotten';
$string['privacy:metadata:block_uteluqchatbot_conversations:timecreated'] = 'Tidspunktet hvor samtalen blev oprettet';
$string['privacy:metadata:block_uteluqchatbot_conversations:courseid'] = 'ID\'et for kurset hvor samtalen fandt sted';
$string['privacy:metadata:block_uteluqchatbot_prompts'] = 'Information om brugerdefinerede prompts oprettet af brugere';
$string['privacy:metadata:block_uteluqchatbot_prompts:prompt'] = 'Den brugerdefinerede prompt-tekst oprettet af brugeren';
$string['privacy:metadata:block_uteluqchatbot_prompts:userid'] = 'ID\'et for brugeren, der oprettede prompten';
$string['privacy:metadata:block_uteluqchatbot_prompts:courseid'] = 'ID\'et for kurset hvor prompten blev oprettet';
$string['privacy:metadata:block_uteluqchatbot_prompts:timecreated'] = 'Tidspunktet hvor prompten blev oprettet';
$string['privacy:metadata:cohere_api'] = 'Data sendt til Cohere API-tjenesten for AI-drevne chat-svar';
$string['privacy:metadata:cohere_api:question'] = 'Brugerspørgsmålet sendt til Cohere API til behandling';
$string['privacy:metadata:cohere_api:courseid'] = 'Kursuskontekstinformationen sendt til Cohere API';
$string['privacy:metadata:cohere_api:prompt'] = 'Brugerdefinerede prompts og systeminstruktioner sendt til Cohere API';
$string['privacy:metadata:weaviate_cloud'] = 'Data sendt til Weaviate Cloud vektordatabase til dokumentlagring og lignende søgning';
$string['privacy:metadata:weaviate_cloud:document_content'] = 'Tekstindhold ekstraheret fra uploadede dokumenter gemt i Weaviate';
$string['privacy:metadata:weaviate_cloud:embeddings'] = 'Vektorindlejringer genereret fra dokumentindhold gemt i Weaviate';
$string['privacy:metadata:weaviate_cloud:courseid'] = 'Kursuskontekstinformation tilknyttet gemte dokumenter';
$string['privacy:metadata:weaviate_cloud:metadata'] = 'Dokumentmetadata og egenskaber gemt i Weaviate-databasen';
$string['privacy:metadata:adobe_pdf_api'] = 'Data sendt til Adobe PDF Services API til tekstekstraktion fra PDF-dokumenter';
$string['privacy:metadata:adobe_pdf_api:pdf_content'] = 'PDF-filindhold sendt til Adobe PDF Services til tekstekstraktion';
$string['privacy:metadata:adobe_pdf_api:filename'] = 'Oprindeligt filnavn for PDF-dokumentet sendt til behandling';
$string['privacy:metadata:adobe_pdf_api:extracted_text'] = 'Tekstindhold ekstraheret fra PDF-dokumenter af Adobe PDF Services';
