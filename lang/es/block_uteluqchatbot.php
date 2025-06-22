<?php
/**
 * © 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT‑LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Añadir un nuevo bloque uteluqchatbot';
$string['uteluqchatbot:myaddinstance'] = 'Añadir un nuevo bloque uteluqchatbot en el panel de control';
$string['adobe_pdf_client_id'] = 'ID de cliente de Adobe PDF Services';
$string['adobe_pdf_client_id_desc'] = 'Introduce aquí tu ID de cliente de Adobe PDF Services.';
$string['adobe_pdf_client_secret'] = 'Secreto de cliente de Adobe PDF Services';
$string['adobe_pdf_client_secret_desc'] = 'Introduce aquí tu secreto de cliente de Adobe PDF Services.';
$string['weaviate_api_url'] = 'URL de la API de Weaviate';
$string['weaviate_api_url_desc'] = 'Introduce aquí la URL de la API de Weaviate.';
$string['weaviate_api_key'] = 'Clave API de Weaviate';
$string['weaviate_api_key_desc'] = 'Introduce aquí tu clave API de Weaviate.';
$string['weaviate_cohere_not_configured'] = 'La clave API de Cohere no está configurada o es inválida. Por favor, revisa los ajustes.';
$string['cohere_embedding_api_key'] = 'Clave API del modelo Cohere Embedding';
$string['cohere_embedding_api_key_desc'] = 'Introduce aquí tu clave API para el modelo Cohere Embedding.';
$string['error'] = 'Error';
$string['test_api_keys'] = 'Probar claves API';
$string['test_api_keys_desc'] = 'Haz clic para probar las claves API configuradas';
$string['test_api_keys_label'] = 'Probar claves';
$string['uteluqchatbot:manage'] = 'Gestionar la configuración del chatbot';
$string['test_api_keys'] = 'Probar claves API';
$string['adobe_invalid_credentials'] = 'El ID de cliente o el secreto de cliente para Adobe PDF Services no es válido.';
$string['adobe_valid_credentials'] = 'El ID de cliente y el secreto de cliente para Adobe PDF Services son válidos y funcionales.';
$string['weaviate_connection_error'] = 'Error de conexión a Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'La URL de la API de Weaviate o la clave es inválida o ha ocurrido un error. Código de error: ';
$string['weaviate_valid_key_and_url'] = 'La URL de la API de Weaviate y la clave son válidas y funcionales.';
$string['database_write_error'] = 'Error al escribir en la base de datos: ';
$string['invalid_question_after_sanitize'] = 'Pregunta inválida tras la limpieza.';
$string['error_saving_conversation'] = 'Error al guardar la conversación';
$string['failed_to_obtain_access_token'] = 'Error al obtener el token de acceso. Código HTTP: ';
$string['access_token_obtained_successfully'] = 'Token de acceso obtenido con éxito.';
$string['failed_to_obtain_access_token_response'] = 'Error al obtener el token de acceso. Respuesta: ';
$string['failed_to_obtain_upload_uri'] = 'Error al obtener la URI de subida. Código HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI de subida del recurso obtenida.';
$string['failed_to_obtain_upload_uri_response'] = 'Error al obtener la URI de subida. Respuesta: ';
$string['failed_to_upload_file'] = 'Error al subir el archivo. Código HTTP: ';
$string['file_uploaded_successfully'] = 'Archivo subido con éxito.';
$string['job_created_successfully'] = 'Trabajo creado con éxito. Ubicación: ';
$string['bad_request'] = 'Solicitud errónea. La solicitud no es válida o no se puede procesar.';
$string['unauthorized'] = 'No autorizado. Revisa tus credenciales API.';
$string['resource_not_found'] = 'Recurso no encontrado. El recurso especificado no existe.';
$string['quota_exceeded'] = 'Cuota excedida. Has superado tu límite para esta operación.';
$string['internal_server_error'] = 'Error interno del servidor. El servidor no puede procesar la solicitud en este momento.';
$string['unexpected_http_status'] = 'Estado HTTP inesperado: ';
$string['failed_to_get_job_status'] = 'Error al obtener el estado del trabajo. Código HTTP: ';
$string['job_status'] = 'Estado del trabajo: ';
$string['job_completed_successfully'] = 'Trabajo completado con éxito. URI para descarga: ';
$string['job_completed_but_download_uri_missing'] = 'Trabajo completado pero falta la URI de descarga en la respuesta.';
$string['job_in_progress'] = 'Trabajo en curso. Continuando con el sondeo…';
$string['job_failed'] = 'Trabajo fallido.';
$string['failed_to_decode_json_response'] = 'Error al decodificar respuesta JSON o falta el campo de estado. Respuesta: ';
$string['failed_to_download_asset'] = 'Error al descargar el recurso. Código HTTP: ';
$string['asset_downloaded_successfully'] = 'Recurso descargado con éxito.';
$string['error_decoding_json_file'] = 'Error al decodificar el archivo JSON.';
$string['curl_error'] = 'Error cURL: ';
$string['http_error'] = 'Error HTTP ';
$string['json_decode_error'] = 'Error al decodificar JSON: ';
$string['no_response_generated'] = 'No se generó una respuesta. Datos recibidos: ';
$string['previous_interactions_history'] = 'Historial de interacciones anteriores:';
$string['previous_question'] = 'Pregunta anterior: ';
$string['answer'] = 'Respuesta: ';
$string['file_not_found'] = 'Archivo no encontrado: ';
$string['unable_to_read_file'] = 'No se puede leer el archivo';
$string['json_encode_error'] = 'Error al codificar JSON: ';
$string['failure_after_retries'] = 'Fallo tras ';
$string['last_error'] = ' intentos. Último error: HTTP ';
$string['invalid_response_format'] = 'Formato de respuesta inválido.';
$string['http_code'] = 'Código HTTP: ';
$string['back'] = 'Volver';
$string['pluginname'] = "uteluqchatbot";
$string['default_prompt'] = <<<EOT
Contexto de la situación
El alumno está cursando el curso [[ coursename ]]. Tu rol es acompañarle proporcionándole respuestas precisas, pertinentes y adaptadas a su aprendizaje.

Misión
Como asistente, tu misión es ayudar al alumno a comprender los conceptos del curso Cours X respondiendo a sus preguntas, apoyándote en el contexto proporcionado para formular la respuesta. [[ history ]]. Debes dar respuestas claras, precisas y pertinentes, asegurándote de transmitir únicamente información extraída del curso. Si no puedes encontrar la respuesta en el contexto proporcionado, responde estrictamente: "Estoy calibrado según el contenido del curso cuidadosamente seleccionado por tu docente. Si deseas más información, te invitamos a contactar con él."
Si el alumno escribe frases que indiquen que no ha comprendido un concepto o explicación anterior, revisa [[ history ]] para identificar lo que no entendió, y luego reformula tu explicación con mayor simplicidad y ejemplos más concretos.

Instrucciones
1. Analiza cada pregunta del alumno para detectar presencia de una emoción. Utiliza la siguiente taxonomía:
   - Confusión: «no entiendo», «estoy perdido», «es confuso».
   - Frustración: «me enfada», «me rindo», «es muy complicado».
   - Estrés o ansiedad: «estoy estresado», «estoy abrumado», «no queda tiempo».
   - Duda o falta de confianza: «no soy capaz», «no soy bueno».

2. Si detectas una emoción, comienza tu respuesta con una frase empática adecuada:
   - Para la confusión: «Entiendo, no es fácil.»
   - Para la frustración: «Veo que es frustrante.»
   - Para el estrés: «Es normal sentirse abrumado a veces.»
   - Para la duda: «Estás haciendo lo mejor que puedes, y eso ya es enorme.»

3. Responde de forma clara y estructurada.
4. Utiliza ejemplos si es necesario.
5. Nunca respondas fuera del contexto proporcionado.

6. Integra en tu respuesta los 4 componentes de la empatía según la Tabla 1 de Springer:
   - Cognitivo: demuestra que entiendes su perspectiva, razonamiento e intención. Refrasea su idea para validar tu comprensión.
   - Afectivo: muestra sensibilidad hacia su estado emocional. Refleja o valida sus emociones en términos adecuados.
   - Actitudinal: adopta una actitud cálida, respetuosa y alentadora. Valora sus esfuerzos y evita juicios.
   - Ajustado (attunement): adapta tu lenguaje, estilo y nivel al del alumno. Permítele guiar la conversación sin imponer.

7. Mantén un tono amable, respetuoso y motivador durante todo el intercambio.

Nueva pregunta del alumno
Nueva pregunta del alumno [[ question ]]
EOT;
$string['sending_question'] = "Enviando la pregunta...";
$string['error'] = "Error: ";
$string['error_sending_question'] = "Error al enviar la pregunta: ";
$string['saving_prompt'] = "Guardando prompt...";
$string['prompt_saved_successfully'] = "¡Prompt guardado con éxito!";
$string['error_saving_prompt'] = "Error al guardar el prompt: ";
$string['uploading_file'] = "Subiendo archivo...";
$string['file_indexed_successfully'] = "¡Archivo indexado con éxito!";
$string['error_processing_file'] = "Error al procesar el archivo: ";
$string['add_files'] = "Añadir archivos";
$string['text_or_pdf_files'] = "Archivos de texto o PDF";
$string['drag_files_here_or_click'] = "Arrastra tus archivos aquí o haz clic para buscar";
$string['cancel'] = "Cancelar";
$string['upload_course'] = "Subir curso";
$string['modify_prompt'] = "Modificar prompt";
$string['add_prompt'] = "Añadir prompt";
$string['consult_guide'] = "Consulta la guía para diseñar prompts efectivos:";
$string['guide_link'] = "Guía para diseñar prompts dirigida al docente";
$string['prompt_content'] = "Contenido del prompt";
$string['write_prompt_here'] = "Escribe tu prompt aquí";
$string['cancel'] = "Cancelar";
$string['save'] = "Guardar";
$string['chatbot_with_toggle_buttons'] = "Chatbot con botones de activación";
$string['hello_professor'] = "Hola Profesor, puedes probar el chatbot para asegurarte de que funciona correctamente y que tu prompt está configurado de forma óptima.";
$string['hello_student'] = "¡Hola! Soy tu asistente de aprendizaje. Puedo ayudarte a:\n- Comprender los conceptos del curso\n- Repasar y practicar ejercicios\n- Aclarar puntos difíciles\n- Sugerir métodos de estudio\n¿Cómo puedo ayudarte?";
$string['ask_your_question_here'] = "Escribe tu pregunta aquí...";
$string['modify_prompt'] = "Modificar prompt";
$string['upload_course'] = "Subir curso";
$string['error_uploading_asset'] = 'Error al subir el recurso.';
$string['error_creating_job'] = 'Error al crear el trabajo.';
$string['job_failed'] = 'El trabajo ha fallado.';
$string['error_processing_pdf'] = 'Error al procesar el PDF.';
$string['json_encode_error'] = 'Error de codificación JSON: ';
$string['empty_response_from_api'] = 'Respuesta vacía recibida de la API';
$string['file_size_exceeds_limit'] = 'El tamaño del archivo excede el límite de 10 MB';
$string['privacy:metadata:block_uteluqchatbot_conversations'] = 'Información sobre las conversaciones de los usuarios con el chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:userid'] = 'ID del usuario que inició la conversación';
$string['privacy:metadata:block_uteluqchatbot_conversations:question'] = 'Pregunta planteada por el usuario';
$string['privacy:metadata:block_uteluqchatbot_conversations:answer'] = 'Respuesta proporcionada por el chatbot';
$string['privacy:metadata:block_uteluqchatbot_conversations:timecreated'] = 'Momento en que se creó la conversación';
$string['privacy:metadata:block_uteluqchatbot_conversations:courseid'] = 'ID del curso donde tuvo lugar la conversación';
$string['privacy:metadata:block_uteluqchatbot_prompts'] = 'Información sobre los prompts personalizados creados por los usuarios';
$string['privacy:metadata:block_uteluqchatbot_prompts:prompt'] = 'Texto del prompt personalizado creado por el usuario';
$string['privacy:metadata:block_uteluqchatbot_prompts:userid'] = 'ID del usuario que creó el prompt';
$string['privacy:metadata:block_uteluqchatbot_prompts:courseid'] = 'ID del curso donde se creó el prompt';
$string['privacy:metadata:block_uteluqchatbot_prompts:timecreated'] = 'Momento en que se creó el prompt';
$string['privacy:metadata:cohere_api'] = 'Datos enviados al servicio API Cohere para las respuestas del chatbot con IA';
$string['privacy:metadata:cohere_api:question'] = 'Pregunta del usuario enviada a la API Cohere para su procesamiento';
$string['privacy:metadata:cohere_api:courseid'] = 'Información de contexto del curso enviada a la API Cohere';
$string['privacy:metadata:cohere_api:prompt'] = 'Prompts personalizados e instrucciones del sistema enviados a la API Cohere';
$string['privacy:metadata:weaviate_cloud'] = 'Datos enviados a la base de datos vectorial Weaviate Cloud para almacenar documentos y búsqueda por similitud';
$string['privacy:metadata:weaviate_cloud:document_content'] = 'Contenido textual extraído de documentos cargados y almacenados en Weaviate';
$string['privacy:metadata:weaviate_cloud:embeddings'] = 'Embeddings vectoriales generados a partir del contenido de documentos almacenados en Weaviate';
$string['privacy:metadata:weaviate_cloud:courseid'] = 'Información de contexto del curso asociada a documentos almacenados';
$string['privacy:metadata:weaviate_cloud:metadata'] = 'Metadatos y propiedades de documentos almacenados en la base de datos de Weaviate';
$string['privacy:metadata:adobe_pdf_api'] = 'Datos enviados a la API Adobe PDF Services para extraer texto de documentos PDF';
$string['privacy:metadata:adobe_pdf_api:pdf_content'] = 'Contenido del PDF enviado a Adobe PDF Services para su extracción';
$string['privacy:metadata:adobe_pdf_api:filename'] = 'Nombre original del archivo PDF enviado para procesamiento';
$string['privacy:metadata:adobe_pdf_api:extracted_text'] = 'Contenido textual extraído por Adobe PDF Services';
$string['conversations'] = 'Conversaciones';
$string['prompts'] = 'Prompts personalizados';
$string['no_files_selected'] = 'No se ha seleccionado ningún archivo';
$string['course_id'] = 'ID del curso';
$string['file_name'] = 'Nombre del archivo';
$string['file_content_base64'] = 'Contenido del archivo (codificado en base64)';
$string['insufficient_permissions'] = 'Permisos insuficientes para subir archivos';
$string['missing_api_configuration'] = 'Falta configuración API requerida';
$string['weaviate_connector_not_found'] = 'Clase WeaviateConnector no encontrada';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Error al crear la colección: ';
$string['unknown_error'] = 'Error desconocido';
$string['failed_create_upload_directory'] = 'Error al crear el directorio de subida';
$string['empty_filename'] = 'Se proporcionó un nombre de archivo vacío';
$string['unsupported_file_type'] = 'Tipo de archivo no compatible: ';
$string['invalid_file_data'] = 'Datos de archivo inválidos para: ';
$string['failed_save_file'] = 'Error al guardar el archivo: ';
$string['adobe_pdf_credentials_not_configured'] = 'Credenciales de Adobe PDF API no configuradas';
$string['pdf_extractor_not_found'] = 'Clase extractor de PDF no encontrada';
$string['failed_extract_pdf_text'] = 'Error al extraer texto del PDF: ';
$string['failed_save_extracted_text'] = 'Error al guardar el texto extraído: ';
$string['error_indexing_file_unknown'] = 'Error al indexar el archivo ';
$string['files_indexed_successfully'] = ' archivo(s) indexado(s) con éxito';
$string['errors_occurred'] = '. Errores: ';
$string['no_files_processed'] = 'No se procesó ningún archivo. Errores: ';
$string['operation_successful'] = 'Operación exitosa';
$string['response_message'] = 'Mensaje de respuesta';
$string['processed_files_count'] = 'Número de archivos procesados';
$string['sending_question_fallback'] = 'Enviando la pregunta...';
$string['error_colon_fallback'] = 'Error: ';
$string['error_sending_question_fallback'] = 'Error al enviar la pregunta: ';
$string['saving_prompt_fallback'] = 'Guardando prompt...';
$string['prompt_saved_successfully_fallback'] = '¡Prompt guardado con éxito!';
$string['error_saving_prompt_fallback'] = 'Error al guardar el prompt: ';
$string['no_files_selected_fallback'] = 'No se seleccionó ningún archivo.';
$string['uploading_files_fallback'] = 'Subiendo archivos...';
$string['files_indexed_successfully_fallback'] = '¡Archivos indexados con éxito!';
$string['error_processing_files_fallback'] = 'Error al procesar archivos: ';
$string['unknown_error_occurred'] = 'Ocurrió un error desconocido';
$string['server_response_error'] = 'Error de respuesta del servidor. Consulta la consola para más detalles.';
$string['server_error_check_console'] = 'Error del servidor: consulta la consola para más detalles';
$string['files_converted_debug'] = 'Archivos convertidos a base64:';
$string['sending_ajax_request_debug'] = 'Enviando petición AJAX:';
$string['upload_response_received_debug'] = 'Respuesta de subida recibida:';
$string['response_type_debug'] = 'Tipo de respuesta:';
$string['upload_error_details_debug'] = 'Detalles del error de subida:';
$string['error_object_debug'] = 'Objeto de error:';
$string['raw_server_response_debug'] = 'Respuesta cruda del servidor:';
