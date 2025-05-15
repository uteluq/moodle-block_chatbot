<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    // Capacité pour ajouter le bloc à un cours.
    'block/chatbot:addinstance' => array(
        'riskbitmask'  => RISK_SPAM | RISK_PERSONAL | RISK_XSS, // Risques associés à cette capacité.
        'captype'      => 'write', // Type de capacité (écriture).
        'contextlevel' => CONTEXT_BLOCK, // Contexte du bloc.
        'archetypes'   => array(
            'editingteacher' => CAP_ALLOW, // Les enseignants peuvent ajouter le bloc.
            'manager'       => CAP_ALLOW, // Les gestionnaires peuvent ajouter le bloc.
        ),
    ),

    // Capacité pour gérer les paramètres du plugin.
    'block/chatbot:manage' => array(
        'riskbitmask'  => RISK_CONFIG, // Risque associé à la modification des configurations.
        'captype'      => 'write', // Type de capacité (écriture).
        'contextlevel' => CONTEXT_SYSTEM, // Contexte système (administration du site).
        'archetypes'   => array(
            'manager' => CAP_ALLOW, // Seuls les gestionnaires peuvent gérer le plugin.
        ),
    ),
);