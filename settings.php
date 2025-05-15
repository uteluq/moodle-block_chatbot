<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

require_once($CFG->dirroot . '/blocks/chatbot/classes/admin_setting_test_button.php');

// settings.php
defined('MOODLE_INTERNAL') || die();


// Vérifie si l'utilisateur a la capacité de gérer les paramètres du plugin.
if (has_capability('block/chatbot:manage', context_system::instance()) && $ADMIN->fulltree) {
    // Clé API OpenAI
    $settings->add(new admin_setting_configtext(
        'block_chatbot/openai_api_key',
        get_string('openai_api_key', 'block_chatbot'),
        get_string('openai_api_key_desc', 'block_chatbot'),
        '',
        PARAM_TEXT
    ));

    // Cohere Embedding Model API
    $settings->add(new admin_setting_configtext(
        'block_chatbot/cohere_embedding_api_key',
        get_string('cohere_embedding_api_key', 'block_chatbot'),
        get_string('cohere_embedding_api_key_desc', 'block_chatbot'),
        '',
        PARAM_TEXT
    ));

    // Adobe PDF Services API
    $settings->add(new admin_setting_configtext(
        'block_chatbot/adobe_pdf_client_id',
        get_string('adobe_pdf_client_id', 'block_chatbot'),
        get_string('adobe_pdf_client_id_desc', 'block_chatbot'),
        '',
        PARAM_TEXT
    ));

    $settings->add(new admin_setting_configtext(
        'block_chatbot/adobe_pdf_client_secret',
        get_string('adobe_pdf_client_secret', 'block_chatbot'),
        get_string('adobe_pdf_client_secret_desc', 'block_chatbot'),
        '',
        PARAM_TEXT
    ));

    // Weaviate
    $settings->add(new admin_setting_configtext(
        'block_chatbot/weaviate_api_url',
        get_string('weaviate_api_url', 'block_chatbot'),
        get_string('weaviate_api_url_desc', 'block_chatbot'),
        '',
        PARAM_URL
    ));

    $settings->add(new admin_setting_configtext(
        'block_chatbot/weaviate_api_key',
        get_string('weaviate_api_key', 'block_chatbot'),
        get_string('weaviate_api_key_desc', 'block_chatbot'),
        '',
        PARAM_TEXT
    ));

    // Bouton de test des clés API
    $settings->add(new admin_setting_test_button(
        'block_chatbot/test_api_keys',
        get_string('test_api_keys', 'block_chatbot'),
        get_string('test_api_keys_desc', 'block_chatbot'),
        ''
    ));
}
