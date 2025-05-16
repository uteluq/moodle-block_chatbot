<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Чат-бот';
$string['chatbot:addinstance'] = 'Добавить новый блок чат-бота';
$string['chatbot:myaddinstance'] = 'Добавить новый блок чат-бота на Панель управления';

// Open AI
$string['openai_api_key'] = 'Ключ API OpenAI';
$string['openai_api_key_desc'] = 'Введите здесь ваш ключ API OpenAI.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Идентификатор клиента Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Введите здесь ваш идентификатор клиента Adobe PDF Services.';

$string['adobe_pdf_client_secret'] = 'Секрет клиента Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Введите здесь ваш секрет клиента Adobe PDF Services.';

// Weaviate
$string['weaviate_api_url'] = 'URL API Weaviate';
$string['weaviate_api_url_desc'] = 'Введите здесь URL для API Weaviate.';

$string['weaviate_api_key'] = 'Ключ API Weaviate';
$string['weaviate_api_key_desc'] = 'Введите здесь ваш ключ API Weaviate.';

// Cohere
$string['cohere_embedding_api_key'] = 'Ключ API модели встраивания Cohere';
$string['cohere_embedding_api_key_desc'] = 'Введите здесь ваш ключ API для модели встраивания Cohere.';

// Conversation Settings
$string['max_conversations'] = 'Максимальное количество бесед на пользователя';
$string['max_conversations_desc'] = 'Максимальное количество сохранённых бесед на пользователя. При превышении самая старая беседа будет удалена.';

// Test Button Strings
$string['test_api_keys'] = 'Тестировать ключи API';
$string['test_api_keys_desc'] = 'Нажмите, чтобы протестировать настроенные ключи API';
$string['test_api_keys_label'] = 'Тест ключей';

$string['chatbot:manage'] = 'Управлять настройками чат-бота';

// Default Prompt
$string['chatbot:default_prompt'] = "Контекст ситуации:
Ученик проходит курс по {$coursename}. Ваша роль — поддерживать его, предоставляя точные, релевантные и адаптированные ответы для его обучения.
Миссия:
Как ассистент, ваша миссия — помочь ученику понять концепции курса по {$coursename}, отвечая на его вопросы, опираясь на предоставленный контекст для формирования ответа. [[ history ]].
Вы должны формулировать чёткие, точные и релевантные ответы, гарантируя, что передаёте только информацию из курса. Если ответ не может быть найден в предоставленном контексте, отвечайте строго: 'Я настроен в соответствии с содержимым курса, тщательно отобранным вашим преподавателем. Если вам нужна дополнительная информация, пожалуйста, свяжитесь с ним.'
Если ученик пишет фразы, указывающие на то, что он не понял концепцию или предыдущее объяснение, проверьте [[ history ]], чтобы определить, что было неправильно понято, и переформулируйте объяснение более простым образом с конкретными примерами.
Инструкции:
1. Определяйте эмоции в вопросе ученика и используйте эмпатичный и заботливый тон.
2. Отвечайте чётко и структурированно.
3. Объясняйте концепцию с примерами, если это необходимо.
4. Не делайте предположений за пределами предоставленного контекста.
Новый вопрос ученика [[ question ]]";