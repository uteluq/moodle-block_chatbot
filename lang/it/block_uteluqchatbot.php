<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Aggiungi un nuovo blocco chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Aggiungi un nuovo blocco chatbot alla Dashboard';

$string['weaviate_cohere_not_configured'] = 'La chiave API di Cohere non è configurata o non è valida. Si prega di controllare le impostazioni.';


// Open AI
$string['openai_api_key'] = 'Chiave API OpenAI';
$string['openai_api_key_desc'] = 'Inserisci la tua chiave API OpenAI qui.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID Cliente Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Inserisci il tuo ID Cliente Adobe PDF Services qui.';

$string['adobe_pdf_client_secret'] = 'Segreto Cliente Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Inserisci il tuo Segreto Cliente Adobe PDF Services qui.';

// Weaviate
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Inserisci l\'URL per l\'API Weaviate qui.';

$string['weaviate_api_key'] = 'Chiave API Weaviate';
$string['weaviate_api_key_desc'] = 'Inserisci la tua chiave API Weaviate qui.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Chiave API Modello Embedding Cohere';
$string['cohere_embedding_api_key_desc'] = 'Inserisci la tua chiave API per il Modello Embedding Cohere qui.';

$string['max_conversations'] = 'Massimo conversazioni per utente';
$string['max_conversations_desc'] = 'Il numero massimo di conversazioni memorizzate per utente. Se superato, la conversazione più vecchia verrà eliminata.';

// Test button strings
$string['test_api_keys'] = 'Testa Chiavi API';
$string['test_api_keys_desc'] = 'Clicca per testare le chiavi API configurate';
$string['test_api_keys_label'] = 'Testa Chiavi';

$string['uteluqchatbot:manage'] = 'Gestisci impostazioni chatbot';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'File mancanti.';
$string['errorcreatingcollection'] = 'Errore durante la creazione della raccolta: ';
$string['fileexceedsmaxsizeini'] = 'Il file supera la dimensione massima definita in php.ini';
$string['fileexceedsmaxsizeform'] = 'Il file supera la dimensione massima specificata nel form HTML';
$string['filepartiallyuploaded'] = 'Il file è stato caricato solo parzialmente';
$string['nofileuploaded'] = 'Nessun file è stato caricato';
$string['missingtmpfolder'] = 'La cartella temporanea è mancante';
$string['failedtowritetodisk'] = 'Impossibile scrivere il file su disco';
$string['phpextensionstoppedupload'] = 'Un\'estensione PHP ha interrotto il caricamento del file';
$string['unknownuploaderror'] = 'Errore di caricamento sconosciuto';
$string['uploaderror'] = 'Errore di caricamento: ';
$string['errorindexingfile'] = 'Errore durante l\'indicizzazione del file: ';
$string['allfilesindexed'] = 'Tutti i file sono stati indicizzati con successo.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Errore di connessione durante la verifica dell\'API OpenAI.';
$string['openai_invalid_key'] = 'La chiave API OpenAI è invalida. Codice errore: ';
$string['openai_valid_key'] = 'La chiave API OpenAI è valida e funzionale.';
$string['adobe_invalid_credentials'] = 'L\'ID cliente o il segreto cliente per Adobe PDF Services è invalido.';
$string['adobe_valid_credentials'] = 'L\'ID cliente e il segreto cliente per Adobe PDF Services sono validi e funzionali.';
$string['weaviate_connection_error'] = 'Errore di connessione a Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'L\'URL o la chiave API Weaviate è invalida o si è verificato un errore. Codice errore: ';
$string['weaviate_valid_key_and_url'] = 'L\'URL e la chiave API Weaviate sono validi e funzionali.';
$string['back'] = 'Indietro';

// For add_prompt.php
$string['invalid_sesskey'] = 'Sesskey invalido';
$string['database_write_error'] = 'Errore di scrittura nel database: ';

