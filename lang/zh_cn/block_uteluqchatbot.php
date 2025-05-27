<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = '聊天机器人';
$string['uteluqchatbot:addinstance'] = '添加新的聊天机器人块';
$string['uteluqchatbot:myaddinstance'] = '在仪表板中添加新的聊天机器人块';

$string['weaviate_cohere_not_configured'] = 'Cohere API 密钥未配置或无效。请检查设置。';


// Open AI
$string['openai_api_key'] = 'OpenAI API密钥';
$string['openai_api_key_desc'] = '在此处输入您的OpenAI API密钥。';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF服务客户端ID';
$string['adobe_pdf_client_id_desc'] = '在此处输入您的Adobe PDF服务客户端ID。';

$string['adobe_pdf_client_secret'] = 'Adobe PDF服务客户端密钥';
$string['adobe_pdf_client_secret_desc'] = '在此处输入您的Adobe PDF服务客户端密钥。';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = '在此处输入Weaviate API的URL。';

$string['weaviate_api_key'] = 'Weaviate API密钥';
$string['weaviate_api_key_desc'] = '在此处输入您的Weaviate API密钥。';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Cohere嵌入模型API密钥';
$string['cohere_embedding_api_key_desc'] = '在此处输入您的Cohere嵌入模型API密钥。';

$string['max_conversations'] = '每个用户的最大对话数';
$string['max_conversations_desc'] = '每个用户存储的最大对话数。如果超过，最旧的对话将被删除。';

// Test button strings
$string['test_api_keys'] = '测试API密钥';
$string['test_api_keys_desc'] = '点击测试已配置的API密钥';
$string['test_api_keys_label'] = '测试密钥';

$string['uteluqchatbot:manage'] = '管理聊天机器人设置';

// For ../.../weaviate_db.php
$string['filesmissing'] = '文件丢失。';
$string['errorcreatingcollection'] = '创建集合时出错: ';
$string['fileexceedsmaxsizeini'] = '文件超过php.ini中定义的最大大小';
$string['fileexceedsmaxsizeform'] = '文件超过HTML表单中指定的最大大小';
$string['filepartiallyuploaded'] = '文件仅部分上传';
$string['nofileuploaded'] = '未上传任何文件';
$string['missingtmpfolder'] = '临时文件夹丢失';
$string['failedtowritetodisk'] = '写入磁盘失败';
$string['phpextensionstoppedupload'] = 'PHP扩展停止了文件上传';
$string['unknownuploaderror'] = '未知的上传错误';
$string['uploaderror'] = '上传错误: ';
$string['errorindexingfile'] = '索引文件时出错: ';
$string['allfilesindexed'] = '所有文件已成功索引。';

// For test_api_keys.php
$string['openai_connection_error'] = '验证OpenAI API时连接错误。';
$string['openai_invalid_key'] = 'OpenAI API密钥无效。错误代码: ';
$string['openai_valid_key'] = 'OpenAI API密钥有效且功能正常。';
$string['adobe_invalid_credentials'] = 'Adobe PDF服务的客户端ID或客户端密钥无效。';
$string['adobe_valid_credentials'] = 'Adobe PDF服务的客户端ID和客户端密钥有效且功能正常。';
$string['weaviate_connection_error'] = '连接Weaviate时出错: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate API的URL或密钥无效或发生错误。错误代码: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate API的URL和密钥有效且功能正常。';
$string['back'] = '返回';

// For add_prompt.php
$string['invalid_sesskey'] = '会话密钥无效';
$string['database_write_error'] = '数据库写入错误: ';

// For ajax.php
$string['http_method_not_allowed'] = '不允许的HTTP方法';
$string['invalid_json'] = '无效的JSON: ';
$string['missing_parameters'] = '缺少参数';
$string['invalid_question'] = '无效的问题';
$string['empty_question'] = '问题不能为空';
$string['invalid_session'] = '无效的会话';
$string['openai_api_key_not_configured'] = '未配置OpenAI API密钥';
$string['empty_response_from_api'] = '从API收到空响应';
$string['error_saving_conversation'] = '保存对话时出错';

// For classes/PDFExtractAPI.php
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

// For classes/weaviateconnector.php
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

// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
情境背景:
学习者正在学习[[ coursename ]]课程。您的角色是通过提供准确、相关和定制的响应来支持他们的学习。
任务:
作为助手，您的任务是帮助学习者理解课程X的概念，回答他们的问题，同时依赖提供的上下文来制定响应。[[ history ]].
您必须提供清晰、准确和相关的答案，确保只传达课程中的信息。如果在提供的上下文中找不到答案，请严格回复: "我根据您的教师精心选择的课程内容进行校准。如果您需要更多信息，请联系他们。"
如果学习者写出表明他们没有理解概念或之前解释的句子，请检查[[ history ]]以识别误解之处，然后用更简单和具体的例子重新解释。
指令:
1. 检测学习者问题中的情绪，采用同理心和关怀的语气。
2. 以清晰和结构化的方式响应。
3. 必要时用例子解释概念。
4. 不要提供超出给定上下文的答案。
5. 您的响应必须整合以下四种同理心成分:
   - 认知成分: 展示您理解学习者的观点、推理和意图。重新表述他们的想法以验证您的理解。提供与他们所说内容相关的建议，而不强加自己的推理。
   - 情感成分: 对学习者的情绪状态（沮丧、怀疑、满意、压力等）保持敏感。用适当的词语或简单比喻反映或验证他们的情绪。表达善意。
   - 态度成分: 采取温暖、尊重和鼓励的态度。展示开放性，重视他们的努力，避免任何判断。您的语气应友好且真诚。
   - 调整成分: 根据学习者话语的演变调整您的响应。使用与他们的水平和情绪相匹配的词汇和风格。让他们引导对话，绝不强加主题。
学习者的新问题 [[ question ]]
EOT;

$string['sending_question'] = '正在发送问题...';
$string['error'] = '错误: ';
$string['error_sending_question'] = '发送问题时出错: ';
$string['saving_prompt'] = '正在保存提示...';
$string['prompt_saved_successfully'] = '提示保存成功!';
$string['error_saving_prompt'] = '保存提示时出错: ';
$string['uploading_file'] = '正在上传文件...';
$string['file_indexed_successfully'] = '文件索引成功!';
$string['error_processing_file'] = '处理文件时出错: ';
$string['json_parse_error'] = 'JSON解析错误: ';
$string['invalid_json_response'] = '服务器响应不是有效的JSON格式。';
$string['add_files'] = '添加文件';
$string['text_or_pdf_files'] = '文本或PDF文件';
$string['drag_files_here_or_click'] = '将文件拖到此处或点击浏览';
$string['cancel'] = '取消';
$string['upload_course'] = '上传课程';

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
$string['open_prompt_modal'] = '打开提示修改模态框';
$string['open_file_upload_modal'] = '打开课程上传模态框';


// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = '上传资产时出错。';
$string['error_creating_job'] = '创建作业时出错。';
$string['job_failed'] = '作业失败。';
$string['error_processing_pdf'] = '处理PDF时出错。';
