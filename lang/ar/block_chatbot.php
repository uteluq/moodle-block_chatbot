<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'شات بوت';
$string['chatbot:addinstance'] = 'أضف كتلة شات بوت جديدة';
$string['chatbot:myaddinstance'] = 'أضف كتلة شات بوت جديدة إلى لوحة التحكم';

// Open AI
$string['openai_api_key'] = 'مفتاح واجهة برمجة تطبيقات OpenAI';
$string['openai_api_key_desc'] = 'أدخل مفتاح واجهة برمجة تطبيقات OpenAI هنا.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'معرّف عميل خدمات Adobe PDF';
$string['adobe_pdf_client_id_desc'] = 'أدخل معرّف عميل خدمات Adobe PDF هنا.';

$string['adobe_pdf_client_secret'] = 'سر عميل خدمات Adobe PDF';
$string['adobe_pdf_client_secret_desc'] = 'أدخل سر عميل خدمات Adobe PDF هنا.';

// Weaviate
$string['weaviate_api_url'] = 'رابط واجهة برمجة تطبيقات Weaviate';
$string['weaviate_api_url_desc'] = 'أدخل رابط واجهة برمجة تطبيقات Weaviate هنا.';

$string['weaviate_api_key'] = 'مفتاح واجهة برمجة تطبيقات Weaviate';
$string['weaviate_api_key_desc'] = 'أدخل مفتاح واجهة برمجة تطبيقات Weaviate هنا.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'مفتاح واجهة برمجة تطبيقات نموذج Cohere Embedding';
$string['cohere_embedding_api_key_desc'] = 'أدخل مفتاح واجهة برمجة تطبيقات نموذج Cohere Embedding هنا.';

$string['max_conversations'] = 'حد أقصى للمحادثات لكل مستخدم';
$string['max_conversations_desc'] = 'الحد الأقصى لعدد المحادثات المخزنة لكل مستخدم. في حالة تجاوزها، سيتم حذف أقدم محادثة.';

// Test button strings
$string['test_api_keys'] = 'اختبار مفاتيح واجهة برمجة التطبيقات';
$string['test_api_keys_desc'] = 'انقر لاختبار مفاتيح واجهة برمجة التطبيقات المُعَدَّة';
$string['test_api_keys_label'] = 'اختبار المفاتيح';

$string['chatbot:manage'] = 'إدارة إعدادات الشات بوت';

// For ../.../weaviate_db.php
$string['filesmissing'] = "الملفات مفقودة.";
$string['errorcreatingcollection'] = "خطأ في إنشاء المجموعة: ";
$string['fileexceedsmaxsizeini'] = "يتجاوز الملف الحجم الأقصى المحدد في php.ini";
$string['fileexceedsmaxsizeform'] = "يتجاوز الملف الحجم الأقصى المحدد في النموذج HTML";
$string['filepartiallyuploaded'] = "تم تحميل الملف جزئيًا فقط";
$string['nofileuploaded'] = "لم يتم تحميل أي ملف";
$string['missingtmpfolder'] = "المجلد المؤقت مفقود";
$string['failedtowritetodisk'] = "فشل في كتابة الملف إلى القرص";
$string['phpextensionstoppedupload'] = "أوقف امتداد PHP تحميل الملف";
$string['unknownuploaderror'] = "خطأ تحميل غير معروف";
$string['uploaderror'] = "خطأ في التحميل: ";
$string['errorindexingfile'] = "خطأ في فهرسة الملف: ";
$string['allfilesindexed'] = "تمت فهرسة جميع الملفات بنجاح.";

// For test_api_keys.php
$string['openai_connection_error'] = "خطأ في الاتصال أثناء التحقق من واجهة برمجة تطبيقات OpenAI.";
$string['openai_invalid_key'] = "مفتاح واجهة برمجة تطبيقات OpenAI غير صالح. رمز الخطأ: ";
$string['openai_valid_key'] = "مفتاح واجهة برمجة تطبيقات OpenAI صالح ويعمل.";
$string['adobe_invalid_credentials'] = "معرّف العميل أو سر العميل لخدمات Adobe PDF غير صالح.";
$string['adobe_valid_credentials'] = "معرّف العميل وسر العميل لخدمات Adobe PDF صالحان ويعملان.";
$string['weaviate_connection_error'] = "خطأ في الاتصال بـ Weaviate: ";
$string['weaviate_invalid_key_or_url'] = "رابط أو مفتاح واجهة برمجة تطبيقات Weaviate غير صالح أو حدث خطأ. رمز الخطأ: ";
$string['weaviate_valid_key_and_url'] = "رابط ومفتاح واجهة برمجة تطبيقات Weaviate صالحان ويعملان.";
$string['back'] = "عودة";

// For add_prompt.php
$string['invalid_sesskey'] = "مفتاح جلسة غير صالح";
$string['database_write_error'] = "خطأ في كتابة قاعدة البيانات: ";

