<?php
/**
 * @copyright 2025 Université TÉLUQ and the Université Gaston-Berger
 */
$string['pluginname'] = '聊天机器人';
$string['uteluqchatbot:addinstance'] = '添加新的聊天机器人块';
$string['uteluqchatbot:myaddinstance'] = '在仪表板中添加新的聊天机器人块';
$string['weaviate_cohere_not_configured'] = 'Cohere API 密钥未配置或无效。请检查设置。';
$string['adobe_pdf_client_id'] = 'Adobe PDF服务客户端ID';
$string['adobe_pdf_client_id_desc'] = '在此处输入您的Adobe PDF服务客户端ID。';
$string['adobe_pdf_client_secret'] = 'Adobe PDF服务客户端密钥';
$string['adobe_pdf_client_secret_desc'] = '在此处输入您的Adobe PDF服务客户端密钥。';
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = '在此处输入Weaviate API的URL。';
$string['weaviate_api_key'] = 'Weaviate API密钥';
$string['weaviate_api_key_desc'] = '在此处输入您的Weaviate API密钥。';
$string['cohere_embedding_api_key'] = 'Cohere嵌入模型API密钥';
$string['cohere_embedding_api_key_desc'] = '在此处输入您的Cohere嵌入模型API密钥。';
$string['test_api_keys'] = '测试API密钥';
$string['test_api_keys_desc'] = '点击测试已配置的API密钥';
$string['test_api_keys_label'] = '测试密钥';
$string['uteluqchatbot:manage'] = '管理聊天机器人设置';
$string['adobe_invalid_credentials'] = 'Adobe PDF服务的客户端ID或客户端密钥无效。';
$string['adobe_valid_credentials'] = 'Adobe PDF服务的客户端ID和客户端密钥有效且功能正常。';
$string['weaviate_connection_error'] = '连接Weaviate时出错: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate API的URL或密钥无效或发生错误。错误代码: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate API的URL和密钥有效且功能正常。';
$string['database_write_error'] = '数据库写入错误: ';
$string['error_saving_conversation'] = '保存对话时出错';
$string['invalid_question_after_sanitize'] = '净化后的问题无效。';
$string['failed_to_obtain_access_token'] = '获取访问令牌失败。HTTP状态: ';
$string['access_token_obtained_successfully'] = '成功获取访问令牌。';
$string['failed_to_obtain_access_token_response'] = '获取访问令牌失败。响应: ';
$string['failed_to_obtain_upload_uri'] = '获取上传URI失败。HTTP状态: ';
$string['asset_upload_uri_obtained'] = '获取了资产上传URI。';
$string['failed_to_obtain_upload_uri_response'] = '获取上传URI失败。响应: ';
$string['failed_to_upload_file'] = '上传文件失败。HTTP状态: ';
$string['file_uploaded_successfully'] = '文件上传成功。';
$string['job_created_successfully'] = '任务创建成功。位置: ';
$string['bad_request'] = '错误请求。请求无效或无法被服务器处理。';
$string['unauthorized'] = '未授权。请检查您的API凭据。';
$string['resource_not_found'] = '资源未找到。指定的资源未找到。';
$string['quota_exceeded'] = '配额已用尽。您已超过此操作的配额。';
$string['internal_server_error'] = '内部服务器错误。服务器遇到错误，无法处理您的请求。';
$string['unexpected_http_status'] = '意外的HTTP状态: ';
$string['failed_to_get_job_status'] = '获取任务状态失败。HTTP状态: ';
$string['job_status'] = '任务状态: ';
$string['job_completed_successfully'] = '任务完成成功。下载URI: ';
$string['job_completed_but_download_uri_missing'] = '任务完成，但响应中缺少下载URI。';
$string['job_in_progress'] = '任务仍在进行中。继续轮询...';
$string['job_failed'] = '任务失败。';
$string['failed_to_decode_json_response'] = '解码JSON响应失败或状态字段缺失。响应: ';
$string['failed_to_download_asset'] = '下载资产失败。HTTP状态: ';
$string['asset_downloaded_successfully'] = '资产下载成功。';
$string['error_decoding_json_file'] = '解码JSON文件时出错。';
$string['curl_error'] = 'cURL错误: ';
$string['http_error'] = 'HTTP错误 ';
$string['json_decode_error'] = 'JSON解码错误: ';
$string['no_response_generated'] = '未生成响应。收到数据: ';
$string['previous_interactions_history'] = '之前交互的历史记录:';
$string['previous_question'] = '之前的问题: ';
$string['answer'] = '答案: ';
$string['file_not_found'] = '文件未找到: ';
$string['unable_to_read_file'] = '无法读取文件';
$string['json_encode_error'] = 'JSON编码错误: ';
$string['failure_after_retries'] = '重试后失败 ';
$string['last_error'] = ' 次。最后一次错误: HTTP ';
$string['invalid_response_format'] = '无效的响应格式。';
$string['http_code'] = 'HTTP代码：';
$string['default_prompt'] = <<<EOT
情境背景  
学习者正在学习 [[ coursename ]] 课程。你的角色是通过提供准确、相关且适应其学习需求的回答来支持他。

