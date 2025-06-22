<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Aggiungi un nuovo blocco chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Aggiungi un nuovo blocco chatbot alla Dashboard';
$string['weaviate_cohere_not_configured'] = 'La chiave API di Cohere non è configurata o non è valida. Si prega di controllare le impostazioni.';
$string['adobe_pdf_client_id'] = 'ID Cliente Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Inserisci il tuo ID Cliente Adobe PDF Services qui.';
$string['adobe_pdf_client_secret'] = 'Segreto Cliente Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Inserisci il tuo Segreto Cliente Adobe PDF Services qui.';
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Inserisci l\'URL per l\'API Weaviate qui.';
$string['weaviate_api_key'] = 'Chiave API Weaviate';
$string['weaviate_api_key_desc'] = 'Inserisci la tua chiave API Weaviate qui.';
$string['cohere_embedding_api_key'] = 'Chiave API Modello Embedding Cohere';
$string['cohere_embedding_api_key_desc'] = 'Inserisci la tua chiave API per il Modello Embedding Cohere qui.';
$string['test_api_keys'] = 'Testa Chiavi API';
$string['test_api_keys_desc'] = 'Clicca per testare le chiavi API configurate';
$string['test_api_keys_label'] = 'Testa Chiavi';
$string['uteluqchatbot:manage'] = 'Gestisci impostazioni chatbot';
$string['adobe_invalid_credentials'] = 'L\'ID cliente o il segreto cliente per Adobe PDF Services è invalido.';
$string['adobe_valid_credentials'] = 'L\'ID cliente e il segreto cliente per Adobe PDF Services sono validi e funzionali.';
$string['weaviate_connection_error'] = 'Errore di connessione a Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'L\'URL o la chiave API Weaviate è invalida o si è verificato un errore. Codice errore: ';
$string['weaviate_valid_key_and_url'] = 'L\'URL e la chiave API Weaviate sono validi e funzionali.';
$string['database_write_error'] = 'Errore di scrittura nel database: ';
$string['error_saving_conversation'] = 'Errore durante il salvataggio della conversazione';
$string['invalid_question_after_sanitize'] = 'Domanda non valida dopo la sanificazione.';
$string['empty_response_from_api'] = 'Risposta vuota ricevuta dall\'API';
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
$string['default_prompt'] = <<<EOT
Contesto della situazione  
Lo studente sta seguendo un corso su [[ coursename ]]. Il tuo ruolo è accompagnarlo fornendo risposte precise, pertinenti e adatte al suo percorso di apprendimento.

Missione  
In qualità di assistente, la tua missione è aiutare lo studente a comprendere i concetti del corso "Corso X" rispondendo alle sue domande, basandoti sul contesto fornito. [[ history ]]  
Devi formulare risposte chiare, precise e pertinenti, trasmettendo solo informazioni provenienti dal corso. Se non è possibile trovare una risposta nel contesto fornito, rispondi rigorosamente con: "Sono calibrato in base ai contenuti del corso selezionati con cura dal tuo insegnante. Se desideri ulteriori informazioni, ti invitiamo a contattarlo."

Se lo studente scrive frasi che mostrano di non aver compreso un concetto o una spiegazione precedente, consulta [[ history ]] per identificare cosa non è stato capito, quindi riformula la spiegazione in modo più semplice e con esempi concreti.

Istruzioni  
1. Analizza ogni domanda dello studente per rilevare eventuali emozioni. Usa la seguente tassonomia:  
   - Confusione: "non capisco", "sono perso", "non è chiaro".  
   - Frustrazione: "mi dà fastidio", "rinuncio", "è troppo difficile".  
   - Stress o ansia: "sono stressato", "sono sopraffatto", "non c'è più tempo".  
   - Dubbio o insicurezza: "non ce la faccio", "non sono abbastanza bravo".

2. Se viene rilevata un’emozione, inizia la risposta con una frase empatica adeguata:  
   - Per la confusione: "Capisco, non è facile."  
   - Per la frustrazione: "Vedo che è frustrante."  
   - Per lo stress: "È normale sentirsi sopraffatti a volte."  
   - Per il dubbio: "Stai facendo del tuo meglio, ed è già tanto."

3. Rispondi poi in modo chiaro e strutturato.  
4. Usa esempi se necessario.  
5. Non fornire mai risposte al di fuori del contesto fornito.

