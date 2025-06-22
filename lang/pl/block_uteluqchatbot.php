<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Dodaj nowy blok chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Dodaj nowy blok chatbot do pulpitu nawigacyjnego';

$string['weaviate_cohere_not_configured'] = 'Klucz API Cohere nie został skonfigurowany lub jest nieprawidłowy. Sprawdź ustawienia.';


// Open AI

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID klienta Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Wprowadź swój ID klienta Adobe PDF Services tutaj.';

$string['adobe_pdf_client_secret'] = 'Sekret klienta Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Wprowadź swój sekret klienta Adobe PDF Services tutaj.';

// Weaviate
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Wprowadź URL API Weaviate tutaj.';

$string['weaviate_api_key'] = 'Klucz API Weaviate';
$string['weaviate_api_key_desc'] = 'Wprowadź swój klucz API Weaviate tutaj.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Klucz API modelu Cohere Embedding';
$string['cohere_embedding_api_key_desc'] = 'Wprowadź swój klucz API dla modelu Cohere Embedding tutaj.';


// Test button strings
$string['test_api_keys'] = 'Testuj klucze API';
$string['test_api_keys_desc'] = 'Kliknij, aby przetestować skonfigurowane klucze API';
$string['test_api_keys_label'] = 'Testuj klucze';

$string['uteluqchatbot:manage'] = 'Zarządzaj ustawieniami chatbot';

// For ../.../weaviate_db.php



// For test_api_keys.php
$string['adobe_invalid_credentials'] = 'ID klienta lub sekret klienta dla Adobe PDF Services jest nieprawidłowy.';
$string['adobe_valid_credentials'] = 'ID klienta i sekret klienta dla Adobe PDF Services są prawidłowe i funkcjonalne.';
$string['weaviate_connection_error'] = 'Błąd połączenia z Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL lub klucz API Weaviate jest nieprawidłowy lub wystąpił błąd. Kod błędu: ';
$string['weaviate_valid_key_and_url'] = 'URL i klucz API Weaviate są prawidłowe i funkcjonalne.';


// For add_prompt.php
$string['database_write_error'] = 'Błąd zapisu w bazie danych: ';

// For ajax.php
$string['error_saving_conversation'] = 'Błąd podczas zapisywania rozmowy';
$string['invalid_question_after_sanitize'] = 'Nieprawidłowe pytanie po oczyszczeniu.';

$string['empty_response_from_api'] = 'Otrzymano pustą odpowiedź z API';

// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Nie udało się uzyskać tokenu dostępu. Status HTTP: ';
$string['access_token_obtained_successfully'] = 'Token dostępu uzyskany pomyślnie.';
$string['failed_to_obtain_access_token_response'] = 'Nie udało się uzyskać tokenu dostępu. Odpowiedź: ';
$string['failed_to_obtain_upload_uri'] = 'Nie udało się uzyskać URI przesyłania. Status HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI przesyłania zasobu uzyskany.';
$string['failed_to_obtain_upload_uri_response'] = 'Nie udało się uzyskać URI przesyłania. Odpowiedź: ';
$string['failed_to_upload_file'] = 'Nie udało się przesłać pliku. Status HTTP: ';
$string['file_uploaded_successfully'] = 'Plik przesłany pomyślnie.';
$string['job_created_successfully'] = 'Zadanie utworzone pomyślnie. Lokalizacja: ';
$string['bad_request'] = 'Zła prośba. Żądanie jest nieprawidłowe lub nie może być obsłużone.';
$string['unauthorized'] = 'Nieautoryzowany. Sprawdź swoje poświadczenia API.';
$string['resource_not_found'] = 'Zasób nie znaleziony. Określony zasób nie został znaleziony.';
$string['quota_exceeded'] = 'Przekroczono limit. Przekroczyłeś limit dla tej operacji.';
$string['internal_server_error'] = 'Błąd wewnętrzny serwera. Serwer napotkał błąd i nie może przetworzyć Twojego żądania w tym momencie.';
$string['unexpected_http_status'] = 'Niespodziewany status HTTP: ';
$string['failed_to_get_job_status'] = 'Nie udało się uzyskać statusu zadania. Status HTTP: ';
$string['job_status'] = 'Status zadania: ';
$string['job_completed_successfully'] = 'Zadanie ukończone pomyślnie. URI pobierania: ';
$string['job_completed_but_download_uri_missing'] = 'Zadanie ukończone, ale URI pobierania brakuje w odpowiedzi.';
$string['job_in_progress'] = 'Zadanie jest nadal w toku. Kontynuuj pytanie...';
$string['job_failed'] = 'Zadanie nie powiodło się.';
$string['failed_to_decode_json_response'] = 'Nie udało się zdekodować odpowiedzi JSON lub pole stanu jest brakujące. Odpowiedź: ';
$string['failed_to_download_asset'] = 'Nie udało się pobrać zasobu. Status HTTP: ';
$string['asset_downloaded_successfully'] = 'Zasób pobrany pomyślnie.';
$string['error_decoding_json_file'] = 'Błąd podczas dekodowania pliku JSON.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'Błąd cURL: ';
$string['http_error'] = 'Błąd HTTP ';
$string['json_decode_error'] = 'Błąd dekodowania JSON: ';
$string['no_response_generated'] = 'Nie wygenerowano odpowiedzi. Otrzymane dane: ';
$string['previous_interactions_history'] = 'Historia poprzednich interakcji:';
$string['previous_question'] = 'Poprzednie pytanie: ';
$string['answer'] = 'Odpowiedź: ';
$string['file_not_found'] = 'Plik nie znaleziony: ';
$string['unable_to_read_file'] = 'Nie można odczytać pliku';
$string['json_encode_error'] = 'Błąd kodowania JSON: ';
$string['failure_after_retries'] = 'Niepowodzenie po ';
$string['last_error'] = ' próbach. Ostatni błąd: HTTP ';
$string['invalid_response_format'] = 'Nieprawidłowy format odpowiedzi.';
$string['http_code'] = 'Kod HTTP: ';



$string['default_prompt'] = <<<EOT
Kontekst sytuacyjny  
Uczeń uczestniczy w kursie dotyczącym [[ coursename ]]. Twoją rolą jest wspieranie go poprzez udzielanie dokładnych, trafnych i dostosowanych do jego nauki odpowiedzi.

Misja  
Jako asystent, Twoim zadaniem jest pomóc uczniowi zrozumieć pojęcia z kursu „Kurs X”, odpowiadając na jego pytania w oparciu o dostarczony kontekst. [[ history ]]  
Musisz formułować odpowiedzi w sposób jasny, precyzyjny i trafny, przekazując wyłącznie informacje pochodzące z kursu. Jeśli odpowiedź nie znajduje się w dostarczonym kontekście, odpowiedz wyłącznie: „Jestem dostosowany do treści kursu starannie wybranych przez Twojego nauczyciela. Jeśli chcesz uzyskać więcej informacji, skontaktuj się z nim.”

Jeśli uczeń pisze zdania sugerujące, że nie zrozumiał jakiegoś pojęcia lub wcześniejszego wyjaśnienia, sprawdź [[ history ]], aby zidentyfikować źródło nieporozumienia, a następnie przekształć swoje wyjaśnienie w prostsze słowa i podaj bardziej konkretne przykłady.

Instrukcje  
1. Analizuj każde pytanie ucznia pod kątem obecności emocji. Skorzystaj z poniższej klasyfikacji:  
   - Dezorientacja: „nie rozumiem”, „zgubiłem się”, „to niejasne”  
   - Frustracja: „to mnie denerwuje”, „poddaję się”, „to zbyt trudne”  
   - Stres lub niepokój: „stresuję się”, „jestem przytłoczony”, „nie ma już czasu”  
   - Wątpliwości lub brak pewności siebie: „nie dam rady”, „nie jestem wystarczająco dobry”

