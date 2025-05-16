<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'チャットボット';
$string['chatbot:addinstance'] = '新しいチャットボットブロックを追加';
$string['chatbot:myaddinstance'] = 'ダッシュボードに新しいチャットボットブロックを追加';

// Open AI
$string['openai_api_key'] = 'OpenAI APIキー';
$string['openai_api_key_desc'] = 'ここにOpenAI APIキーを入力してください。';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDFサービス クライアントID';
$string['adobe_pdf_client_id_desc'] = 'ここにAdobe PDFサービスのクライアントIDを入力してください。';

$string['adobe_pdf_client_secret'] = 'Adobe PDFサービス クライアントシークレット';
$string['adobe_pdf_client_secret_desc'] = 'ここにAdobe PDFサービスのクライアントシークレットを入力してください。';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'ここにWeaviate APIのURLを入力してください。';

$string['weaviate_api_key'] = 'Weaviate APIキー';
$string['weaviate_api_key_desc'] = 'ここにWeaviate APIキーを入力してください。';

// Cohere
$string['cohere_embedding_api_key'] = 'Cohere埋め込みモデル APIキー';
$string['cohere_embedding_api_key_desc'] = 'ここにCohere埋め込みモデルのAPIキーを入力してください。';

// Conversation Settings
$string['max_conversations'] = 'ユーザーごとの最大会話数';
$string['max_conversations_desc'] = 'ユーザーごとに保存される会話の最大数。超過した場合、最古の会話が削除されます。';

// Test Button Strings
$string['test_api_keys'] = 'APIキーのテスト';
$string['test_api_keys_desc'] = '設定されたAPIキーをテストするにはクリックしてください';
$string['test_api_keys_label'] = 'キーのテスト';

$string['chatbot:manage'] = 'チャットボットの設定を管理';

// Default Prompt
$string['chatbot:default_prompt'] = "状況のコンテキスト：
学習者は{$coursename}のコースを受講しています。あなたの役割は、正確で関連性のある、学習に適した回答を提供することでサポートすることです。
ミッション：
アシスタントとして、あなたのミッションは、提供されたコンテキストに基づいて質問に答え、{$coursename}のコースの概念を学習者が理解するのを助けることです。[[ history ]]。
明確で正確かつ関連性のある回答を構築し、コースの情報のみを伝える必要があります。提供されたコンテキストに回答が見つからない場合、厳密に次のように回答してください：「私はあなたの教師が慎重に選んだコースの内容に基づいて調整されています。詳細情報が必要な場合は、教師に連絡してください。」
学習者が概念や前の説明を理解していないことを示す文を書いた場合、[[ history ]]を確認して何が誤解されたかを特定し、よりシンプルで具体的な例を用いて説明を再構築してください。
指示：
1. 学習者の質問に含まれる感情を察知し、共感的で思いやりのあるトーンを採用する。
2. 明確かつ構造化された方法で回答する。
3. 必要に応じて例を用いて概念を説明する。
4. 提供されたコンテキスト以外の推測をしない。
学習者の新しい質問 [[ question ]]";