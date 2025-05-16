<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'روبوت الدردشة';
$string['chatbot:addinstance'] = 'إضافة كتلة روبوت دردشة جديدة';
$string['chatbot:myaddinstance'] = 'إضافة كتلة روبوت دردشة جديدة إلى لوحة التحكم';

// Open AI
$string['openai_api_key'] = 'مفتاح واجهة برمجة التطبيقات لـ OpenAI';
$string['openai_api_key_desc'] = 'أدخل مفتاح واجهة برمجة التطبيقات لـ OpenAI هنا.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'معرف العميل لخدمات Adobe PDF';
$string['adobe_pdf_client_id_desc'] = 'أدخل معرف العميل لخدمات Adobe PDF هنا.';

$string['adobe_pdf_client_secret'] = 'سر العميل لخدمات Adobe PDF';
$string['adobe_pdf_client_secret_desc'] = 'أدخل سر العميل لخدمات Adobe PDF هنا.';

// Weaviate
$string['weaviate_api_url'] = 'رابط واجهة برمجة التطبيقات لـ Weaviate';
$string['weaviate_api_url_desc'] = 'أدخل رابط واجهة برمجة التطبيقات لـ Weaviate هنا.';

$string['weaviate_api_key'] = 'مفتاح واجهة برمجة التطبيقات لـ Weaviate';
$string['weaviate_api_key_desc'] = 'أدخل مفتاح واجهة برمجة التطبيقات لـ Weaviate هنا.';

// Cohere
$string['cohere_embedding_api_key'] = 'مفتاح واجهة برمجة التطبيقات لنموذج التضمين Cohere';
$string['cohere_embedding_api_key_desc'] = 'أدخل مفتاح واجهة برمجة التطبيقات لنموذج التضمين Cohere هنا.';

// Conversation Settings
$string['max_conversations'] = 'الحد الأقصى لعدد المحادثات لكل مستخدم';
$string['max_conversations_desc'] = 'الحد الأقصى لعدد المحادثات المخزنة لكل مستخدم. إذا تم التجاوز، سيتم حذف أقدم محادثة.';

// Test Button Strings
$string['test_api_keys'] = 'اختبار مفاتيح واجهة برمجة التطبيقات';
$string['test_api_keys_desc'] = 'انقر لاختبار مفاتيح واجهة برمجة التطبيقات المُعدة';
$string['test_api_keys_label'] = 'اختبار المفاتيح';

$string['chatbot:manage'] = 'إدارة إعدادات روبوت الدردشة';

// Default Prompt
$string['chatbot:default_prompt'] = "سياق الموقف:
المتعلم يأخذ دورة حول {$coursename}. دورك هو دعمه من خلال تقديم إجابات دقيقة وذات صلة ومُكيفة لتعلمه.
المهمة:
كمساعد، مهمتك هي مساعدة المتعلم على فهم مفاهيم الدورة حول {$coursename} من خلال الإجابة على أسئلته، مع الاعتماد على السياق المقدم لصياغة الرد. [[ history ]].
يجب عليك صياغة إجابات واضحة ودقيقة وذات صلة، مع التأكد من أنك تنقل فقط المعلومات من الدورة. إذا لم يتم العثور على إجابة في السياق المقدم، أجب بشكل صارم: 'أنا مُعاير وفقًا لمحتوى الدورة الذي اختاره بعناية معلمك. إذا كنت تريد مزيدًا من المعلومات، ندعوك للتواصل معه.'
إذا كتب المتعلم جملًا تُظهر أنه لم يفهم مفهومًا أو تفسيرًا سابقًا، تحقق من [[ history ]] لتحديد ما تم فهمه بشكل خاطئ، ثم أعد صياغة تفسيرك بطريقة أبسط مع أمثلة ملموسة.
التعليمات:
1. اكتشف المشاعر في سؤال المتعلم واعتمد نبرة متعاطفة ومهتمة.
2. أجب بوضوح وبطريقة منظمة.
3. اشرح المفهوم بأمثلة إذا لزم الأمر.
4. لا تقم بأي افتراضات خارج السياق المقدم.
سؤال جديد من المتعلم [[ question ]]";