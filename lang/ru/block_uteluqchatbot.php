<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Чатбот';
$string['uteluqchatbot:addinstance'] = 'Добавить новый блок чатбота';
$string['uteluqchatbot:myaddinstance'] = 'Добавить новый блок чатбота на Панель';

$string['weaviate_cohere_not_configured'] = 'Ключ API Cohere не настроен или недействителен. Проверьте настройки.';


// Open AI
$string['openai_api_key'] = 'Ключ API OpenAI';
$string['openai_api_key_desc'] = 'Введите ваш ключ API OpenAI здесь.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID клиента Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Введите ваш ID клиента Adobe PDF Services здесь.';

$string['adobe_pdf_client_secret'] = 'Секрет клиента Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Введите ваш секрет клиента Adobe PDF Services здесь.';

// Weaviate
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Введите URL API Weaviate здесь.';

$string['weaviate_api_key'] = 'Ключ API Weaviate';
$string['weaviate_api_key_desc'] = 'Введите ваш ключ API Weaviate здесь.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Ключ API модели Cohere Embedding';
$string['cohere_embedding_api_key_desc'] = 'Введите ваш ключ API для модели Cohere Embedding здесь.';

$string['max_conversations'] = 'Максимальное количество разговоров на пользователя';
$string['max_conversations_desc'] = 'Максимальное количество разговоров, хранящихся на пользователя. Если превышено, самый старый разговор будет удален.';

// Test button strings
$string['test_api_keys'] = 'Тестировать ключи API';
$string['test_api_keys_desc'] = 'Нажмите, чтобы протестировать настроенные ключи API';
$string['test_api_keys_label'] = 'Тестировать ключи';

$string['uteluqchatbot:manage'] = 'Управлять настройками чатбота';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Файлы отсутствуют.';
$string['errorcreatingcollection'] = 'Ошибка при создании коллекции: ';
$string['fileexceedsmaxsizeini'] = 'Файл превышает максимальный размер, определенный в php.ini';
$string['fileexceedsmaxsizeform'] = 'Файл превышает максимальный размер, указанный в HTML-форме';
$string['filepartiallyuploaded'] = 'Файл был загружен только частично';
$string['nofileuploaded'] = 'Файл не был загружен';
$string['missingtmpfolder'] = 'Временная папка отсутствует';
$string['failedtowritetodisk'] = 'Не удалось записать файл на диск';
$string['phpextensionstoppedupload'] = 'Расширение PHP остановило загрузку файла';
$string['unknownuploaderror'] = 'Неизвестная ошибка загрузки';
$string['uploaderror'] = 'Ошибка загрузки: ';
$string['errorindexingfile'] = 'Ошибка при индексировании файла: ';
$string['allfilesindexed'] = 'Все файлы были успешно проиндексированы.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Ошибка соединения при проверке API OpenAI.';
$string['openai_invalid_key'] = 'Ключ API OpenAI недействителен. Код ошибки: ';
$string['openai_valid_key'] = 'Ключ API OpenAI действителен и функционален.';
$string['adobe_invalid_credentials'] = 'ID клиента или секрет клиента для Adobe PDF Services недействительны.';
$string['adobe_valid_credentials'] = 'ID клиента и секрет клиента для Adobe PDF Services действительны и функциональны.';
$string['weaviate_connection_error'] = 'Ошибка соединения с Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'URL или ключ API Weaviate недействительны или произошла ошибка. Код ошибки: ';
$string['weaviate_valid_key_and_url'] = 'URL и ключ API Weaviate действительны и функциональны.';
$string['back'] = 'Назад';

// For add_prompt.php
$string['invalid_sesskey'] = 'Недействительный sesskey';
$string['database_write_error'] = 'Ошибка записи в базу данных: ';

// For ajax.php
$string['http_method_not_allowed'] = 'Метод HTTP не разрешен';
$string['invalid_json'] = 'Недействительный JSON: ';
$string['missing_parameters'] = 'Отсутствующие параметры';
$string['invalid_question'] = 'Недействительный вопрос';
$string['empty_question'] = 'Вопрос не может быть пустым';
$string['invalid_session'] = 'Недействительная сессия';
$string['openai_api_key_not_configured'] = 'Ключ API OpenAI не настроен';
$string['empty_response_from_api'] = 'Пустой ответ получен от API';
$string['error_saving_conversation'] = 'Ошибка при сохранении разговора';
$string['invalid_question_after_sanitize'] = 'Неверный вопрос после очистки.';
$string['empty_string_as_answer'] = 'Получена пустая строка в качестве ответа.';
$string['database_error_saving_conversation'] = 'Ошибка базы данных при сохранении разговора: ';
$string['error_saving_conversation'] = 'Ошибка при сохранении разговора';
$string['error_reading_input'] = 'Ошибка чтения ввода.';
$string['generic_server_error'] = 'Общая ошибка сервера.';
$string['invalid_course_id'] = 'Неверный идентификатор курса.';


