<?php
/**
 * External services for uteluqchatbot block
 * @copyright 2025 Université TÉLUQ and the UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */

defined('MOODLE_INTERNAL') || die();

$functions = [
    'block_uteluqchatbot_send_question' => [
        'classname'   => 'block_uteluqchatbot\external\send_question',
        'methodname'  => 'execute',
        'classpath'   => '',
        'description' => 'Send a question to the chatbot',
        'type'        => 'write',
        'ajax'        => true,
        'capabilities' => '',
        'loginrequired' => true,
    ],
    'block_uteluqchatbot_save_prompt' => [
        'classname'   => 'block_uteluqchatbot\external\save_prompt',
        'methodname'  => 'execute',
        'classpath'   => '',
        'description' => 'Save or update a chatbot prompt',
        'type'        => 'write',
        'ajax'        => true,
        'capabilities' => '',
        'loginrequired' => true,
    ],
    'block_uteluqchatbot_upload_file' => [
        'classname'   => 'block_uteluqchatbot\external\upload_file',
        'methodname'  => 'execute',
        'classpath'   => '',
        'description' => 'Upload and process a file for the chatbot',
        'type'        => 'write',
        'ajax'        => true,
        'capabilities' => '',
        'loginrequired' => true,
    ],
    'block_uteluqchatbot_upload_files' => [
        'classname'   => 'block_uteluqchatbot\external\upload_files',
        'methodname'  => 'execute',
        'classpath'   => '',
        'description' => 'Upload and index multiple files for the chatbot',
        'type'        => 'write',
        'ajax'        => true,
        'capabilities' => 'moodle/course:update',
        'loginrequired' => true,
    ],
];

$services = [
    'Chatbot Services' => [
        'functions' => [
            'block_uteluqchatbot_send_question',
            'block_uteluqchatbot_save_prompt',
            'block_uteluqchatbot_upload_file',
            'block_uteluqchatbot_upload_files'
        ],
        'restrictedusers' => 0,
        'enabled' => 1,
        'downloadfiles' => 0,
        'uploadfiles' => 1
    ]
];