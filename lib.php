<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

/**
 * Initializes the JavaScript required for the chatbot block.
 *
 * @param object $page The page object to which JavaScript will be added.
 */
function block_chatbot_get_page_requires($page) {
    global $CFG, $USER, $COURSE;

    // Call the AMD module for chatbot initialization with necessary parameters
    $page->requires->js_call_amd('block_chatbot/chatbot', 'init', [
        $CFG->wwwroot,
        sesskey(),
        $USER->id,
        $COURSE->id
    ]);
}
