<?php

/**
 * Chatbot block class for Moodle.
 *
 * @package    block_chatbot
 * @copyright  2025 Université TÉLUQ
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_chatbot extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_chatbot');
    }

    public function applicable_formats()
    {
        return array(
            'course-view' => true, // Available only in courses.
            'site'       => false, // Not available on the homepage.
            'mod'        => false, // Not available in activities (modules).
            'my'         => false, // Not available on the user dashboard.
        );
    }

    public function instance_allow_multiple()
    {
        return false; // Prevent multiple instances of the block in the same course.
    }

    public function has_config()
    {
        return true;
    }

   public function get_content()
{
    global $OUTPUT, $CFG, $USER, $COURSE, $DB, $PAGE;

    if ($this->content !== null) {
        return $this->content;
    }

    $this->content = new stdClass;

    // Get the current course name
    $coursename = $PAGE->course->fullname;

    // Default prompt with dynamic course name
    $default_prompt = get_string('default_prompt', 'block_chatbot', $coursename);

    // Get the existing prompt for the user
    $existing_prompt = $DB->get_record('block_chatbot_prompts', array('userid' => $USER->id, 'courseid' => $COURSE->id));

    // Check if the user is a teacher
    $coursecontext = context_course::instance($COURSE->id);
    $isteacher = has_capability('moodle/course:manageactivities', $coursecontext);

    // Prepare data for templates
    $templateData = [
        'has_prompt' => !empty($existing_prompt),
        'prompt_text' => $existing_prompt ? $existing_prompt->prompt : $default_prompt,
        'isteacher' => $isteacher,
        'wwwroot' => $CFG->wwwroot,
        'userid' => $USER->id,
        'courseid' => $COURSE->id,
        'sesskey' => sesskey()
    ];

    // Load templates
    $this->content->text = $OUTPUT->render_from_template('block_chatbot/chatbot', $templateData);
    $this->content->text .= $OUTPUT->render_from_template('block_chatbot/prompt_modal', $templateData);
    $this->content->text .= $OUTPUT->render_from_template('block_chatbot/load-course-modal', $templateData);

    $PAGE->requires->jquery();

$PAGE->requires->js(new moodle_url('/blocks/chatbot/amd/src/chatbot.js'));
$PAGE->requires->js_init_code("
    Chatbot.init('$CFG->wwwroot', '".sesskey()."', $USER->id, $COURSE->id);
");

    $this->content->footer = '';

    return $this->content;
}

}