// For classes/pdf_extract_api.php
$string['failed_to_obtain_access_token'] = 'Не удалось получить токен доступа. Статус HTTP: ';
$string['access_token_obtained_successfully'] = 'Токен доступа получен успешно.';
$string['failed_to_obtain_access_token_response'] = 'Не удалось получить токен доступа. Ответ: ';
$string['failed_to_obtain_upload_uri'] = 'Не удалось получить URI загрузки. Статус HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI загрузки актива получен.';
$string['failed_to_obtain_upload_uri_response'] = 'Не удалось получить URI загрузки. Ответ: ';
$string['failed_to_upload_file'] = 'Не удалось загрузить файл. Статус HTTP: ';
$string['file_uploaded_successfully'] = 'Файл загружен успешно.';
$string['job_created_successfully'] = 'Задача создана успешно. Расположение: ';
$string['bad_request'] = 'Плохой запрос. Запрос недействителен или не может быть обслужен.';
$string['unauthorized'] = 'Неавторизован. Проверьте ваши учетные данные API.';
$string['resource_not_found'] = 'Ресурс не найден. Указанный ресурс не найден.';
$string['quota_exceeded'] = 'Квота превышена. Вы превысили квоту для этой операции.';
$string['internal_server_error'] = 'Внутренняя ошибка сервера. Сервер столкнулся с ошибкой и не может обработать ваш запрос в данный момент.';
$string['unexpected_http_status'] = 'Непредвиденный статус HTTP: ';
$string['failed_to_get_job_status'] = 'Не удалось получить статус задачи. Статус HTTP: ';
$string['job_status'] = 'Статус задачи: ';
$string['job_completed_successfully'] = 'Задача завершена успешно. URI для скачивания: ';
$string['job_completed_but_download_uri_missing'] = 'Задача завершена, но URI для скачивания отсутствует в ответе.';
$string['job_in_progress'] = 'Задача еще в процессе. Продолжайте опрос...';
$string['job_failed'] = 'Задача не удалась.';
$string['failed_to_decode_json_response'] = 'Не удалось декодировать ответ JSON или поле состояния отсутствует. Ответ: ';
$string['failed_to_download_asset'] = 'Не удалось скачать актив. Статус HTTP: ';
$string['asset_downloaded_successfully'] = 'Актив скачан успешно.';
$string['error_decoding_json_file'] = 'Ошибка при декодировании файла JSON.';

// For classes/weaviate_connector.php
$string['curl_error'] = 'Ошибка cURL: ';
$string['http_error'] = 'Ошибка HTTP ';
$string['json_decode_error'] = 'Ошибка декодирования JSON: ';
$string['no_response_generated'] = 'Ответ не сгенерирован. Полученные данные: ';
$string['previous_interactions_history'] = 'История предыдущих взаимодействий:';
$string['previous_question'] = 'Предыдущий вопрос: ';
$string['answer'] = 'Ответ: ';
$string['file_not_found'] = 'Файл не найден: ';
$string['unable_to_read_file'] = 'Невозможно прочитать файл';
$string['json_encode_error'] = 'Ошибка кодирования JSON: ';
$string['failure_after_retries'] = 'Неудача после ';
$string['last_error'] = ' попыток. Последняя ошибка: HTTP ';
$string['invalid_response_format'] = 'Неверный формат ответа.';
$string['http_code'] = 'HTTP код: ';



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Контекст ситуации:
Ученик проходит курс по [[ coursename ]]. Ваша роль — поддерживать его, предоставляя точные, актуальные и адаптированные ответы на его вопросы.
Миссия:
Как помощник, ваша миссия — помочь ученику понять концепции курса X, отвечая на его вопросы и опираясь на предоставленный контекст для формулирования ответа. [[ history ]].
Вы должны предоставлять четкие, точные и актуальные ответы, обеспечивая, что передаете только информацию из курса. Если ответ не может быть найден в предоставленном контексте, строго ответьте: "Я настроен на основе содержания курса, тщательно отобранного вашим учителем. Если вам нужна дополнительная информация, вы можете обратиться к нему."
Если ученик пишет предложения, указывающие на то, что он не понял концепцию или предыдущее объяснение, проверьте [[ history ]], чтобы определить, что было неправильно понято, а затем переформулируйте свое объяснение более просто и с конкретными примерами.
Инструкции:
1. Обнаруживайте эмоции в вопросе ученика и принимайте эмпатичный и заботливый тон.
2. Отвечайте четко и структурированно.
3. Объясняйте концепцию с примерами, если необходимо.
4. Не предоставляйте ответы вне заданного контекста.
5. Ваш ответ должен интегрировать следующие четыре компонента эмпатии:
   - Когнитивный компонент: Покажите, что вы понимаете точку зрения, рассуждения и намерения ученика. Переформулируйте его идеи, чтобы подтвердить свое понимание. Предлагайте советы, связанные с тем, что он сказал, не навязывая свое собственное рассуждение.
   - Афективный компонент: Будьте чувствительны к эмоциональному состоянию ученика (разочарование, сомнение, удовлетворение, стресс и т. д.). Отражайте или подтверждайте его эмоции с помощью соответствующих слов или простых метафор. Проявляйте доброту.
   - Аттитудинальный компонент: Принимайте теплое, уважительное и поощряющее отношение. Показывайте открытость, цените его усилия и избегайте любых суждений. Ваш тон должен быть дружелюбным и искренним.
   - Адаптационный компонент: Адаптируйте свои ответы к развитию речи ученика. Используйте лексику и стиль, соответствующие его уровню и настроению. Позвольте ему руководить разговором, никогда не навязывайте тему.