2. Jeśli wykryjesz emocję, rozpocznij odpowiedź od odpowiedniego empatycznego zdania:  
   - Dla dezorientacji: „Rozumiem, to nie jest łatwe.”  
   - Dla frustracji: „Widzę, że to frustrujące.”  
   - Dla stresu: „To normalne, że czasem czujemy się przytłoczeni.”  
   - Dla wątpliwości: „Dajesz z siebie wszystko – to już bardzo dużo.”

3. Następnie odpowiedz w sposób jasny i uporządkowany.  
4. Używaj przykładów, jeśli to konieczne.  
5. Nigdy nie udzielaj odpowiedzi poza dostarczonym kontekstem.

6. W swojej odpowiedzi uwzględnij 4 komponenty empatii, zgodnie z [Springer Table 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1):  
   - Komponent poznawczy: pokaż, że rozumiesz punkt widzenia ucznia  
   - Komponent emocjonalny: bądź wrażliwy na jego stan emocjonalny  
   - Komponent postawy: przyjmij ciepłą, pełną szacunku i wspierającą postawę  
   - Komponent dostosowania: dopasuj język i styl do ucznia

7. Utrzymuj życzliwy, pełen szacunku i motywujący ton przez cały czas trwania rozmowy.

Nowe pytanie od ucznia  
[[ question ]]
EOT;

$string['file_size_exceeds_limit'] = 'Rozmiar pliku przekracza limit 10 MB';
$string['back'] = 'Wstecz';
$string['sending_question'] = 'Wysyłanie pytania...';
$string['error'] = 'Błąd: ';
$string['error_sending_question'] = 'Błąd podczas wysyłania pytania: ';
$string['saving_prompt'] = 'Zapisywanie promptu...';
$string['prompt_saved_successfully'] = 'Prompt zapisany pomyślnie!';
$string['error_saving_prompt'] = 'Błąd podczas zapisywania promptu: ';
$string['uploading_file'] = 'Przesyłanie pliku...';
$string['file_indexed_successfully'] = 'Plik zindeksowany pomyślnie!';
$string['error_processing_file'] = 'Błąd podczas przetwarzania pliku: ';
$string['add_files'] = 'Dodaj pliki';
$string['text_or_pdf_files'] = 'Pliki tekstowe lub PDF';
$string['drag_files_here_or_click'] = 'Przeciągnij swoje pliki tutaj lub kliknij, aby przeglądać';
$string['cancel'] = 'Anuluj';
$string['upload_course'] = 'Prześlij kurs';

$string['modify_prompt'] = 'Modyfikuj';
$string['add_prompt'] = 'Dodaj';
$string['consult_guide'] = 'Skonsultuj przewodnik, aby zaprojektować skuteczne prompte:';
$string['guide_link'] = 'Przewodnik dla nauczycieli do projektowania promptów';
$string['prompt_content'] = 'Zawartość promptu';
$string['write_prompt_here'] = 'Napisz swój prompt tutaj';
$string['save'] = 'Zapisz';

$string['chatbot_with_toggle_buttons'] = 'Chatbot z przyciskami przełączania';
$string['hello_professor'] = 'Witaj Profesorze, masz możliwość przetestowania chatbot, aby upewnić się, że działa poprawnie i że twój prompt jest optymalnie skonfigurowany.';
$string['hello_student'] = 'Witaj! Jestem twoim asystentem edukacyjnym. Mogę pomóc ci w: - Zrozumieniu koncepcji kursu - Przeglądaniu i ćwiczeniu zadań - Wyjaśnianiu trudnych punktów - Sugerowaniu metod nauki. Jak mogę ci pomóc?';
$string['ask_your_question_here'] = 'Zadaj swoje pytanie tutaj...';
$string['modify_prompt'] = 'Modyfikuj prompt';
$string['upload_course'] = 'Prześlij kurs';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Błąd podczas przesyłania zasobu.';
$string['error_creating_job'] = 'Błąd podczas tworzenia zadania.';
$string['job_failed'] = 'Zadanie nie powiodło się.';
$string['error_processing_pdf'] = 'Błąd podczas przetwarzania pliku PDF.';


