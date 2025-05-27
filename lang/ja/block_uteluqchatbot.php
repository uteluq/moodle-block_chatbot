<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'チャットボット';
$string['uteluqchatbot:addinstance'] = '新しいチャットボットブロックを追加';
$string['uteluqchatbot:myaddinstance'] = 'ダッシュボードに新しいチャットボットブロックを追加';

$string['weaviate_cohere_not_configured'] = 'Cohere API キーが設定されていないか無効です。設定を確認してください。';


// Open AI
$string['openai_api_key'] = 'OpenAI APIキー';
$string['openai_api_key_desc'] = 'あなたのOpenAI APIキーをここに入力してください。';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDFサービス クライアントID';
$string['adobe_pdf_client_id_desc'] = 'あなたのAdobe PDFサービス クライアントIDをここに入力してください。';

$string['adobe_pdf_client_secret'] = 'Adobe PDFサービス クライアントシークレット';
$string['adobe_pdf_client_secret_desc'] = 'あなたのAdobe PDFサービス クライアントシークレットをここに入力してください。';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API URL';
$string['weaviate_api_url_desc'] = 'Weaviate APIのURLをここに入力してください。';

$string['weaviate_api_key'] = 'Weaviate APIキー';
$string['weaviate_api_key_desc'] = 'あなたのWeaviate APIキーをここに入力してください。';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Cohere埋め込みモデルAPIキー';
$string['cohere_embedding_api_key_desc'] = 'Cohere埋め込みモデルのAPIキーをここに入力してください。';

$string['max_conversations'] = 'ユーザーごとの最大会話数';
$string['max_conversations_desc'] = 'ユーザーごとに保存される最大会話数。この数を超えると、最も古い会話が削除されます。';

// Test button strings
$string['test_api_keys'] = 'APIキーをテスト';
$string['test_api_keys_desc'] = '設定されたAPIキーをテストするにはクリックしてください';
$string['test_api_keys_label'] = 'キーをテスト';

$string['uteluqchatbot:manage'] = 'チャットボットの設定を管理';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'ファイルが見つかりません。';
$string['errorcreatingcollection'] = 'コレクションの作成中にエラーが発生しました: ';
$string['fileexceedsmaxsizeini'] = 'ファイルがphp.iniで定義された最大サイズを超えています';
$string['fileexceedsmaxsizeform'] = 'ファイルがHTMLフォームで指定された最大サイズを超えています';
$string['filepartiallyuploaded'] = 'ファイルが部分的にしかアップロードされていません';
$string['nofileuploaded'] = 'ファイルがアップロードされていません';
$string['missingtmpfolder'] = '一時フォルダが見つかりません';
$string['failedtowritetodisk'] = 'ディスクへの書き込みに失敗しました';
$string['phpextensionstoppedupload'] = 'PHP拡張機能がファイルのアップロードを停止しました';
$string['unknownuploaderror'] = '不明なアップロードエラー';
$string['uploaderror'] = 'アップロードエラー: ';
$string['errorindexingfile'] = 'ファイルのインデックス作成中にエラーが発生しました: ';
$string['allfilesindexed'] = 'すべてのファイルが正常にインデックスされました。';

// For test_api_keys.php
$string['openai_connection_error'] = 'OpenAI APIの検証中に接続エラーが発生しました。';
$string['openai_invalid_key'] = 'OpenAI APIキーが無効です。エラーコード: ';
$string['openai_valid_key'] = 'OpenAI APIキーが有効で機能しています。';
$string['adobe_invalid_credentials'] = 'Adobe PDFサービスのクライアントIDまたはクライアントシークレットが無効です。';
$string['adobe_valid_credentials'] = 'Adobe PDFサービスのクライアントIDとクライアントシークレットが有効で機能しています。';
$string['weaviate_connection_error'] = 'Weaviateへの接続エラー: ';
$string['weaviate_invalid_key_or_url'] = 'Weaviate APIのURLまたはキーが無効です、またはエラーが発生しました。エラーコード: ';
$string['weaviate_valid_key_and_url'] = 'Weaviate APIのURLとキーが有効で機能しています。';
$string['back'] = '戻る';

// For add_prompt.php
$string['invalid_sesskey'] = 'セッションキーが無効です';
$string['database_write_error'] = 'データベースへの書き込みエラー: ';