// For ajax.php
$string['http_method_not_allowed'] = "طريقة HTTP غير مسموح بها";
$string['invalid_json'] = "JSON غير صالح: ";
$string['missing_parameters'] = "معلمات مفقودة";
$string['invalid_question'] = "سؤال غير صالح";
$string['empty_question'] = "لا يمكن أن يكون السؤال فارغًا";
$string['invalid_session'] = "جلسة غير صالحة";
$string['openai_api_key_not_configured'] = "مفتاح واجهة برمجة تطبيقات OpenAI غير مُعَد";
$string['empty_response_from_api'] = "استجابة فارغة تم استلامها من واجهة برمجة التطبيقات";
$string['error_saving_conversation'] = "خطأ في حفظ المحادثة";

// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = "فشل في الحصول على رمز الوصول. حالة HTTP: ";
$string['access_token_obtained_successfully'] = "تم الحصول على رمز الوصول بنجاح.";
$string['failed_to_obtain_access_token_response'] = "فشل في الحصول على رمز الوصول. الاستجابة: ";
$string['failed_to_obtain_upload_uri'] = "فشل في الحصول على رابط التحميل. حالة HTTP: ";
$string['asset_upload_uri_obtained'] = "تم الحصول على رابط تحميل الأصول.";
$string['failed_to_obtain_upload_uri_response'] = "فشل في الحصول على رابط التحميل. الاستجابة: ";
$string['failed_to_upload_file'] = "فشل في تحميل الملف. حالة HTTP: ";
$string['file_uploaded_successfully'] = "تم تحميل الملف بنجاح.";
$string['job_created_successfully'] = "تم إنشاء المهمة بنجاح. الموقع: ";
$string['bad_request'] = "طلب غير صالح. الطلب غير صالح أو لا يمكن تنفيذه.";
$string['unauthorized'] = "غير مصرح به. تحقق من بيانات اعتماد واجهة برمجة التطبيقات.";
$string['resource_not_found'] = "المورد غير موجود. المورد المحدد غير موجود.";
$string['quota_exceeded'] = "تم تجاوز الحصة. لقد تجاوزت حصتك لهذه العملية.";
$string['internal_server_error'] = "خطأ داخلي في الخادم. واجه الخادم خطأ ولا يمكنه معالجة طلبك في الوقت الحالي.";
$string['unexpected_http_status'] = "حالة HTTP غير متوقعة: ";
$string['failed_to_get_job_status'] = "فشل في الحصول على حالة المهمة. حالة HTTP: ";
$string['job_status'] = "حالة المهمة: ";
$string['job_completed_successfully'] = "تمت المهمة بنجاح. رابط التنزيل: ";
$string['job_completed_but_download_uri_missing'] = "تمت المهمة ولكن رابط التنزيل مفقود في الاستجابة.";
$string['job_in_progress'] = "المهمة لا تزال قيد التنفيذ. استمر في الاستطلاع...";
$string['job_failed'] = "فشلت المهمة.";
$string['failed_to_decode_json_response'] = "فشل في فك تشفير استجابة JSON أو حقل الحالة مفقود. الاستجابة: ";
$string['failed_to_download_asset'] = "فشل في تنزيل الأصل. حالة HTTP: ";
$string['asset_downloaded_successfully'] = "تم تنزيل الأصل بنجاح.";
$string['error_decoding_json_file'] = "خطأ في فك تشفير ملف JSON.";

// For classes/weaviateconnector.php
$string['curl_error'] = "خطأ cURL: ";
$string['http_error'] = "خطأ HTTP ";
$string['json_decode_error'] = "خطأ فك تشفير JSON: ";
$string['no_response_generated'] = "لم يتم إنشاء استجابة. البيانات المستلمة: ";
$string['previous_interactions_history'] = "تاريخ التفاعلات السابقة:";
$string['previous_question'] = "السؤال السابق: ";
$string['answer'] = "الإجابة: ";
$string['file_not_found'] = "الملف غير موجود: ";
$string['unable_to_read_file'] = "غير قادر على قراءة الملف";
$string['json_encode_error'] = "خطأ ترميز JSON: ";
$string['failure_after_retries'] = "فشل بعد ";
$string['last_error'] = " محاولات. آخر خطأ: HTTP ";

