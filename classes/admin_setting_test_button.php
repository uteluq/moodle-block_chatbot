<?php
/**
 * @copyright 2025 Université TÉLUQ and the Université Gaston-Berger
 */



class admin_setting_test_button extends admin_setting {
    /**
     * Constructor for the test button setting.
     *
     * @param string $name The name of the setting.
     * @param string $visible_name The visible name of the setting.
     * @param string $description The description of the setting.
     * @param mixed $default_setting The default setting.
     */
    public function __construct($name, $visible_name, $description, $default_setting) {
        parent::__construct($name, $visible_name, $description, $default_setting);
    }

    /**
     * Get the setting value.
     *
     * @return bool Always returns true as this setting is just a button.
     */
    public function get_setting() {
        return true;
    }

    /**
     * Write the setting value.
     *
     * @param mixed $data The data to write.
     * @return string Empty string as this setting does not save data.
     */
    public function write_setting($data) {
        // This method is required but does nothing as the button does not save data.
        return '';
    }

    /**
     * Output the HTML for the setting.
     *
     * @param mixed $data The data for the setting.
     * @param string $query The query string.
     * @return string The HTML for the setting.
     */
    public function output_html($data, $query='') {
        $url = new moodle_url('/blocks/uteluqchatbot/test_api_keys.php');
        return format_admin_setting(
            $this,
            $this->visible_name,
            html_writer::tag(
                'div',
                html_writer::tag(
                    'button',
                    get_string('test_api_keys_label', 'block_uteluqchatbot'),
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
