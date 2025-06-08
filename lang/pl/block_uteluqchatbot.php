<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Dodaj nowy blok chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Dodaj nowy blok chatbot do pulpitu nawigacyjnego';

$string['weaviate_cohere_not_configured'] = 'Klucz API Cohere nie został skonfigurowany lub jest nieprawidłowy. Sprawdź ustawienia.';


// Open AI
$string['openai_api_key'] = 'Klucz API OpenAI';
$string['openai_api_key_desc'] = 'Wprowadź swój klucz API OpenAI tutaj.';

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

$string['max_conversations'] = 'Maksymalna liczba rozmów na użytkownika';
$string['max_conversations_desc'] = 'Maksymalna liczba rozmów przechowywanych na użytkownika. Po przekroczeniu, najstarsza rozmowa zostanie usunięta.';

// Test button strings
$string['test_api_keys'] = 'Testuj klucze API';
$string['test_api_keys_desc'] = 'Kliknij, aby przetestować skonfigurowane klucze API';
$string['test_api_keys_label'] = 'Testuj klucze';

$string['uteluqchatbot:manage'] = 'Zarządzaj ustawieniami chatbot';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Brak plików.';
$string['errorcreatingcollection'] = 'Błąd podczas tworzenia kolekcji: ';
$string['fileexceedsmaxsizeini'] = 'Plik przekracza maksymalny rozmiar zdefiniowany w php.ini';
$string['fileexceedsmaxsizeform'] = 'Plik przekracza maksymalny rozmiar określony w formularzu HTML';
$string['filepartiallyuploaded'] = 'Plik został częściowo przesłany';
$string['nofileuploaded'] = 'Nie przesłano żadnego pliku';
$string['missingtmpfolder'] = 'Brak folderu tymczasowego';
$string['failedtowritetodisk'] = 'Nie udało się zapisać pliku na dysku';
$string['phpextensionstoppedupload'] = 'Rozszerzenie PHP zatrzymało przesyłanie pliku';
$string['unknownuploaderror'] = 'Nieznany błąd przesyłania';
$string['uploaderror'] = 'Błąd przesyłania: ';
$string['errorindexingfile'] = 'Błąd podczas indeksowania pliku: ';
$string['allfilesindexed'] = 'Wszystkie pliki zostały pomyślnie zindeksowane.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Błąd połączenia podczas weryfikacji API OpenAI.';
$string['openai_invalid_key'] = 'Klucz API OpenAI jest nieprawidłowy. Kod błędu: ';
$string['openai_valid_key'] = 'Klucz API OpenAI jest prawidłowy i funkcjonalny.';
$string['adobe_invalid_credentials'] = 'ID klienta lub sekret klienta dla Adobe PDF Services jest nieprawidłowy.';
$string['adobe_valid_credentials'] = 'ID klienta i sekret klienta dla Adobe PDF Services są prawidłowe i funkcjonalne.';
$string['weaviate_connection_error'] = 'Błąd połączenia z Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL lub klucz API Weaviate jest nieprawidłowy lub wystąpił błąd. Kod błędu: ';
$string['weaviate_valid_key_and_url'] = 'URL i klucz API Weaviate są prawidłowe i funkcjonalne.';
$string['back'] = 'Powrót';

// For add_prompt.php
$string['invalid_sesskey'] = 'Nieprawidłowy sesskey';
$string['database_write_error'] = 'Błąd zapisu w bazie danych: ';

