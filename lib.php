<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

/**
 * Initializes the JavaScript required for the chatbot block.
 *
 * @param object $page The page object to which JavaScript will be added.
 */
function block_uteluqchatbot_get_page_requires($PAGE) {
    global $CFG, $USER, $COURSE;

    // Call the AMD module for chatbot initialization with necessary parameters
$PAGE->requires->js_call_amd('block_uteluqchatbot/uteluqchatbot', 'init', [
        $CFG->wwwroot,
        sesskey(),
        $USER->id,
        $COURSE->id
    ]);
}
