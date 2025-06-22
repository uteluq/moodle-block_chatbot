<?php
/**
 * @copyright 2025 UNIVERSITÉ TÉLUQ & UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */
$string['pluginname'] = 'uteluqchatbot';
$string['uteluqchatbot:addinstance'] = 'Adicionar um novo bloco de chatbot';
$string['uteluqchatbot:myaddinstance'] = 'Adicionar um novo bloco de chatbot ao Painel';

$string['weaviate_cohere_not_configured'] = 'A chave API do Cohere não está configurada ou é inválida. Por favor, verifique as configurações.';


// Open AI

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


// Test button strings
$string['test_api_keys'] = 'Testar Chaves da API';
$string['test_api_keys_desc'] = 'Clique para testar as chaves da API configuradas';
$string['test_api_keys_label'] = 'Testar Chaves';

$string['uteluqchatbot:manage'] = 'Gerenciar configurações do chatbot';

// For ../.../weaviate_db.php


// For test_api_keys.php
$string['adobe_invalid_credentials'] = 'O ID do cliente ou segredo do cliente para os Serviços Adobe PDF é inválido.';
$string['adobe_valid_credentials'] = 'O ID do cliente e segredo do cliente para os Serviços Adobe PDF são válidos e funcionais.';
$string['weaviate_connection_error'] = 'Erro de conexão com o Weaviate: ';
$string['weaviate_invalid_key_or_url'] = 'A URL ou chave da API Weaviate é inválida ou ocorreu um erro. Código de erro: ';
$string['weaviate_valid_key_and_url'] = 'A URL e chave da API Weaviate são válidas e funcionais.';


// For add_prompt.php
$string['database_write_error'] = 'Erro de escrita no banco de dados: ';

// For ajax.php
$string['error_saving_conversation'] = 'Erro ao salvar a conversa';
$string['invalid_question_after_sanitize'] = 'Pergunta inválida após a sanitização.';

$string['empty_response_from_api'] = 'Resposta vazia recebida da API';

// For classes/pdf_extract_api.php
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

// For classes/weaviate_connector.php
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
$string['invalid_response_format'] = 'Formato de resposta inválido.';
$string['http_code'] = 'Código HTTP: ';



// For block_uteluqchatbot.php
$string['default_prompt'] = <<<EOT
Contexto da situação  
O aluno está participando de um curso sobre [[ coursename ]]. Seu papel é acompanhá-lo fornecendo respostas precisas, relevantes e adaptadas ao seu processo de aprendizagem.

Missão  
Como assistente, sua missão é ajudar o aluno a compreender os conceitos do curso "Curso X", respondendo às suas perguntas com base no contexto fornecido. [[ history ]]  
Você deve formular respostas claras, precisas e pertinentes, transmitindo apenas informações provenientes do curso. Se não for possível encontrar uma resposta no contexto fornecido, responda estritamente com: "Estou calibrado com base no conteúdo do curso cuidadosamente selecionado pelo seu professor. Se quiser mais informações, recomendamos que entre em contato com ele."

Se o aluno escrever frases que indiquem que não entendeu um conceito ou explicação anterior, verifique [[ history ]] para identificar o que foi mal compreendido e reformule sua explicação com mais simplicidade e exemplos concretos.

Instruções  
1. Analise cada pergunta do aluno para detectar a presença de uma emoção. Use a seguinte taxonomia:  
   - Confusão: "não entendo", "estou perdido", "está confuso".  
   - Frustração: "isso me irrita", "desisto", "é muito difícil".  
   - Estresse ou ansiedade: "estou estressado", "estou sobrecarregado", "não há mais tempo".  
   - Dúvida ou falta de confiança: "não sou capaz", "não sou bom o suficiente".

2. Se uma emoção for detectada, inicie sua resposta com uma frase empática apropriada:  
   - Para confusão: "Entendo, não é fácil."  
   - Para frustração: "Vejo que isso é frustrante."  
   - Para estresse: "É normal se sentir sobrecarregado às vezes."  
   - Para dúvida: "Você está dando o seu melhor, e isso já é incrível."

3. Em seguida, responda de forma clara e estruturada.  
4. Use exemplos quando necessário.  
5. Nunca forneça respostas fora do contexto fornecido.