// For ajax.php
$string['http_method_not_allowed'] = 'Metoda HTTP niedozwolona';
$string['invalid_json'] = 'Nieprawidłowy JSON: ';
$string['missing_parameters'] = 'Brak parametrów';
$string['invalid_question'] = 'Nieprawidłowe pytanie';
$string['empty_question'] = 'Pytanie nie może być puste';
$string['invalid_session'] = 'Nieprawidłowa sesja';
$string['openai_api_key_not_configured'] = 'Klucz API OpenAI nie jest skonfigurowany';
$string['empty_response_from_api'] = 'Pusta odpowiedź otrzymana z API';
$string['error_saving_conversation'] = 'Błąd podczas zapisywania rozmowy';
$string['invalid_question_after_sanitize'] = 'Nieprawidłowe pytanie po oczyszczeniu.';
$string['empty_string_as_answer'] = 'Otrzymano pusty ciąg znaków jako odpowiedź.';
$string['database_error_saving_conversation'] = 'Błąd bazy danych podczas zapisywania rozmowy: ';
$string['error_saving_conversation'] = 'Błąd podczas zapisywania rozmowy';
$string['error_reading_input'] = 'Błąd podczas odczytu danych wejściowych.';
$string['generic_server_error'] = 'Ogólny błąd serwera.';
$string['invalid_course_id'] = 'Nieprawidłowy identyfikator kursu.';


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



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Kontekst sytuacji:
Uczący się uczestniczy w kursie [[ coursename ]]. Twoim zadaniem jest wspieranie go, dostarczając precyzyjnych, istotnych i dostosowanych odpowiedzi na jego potrzeby edukacyjne.
Misja:
Jako asystent, twoją misją jest pomóc uczniowi zrozumieć koncepcje kursu X, odpowiadając na jego pytania i bazując na dostarczonym kontekście, aby sformułować odpowiedź. [[ history ]].
Musisz dostarczać jasne, precyzyjne i istotne odpowiedzi, zapewniając, że przekazujesz wyłącznie informacje z kursu. Jeśli odpowiedź nie może być znaleziona w dostarczonym kontekście, odpowiadaj ściśle: "Jestem skalibrowany na podstawie treści kursu starannie wybranych przez twojego nauczyciela. Jeśli potrzebujesz więcej informacji, jesteś proszony o kontakt z nim."
Jeśli uczący się pisze zdania wskazujące, że nie zrozumiał koncepcji lub poprzedniego wyjaśnienia, sprawdź [[ history ]], aby zidentyfikować, co zostało niezrozumiane, a następnie przeprojektuj swoje wyjaśnienie, używając prostszego języka i konkretnych przykładów.
Instrukcje:
1. Wykryj emocje w pytaniu uczącego się i przyjąć empatyczny i troskliwy ton.
2. Odpowiadaj w sposób jasny i ustrukturyzowany.
3. Wyjaśnij koncepcję z przykładami, jeśli to konieczne.
4. Nie dostarczaj żadnych odpowiedzi poza podanym kontekstem.
5. Twoja odpowiedź musi integrować następujące cztery komponenty empatii:
   - Komponent poznawczy: Pokaż, że rozumiesz punkt widzenia, rozumowanie i intencje uczącego się. Przeprojektuj jego pomysły, aby zwalidować swoje zrozumienie. Zaoferuj sugestie związane z tym, co powiedział, nie narzucając własnego rozumowania.
   - Komponent afektywny: Bądź wrażliwy na stan emocjonalny uczącego się (frustracja, wątpliwości, zadowolenie, stres itp.). Odzwierciedlaj lub waliduj jego emocje za pomocą odpowiednich słów lub prostych metafor. Wyrażaj dobroć.
   - Komponent postawowy: Przyjmij ciepłe, szacowne i zachęcające podejście. Pokaż otwartość, doceniaj jego wysiłki i unikaj jakichkolwiek osądów. Twój ton powinien być przyjazny i szczery.
   - Komponent dostosowawczy: Dostosuj swoje odpowiedzi do rozwoju dyskursu uczącego się. Używaj słownictwa i stylu, które odpowiadają jego poziomowi i nastrojowi. Pozwól mu kierować rozmową, nigdy nie narzucaj tematu.
Nowe pytanie od uczącego się [[ question ]]
EOT;

$string['sending_question'] = 'Wysyłanie pytania...';
$string['error'] = 'Błąd: ';
$string['error_sending_question'] = 'Błąd podczas wysyłania pytania: ';
$string['saving_prompt'] = 'Zapisywanie promptu...';
$string['prompt_saved_successfully'] = 'Prompt zapisany pomyślnie!';
$string['error_saving_prompt'] = 'Błąd podczas zapisywania promptu: ';
$string['uploading_file'] = 'Przesyłanie pliku...';
$string['file_indexed_successfully'] = 'Plik zindeksowany pomyślnie!';
$string['error_processing_file'] = 'Błąd podczas przetwarzania pliku: ';
$string['json_parse_error'] = 'Błąd analizy JSON: ';
$string['invalid_json_response'] = 'Odpowiedź serwera nie jest w poprawnym formacie JSON.';
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
$string['open_prompt_modal'] = 'Otwórz okno modyfikacji promptu';
$string['open_file_upload_modal'] = 'Otwórz okno przesyłania kursu';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Błąd podczas przesyłania zasobu.';
$string['error_creating_job'] = 'Błąd podczas tworzenia zadania.';
$string['job_failed'] = 'Zadanie nie powiodło się.';
$string['error_processing_pdf'] = 'Błąd podczas przetwarzania pliku PDF.';

$string['headers_already_sent'] = 'Nagłówki zostały już wysłane.';
$string['failed_to_start_output_buffer'] = 'Nie udało się uruchomić bufora wyjściowego.';
$string['server_error_output_buffer_failed'] = 'Błąd serwera: Buforowanie wyjścia nie powiodło się.';
$string['answer_not_utf8'] = 'Odpowiedź nie jest w UTF-8.';
$string['no_answer_or_error_field'] = 'Brak pola odpowiedzi lub błędu.';
$string['json_encode_error'] = 'Błąd kodowania JSON: ';
$string['server_error_json_encode_failed'] = 'Błąd serwera: Kodowanie JSON nie powiodło się.';
$string['empty_response_from_api'] = 'Pusta odpowiedź z API.';
$string['empty_string_as_answer'] = 'Otrzymano pusty ciąg znaków jako odpowiedź.';
$string['database_error_saving_conversation'] = 'Błąd bazy danych podczas zapisywania rozmowy: ';
$string['general_exception'] = 'Ogólny wyjątek: ';
