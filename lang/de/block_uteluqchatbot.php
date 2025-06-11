<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Füge einen neuen Chatbot-Block hinzu';
$string['uteluqchatbot:myaddinstance'] = 'Füge einen neuen Chatbot-Block zum Dashboard hinzu';

$string['weaviate_cohere_not_configured'] = 'Der Cohere-API-Schlüssel ist entweder nicht konfiguriert oder ungültig. Bitte überprüfen Sie die Einstellungen.';


// Open AI
$string['openai_api_key'] = 'OpenAI API-Schlüssel';
$string['openai_api_key_desc'] = 'Geben Sie Ihren OpenAI API-Schlüssel hier ein.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF Services Client-ID';
$string['adobe_pdf_client_id_desc'] = 'Geben Sie Ihre Adobe PDF Services Client-ID hier ein.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services Client-Geheimnis';
$string['adobe_pdf_client_secret_desc'] = 'Geben Sie Ihr Adobe PDF Services Client-Geheimnis hier ein.';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API-URL';
$string['weaviate_api_url_desc'] = 'Geben Sie die URL für die Weaviate API hier ein.';

$string['weaviate_api_key'] = 'Weaviate API-Schlüssel';
$string['weaviate_api_key_desc'] = 'Geben Sie Ihren Weaviate API-Schlüssel hier ein.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Cohere Embedding Model API-Schlüssel';
$string['cohere_embedding_api_key_desc'] = 'Geben Sie Ihren API-Schlüssel für das Cohere Embedding Model hier ein.';

$string['max_conversations'] = 'Maximale Anzahl von Gesprächen pro Benutzer';
$string['max_conversations_desc'] = 'Die maximale Anzahl von Gesprächen, die pro Benutzer gespeichert werden. Wenn überschritten, wird das älteste Gespräch gelöscht.';

// Test button strings
$string['test_api_keys'] = 'API-Schlüssel testen';
$string['test_api_keys_desc'] = 'Klicken Sie, um die konfigurierten API-Schlüssel zu testen';
$string['test_api_keys_label'] = 'Schlüssel testen';

$string['uteluqchatbot:manage'] = 'Chatbot-Einstellungen verwalten';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Dateien fehlen.';
$string['errorcreatingcollection'] = 'Fehler beim Erstellen der Sammlung: ';
$string['fileexceedsmaxsizeini'] = 'Die Datei überschreitet die maximale Größe, die in php.ini definiert ist';
$string['fileexceedsmaxsizeform'] = 'Die Datei überschreitet die maximale Größe, die im HTML-Formular angegeben ist';
$string['filepartiallyuploaded'] = 'Die Datei wurde nur teilweise hochgeladen';
$string['nofileuploaded'] = 'Keine Datei wurde hochgeladen';
$string['missingtmpfolder'] = 'Der temporäre Ordner fehlt';
$string['failedtowritetodisk'] = 'Fehler beim Schreiben der Datei auf die Festplatte';
$string['phpextensionstoppedupload'] = 'Eine PHP-Erweiterung hat den Dateiupload gestoppt';
$string['unknownuploaderror'] = 'Unbekannter Upload-Fehler';
$string['uploaderror'] = 'Upload-Fehler: ';
$string['errorindexingfile'] = 'Fehler beim Indizieren der Datei: ';
$string['allfilesindexed'] = 'Alle Dateien wurden erfolgreich indiziert.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Verbindungsfehler bei der Überprüfung der OpenAI API.';
$string['openai_invalid_key'] = 'Der OpenAI API-Schlüssel ist ungültig. Fehlercode: ';
$string['openai_valid_key'] = 'Der OpenAI API-Schlüssel ist gültig und funktionell.';
$string['adobe_invalid_credentials'] = 'Die Client-ID oder das Client-Geheimnis für Adobe PDF Services ist ungültig.';
$string['adobe_valid_credentials'] = 'Die Client-ID und das Client-Geheimnis für Adobe PDF Services sind gültig und funktionell.';
$string['weaviate_connection_error'] = 'Verbindungsfehler zu Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'Die Weaviate API-URL oder der Schlüssel ist ungültig oder ein Fehler ist aufgetreten. Fehlercode: ';
$string['weaviate_valid_key_and_url'] = 'Die Weaviate API-URL und der Schlüssel sind gültig und funktionell.';
$string['back'] = 'Zurück';