任务  
作为助手，你的任务是根据提供的上下文，回答学习者关于“课程 X”的问题，帮助他理解课程中的概念。[[ history ]]  
你必须提供清晰、准确且相关的回答，仅传达来自课程内容的信息。如果在提供的上下文中找不到答案，请严格回答：“我是根据您教师精心挑选的课程内容进行设定的。如果您需要更多信息，建议您联系教师。”

如果学习者写下的句子表明他没有理解某个概念或之前的解释，请查看 [[ history ]]，找出误解的地方，然后用更简单的语言和更具体的例子重新解释。

说明  
1. 分析每个问题，判断是否包含情绪。使用以下分类法：  
   - 困惑：“我不明白”、“我迷路了”、“这不清楚”  
   - 挫败：“这让我很烦”、“我放弃了”、“太难了”  
   - 压力或焦虑：“我很紧张”、“我被压垮了”、“时间不够了”  
   - 怀疑或缺乏信心：“我做不到”、“我不够好”

2. 如果检测到情绪，请以适当的共情语句开始回答：  
   - 对于困惑：“我理解，这确实不容易。”  
   - 对于挫败：“我明白这令人沮丧。”  
   - 对于压力：“有时感到压力是很正常的。”  
   - 对于怀疑：“你已经尽力了，这本身就很棒。”

3. 然后以清晰、有条理的方式作答。  
4. 如有必要，使用示例。  
5. 切勿提供超出提供上下文的信息。

6. 在回答中融入 [Springer 表格 1](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1) 中定义的四个共情要素：  
   - 认知成分：展示你理解学习者的观点，复述其想法以确认理解。  
   - 情感成分：识别并回应其情绪，使用贴切的语言或简单的比喻表达善意。  
   - 态度成分：保持温暖、尊重和鼓励的态度，认可其努力，避免评判。  
   - 调适成分：根据学习者的语言风格和水平调整你的表达方式，让他主导对话。

7. 在整个交流过程中保持友善、尊重和鼓励的语气。