Новый вопрос от ученика [[ question ]]
EOT;

$string['sending_question'] = 'Отправка вопроса...';
$string['error'] = 'Ошибка: ';
$string['error_sending_question'] = 'Ошибка при отправке вопроса: ';
$string['saving_prompt'] = 'Сохранение подсказки...';
$string['prompt_saved_successfully'] = 'Подсказка сохранена успешно!';
$string['error_saving_prompt'] = 'Ошибка при сохранении подсказки: ';
$string['uploading_file'] = 'Загрузка файла...';
$string['file_indexed_successfully'] = 'Файл проиндексирован успешно!';
$string['error_processing_file'] = 'Ошибка при обработке файла: ';
$string['json_parse_error'] = 'Ошибка анализа JSON: ';
$string['invalid_json_response'] = 'Ответ сервера не находится в допустимом формате JSON.';
$string['add_files'] = 'Добавить файлы';
$string['text_or_pdf_files'] = 'Текстовые или PDF-файлы';
$string['drag_files_here_or_click'] = 'Перетащите свои файлы сюда или нажмите, чтобы выбрать';
$string['cancel'] = 'Отменить';
$string['upload_course'] = 'Загрузить курс';

$string['modify_prompt'] = 'Изменить';
$string['add_prompt'] = 'Добавить';
$string['consult_guide'] = 'Проконсультируйтесь с руководством для создания эффективных подсказок:';
$string['guide_link'] = 'Руководство по созданию подсказок для учителей';
$string['prompt_content'] = 'Содержание подсказки';
$string['write_prompt_here'] = 'Напишите свою подсказку здесь';
$string['save'] = 'Сохранить';

$string['chatbot_with_toggle_buttons'] = 'Чатбот с кнопками переключения';
$string['hello_professor'] = 'Здравствуйте, профессор. У вас есть возможность протестировать чатбот, чтобы убедиться, что он работает правильно и что ваша подсказка настроена оптимально.';
$string['hello_student'] = 'Здравствуйте! Я ваш помощник по обучению. Я могу помочь вам с: - Пониманием концепций курса - Повторением и практикой упражнений - Разъяснением сложных моментов - Предложением методов изучения. Как я могу вам помочь?';
$string['ask_your_question_here'] = 'Задайте ваш вопрос здесь...';
$string['modify_prompt'] = 'Изменить подсказку';
$string['upload_course'] = 'Загрузить курс';
$string['open_prompt_modal'] = 'Открыть модальное окно изменения подсказки';
$string['open_file_upload_modal'] = 'Открыть модальное окно загрузки курса';


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Ошибка загрузки ресурса.';
$string['error_creating_job'] = 'Ошибка создания задачи.';
$string['job_failed'] = 'Задача не выполнена.';
$string['error_processing_pdf'] = 'Ошибка обработки PDF.';


$string['headers_already_sent'] = 'Заголовки уже отправлены.';
$string['failed_to_start_output_buffer'] = 'Не удалось начать буфер вывода.';
$string['server_error_output_buffer_failed'] = 'Ошибка сервера: не удалось выполнить буферизацию вывода.';
$string['answer_not_utf8'] = 'Ответ не в UTF-8.';
$string['no_answer_or_error_field'] = 'Нет поля ответа или ошибки.';
$string['json_encode_error'] = 'Ошибка кодирования JSON: ';
$string['server_error_json_encode_failed'] = 'Ошибка сервера: не удалось закодировать JSON.';
$string['empty_response_from_api'] = 'Пустой ответ от API.';
$string['empty_string_as_answer'] = 'Получена пустая строка в качестве ответа.';
$string['database_error_saving_conversation'] = 'Ошибка базы данных при сохранении разговора: ';
$string['general_exception'] = 'Общее исключение: ';