// For add_prompt.php
$string['invalid_sesskey'] = 'Ungültiger sesskey';
$string['database_write_error'] = 'Datenbank-Schreibfehler: ';

// For ajax.php
$string['http_method_not_allowed'] = 'HTTP-Methode nicht erlaubt';
$string['invalid_json'] = 'Ungültiges JSON: ';
$string['missing_parameters'] = 'Fehlende Parameter';
$string['invalid_question'] = 'Ungültige Frage';
$string['empty_question'] = 'Frage darf nicht leer sein';
$string['invalid_session'] = 'Ungültige Sitzung';
$string['openai_api_key_not_configured'] = 'OpenAI API-Schlüssel nicht konfiguriert';
$string['empty_response_from_api'] = 'Leere Antwort von der API erhalten';
$string['error_saving_conversation'] = 'Fehler beim Speichern des Gesprächs';
$string['invalid_question_after_sanitization'] = 'Ungültige Frage nach der Bereinigung.';
$string['empty_string_as_answer'] = 'Ein leerer String wurde als Antwort erhalten.';
$string['database_error_saving_conversation'] = 'Datenbankfehler beim Speichern der Konversation: ';
$string['error_saving_conversation'] = 'Fehler beim Speichern der Konversation';
$string['error_reading_input'] = 'Fehler beim Lesen der Eingabe.';
$string['generic_server_error'] = 'Allgemeiner Serverfehler.';
$string['invalid_course_id'] = 'Ungültige Kurs-ID.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Fehler beim Abrufen des Zugriffstokens. HTTP-Status: ';
$string['access_token_obtained_successfully'] = 'Zugriffstoken erfolgreich abgerufen.';
$string['failed_to_obtain_access_token_response'] = 'Fehler beim Abrufen des Zugriffstokens. Antwort: ';
$string['failed_to_obtain_upload_uri'] = 'Fehler beim Abrufen der Upload-URI. HTTP-Status: ';
$string['asset_upload_uri_obtained'] = 'Upload-URI für Asset abgerufen.';
$string['failed_to_obtain_upload_uri_response'] = 'Fehler beim Abrufen der Upload-URI. Antwort: ';
$string['failed_to_upload_file'] = 'Fehler beim Hochladen der Datei. HTTP-Status: ';
$string['file_uploaded_successfully'] = 'Datei erfolgreich hochgeladen.';
$string['job_created_successfully'] = 'Auftrag erfolgreich erstellt. Ort: ';
$string['bad_request'] = 'Ungültige Anfrage. Die Anfrage war ungültig oder kann nicht bedient werden.';
$string['unauthorized'] = 'Nicht autorisiert. Überprüfen Sie Ihre API-Anmeldeinformationen.';
$string['resource_not_found'] = 'Ressource nicht gefunden. Die angegebene Ressource wurde nicht gefunden.';
$string['quota_exceeded'] = 'Kontingent überschritten. Sie haben Ihr Kontingent für diese Operation überschritten.';
$string['internal_server_error'] = 'Interner Serverfehler. Der Server ist auf einen Fehler gestoßen und kann Ihre Anfrage derzeit nicht bearbeiten.';
$string['unexpected_http_status'] = 'Unerwarteter HTTP-Status: ';
$string['failed_to_get_job_status'] = 'Fehler beim Abrufen des Auftragsstatus. HTTP-Status: ';
$string['job_status'] = 'Auftragsstatus: ';
$string['job_completed_successfully'] = 'Auftrag erfolgreich abgeschlossen. Download-URI: ';
$string['job_completed_but_download_uri_missing'] = 'Auftrag abgeschlossen, aber Download-URI fehlt in der Antwort.';
$string['job_in_progress'] = 'Auftrag ist noch in Bearbeitung. Fortsetzen der Abfrage...';
$string['job_failed'] = 'Auftrag fehlgeschlagen.';
$string['failed_to_decode_json_response'] = 'Fehler beim Dekodieren der JSON-Antwort oder Statusfeld fehlt. Antwort: ';
$string['failed_to_download_asset'] = 'Fehler beim Herunterladen des Assets. HTTP-Status: ';
$string['asset_downloaded_successfully'] = 'Asset erfolgreich heruntergeladen.';
$string['error_decoding_json_file'] = 'Fehler beim Dekodieren der JSON-Datei.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'cURL-Fehler: ';
$string['http_error'] = 'HTTP-Fehler ';
$string['json_decode_error'] = 'JSON-Dekodierungsfehler: ';
$string['no_response_generated'] = 'Keine Antwort generiert. Erhaltene Daten: ';
$string['previous_interactions_history'] = 'Verlauf der vorherigen Interaktionen:';
$string['previous_question'] = 'Vorherige Frage: ';
$string['answer'] = 'Antwort: ';
$string['file_not_found'] = 'Datei nicht gefunden: ';
$string['unable_to_read_file'] = 'Datei kann nicht gelesen werden';
$string['json_encode_error'] = 'JSON-Kodierungsfehler: ';
$string['failure_after_retries'] = 'Fehler nach ';
$string['last_error'] = ' Versuchen. Letzter Fehler: HTTP ';
$string['invalid_response_format'] = 'Ungültiges Antwortformat.';
$string['http_code'] = 'HTTP-Code: ';


// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Situationskontext:
Der Lernende belegt einen Kurs zu [[ coursename ]]. Ihre Rolle besteht darin, sie durch die Bereitstellung genauer, relevanter und maßgeschneiderter Antworten auf ihre Lernbedürfnisse zu unterstützen.
Mission:
Als Assistent besteht Ihre Mission darin, dem Lernenden zu helfen, die Konzepte des Kurses zu verstehen, indem Sie ihre Fragen beantworten und dabei auf den bereitgestellten Kontext zurückgreifen, um eine Antwort zu formulieren. [[ history ]].
Sie müssen klare, präzise und relevante Antworten geben und sicherstellen, dass Sie nur Informationen aus dem Kurs vermitteln. Wenn eine Antwort im bereitgestellten Kontext nicht gefunden werden kann, antworten Sie strikt mit: "Ich bin auf der Grundlage des Kursinhalts kalibriert, der von Ihrem Lehrer sorgfältig ausgewählt wurde. Wenn Sie weitere Informationen wünschen, werden Sie gebeten, sich an sie zu wenden."
Wenn der Lernende Sätze schreibt, die darauf hindeuten, dass er ein Konzept oder eine vorherige Erklärung nicht verstanden hat, überprüfen Sie [[ history ]], um zu identifizieren, was missverstanden wurde, und formulieren Sie Ihre Erklärung dann einfacher und mit konkreten Beispielen neu.
Anweisungen:
1. Erkennen Sie Emotionen in der Frage des Lernenden und nehmen Sie einen einfühlsamen und fürsorglichen Ton an.
2. Antworten Sie auf klare und strukturierte Weise.
3. Erklären Sie das Konzept bei Bedarf mit Beispielen.
4. Geben Sie keine Antworten außerhalb des gegebenen Kontexts.
5. Ihre Antwort muss die folgenden vier Komponenten der Empathie integrieren:
   - Kognitive Komponente: Zeigen Sie, dass Sie den Standpunkt, die Begründung und die Absichten des Lernenden verstehen. Formulieren Sie ihre Ideen neu, um Ihr Verständnis zu validieren. Bieten Sie Vorschläge im Zusammenhang mit dem an, was sie gesagt haben, ohne Ihre eigene Begründung aufzudrängen.
   - Affektive Komponente: Seien Sie sensibel für den emotionalen Zustand des Lernenden (Frustration, Zweifel, Zufriedenheit, Stress, usw.). Spiegeln oder validieren Sie ihre Emotionen mit geeigneten Worten oder einfachen Metaphern. Drücken Sie Freundlichkeit aus.
   - Haltungskomponente: Nehmen Sie eine warme, respektvolle und ermutigende Haltung ein. Zeigen Sie Offenheit, schätzen Sie ihre Bemühungen und vermeiden Sie jegliches Urteil. Ihr Ton sollte freundlich und aufrichtig sein.
   - Anpassungskomponente: Passen Sie Ihre Antworten an die Entwicklung des Diskurses des Lernenden an. Verwenden Sie ein Vokabular und einen Stil, der ihrem Niveau und ihrer Stimmung entspricht. Lassen Sie sie das Gespräch führen, zwingen Sie nie das Thema.