学习者的新问题  
[[ question ]]
EOT;
$string['back'] = '返回';
$string['file_size_exceeds_limit'] = '文件大小超过了10MB的限制';
$string['sending_question'] = '正在发送问题...';
$string['error'] = '错误: ';
$string['error_sending_question'] = '发送问题时出错: ';
$string['saving_prompt'] = '正在保存提示...';
$string['prompt_saved_successfully'] = '提示保存成功!';
$string['error_saving_prompt'] = '保存提示时出错: ';
$string['uploading_file'] = '正在上传文件...';
$string['file_indexed_successfully'] = '文件索引成功!';
$string['error_processing_file'] = '处理文件时出错: ';
$string['add_files'] = '添加文件';
$string['text_or_pdf_files'] = '文本或PDF文件';
$string['drag_files_here_or_click'] = '将文件拖到此处或点击浏览';
$string['cancel'] = '取消';
$string['upload_course'] = '上传课程';
$string['conversations'] = '对话';
$string['prompts'] = '提示';
$string['modify_prompt'] = '修改';
$string['add_prompt'] = '添加';
$string['consult_guide'] = '咨询指南以设计有效的提示:';
$string['guide_link'] = '为教师设计提示的指南';
$string['prompt_content'] = '提示内容';
$string['write_prompt_here'] = '在此处编写您的提示';
$string['save'] = '保存';
$string['chatbot_with_toggle_buttons'] = '带有切换按钮的聊天机器人';
$string['hello_professor'] = '你好，教授。您可以测试聊天机器人，以确保它正常工作，并且您的提示已优化配置。';
$string['hello_student'] = '你好！我是您的学习助理。我可以帮助您: - 理解课程概念 - 复习和练习 - 澄清难点 - 建议学习方法。我能如何帮助您?';
$string['ask_your_question_here'] = '在此处提问...';
$string['modify_prompt'] = '修改提示';
$string['upload_course'] = '上传课程';
$string['error_uploading_asset'] = '上传资产时出错。';
$string['error_creating_job'] = '创建作业时出错。';
$string['job_failed'] = '作业失败。';
$string['error_processing_pdf'] = '处理PDF时出错。';
$string['json_encode_error'] = 'JSON编码错误：';
$string['no_files_selected'] = '未选择文件';
$string['empty_response_from_api'] = '从API收到空回复';
$string['course_id'] = '课程ID';
$string['file_name'] = '文件名';
$string['file_content_base64'] = '文件内容（base64编码）';
$string['insufficient_permissions'] = '上传文件权限不足';
$string['missing_api_configuration'] = '缺少必需的API配置';
$string['weaviate_connector_not_found'] = '未找到WeaviateConnector类';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = '创建集合时出错：';
$string['unknown_error'] = '未知错误';
$string['failed_create_upload_directory'] = '创建上传目录失败';
$string['empty_filename'] = '提供了空文件名';
$string['unsupported_file_type'] = '不支持的文件类型：';
$string['invalid_file_data'] = '无效的文件数据：';
$string['failed_save_file'] = '保存文件失败：';
$string['adobe_pdf_credentials_not_configured'] = 'Adobe PDF API凭据未配置';
$string['pdf_extractor_not_found'] = '未找到PDF提取器类';
$string['failed_extract_pdf_text'] = '从PDF提取文本失败：';
$string['failed_save_extracted_text'] = '保存提取的文本文件失败：';
$string['error_indexing_file_unknown'] = '索引文件时出错 ';
$string['files_indexed_successfully'] = ' 个文件已成功索引';
$string['errors_occurred'] = '。错误：';
$string['no_files_processed'] = '未处理任何文件。错误：';
$string['operation_successful'] = '操作成功';
$string['response_message'] = '响应消息';
$string['processed_files_count'] = '已处理文件数量';
$string['sending_question_fallback'] = '正在发送问题...';
$string['error_colon_fallback'] = '错误：';
$string['error_sending_question_fallback'] = '发送问题时出错：';
$string['saving_prompt_fallback'] = '正在保存提示...';
$string['prompt_saved_successfully_fallback'] = '提示保存成功！';
$string['error_saving_prompt_fallback'] = '保存提示时出错：';
$string['no_files_selected_fallback'] = '未选择文件。';
$string['uploading_files_fallback'] = '正在上传文件...';
$string['files_indexed_successfully_fallback'] = '文件索引成功！';
$string['error_processing_files_fallback'] = '处理文件时出错：';
$string['unknown_error_occurred'] = '发生未知错误';
$string['server_response_error'] = '服务器响应错误。请查看控制台了解详情。';
$string['server_error_check_console'] = '服务器错误 - 请查看控制台了解详情';
$string['files_converted_debug'] = '文件已转换为base64：';
$string['sending_ajax_request_debug'] = '正在发送AJAX请求：';
$string['upload_response_received_debug'] = '已收到上传响应：';
$string['response_type_debug'] = '响应类型：';
$string['upload_error_details_debug'] = '上传错误详情：';
$string['error_object_debug'] = '错误对象：';
$string['raw_server_response_debug'] = '原始服务器响应：';
$string['privacy:metadata:block_uteluqchatbot_conversations'] = '关于用户与聊天机器人对话的信息';
$string['privacy:metadata:block_uteluqchatbot_conversations:userid'] = '创建对话的用户ID';
$string['privacy:metadata:block_uteluqchatbot_conversations:question'] = '用户提出的问题';
$string['privacy:metadata:block_uteluqchatbot_conversations:answer'] = '聊天机器人提供的答案';
$string['privacy:metadata:block_uteluqchatbot_conversations:timecreated'] = '对话创建的时间';
$string['privacy:metadata:block_uteluqchatbot_conversations:courseid'] = '对话发生的课程ID';
$string['privacy:metadata:block_uteluqchatbot_prompts'] = '关于用户创建的自定义提示的信息';
$string['privacy:metadata:block_uteluqchatbot_prompts:prompt'] = '用户创建的自定义提示文本';
$string['privacy:metadata:block_uteluqchatbot_prompts:userid'] = '创建提示的用户ID';
$string['privacy:metadata:block_uteluqchatbot_prompts:courseid'] = '创建提示的课程ID';
$string['privacy:metadata:block_uteluqchatbot_prompts:timecreated'] = '提示创建的时间';
$string['privacy:metadata:cohere_api'] = '发送到Cohere API服务用于AI驱动聊天响应的数据';
$string['privacy:metadata:cohere_api:question'] = '发送到Cohere API进行处理的用户问题';
$string['privacy:metadata:cohere_api:courseid'] = '发送到Cohere API的课程上下文信息';
$string['privacy:metadata:cohere_api:prompt'] = '发送到Cohere API的自定义提示和系统指令';
$string['privacy:metadata:weaviate_cloud'] = '发送到Weaviate Cloud向量数据库用于文档存储和相似性搜索的数据';
$string['privacy:metadata:weaviate_cloud:document_content'] = '从存储在Weaviate中的上传文档中提取的文本内容';
$string['privacy:metadata:weaviate_cloud:embeddings'] = '从存储在Weaviate中的文档内容生成的向量嵌入';
$string['privacy:metadata:weaviate_cloud:courseid'] = '与存储文档相关联的课程上下文信息';
$string['privacy:metadata:weaviate_cloud:metadata'] = '存储在Weaviate数据库中的文档元数据和属性';
$string['privacy:metadata:adobe_pdf_api'] = '发送到Adobe PDF Services API用于从PDF文档提取文本的数据';
$string['privacy:metadata:adobe_pdf_api:pdf_content'] = '发送到Adobe PDF Services进行文本提取的PDF文件内容';
$string['privacy:metadata:adobe_pdf_api:filename'] = '发送进行处理的PDF文档的原始文件名';
$string['privacy:metadata:adobe_pdf_api:extracted_text'] = '由Adobe PDF Services从PDF文档中提取的文本内容';