// For ajax.php
$string['http_method_not_allowed'] = 'HTTPメソッドが許可されていません';
$string['invalid_json'] = '無効なJSON: ';
$string['missing_parameters'] = 'パラメータが不足しています';
$string['invalid_question'] = '無効な質問';
$string['empty_question'] = '質問が空白です';
$string['invalid_session'] = '無効なセッション';
$string['openai_api_key_not_configured'] = 'OpenAI APIキーが設定されていません';
$string['empty_response_from_api'] = 'APIから空の応答が返されました';
$string['error_saving_conversation'] = '会話の保存中にエラーが発生しました';

// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = 'アクセストークンの取得に失敗しました。HTTPステータス: ';
$string['access_token_obtained_successfully'] = 'アクセストークンを正常に取得しました。';
$string['failed_to_obtain_access_token_response'] = 'アクセストークンの取得に失敗しました。レスポンス: ';
$string['failed_to_obtain_upload_uri'] = 'アップロードURIの取得に失敗しました。HTTPステータス: ';
$string['asset_upload_uri_obtained'] = 'アセットアップロードURIを取得しました。';
$string['failed_to_obtain_upload_uri_response'] = 'アップロードURIの取得に失敗しました。レスポンス: ';
$string['failed_to_upload_file'] = 'ファイルのアップロードに失敗しました。HTTPステータス: ';
$string['file_uploaded_successfully'] = 'ファイルが正常にアップロードされました。';
$string['job_created_successfully'] = 'ジョブが正常に作成されました。場所: ';
$string['bad_request'] = '不正なリクエスト。リクエストが無効ですまたは処理できません。';
$string['unauthorized'] = '認証されていません。APIクレデンシャルを確認してください。';
$string['resource_not_found'] = 'リソースが見つかりません。指定されたリソースが見つかりません。';
$string['quota_exceeded'] = 'クォータを超えました。この操作のクォータを超えました。';
$string['internal_server_error'] = '内部サーバーエラー。サーバーがエラーを起こし、現在リクエストを処理できません。';
$string['unexpected_http_status'] = '予期せぬHTTPステータス: ';
$string['failed_to_get_job_status'] = 'ジョブステータスの取得に失敗しました。HTTPステータス: ';
$string['job_status'] = 'ジョブステータス: ';
$string['job_completed_successfully'] = 'ジョブが正常に完了しました。ダウンロードURI: ';
$string['job_completed_but_download_uri_missing'] = 'ジョブは完了しましたが、レスポンスにダウンロードURIが含まれていません。';
$string['job_in_progress'] = 'ジョブがまだ進行中です。ポーリングを継続してください...';
$string['job_failed'] = 'ジョブが失敗しました。';
$string['failed_to_decode_json_response'] = 'JSONレスポンスのデコードに失敗しました、またはステータスフィールドが欠落しています。レスポンス: ';
$string['failed_to_download_asset'] = 'アセットのダウンロードに失敗しました。HTTPステータス: ';
$string['asset_downloaded_successfully'] = 'アセットが正常にダウンロードされました。';
$string['error_decoding_json_file'] = 'JSONファイルのデコード中にエラーが発生しました。';

// For classes/weaviateconnector.php
$string['curl_error'] = 'cURLエラー: ';
$string['http_error'] = 'HTTPエラー ';
$string['json_decode_error'] = 'JSONデコードエラー: ';
$string['no_response_generated'] = '応答が生成されませんでした。受信したデータ: ';
$string['previous_interactions_history'] = '過去のやり取りの履歴:';
$string['previous_question'] = '前の質問: ';
$string['answer'] = '回答: ';
$string['file_not_found'] = 'ファイルが見つかりません: ';
$string['unable_to_read_file'] = 'ファイルを読み取れません';
$string['json_encode_error'] = 'JSONエンコードエラー: ';
$string['failure_after_retries'] = '再試行後に失敗 ';
$string['last_error'] = ' 回。最後のエラー: HTTP ';

// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
状況コンテキスト:
学習者は[[ coursename ]]のコースを受講しています。あなたの役割は、彼らの学習をサポートするために、正確で関連性があり、カスタマイズされた回答を提供することです。
ミッション:
アシスタントとして、あなたのミッションは、学習者がコースXの概念を理解するのを助けることです。彼らの質問に答え、提供されたコンテキストに基づいて回答を策定します。[[ history ]].
明確で正確で関連性のある回答を提供し、コースからの情報のみを伝えるようにしてください。提供されたコンテキストに回答が見つからない場合は、次のように厳密に答えてください: 「私は、教師が慎重に選択したコースコンテンツに基づいて調整されています。詳細情報が必要な場合は、教師に連絡してください。」
学習者が概念や以前の説明を理解していないことを示す文を書いた場合は、[[ history ]]を確認して、何が誤解されたかを特定し、より簡単で具体的な例を使って説明を再構成してください。
指示:
1. 学習者の質問に含まれる感情を検出し、共感的で思いやりのあるトーンを採用してください。
2. 明確で構造化された方法で応答してください。
3. 必要に応じて、概念を例を使って説明してください。
4. 提供されたコンテキストの外で回答を提供しないでください。
5. あなたの応答には、以下の4つの共感コンポーネントを統合する必要があります:
   - 認知コンポーネント: 学習者の視点、推論、意図を理解していることを示してください。彼らのアイデアを再構成して、あなたの理解を検証してください。彼らの発言に関連する提案を提供し、あなた自身の推論を押し付けないでください。
   - 情動コンポーネント: 学習者の感情状態（フラストレーション、疑い、満足感、ストレスなど）に敏感になってください。適切な言葉や単純な比喩を使って、彼らの感情を反映または検証してください。優しさを示してください。
   - 態度コンポーネント: 温かく、敬意を表し、励ます態度を採用してください。開放性を示し、彼らの努力を評価し、いかなる判断も避けてください。あなたのトーンは友好的で誠実であるべきです。
   - 調整コンポーネント: 学習者の会話の進行に合わせて応答を調整してください。彼らのレベルと気分に合った語彙とスタイルを使用してください。会話を導かせて、決して主題を強制しないでください。
学習者からの新しい質問 [[ question ]]
EOT;

$string['sending_question'] = '質問を送信しています...';
$string['error'] = 'エラー: ';
$string['error_sending_question'] = '質問の送信中にエラーが発生しました: ';
$string['saving_prompt'] = 'プロンプトを保存しています...';
$string['prompt_saved_successfully'] = 'プロンプトが正常に保存されました!';
$string['error_saving_prompt'] = 'プロンプトの保存中にエラーが発生しました: ';
$string['uploading_file'] = 'ファイルをアップロードしています...';
$string['file_indexed_successfully'] = 'ファイルが正常にインデックスされました!';
$string['error_processing_file'] = 'ファイルの処理中にエラーが発生しました: ';
$string['json_parse_error'] = 'JSON解析エラー: ';
$string['invalid_json_response'] = 'サーバーの応答が有効なJSON形式ではありません。';
$string['add_files'] = 'ファイルを追加';
$string['text_or_pdf_files'] = 'テキストまたはPDFファイル';
$string['drag_files_here_or_click'] = 'ファイルをここにドラッグするか、クリックして参照してください';
$string['cancel'] = 'キャンセル';
$string['upload_course'] = 'コースをアップロード';

$string['modify_prompt'] = '修正';
$string['add_prompt'] = '追加';
$string['consult_guide'] = '効果的なプロンプトを設計するためのガイドを確認してください:';
$string['guide_link'] = '教師向けのプロンプト設計ガイド';
$string['prompt_content'] = 'プロンプトコンテンツ';
$string['write_prompt_here'] = 'ここにプロンプトを入力してください';
$string['save'] = '保存';

$string['chatbot_with_toggle_buttons'] = 'トグルボタン付きチャットボット';
$string['hello_professor'] = 'こんにちは、教授。チャットボットが正しく機能し、プロンプトが最適に設定されていることを確認するために、テストするオプションがあります。';
$string['hello_student'] = 'こんにちは！私はあなたの学習アシスタントです。以下のことでお手伝いできます: - コースの概念を理解する - 練習問題を確認して練習する - 難しい点を明確にする - 学習方法を提案する。どのようなお手伝いができますか？';
$string['ask_your_question_here'] = 'ここに質問を入力してください...';
$string['modify_prompt'] = 'プロンプトを修正';
$string['upload_course'] = 'コースをアップロード';
$string['open_prompt_modal'] = 'プロンプト修正モーダルを開く';
$string['open_file_upload_modal'] = 'コースアップロードモーダルを開く';


// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'アセットのアップロード中にエラーが発生しました。';
$string['error_creating_job'] = 'ジョブの作成中にエラーが発生しました。';
$string['job_failed'] = 'ジョブが失敗しました。';
$string['error_processing_pdf'] = 'PDFの処理中にエラーが発生しました。';