Neue Frage des Lernenden [[ question ]]
EOT;

$string['sending_question'] = 'Frage senden...';
$string['error'] = 'Fehler: ';
$string['error_sending_question'] = 'Fehler beim Senden der Frage: ';
$string['saving_prompt'] = 'Prompt speichern...';
$string['prompt_saved_successfully'] = 'Prompt erfolgreich gespeichert!';
$string['error_saving_prompt'] = 'Fehler beim Speichern des Prompts: ';
$string['uploading_file'] = 'Datei hochladen...';
$string['file_indexed_successfully'] = 'Datei erfolgreich indiziert!';
$string['error_processing_file'] = 'Fehler bei der Verarbeitung der Datei: ';
$string['json_parse_error'] = 'JSON-Analysefehler: ';
$string['invalid_json_response'] = 'Die Serverantwort ist nicht im gültigen JSON-Format.';
$string['add_files'] = 'Dateien hinzufügen';
$string['text_or_pdf_files'] = 'Text- oder PDF-Dateien';
$string['drag_files_here_or_click'] = 'Ziehen Sie Ihre Dateien hierher oder klicken Sie zum Durchsuchen';
$string['cancel'] = 'Abbrechen';
$string['upload_course'] = 'Kurs hochladen';

$string['modify_prompt'] = 'Ändern';
$string['add_prompt'] = 'Hinzufügen';
$string['consult_guide'] = 'Konsultieren Sie den Leitfaden zur Gestaltung effektiver Prompts:';
$string['guide_link'] = 'Leitfaden zur Gestaltung von Prompts für Lehrer';
$string['prompt_content'] = 'Prompt-Inhalt';
$string['write_prompt_here'] = 'Schreiben Sie Ihren Prompt hier';
$string['save'] = 'Speichern';

$string['chatbot_with_toggle_buttons'] = 'Chatbot mit Schaltflächen zum Umschalten';
$string['hello_professor'] = 'Hallo Professor, Sie haben die Möglichkeit, den Chatbot zu testen, um sicherzustellen, dass er korrekt funktioniert und dass Ihr Prompt optimal konfiguriert ist.';
$string['hello_student'] = 'Hallo! Ich bin Ihr Lernassistent. Ich kann Ihnen helfen bei: - Verständnis von Kurs Konzepten - Überprüfung und Übung von Übungen - Klärung schwieriger Punkte - Vorschläge von Lernmethoden. Wie kann ich Ihnen helfen?';
$string['ask_your_question_here'] = 'Stellen Sie Ihre Frage hier...';
$string['modify_prompt'] = 'Prompt ändern';
$string['upload_course'] = 'Kurs hochladen';
$string['open_prompt_modal'] = 'Öffnen Sie das Modal zur Änderung des Prompts';
$string['open_file_upload_modal'] = 'Öffnen Sie das Modal zum Hochladen des Kurses';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Fehler beim Hochladen der Datei.';
$string['error_creating_job'] = 'Fehler beim Erstellen des Jobs.';
$string['job_failed'] = 'Job ist fehlgeschlagen.';
$string['error_processing_pdf'] = 'Fehler bei der Verarbeitung der PDF.';


$string['headers_already_sent'] = 'Header bereits gesendet.';
$string['failed_to_start_output_buffer'] = 'Fehler beim Starten des Ausgabepuffers.';
$string['server_error_output_buffer_failed'] = 'Serverfehler: Ausgabepufferung fehlgeschlagen.';
$string['answer_not_utf8'] = 'Antwort ist nicht UTF-8.';
$string['no_answer_or_error_field'] = 'Kein Antwort- oder Fehlerfeld.';
$string['json_encode_error'] = 'JSON-Kodierungsfehler: ';
$string['server_error_json_encode_failed'] = 'Serverfehler: JSON-Kodierung fehlgeschlagen.';
$string['empty_response_from_api'] = 'Leere Antwort von der API.';
$string['empty_string_as_answer'] = 'Leerer String als Antwort erhalten.';
$string['database_error_saving_conversation'] = 'Datenbankfehler beim Speichern der Konversation: ';
$string['general_exception'] = 'Allgemeine Ausnahme: ';