// For ajax.php
$string['http_method_not_allowed'] = 'Metodo HTTP non consentito';
$string['invalid_json'] = 'JSON invalido: ';
$string['missing_parameters'] = 'Parametri mancanti';
$string['invalid_question'] = 'Domanda invalida';
$string['empty_question'] = 'La domanda non può essere vuota';
$string['invalid_session'] = 'Sessione invalida';
$string['openai_api_key_not_configured'] = 'Chiave API OpenAI non configurata';
$string['empty_response_from_api'] = 'Risposta vuota ricevuta dall\'API';
$string['error_saving_conversation'] = 'Errore durante il salvataggio della conversazione';
$string['invalid_question_after_sanitize'] = 'Domanda non valida dopo la sanificazione.';
$string['empty_string_as_answer'] = 'È stata ricevuta una stringa vuota come risposta.';
$string['database_error_saving_conversation'] = 'Errore del database durante il salvataggio della conversazione: ';
$string['error_saving_conversation'] = 'Errore durante il salvataggio della conversazione';
$string['error_reading_input'] = 'Errore durante la lettura dell\'input.';
$string['generic_server_error'] = 'Errore generico del server.';
$string['invalid_course_id'] = 'ID corso non valido.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Impossibile ottenere il token di accesso. Stato HTTP: ';
$string['access_token_obtained_successfully'] = 'Token di accesso ottenuto con successo.';
$string['failed_to_obtain_access_token_response'] = 'Impossibile ottenere il token di accesso. Risposta: ';
$string['failed_to_obtain_upload_uri'] = 'Impossibile ottenere l\'URI di caricamento. Stato HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI di caricamento asset ottenuto.';
$string['failed_to_obtain_upload_uri_response'] = 'Impossibile ottenere l\'URI di caricamento. Risposta: ';
$string['failed_to_upload_file'] = 'Impossibile caricare il file. Stato HTTP: ';
$string['file_uploaded_successfully'] = 'File caricato con successo.';
$string['job_created_successfully'] = 'Processo creato con successo. Posizione: ';
$string['bad_request'] = 'Richiesta non valida. La richiesta è invalida o non può essere servita.';
$string['unauthorized'] = 'Non autorizzato. Controlla le tue credenziali API.';
$string['resource_not_found'] = 'Risorsa non trovata. La risorsa specificata non è stata trovata.';
$string['quota_exceeded'] = 'Quota superata. Hai superato la quota per questa operazione.';
$string['internal_server_error'] = 'Errore interno del server. Il server ha riscontrato un errore e non può elaborare la tua richiesta al momento.';
$string['unexpected_http_status'] = 'Stato HTTP imprevisto: ';
$string['failed_to_get_job_status'] = 'Impossibile ottenere lo stato del processo. Stato HTTP: ';
$string['job_status'] = 'Stato del processo: ';
$string['job_completed_successfully'] = 'Processo completato con successo. URI di download: ';
$string['job_completed_but_download_uri_missing'] = 'Processo completato ma l\'URI di download manca nella risposta.';
$string['job_in_progress'] = 'Processo ancora in corso. Continua il polling...';
$string['job_failed'] = 'Processo fallito.';
$string['failed_to_decode_json_response'] = 'Impossibile decodificare la risposta JSON o il campo stato è mancante. Risposta: ';
$string['failed_to_download_asset'] = 'Impossibile scaricare l\'asset. Stato HTTP: ';
$string['asset_downloaded_successfully'] = 'Asset scaricato con successo.';
$string['error_decoding_json_file'] = 'Errore durante la decodifica del file JSON.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'Errore cURL: ';
$string['http_error'] = 'Errore HTTP ';
$string['json_decode_error'] = 'Errore di decodifica JSON: ';
$string['no_response_generated'] = 'Nessuna risposta generata. Dati ricevuti: ';
$string['previous_interactions_history'] = 'Cronologia delle interazioni precedenti:';
$string['previous_question'] = 'Domanda precedente: ';
$string['answer'] = 'Risposta: ';
$string['file_not_found'] = 'File non trovato: ';
$string['unable_to_read_file'] = 'Impossibile leggere il file';
$string['json_encode_error'] = 'Errore di codifica JSON: ';
$string['failure_after_retries'] = 'Fallimento dopo ';
$string['last_error'] = ' tentativi. Ultimo errore: HTTP ';
$string['invalid_response_format'] = 'Formato di risposta non valido.';
$string['http_code'] = 'Codice HTTP: ';



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Contesto della Situazione:
Lo studente sta seguendo un corso su [[ coursename ]]. Il tuo ruolo è supportarlo fornendo risposte accurate, pertinenti e personalizzate al suo apprendimento.
Missione:
Come assistente, la tua missione è aiutare lo studente a comprendere i concetti del corso su Corso X rispondendo alle sue domande, basandoti sul contesto fornito per formulare una risposta. [[ history ]].
Devi fornire risposte chiare, precise e pertinenti, assicurandoti di trasmettere solo informazioni provenienti dal corso. Se una risposta non può essere trovata nel contesto fornito, rispondi strettamente con: "Sono calibrato in base al contenuto del corso selezionato attentamente dal tuo insegnante. Se desideri ulteriori informazioni, sei invitato a contattarli."
Se lo studente scrive frasi che indicano di non aver compreso un concetto o una spiegazione precedente, controlla [[ history ]] per identificare cosa è stato frainteso, quindi riformula la tua spiegazione con maggiore semplicità e esempi concreti.
Istruzioni:
1. Rileva le emozioni nella domanda dello studente e adotta un tono empatico e premuroso.
2. Rispondi in modo chiaro e strutturato.
3. Spiega il concetto con esempi se necessario.
4. Non fornire risposte al di fuori del contesto dato.
5. La tua risposta deve integrare le seguenti quattro componenti dell'empatia:
   - Componente Cognitiva: Mostra di comprendere il punto di vista, il ragionamento e le intenzioni dello studente. Riformula le sue idee per validare la tua comprensione. Offri suggerimenti correlati a ciò che ha detto, senza imporre il tuo ragionamento.
   - Componente Affettiva: Sii sensibile allo stato emotivo dello studente (frustrazione, dubbio, soddisfazione, stress, ecc.). Rifletti o valida le sue emozioni con parole appropriate o semplici metafore. Esprimi gentilezza.
   - Componente Attitudinale: Adotta un atteggiamento caldo, rispettoso e incoraggiante. Mostra apertura, valuta i suoi sforzi e evita qualsiasi giudizio. Il tuo tono dovrebbe essere amichevole e sincero.
   - Componente di Adattamento: Adatta le tue risposte all'evoluzione del discorso dello studente. Usa un vocabolario e uno stile che si adattino al suo livello e al suo umore. Lascia che guidi la conversazione, non forzare mai l'argomento.