6. Integra nella tua risposta le 4 componenti dell’empatia come definite nella [Tabella 1 di Springer](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1):  
   - Componente cognitiva: mostra di comprendere il punto di vista dello studente.  
   - Componente affettiva: riconosci e valida le sue emozioni.  
   - Componente attitudinale: adotta un tono caloroso, rispettoso e incoraggiante.  
   - Componente di sintonizzazione: adatta il linguaggio e lo stile a quello dello studente.

7. Mantieni un tono gentile, rispettoso e motivante per tutta la conversazione.

Nuova domanda dello studente  
[[ question ]]
EOT;
$string['file_size_exceeds_limit'] = 'La dimensione del file supera il limite di 10 MB';
$string['back'] = 'Indietro';
$string['sending_question'] = 'Invio della domanda...';
$string['error'] = 'Errore: ';
$string['error_sending_question'] = 'Errore durante l\'invio della domanda: ';
$string['saving_prompt'] = 'Salvataggio del prompt...';
$string['prompt_saved_successfully'] = 'Prompt salvato con successo!';
$string['error_saving_prompt'] = 'Errore durante il salvataggio del prompt: ';
$string['uploading_file'] = 'Caricamento del file...';
$string['file_indexed_successfully'] = 'File indicizzato con successo!';
$string['error_processing_file'] = 'Errore durante l\'elaborazione del file: ';
$string['add_files'] = 'Aggiungi File';
$string['text_or_pdf_files'] = 'File di Testo o PDF';
$string['drag_files_here_or_click'] = 'Trascina i tuoi file qui o clicca per sfogliare';
$string['cancel'] = 'Annulla';
$string['upload_course'] = 'Carica Corso';
$string['conversations'] = 'Conversazioni';
$string['prompts'] = 'Suggerimenti';
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
$string['error_uploading_asset'] = 'Errore nel caricamento dell\'asset.';
$string['error_creating_job'] = 'Errore nella creazione del job.';
$string['job_failed'] = 'Job fallito.';
$string['error_processing_pdf'] = 'Errore nell\'elaborazione del PDF.';
$string['json_encode_error'] = 'Errore di codifica JSON: ';
$string['no_files_selected'] = 'Nessun file selezionato';
$string['course_id'] = 'ID corso';
$string['file_name'] = 'Nome file';
$string['file_content_base64'] = 'Contenuto file (codificato base64)';
$string['insufficient_permissions'] = 'Permessi insufficienti per caricare file';
$string['missing_api_configuration'] = 'Configurazione API richiesta mancante';
$string['weaviate_connector_not_found'] = 'Classe WeaviateConnector non trovata';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Errore nella creazione della raccolta: ';
$string['unknown_error'] = 'Errore sconosciuto';
$string['failed_create_upload_directory'] = 'Impossibile creare la directory di caricamento';
$string['empty_filename'] = 'Nome file vuoto fornito';
$string['unsupported_file_type'] = 'Tipo di file non supportato: ';
$string['invalid_file_data'] = 'Dati file non validi per: ';
$string['failed_save_file'] = 'Impossibile salvare il file: ';
$string['adobe_pdf_credentials_not_configured'] = 'Credenziali API Adobe PDF non configurate';
$string['pdf_extractor_not_found'] = 'Classe estrattore PDF non trovata';
$string['failed_extract_pdf_text'] = 'Impossibile estrarre testo dal PDF: ';
$string['failed_save_extracted_text'] = 'Impossibile salvare il file di testo estratto: ';
$string['error_indexing_file_unknown'] = 'Errore nell\'indicizzazione del file ';
$string['files_indexed_successfully'] = ' file indicizzati con successo';
$string['errors_occurred'] = '. Errori: ';
$string['no_files_processed'] = 'Nessun file elaborato. Errori: ';
$string['operation_successful'] = 'Operazione riuscita';
$string['response_message'] = 'Messaggio di risposta';
$string['processed_files_count'] = 'Numero di file elaborati';
$string['sending_question_fallback'] = 'Invio della domanda...';
$string['error_colon_fallback'] = 'Errore: ';
$string['error_sending_question_fallback'] = 'Errore nell\'invio della domanda: ';
$string['saving_prompt_fallback'] = 'Salvataggio del prompt...';
$string['prompt_saved_successfully_fallback'] = 'Prompt salvato con successo!';
$string['error_saving_prompt_fallback'] = 'Errore nel salvataggio del prompt: ';
$string['no_files_selected_fallback'] = 'Nessun file selezionato.';
$string['uploading_files_fallback'] = 'Caricamento file...';
$string['files_indexed_successfully_fallback'] = 'File indicizzati con successo!';
$string['error_processing_files_fallback'] = 'Errore nell\'elaborazione dei file: ';
$string['unknown_error_occurred'] = 'Si è verificato un errore sconosciuto';
$string['server_response_error'] = 'Errore di risposta del server. Controlla la console per i dettagli.';
$string['server_error_check_console'] = 'Errore del server - controlla la console per i dettagli';
$string['files_converted_debug'] = 'File convertiti in base64:';
$string['sending_ajax_request_debug'] = 'Invio richiesta AJAX:';
$string['upload_response_received_debug'] = 'Risposta di caricamento ricevuta:';
$string['response_type_debug'] = 'Tipo di risposta:';
$string['upload_error_details_debug'] = 'Dettagli errore di caricamento:';
$string['error_object_debug'] = 'Oggetto errore:';
$string['raw_server_response_debug'] = 'Risposta server grezza:';
$string['privacy:metadata:block_uteluqchatbot_conversations'] = 'Informazioni sulle conversazioni degli utenti con il chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:userid'] = 'L\'ID dell\'utente che ha creato la conversazione';
$string['privacy:metadata:block_uteluqchatbot_conversations:question'] = 'La domanda posta dall\'utente';
$string['privacy:metadata:block_uteluqchatbot_conversations:answer'] = 'La risposta fornita dal chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:timecreated'] = 'Il momento in cui è stata creata la conversazione';
$string['privacy:metadata:block_uteluqchatbot_conversations:courseid'] = 'L\'ID del corso in cui è avvenuta la conversazione';

