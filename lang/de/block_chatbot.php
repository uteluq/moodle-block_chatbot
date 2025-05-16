<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
$string['pluginname'] = 'Chatbot';
$string['chatbot:addinstance'] = 'Einen neuen Chatbot-Block hinzufügen';
$string['chatbot:myaddinstance'] = 'Einen neuen Chatbot-Block zum Dashboard hinzufügen';

// Open AI
$string['openai_api_key'] = 'OpenAI API-Schlüssel';
$string['openai_api_key_desc'] = 'Geben Sie hier Ihren OpenAI API-Schlüssel ein.';

// Adobe PDF Services
$string['adobe_pdf_client_id'] = 'Adobe PDF Services Client-ID';
$string['adobe_pdf_client_id_desc'] = 'Geben Sie hier Ihre Adobe PDF Services Client-ID ein.';

$string['adobe_pdf_client_secret'] = 'Adobe PDF Services Client-Geheimnis';
$string['adobe_pdf_client_secret_desc'] = 'Geben Sie hier Ihr Adobe PDF Services Client-Geheimnis ein.';

// Weaviate
$string['weaviate_api_url'] = 'Weaviate API-URL';
$string['weaviate_api_url_desc'] = 'Geben Sie hier die URL für die Weaviate API ein.';

$string['weaviate_api_key'] = 'Weaviate API-Schlüssel';
$string['weaviate_api_key_desc'] = 'Geben Sie hier Ihren Weaviate API-Schlüssel ein.';

// Cohere
$string['cohere_embedding_api_key'] = 'Cohere Embedding-Modell API-Schlüssel';
$string['cohere_embedding_api_key_desc'] = 'Geben Sie hier Ihren API-Schlüssel für das Cohere Embedding-Modell ein.';

// Conversation Settings
$string['max_conversations'] = 'Maximale Anzahl an Konversationen pro Benutzer';
$string['max_conversations_desc'] = 'Die maximale Anzahl an gespeicherten Konversationen pro Benutzer. Bei Überschreitung wird die älteste Konversation gelöscht.';

// Test Button Strings
$string['test_api_keys'] = 'API-Schlüssel testen';
$string['test_api_keys_desc'] = 'Klicken Sie, um die konfigurierten API-Schlüssel zu testen';
$string['test_api_keys_label'] = 'Schlüssel testen';

$string['chatbot:manage'] = 'Chatbot-Einstellungen verwalten';

// Default Prompt
$string['chatbot:default_prompt'] = "Kontext der Situation:
Der Lernende besucht einen Kurs zu {$coursename}. Ihre Rolle ist es, ihn zu unterstützen, indem Sie präzise, relevante und angepasste Antworten für sein Lernen bereitstellen.
Mission:
Als Assistent ist Ihre Mission, dem Lernenden zu helfen, die Kurskonzepte zu {$coursename} zu verstehen, indem Sie seine Fragen beantworten und sich auf den bereitgestellten Kontext stützen, um eine Antwort zu formulieren. [[ history ]].
Sie müssen klare, präzise und relevante Antworten formulieren und sicherstellen, dass Sie nur Informationen aus dem Kurs weitergeben. Wenn eine Antwort nicht im bereitgestellten Kontext gefunden werden kann, antworten Sie strikt: „Ich bin auf den vom Lehrer sorgfältig ausgewählten Kursinhalt kalibriert. Wenn Sie weitere Informationen wünschen, wenden Sie sich bitte an ihn.“
Wenn der Lernende Sätze schreibt, die zeigen, dass er ein Konzept oder eine frühere Erklärung nicht verstanden hat, überprüfen Sie [[ history ]], um zu identifizieren, was missverstanden wurde, und formulieren Sie Ihre Erklärung einfacher und mit konkreten Beispielen um.
Anweisungen:
1. Erkennen Sie Emotionen in der Frage des Lernenden und nehmen Sie einen empathischen und fürsorglichen Ton an.
2. Antworten Sie klar und strukturiert.
3. Erklären Sie das Konzept bei Bedarf mit Beispielen.
4. Machen Sie keine Annahmen außerhalb des bereitgestellten Kontexts.
Neue Frage des Lernenden [[ question ]]";