6. Integre na sua resposta os 4 componentes da empatia conforme definidos na [Tabela 1 da Springer](https://link.springer.com/article/10.1007/s00146-023-01715-z/tables/1):  
   - Componente cognitivo: demonstre que compreende o ponto de vista do aluno. Reformule suas ideias para validar sua compreensão.  
   - Componente afetivo: reconheça e valide suas emoções com palavras adequadas ou metáforas simples.  
   - Componente atitudinal: adote uma postura calorosa, respeitosa e encorajadora. Valorize seus esforços.  
   - Componente de sintonia (ajuste): adapte seu vocabulário, estilo e nível de linguagem ao do aluno. Deixe-o conduzir a conversa.

7. Mantenha um tom acolhedor, respeitoso e motivador durante toda a interação.

Nova pergunta do aluno  
[[ question ]]
EOT;
$string['back'] = 'Voltar';
$string['file_size_exceeds_limit'] = 'O tamanho do arquivo excede o limite de 10 MB';
$string['sending_question'] = 'Enviando a pergunta...';
$string['error'] = 'Erro: ';
$string['error_sending_question'] = 'Erro ao enviar a pergunta: ';
$string['saving_prompt'] = 'Salvando o prompt...';
$string['prompt_saved_successfully'] = 'Prompt salvo com sucesso!';
$string['error_saving_prompt'] = 'Erro ao salvar o prompt: ';
$string['uploading_file'] = 'Carregando o arquivo...';
$string['file_indexed_successfully'] = 'Arquivo indexado com sucesso!';
$string['error_processing_file'] = 'Erro ao processar o arquivo: ';
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


// For classes/pdf_extract_api.php
$string['error_uploading_asset'] = 'Erro ao fazer upload do asset.';
$string['error_creating_job'] = 'Erro ao criar o job.';
$string['job_failed'] = 'Job falhou.';
$string['error_processing_pdf'] = 'Erro ao processar o PDF.';



$string['json_encode_error'] = 'Erro de codificação JSON: ';
$string['no_files_selected'] = 'Nenhum arquivo selecionado';
$string['course_id'] = 'ID do curso';
$string['file_name'] = 'Nome do arquivo';
$string['file_content_base64'] = 'Conteúdo do arquivo (codificado em base64)';
$string['insufficient_permissions'] = 'Permissões insuficientes para enviar arquivos';
$string['missing_api_configuration'] = 'Configuração de API necessária em falta';
$string['weaviate_connector_not_found'] = 'Classe WeaviateConnector não encontrada';
$string['collection_prefix'] = 'Collection_course_';
$string['error_creating_collection'] = 'Erro ao criar coleção: ';
$string['unknown_error'] = 'Erro desconhecido';
$string['failed_create_upload_directory'] = 'Falha ao criar diretório de upload';
$string['empty_filename'] = 'Nome de arquivo vazio fornecido';
$string['unsupported_file_type'] = 'Tipo de arquivo não suportado: ';
$string['invalid_file_data'] = 'Dados de arquivo inválidos para: ';
$string['failed_save_file'] = 'Falha ao salvar arquivo: ';
$string['adobe_pdf_credentials_not_configured'] = 'Credenciais da API Adobe PDF não configuradas';
$string['pdf_extractor_not_found'] = 'Classe extratora de PDF não encontrada';
$string['failed_extract_pdf_text'] = 'Falha ao extrair texto do PDF: ';
$string['failed_save_extracted_text'] = 'Falha ao salvar arquivo de texto extraído: ';
$string['error_indexing_file_unknown'] = 'Erro ao indexar arquivo ';
$string['files_indexed_successfully'] = ' arquivo(s) indexado(s) com sucesso';
$string['errors_occurred'] = '. Erros: ';
$string['no_files_processed'] = 'Nenhum arquivo processado. Erros: ';
$string['operation_successful'] = 'Operação bem-sucedida';
$string['response_message'] = 'Mensagem de resposta';
$string['processed_files_count'] = 'Número de arquivos processados';

$string['sending_question_fallback'] = 'Enviando pergunta...';
$string['error_colon_fallback'] = 'Erro: ';
$string['error_sending_question_fallback'] = 'Erro ao enviar pergunta: ';
$string['saving_prompt_fallback'] = 'Salvando prompt...';
$string['prompt_saved_successfully_fallback'] = 'Prompt salvo com sucesso!';
$string['error_saving_prompt_fallback'] = 'Erro ao salvar prompt: ';
$string['no_files_selected_fallback'] = 'Nenhum arquivo selecionado.';
$string['uploading_files_fallback'] = 'Enviando arquivos...';
$string['files_indexed_successfully_fallback'] = 'Arquivos indexados com sucesso!';
$string['error_processing_files_fallback'] = 'Erro ao processar arquivos: ';
$string['unknown_error_occurred'] = 'Ocorreu um erro desconhecido';
$string['server_response_error'] = 'Erro de resposta do servidor. Verifique o console para detalhes.';
$string['server_error_check_console'] = 'Erro do servidor - verifique o console para detalhes';
$string['files_converted_debug'] = 'Arquivos convertidos para base64:';
$string['sending_ajax_request_debug'] = 'Enviando solicitação AJAX:';
$string['upload_response_received_debug'] = 'Resposta de upload recebida:';
$string['response_type_debug'] = 'Tipo de resposta:';
$string['upload_error_details_debug'] = 'Detalhes do erro de upload:';
$string['error_object_debug'] = 'Objeto de erro:';
$string['raw_server_response_debug'] = 'Resposta bruta do servidor:';