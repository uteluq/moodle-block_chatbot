<?php
/**
 * @copyright 2025 Université TÉLUQ
 */
class admin_setting_test_button extends admin_setting {
    public function __construct($name, $visiblename, $description, $defaultsetting) {
        parent::__construct($name, $visiblename, $description, $defaultsetting);
    }

    public function get_setting() {
        return true;
    }

    public function write_setting($data) {
        // This method is necessary but does nothing because the button does not save any data.
        return '';
    }

    public function output_html($data, $query='') {
        $url = new moodle_url('/blocks/chatbot/test_api_keys.php');
        return format_admin_setting($this, $this->visiblename,
            html_writer::tag('div', 
                html_writer::tag('button', 
                    get_string('test_api_keys_label', 'block_chatbot'),
                    array(
                        'id' => 'id_test_api_keys',
                        'class' => 'btn btn-secondary',
                        'type' => 'button',
                        'onclick' => 'window.location.href="'.$url.'"'
                    )
                ),
                array('class' => 'form-text defaultsnext')
            ),
            $this->description
        );
    }
}