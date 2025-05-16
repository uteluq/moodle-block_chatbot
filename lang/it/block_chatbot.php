<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Aggiungi un nuovo blocco chatbot';
$string['chatbot:myaddinstance'] = 'Aggiungi un nuovo blocco chatbot alla Dashboard';

// Open AI
$string['openai_api_key'] = 'Chiave API di OpenAI';
$string['openai_api_key_desc'] = 'Inserisci qui la tua chiave API di OpenAI.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'ID Cliente dei Servizi PDF di Adobe';
$string['adobe_pdf_client_id_desc'] = 'Inserisci qui il tuo ID Cliente dei Servizi PDF di Adobe.';

$string['adobe_pdf_client_secret'] = 'Segreto Cliente dei Servizi PDF di Adobe';
$string['adobe_pdf_client_secret_desc'] = 'Inserisci qui il tuo Segreto Cliente dei Servizi PDF di Adobe.';

// Weaviate
$string['weaviate_api_url'] = 'URL API di Weaviate';
$string['weaviate_api_url_desc'] = 'Inserisci qui l’URL per l’API di Weaviate.';

$string['weaviate_api_key'] = 'Chiave API di Weaviate';
$string['weaviate_api_key_desc'] = 'Inserisci qui la tua chiave API di Weaviate.';

// Cohere
$string['cohere_embedding_api_key'] = 'Chiave API del Modello di Incorporamento di Cohere';
$string['cohere_embedding_api_key_desc'] = 'Inserisci qui la tua chiave API per il Modello di Incorporamento di Cohere.';

// Conversation Settings
$string['max_conversations'] = 'Numero massimo di conversazioni per utente';
$string['max_conversations_desc'] = 'Il numero massimo di conversazioni memorizzate per utente. Se superato, la conversazione più vecchia verrà eliminata.';

// Test Button Strings
$string['test_api_keys'] = 'Test delle Chiavi API';
$string['test_api_keys_desc'] = 'Clicca per testare le chiavi API configurate';
$string['test_api_keys_label'] = 'Testa Chiavi';

$string['chatbot:manage'] = 'Gestisci le impostazioni del chatbot';

// Default Prompt
$string['chatbot:default_prompt'] = "Contesto della situazione:
Lo studente sta seguendo un corso su {$coursename}. Il tuo ruolo è supportarlo fornendo risposte precise, rilevanti e adattate al suo apprendimento.
Missione:
Come assistente, la tua missione è aiutare lo studente a comprendere i concetti del corso su {$coursename} rispondendo alle sue domande, basandoti sul contesto fornito per formulare una risposta. [[ history ]].
Devi formulare risposte chiare, precise e rilevanti, assicurandoti di trasmettere solo informazioni del corso. Se una risposta non può essere trovata nel contesto fornito, rispondi rigorosamente: 'Sono calibrato in base al contenuto del corso selezionato con cura dal tuo insegnante. Se desideri ulteriori informazioni, ti invitiamo a contattarlo.'
Se lo studente scrive frasi che indicano di non aver compreso un concetto o una spiegazione precedente, verifica [[ history ]] per identificare cosa non è stato capito, quindi riformula la tua spiegazione in modo più semplice e con esempi concreti.
Istruzioni:
1. Rileva le emozioni nella domanda dello studente e adotta un tono empatico e attento.
2. Rispondi in modo chiaro e strutturato.
3. Spiega il concetto con esempi, se necessario.
4. Non fare supposizioni al di fuori del contesto fornito.
Nuova domanda dello studente [[ question ]]";