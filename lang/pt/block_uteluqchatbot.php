<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Adicionar um novo bloco de chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Adicionar um novo bloco de chatbot ao Painel';

$string['weaviate_cohere_not_configured'] = 'A chave API do Cohere não está configurada ou é inválida. Por favor, verifique as configurações.';


// Open AI
$string['openai_api_key'] = 'Chave da API OpenAI';
$string['openai_api_key_desc'] = 'Insira sua chave da API OpenAI aqui.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID do Cliente dos Serviços Adobe PDF';
$string['adobe_pdf_client_id_desc'] = 'Insira seu ID do Cliente dos Serviços Adobe PDF aqui.';

$string['adobe_pdf_client_secret'] = 'Segredo do Cliente dos Serviços Adobe PDF';
$string['adobe_pdf_client_secret_desc'] = 'Insira seu Segredo do Cliente dos Serviços Adobe PDF aqui.';

// Weaviate
$string['weaviate_api_url'] = 'URL da API Weaviate';
$string['weaviate_api_url_desc'] = 'Insira a URL da API Weaviate aqui.';

$string['weaviate_api_key'] = 'Chave da API Weaviate';
$string['weaviate_api_key_desc'] = 'Insira sua chave da API Weaviate aqui.';

// Cohere Embedding Model
$string['cohere_embedding_api_key'] = 'Chave da API do Modelo de Embedding Cohere';
$string['cohere_embedding_api_key_desc'] = 'Insira sua chave da API para o Modelo de Embedding Cohere aqui.';

$string['max_conversations'] = 'Máximo de conversas por usuário';
$string['max_conversations_desc'] = 'O número máximo de conversas armazenadas por usuário. Se excedido, a conversa mais antiga será excluída.';

// Test button strings
$string['test_api_keys'] = 'Testar Chaves da API';
$string['test_api_keys_desc'] = 'Clique para testar as chaves da API configuradas';
$string['test_api_keys_label'] = 'Testar Chaves';

$string['uteluqchatbot:manage'] = 'Gerenciar configurações do chatbot';

// For ../.../weaviate_db.php
$string['filesmissing'] = 'Arquivos ausentes.';
$string['errorcreatingcollection'] = 'Erro ao criar coleção: ';
$string['fileexceedsmaxsizeini'] = 'O arquivo excede o tamanho máximo definido em php.ini';
$string['fileexceedsmaxsizeform'] = 'O arquivo excede o tamanho máximo especificado no formulário HTML';
$string['filepartiallyuploaded'] = 'O arquivo foi apenas parcialmente carregado';
$string['nofileuploaded'] = 'Nenhum arquivo foi carregado';
$string['missingtmpfolder'] = 'A pasta temporária está ausente';
$string['failedtowritetodisk'] = 'Falha ao gravar o arquivo no disco';
$string['phpextensionstoppedupload'] = 'Uma extensão PHP interrompeu o upload do arquivo';
$string['unknownuploaderror'] = 'Erro de upload desconhecido';
$string['uploaderror'] = 'Erro de upload: ';
$string['errorindexingfile'] = 'Erro ao indexar arquivo: ';
$string['allfilesindexed'] = 'Todos os arquivos foram indexados com sucesso.';

// For test_api_keys.php
$string['openai_connection_error'] = 'Erro de conexão ao verificar a API OpenAI.';
$string['openai_invalid_key'] = 'A chave da API OpenAI é inválida. Código de erro: ';
$string['openai_valid_key'] = 'A chave da API OpenAI é válida e funcional.';
$string['adobe_invalid_credentials'] = 'O ID do cliente ou segredo do cliente para os Serviços Adobe PDF é inválido.';
$string['adobe_valid_credentials'] = 'O ID do cliente e segredo do cliente para os Serviços Adobe PDF são válidos e funcionais.';
$string['weaviate_connection_error'] = 'Erro de conexão com o Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'A URL ou chave da API Weaviate é inválida ou ocorreu um erro. Código de erro: ';
$string['weaviate_valid_key_and_url'] = 'A URL e chave da API Weaviate são válidas e funcionais.';
$string['back'] = 'Voltar';

// For add_prompt.php
$string['invalid_sesskey'] = 'Sesskey inválido';
$string['database_write_error'] = 'Erro de escrita no banco de dados: ';

