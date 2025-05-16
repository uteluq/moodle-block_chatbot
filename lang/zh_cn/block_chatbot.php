<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = '聊天机器人';
$string['chatbot:addinstance'] = '添加新的聊天机器人模块';
$string['chatbot:myaddinstance'] = '在仪表板添加新的聊天机器人模块';

// Open AI
$string['openai_api_key'] = 'OpenAI API密钥';
$string['openai_api_key_desc'] = '在此输入您的OpenAI API密钥。';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF服务客户端ID';
$string['adobe_pdf_client_id_desc'] = '在此输入您的Adobe PDF服务客户端ID。';

$string['adobe_pdf_client_secret'] = 'Adobe PDF服务客户端密钥';
$string['adobe_pdf_client_secret_desc'] = '在此输入您的Adobe PDF服务客户端密钥。';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = '在此输入Weaviate API的URL。';

$string['weaviate_api_key'] = 'Weaviate API密钥';
$string['weaviate_api_key_desc'] = '在此输入您的Weaviate API密钥。';

// Cohere
$string['cohere_embedding_api_key'] = 'Cohere嵌入模型API密钥';
$string['cohere_embedding_api_key_desc'] = '在此输入您的Cohere嵌入模型API密钥。';

// Conversation Settings
$string['max_conversations'] = '每个用户的最大对话数';
$string['max_conversations_desc'] = '每个用户存储的最大对话数。如果超出，最旧的对话将被删除。';

// Test Button Strings
$string['test_api_keys'] = '测试API密钥';
$string['test_api_keys_desc'] = '点击测试已配置的API密钥';
$string['test_api_keys_label'] = '测试密钥';

$string['chatbot:manage'] = '管理聊天机器人设置';

// Default Prompt
$string['chatbot:default_prompt'] = "情境背景：
学习者正在学习{$coursename}课程。您的角色是通过提供精确、相关且适合其学习的回答来支持他们。
任务：
作为助手，您的任务是根据提供的背景回答学习者的提问，帮助他们理解{$coursename}课程的概念。[[ history ]]。
您必须制定清晰、精确且相关的回答，确保仅传递课程中的信息。如果在提供的背景中找不到答案，请严格回复：“我根据您的老师精心挑选的课程内容进行校准。如需更多信息，请联系您的老师。”
如果学习者写下表明他们未理解某个概念或之前解释的句子，请检查[[ history ]]以确定误解之处，然后以更简单的方式重新表述您的解释，并使用具体示例。
指令：
1. 感知学习者问题中的情绪，采用共情和关怀的语气。
2. 以清晰且结构化的方式回答。
3. 如有需要，使用示例解释概念。
4. 不要在提供的背景之外进行假设。
学习者的新问题 [[ question ]]";