// For block_chatbot.php
$string['default_prompt'] = <<<EOT
سياق الموقف:
يتابع المتعلم دورة في [[ coursename ]]. دورك هو دعمه من خلال تقديم إجابات دقيقة وذات صلة ومصممة حسب احتياجاته التعليمية.
المهمة:
كمُساعد، مهمتك هي مساعدة المتعلم على فهم مفاهيم الدورة من خلال الإجابة على أسئلته، مع الاعتماد على السياق المقدم لصياغة الإجابة. [[ history ]].
يجب عليك تقديم إجابات واضحة ودقيقة وذات صلة، مع التأكد من نقل المعلومات من الدورة فقط. إذا لم يتم العثور على إجابة في السياق المقدم، رد بصرامة: "أنا مُعَد بناءً على محتوى الدورة الذي اختاره معلمك بعناية. إذا كنت ترغب في المزيد من المعلومات، يُرجى الاتصال بهم."
إذا كتب المتعلم جملًا تشير إلى عدم فهمه لمفهوم أو شرح سابق، تحقق من [[ history ]] لتحديد ما تم سوء فهمه، ثم أعد صياغة شرحك بمزيد من البساطة والأمثلة الملموسة.
التعليمات:
1. اكتشاف المشاعر في سؤال المتعلم وتبني نبرة متعاطفة وراعية.
2. الرد بطريقة واضحة ومنظمة.
3. شرح المفهوم بأمثلة إذا لزم الأمر.
4. عدم تقديم أي إجابات خارج السياق المقدم.
5. يجب أن تتضمن إجابتك المكونات الأربعة التالية للتعاطف:
   - المكون المعرفي: إظهار فهم وجهة نظر المتعلم وتعليله ونواياه. إعادة صياغة أفكاره للتأكد من فهمك. تقديم اقتراحات تتعلق بما قاله، دون فرض تعليلك الخاص.
   - المكون العاطفي: كن حساسًا للحالة العاطفية للمتعلم (الإحباط، الشك، الرضا، التوتر، إلخ). عكس أو تأكيد مشاعره بكلمات أو استعارات بسيطة. التعبير عن اللطف.
   - المكون السلوكي: تبني موقف دافئ ومحترم ومشجع. إظهار الانفتاح، وتقدير جهوده، وتجنب أي حكم. يجب أن يكون أسلوبك ودودًا وصادقًا.
   - مكون التكيف: تكييف إجاباتك مع تطور خطاب المتعلم. استخدام مفردات وأسلوب يتناسبان مع مستواه ومزاجه. دعهم يقودون المحادثة، ولا تفرض الموضوع.
سؤال جديد من المتعلم [[ question ]]
EOT;

$string['sending_question'] = "إرسال السؤال...";
$string['error'] = "خطأ: ";
$string['error_sending_question'] = "خطأ في إرسال السؤال: ";
$string['saving_prompt'] = "حفظ النص...";
$string['prompt_saved_successfully'] = "تم حفظ النص بنجاح!";
$string['error_saving_prompt'] = "خطأ في حفظ النص: ";
$string['uploading_file'] = "تحميل الملف...";
$string['file_indexed_successfully'] = "تم فهرسة الملف بنجاح!";
$string['error_processing_file'] = "خطأ في معالجة الملف: ";
$string['json_parse_error'] = "خطأ في تحليل JSON: ";
$string['invalid_json_response'] = "استجابة الخادم ليست بتنسيق JSON صالح.";
$string['add_files'] = "إضافة ملفات";
$string['text_or_pdf_files'] = "ملفات نصية أو PDF";
$string['drag_files_here_or_click'] = "اسحب ملفاتك هنا أو انقر للتصفح";
$string['cancel'] = "إلغاء";
$string['upload_course'] = "تحميل الدورة";

$string['modify_prompt'] = "تعديل";
$string['add_prompt'] = "إضافة";
$string['consult_guide'] = "استشر الدليل لتصميم نصوص فعالة:";
$string['guide_link'] = "دليل تصميم النصوص للمعلمين";
$string['prompt_content'] = "محتوى النص";
$string['write_prompt_here'] = "اكتب نصك هنا";
$string['save'] = "حفظ";

$string['chatbot_with_toggle_buttons'] = "شات بوت مع أزرار التبديل";
$string['hello_professor'] = "مرحبًا أيها الأستاذ، لديك خيار اختبار الشات بوت للتأكد من أنه يعمل بشكل صحيح وأن نصك مُعَد بشكل مثالي.";
$string['hello_student'] = "مرحبًا! أنا مساعدك التعليمي. يمكنني مساعدتك في: - فهم مفاهيم الدورة - مراجعة وتمارين - توضيح النقاط الصعبة - اقتراح طرق الدراسة. كيف يمكنني مساعدتك؟";
$string['ask_your_question_here'] = "اطرح سؤالك هنا...";
$string['modify_prompt'] = "تعديل النص";
$string['upload_course'] = "تحميل الدورة";
$string['open_prompt_modal'] = "فتح نافذة تعديل النص";
$string['open_file_upload_modal'] = "فتح نافذة تحميل الدورة";



// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'خطأ في تحميل الأصل.';
$string['error_creating_job'] = 'خطأ في إنشاء المهمة.';
$string['job_failed'] = 'فشلت المهمة.';
$string['error_processing_pdf'] = 'خطأ في معالجة ملف PDF.';