// For ajax.php
$string['http_method_not_allowed'] = 'Método HTTP não permitido';
$string['invalid_json'] = 'JSON inválido: ';
$string['missing_parameters'] = 'Parâmetros ausentes';
$string['invalid_question'] = 'Pergunta inválida';
$string['empty_question'] = 'A pergunta não pode estar vazia';
$string['invalid_session'] = 'Sessão inválida';
$string['openai_api_key_not_configured'] = 'Chave da API OpenAI não configurada';
$string['empty_response_from_api'] = 'Resposta vazia recebida da API';
$string['error_saving_conversation'] = 'Erro ao salvar a conversa';

// For classes/PDFExtractAPI.php
$string['failed_to_obtain_access_token'] = 'Falha ao obter o token de acesso. Status HTTP: ';
$string['access_token_obtained_successfully'] = 'Token de acesso obtido com sucesso.';
$string['failed_to_obtain_access_token_response'] = 'Falha ao obter o token de acesso. Resposta: ';
$string['failed_to_obtain_upload_uri'] = 'Falha ao obter o URI de upload. Status HTTP: ';
$string['asset_upload_uri_obtained'] = 'URI de upload de ativo obtido.';
$string['failed_to_obtain_upload_uri_response'] = 'Falha ao obter o URI de upload. Resposta: ';
$string['failed_to_upload_file'] = 'Falha ao carregar o arquivo. Status HTTP: ';
$string['file_uploaded_successfully'] = 'Arquivo carregado com sucesso.';
$string['job_created_successfully'] = 'Tarefa criada com sucesso. Localização: ';
$string['bad_request'] = 'Requisição inválida. A solicitação é inválida ou não pode ser atendida.';
$string['unauthorized'] = 'Não autorizado. Verifique suas credenciais da API.';
$string['resource_not_found'] = 'Recurso não encontrado. O recurso especificado não foi encontrado.';
$string['quota_exceeded'] = 'Cota excedida. Você excedeu sua cota para esta operação.';
$string['internal_server_error'] = 'Erro interno do servidor. O servidor encontrou um erro e não pode processar sua solicitação no momento.';
$string['unexpected_http_status'] = 'Status HTTP inesperado: ';
$string['failed_to_get_job_status'] = 'Falha ao obter o status da tarefa. Status HTTP: ';
$string['job_status'] = 'Status da tarefa: ';
$string['job_completed_successfully'] = 'Tarefa concluída com sucesso. URI de download: ';
$string['job_completed_but_download_uri_missing'] = 'Tarefa concluída, mas o URI de download está ausente na resposta.';
$string['job_in_progress'] = 'Tarefa ainda em andamento. Continue consultando...';
$string['job_failed'] = 'Tarefa falhou.';
$string['failed_to_decode_json_response'] = 'Falha ao decodificar a resposta JSON ou o campo de status está ausente. Resposta: ';
$string['failed_to_download_asset'] = 'Falha ao baixar o ativo. Status HTTP: ';
$string['asset_downloaded_successfully'] = 'Ativo baixado com sucesso.';
$string['error_decoding_json_file'] = 'Erro ao decodificar o arquivo JSON.';

// For classes/weaviateconnector.php
$string['curl_error'] = 'Erro cURL: ';
$string['http_error'] = 'Erro HTTP ';
$string['json_decode_error'] = 'Erro de decodificação JSON: ';
$string['no_response_generated'] = 'Nenhuma resposta gerada. Dados recebidos: ';
$string['previous_interactions_history'] = 'Histórico de interações anteriores:';
$string['previous_question'] = 'Pergunta anterior: ';
$string['answer'] = 'Resposta: ';
$string['file_not_found'] = 'Arquivo não encontrado: ';
$string['unable_to_read_file'] = 'Incapaz de ler o arquivo';
$string['json_encode_error'] = 'Erro de codificação JSON: ';
$string['failure_after_retries'] = 'Falha após ';
$string['last_error'] = ' tentativas. Último erro: HTTP ';

// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Contexto da Situação:
O aluno está fazendo um curso sobre [[ coursename ]]. Seu papel é apoiá-lo, fornecendo respostas precisas, relevantes e personalizadas para o seu aprendizado.
Missão:
Como assistente, sua missão é ajudar o aluno a entender os conceitos do curso X, respondendo às suas perguntas e baseando-se no contexto fornecido para formular uma resposta. [[ history ]].
Você deve fornecer respostas claras, precisas e relevantes, garantindo que transmita apenas informações do curso. Se uma resposta não puder ser encontrada no contexto fornecido, responda estritamente com: "Estou calibrado com base no conteúdo do curso cuidadosamente selecionado pelo seu professor. Se precisar de mais informações, você é convidado a entrar em contato com ele."
Se o aluno escrever frases indicando que não entendeu um conceito ou uma explicação anterior, verifique [[ history ]] para identificar o que foi mal compreendido, e depois reformule sua explicação de forma mais simples e com exemplos concretos.
Instruções:
1. Detecte emoções na pergunta do aluno e adote um tom empático e atencioso.
2. Responda de forma clara e estruturada.
3. Explique o conceito com exemplos, se necessário.
4. Não forneça respostas fora do contexto dado.
5. Sua resposta deve integrar os seguintes quatro componentes de empatia:
   - Componente Cognitivo: Mostre que você entende o ponto de vista, o raciocínio e as intenções do aluno. Reformule suas ideias para validar seu entendimento. Ofereça sugestões relacionadas ao que ele disse, sem impor seu próprio raciocínio.
   - Componente Afetivo: Seja sensível ao estado emocional do aluno (frustração, dúvida, satisfação, estresse, etc.). Reflita ou valide suas emoções com palavras apropriadas ou simples metáforas. Expresse bondade.
   - Componente Atitudinal: Adote uma atitude calorosa, respeitosa e encorajadora. Mostre abertura, valorize seus esforços e evite qualquer julgamento. Seu tom deve ser amigável e sincero.
   - Componente de Ajuste: Adapte suas respostas à evolução do discurso do aluno. Use vocabulário e estilo que correspondam ao seu nível e humor. Deixe-o guiar a conversa, nunca force o assunto.
Nova pergunta do aluno [[ question ]]
EOT;

$string['sending_question'] = 'Enviando a pergunta...';
$string['error'] = 'Erro: ';
$string['error_sending_question'] = 'Erro ao enviar a pergunta: ';
$string['saving_prompt'] = 'Salvando o prompt...';
$string['prompt_saved_successfully'] = 'Prompt salvo com sucesso!';
$string['error_saving_prompt'] = 'Erro ao salvar o prompt: ';
$string['uploading_file'] = 'Carregando o arquivo...';
$string['file_indexed_successfully'] = 'Arquivo indexado com sucesso!';
$string['error_processing_file'] = 'Erro ao processar o arquivo: ';
$string['json_parse_error'] = 'Erro de análise JSON: ';
$string['invalid_json_response'] = 'A resposta do servidor não está em formato JSON válido.';
$string['add_files'] = 'Adicionar Arquivos';
$string['text_or_pdf_files'] = 'Arquivos de Texto ou PDF';
$string['drag_files_here_or_click'] = 'Arraste seus arquivos aqui ou clique para procurar';
$string['cancel'] = 'Cancelar';
$string['upload_course'] = 'Carregar Curso';

$string['modify_prompt'] = 'Modificar';
$string['add_prompt'] = 'Adicionar';
$string['consult_guide'] = 'Consulte o guia para projetar prompts eficazes:';
$string['guide_link'] = 'Guia para projetar prompts para professores';
$string['prompt_content'] = 'Conteúdo do Prompt';
$string['write_prompt_here'] = 'Escreva seu prompt aqui';
$string['save'] = 'Salvar';

$string['chatbot_with_toggle_buttons'] = 'Chatbot com Botões de Alternância';
$string['hello_professor'] = 'Olá Professor, você tem a opção de testar o chatbot para garantir que ele funcione corretamente e que seu prompt esteja configurado de forma ideal.';
$string['hello_student'] = 'Olá! Sou seu assistente de aprendizagem. Posso ajudar com: - Compreender conceitos do curso - Revisar e praticar exercícios - Esclarecer pontos difíceis - Sugerir métodos de estudo. Como posso ajudar?';
$string['ask_your_question_here'] = 'Faça sua pergunta aqui...';
$string['modify_prompt'] = 'Modificar Prompt';
$string['upload_course'] = 'Carregar Curso';
$string['open_prompt_modal'] = 'Abrir o modal de modificação de prompt';
$string['open_file_upload_modal'] = 'Abrir o modal de carregamento de curso';


// For classes/PDFExtractAPI.php
$string['error_uploading_asset'] = 'Erro ao fazer upload do asset.';
$string['error_creating_job'] = 'Erro ao criar o job.';
$string['job_failed'] = 'Job falhou.';
$string['error_processing_pdf'] = 'Erro ao processar o PDF.';
