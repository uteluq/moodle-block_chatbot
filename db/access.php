<?php
/**
 * @copyright 2025 Université TÉLUQ and the UNIVERSITÉ GASTON BERGER DE SAINT-LOUIS
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    // Capability to add the block to a course.
    'block/uteluqchatbot:addinstance' => array(
        'riskbitmask'  => RISK_SPAM | RISK_PERSONAL | RISK_XSS, // Risks associated with this capability.
        'captype'      => 'write', // Capability type (write).
        'contextlevel' => CONTEXT_BLOCK, // Block context.
        'archetypes'   => array(
            'editingteacher' => CAP_ALLOW, // Teachers can add the block.
            'manager'       => CAP_ALLOW, // Managers can add the block.
        ),
    ),

    // Capability to manage the plugin settings.
    'block/uteluqchatbot:manage' => array(
        'riskbitmask'  => RISK_CONFIG, // Risk associated with modifying configurations.
        'captype'      => 'write', // Capability type (write).
        'contextlevel' => CONTEXT_SYSTEM, // System context.
        'archetypes'   => array(
            'manager' => CAP_ALLOW, // Only managers can manage the plugin.
        ),
    ),
);
