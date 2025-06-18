<?php

/**
 * Chatbot block class for Moodle.
 *
 * @package    block_uteluqchatbot
 * @copyright  2025 UNIVERSITÉ TÉLUQ & Université GASTON BERGER DE SAINT-LOUIS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_uteluqchatbot extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_uteluqchatbot');
    }

    public function applicable_formats()
    {
        return array(
            'course-view' => true, // Available only in courses.
            'site' => false, // Not available on the homepage.
            'mod' => false, // Not available in activities (modules).
            'my' => false, // Not available on the user dashboard.
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
        $default_prompt = get_string('default_prompt', 'block_uteluqchatbot', $coursename);

        // Get the existing prompt for the user
        $existing_prompt = $DB->get_record('block_uteluqchatbot_prompts', array('userid' => $USER->id, 'courseid' => $COURSE->id));

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
        $this->content->text = $OUTPUT->render_from_template('block_uteluqchatbot/uteluqchatbot', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_uteluqchatbot/prompt_modal', $templateData);
        $this->content->text .= $OUTPUT->render_from_template('block_uteluqchatbot/load-course-modal', $templateData);

        $PAGE->requires->js_call_amd('block_uteluqchatbot/uteluqchatbot', 'init', [
            $CFG->wwwroot,
            sesskey(),
            $USER->id,
            $COURSE->id
        ]);
        $PAGE->requires->js_call_amd('block_uteluqchatbot/fileupload', 'init');

        // Path to the CSS file within the plugin directory
        $cssFile = 'block_uteluqchatbot/styles.css';

        // Add the CSS file to the page using Moodle's API
        $PAGE->requires->css(new moodle_url('/blocks/uteluqchatbot/' . $cssFile));

        $this->content->footer = '';

        return $this->content;
    }

}