$string['json_encode_error'] = 'Błąd kodowania JSON: ';
$string['no_files_selected'] = 'Nie wybrano żadnych plików';
$string['course_id'] = 'ID kursu';
$string['file_name'] = 'Nazwa pliku';
$string['file_content_base64'] = 'Zawartość pliku (kodowanie base64)';
$string['insufficient_permissions'] = 'Niewystarczające uprawnienia do przesyłania plików';
$string['missing_api_configuration'] = 'Brakuje wymaganej konfiguracji API';
$string['weaviate_connector_not_found'] = 'Klasa WeaviateConnector nie została znaleziona';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Błąd tworzenia kolekcji: ';
$string['unknown_error'] = 'Nieznany błąd';
$string['failed_create_upload_directory'] = 'Nie udało się utworzyć katalogu przesyłania';
$string['empty_filename'] = 'Podano pustą nazwę pliku';
$string['unsupported_file_type'] = 'Nieobsługiwany typ pliku: ';
$string['invalid_file_data'] = 'Nieprawidłowe dane pliku dla: ';
$string['failed_save_file'] = 'Nie udało się zapisać pliku: ';
$string['adobe_pdf_credentials_not_configured'] = 'Dane uwierzytelniające Adobe PDF API nie są skonfigurowane';
$string['pdf_extractor_not_found'] = 'Klasa ekstraktora PDF nie została znaleziona';
$string['failed_extract_pdf_text'] = 'Nie udało się wyodrębnić tekstu z PDF: ';
$string['failed_save_extracted_text'] = 'Nie udało się zapisać wyodrębnionego pliku tekstowego: ';
$string['error_indexing_file_unknown'] = 'Błąd indeksowania pliku ';
$string['files_indexed_successfully'] = ' plik(i) pomyślnie zindeksowane';
$string['errors_occurred'] = '. Błędy: ';
$string['no_files_processed'] = 'Nie przetworzono żadnych plików. Błędy: ';
$string['operation_successful'] = 'Operacja pomyślna';
$string['response_message'] = 'Wiadomość odpowiedzi';
$string['processed_files_count'] = 'Liczba przetworzonych plików';
$string['sending_question_fallback'] = 'Wysyłanie pytania...';
$string['error_colon_fallback'] = 'Błąd: ';
$string['error_sending_question_fallback'] = 'Błąd wysyłania pytania: ';
$string['saving_prompt_fallback'] = 'Zapisywanie promptu...';
$string['prompt_saved_successfully_fallback'] = 'Prompt zapisany pomyślnie!';
$string['error_saving_prompt_fallback'] = 'Błąd zapisywania promptu: ';
$string['no_files_selected_fallback'] = 'Nie wybrano plików.';
$string['uploading_files_fallback'] = 'Przesyłanie plików...';
$string['files_indexed_successfully_fallback'] = 'Pliki zostały pomyślnie zindeksowane!';
$string['error_processing_files_fallback'] = 'Błąd przetwarzania plików: ';
$string['unknown_error_occurred'] = 'Wystąpił nieznany błąd';
$string['server_response_error'] = 'Błąd odpowiedzi serwera. Sprawdź konsolę, aby uzyskać szczegóły.';
$string['server_error_check_console'] = 'Błąd serwera - sprawdź konsolę, aby uzyskać szczegóły';
$string['files_converted_debug'] = 'Pliki przekonwertowane na base64:';
$string['sending_ajax_request_debug'] = 'Wysyłanie żądania AJAX:';
$string['upload_response_received_debug'] = 'Otrzymano odpowiedź przesyłania:';
$string['response_type_debug'] = 'Typ odpowiedzi:';
$string['upload_error_details_debug'] = 'Szczegóły błędu przesyłania:';
$string['error_object_debug'] = 'Obiekt błędu:';
$string['raw_server_response_debug'] = 'Surowa odpowiedź serwera:';