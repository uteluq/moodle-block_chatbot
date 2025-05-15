<?php
/**
 * @copyright 2025 Université TÉLUQ
 */

function block_chatbot_get_page_requires($page) {
    global $CFG, $USER, $COURSE;
    $page->requires->js_call_amd('block_chatbot/chatbot', 'init', [
        $CFG->wwwroot,
        sesskey(),
        $USER->id,
        $COURSE->id
    ]);
}