$string['privacy:metadata:block_uteluqchatbot_prompts'] = 'Informazioni sui prompt personalizzati creati dagli utenti';
$string['privacy:metadata:block_uteluqchatbot_prompts:prompt'] = 'Il testo del prompt personalizzato creato dall\'utente';
$string['privacy:metadata:block_uteluqchatbot_prompts:userid'] = 'L\'ID dell\'utente che ha creato il prompt';
$string['privacy:metadata:block_uteluqchatbot_prompts:courseid'] = 'L\'ID del corso in cui è stato creato il prompt';
$string['privacy:metadata:block_uteluqchatbot_prompts:timecreated'] = 'Il momento in cui è stato creato il prompt';
$string['privacy:metadata:cohere_api'] = 'Dati inviati al servizio Cohere API per risposte chat alimentate da IA';
$string['privacy:metadata:cohere_api:question'] = 'La domanda dell\'utente inviata a Cohere API per l\'elaborazione';
$string['privacy:metadata:cohere_api:courseid'] = 'Le informazioni di contesto del corso inviate a Cohere API';
$string['privacy:metadata:cohere_api:prompt'] = 'Prompt personalizzati e istruzioni di sistema inviate a Cohere API';
$string['privacy:metadata:weaviate_cloud'] = 'Dati inviati al database vettoriale Weaviate Cloud per l\'archiviazione di documenti e la ricerca di similarità';
$string['privacy:metadata:weaviate_cloud:document_content'] = 'Contenuto testuale estratto dai documenti caricati memorizzati in Weaviate';
$string['privacy:metadata:weaviate_cloud:embeddings'] = 'Embedding vettoriali generati dal contenuto dei documenti memorizzati in Weaviate';
$string['privacy:metadata:weaviate_cloud:courseid'] = 'Informazioni di contesto del corso associate ai documenti memorizzati';
$string['privacy:metadata:weaviate_cloud:metadata'] = 'Metadati dei documenti e proprietà memorizzate nel database Weaviate';
$string['privacy:metadata:adobe_pdf_api'] = 'Dati inviati all\'API Adobe PDF Services per l\'estrazione di testo dai documenti PDF';
$string['privacy:metadata:adobe_pdf_api:pdf_content'] = 'Contenuto del file PDF inviato ad Adobe PDF Services per l\'estrazione di testo';
$string['privacy:metadata:adobe_pdf_api:filename'] = 'Nome file originale del documento PDF inviato per l\'elaborazione';
$string['privacy:metadata:adobe_pdf_api:extracted_text'] = 'Contenuto testuale estratto dai documenti PDF da Adobe PDF Services';