Nuova domanda dello studente [[ question ]]
EOT;

$string['sending_question'] = 'Invio della domanda...';
$string['error'] = 'Errore: ';
$string['error_sending_question'] = 'Errore durante l\'invio della domanda: ';
$string['saving_prompt'] = 'Salvataggio del prompt...';
$string['prompt_saved_successfully'] = 'Prompt salvato con successo!';
$string['error_saving_prompt'] = 'Errore durante il salvataggio del prompt: ';
$string['uploading_file'] = 'Caricamento del file...';
$string['file_indexed_successfully'] = 'File indicizzato con successo!';
$string['error_processing_file'] = 'Errore durante l\'elaborazione del file: ';
$string['json_parse_error'] = 'Errore di parsing JSON: ';
$string['invalid_json_response'] = 'La risposta del server non è in formato JSON valido.';
$string['add_files'] = 'Aggiungi File';
$string['text_or_pdf_files'] = 'File di Testo o PDF';
$string['drag_files_here_or_click'] = 'Trascina i tuoi file qui o clicca per sfogliare';
$string['cancel'] = 'Annulla';
$string['upload_course'] = 'Carica Corso';

$string['modify_prompt'] = 'Modifica';
$string['add_prompt'] = 'Aggiungi';
$string['consult_guide'] = 'Consulta la guida per progettare prompt efficaci:';
$string['guide_link'] = 'Guida per la progettazione di prompt per insegnanti';
$string['prompt_content'] = 'Contenuto del Prompt';
$string['write_prompt_here'] = 'Scrivi il tuo prompt qui';
$string['save'] = 'Salva';

$string['chatbot_with_toggle_buttons'] = 'Chatbot con Pulsanti di Attivazione';
$string['hello_professor'] = 'Ciao Professore, hai la possibilità di testare il chatbot per assicurarti che funzioni correttamente e che il tuo prompt sia configurato in modo ottimale.';
$string['hello_student'] = 'Ciao! Sono il tuo assistente di apprendimento. Posso aiutarti con: - Comprendere i concetti del corso - Rivedere ed esercitarti con gli esercizi - Chiarire punti difficili - Suggerire metodi di studio. Come posso aiutarti?';
$string['ask_your_question_here'] = 'Fai la tua domanda qui...';
$string['modify_prompt'] = 'Modifica Prompt';
$string['upload_course'] = 'Carica Corso';
$string['open_prompt_modal'] = 'Apri la finestra di modifica del prompt';
$string['open_file_upload_modal'] = 'Apri la finestra di caricamento del corso';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Errore nel caricamento dell\'asset.';
$string['error_creating_job'] = 'Errore nella creazione del job.';
$string['job_failed'] = 'Job fallito.';
$string['error_processing_pdf'] = 'Errore nell\'elaborazione del PDF.';


$string['headers_already_sent'] = 'Le intestazioni sono già state inviate.';
$string['failed_to_start_output_buffer'] = 'Impossibile avviare il buffer di output.';
$string['server_error_output_buffer_failed'] = 'Errore del server: buffer di output fallito.';
$string['answer_not_utf8'] = 'La risposta non è in UTF-8.';
$string['no_answer_or_error_field'] = 'Nessun campo di risposta o di errore.';
$string['json_encode_error'] = 'Errore di codifica JSON: ';
$string['server_error_json_encode_failed'] = 'Errore del server: codifica JSON fallita.';
$string['empty_response_from_api'] = 'Risposta vuota dall\'API.';
$string['empty_string_as_answer'] = 'Stringa vuota ricevuta come risposta.';
$string['database_error_saving_conversation'] = 'Errore del database durante il salvataggio della conversazione: ';
$string['general_exception'] = 'Eccezione generale: ';
