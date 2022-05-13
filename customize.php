<?php 

class sjiekenschattig_Customizer {

    public function __construct(){
        add_action('customize_register', array($this, 'register_customize_sections'));
    }
    // initialize sections
    public function register_customize_sections($wp_customize) {
        $this->hero_section($wp_customize);

    }

    private function hero_section($wp_customize) {
        // new panel
        $wp_customize->add_section('hero-section', array(
            'title' => "Hero",
            "priority" => 20,
            "description" => "<p>The Hero section is only displayed on the home page!</p>"
        ));
        // add setting
        $wp_customize->add_setting('hero-settings', array(
            "default" => "Yes", // default
            "sanitize_callback" => array($this, "sanitize_custom_option")// sanitize
        ));

        // add Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, "hero-section-control", array(
            "label" => "Display this section",
            "section" => "hero-section",
            "settings" => "hero-settings",
            "type" => "select",
            "choices" => array("No" => "No", "Yes" => "Yes")
        )));
        // add Setting
        $wp_customize->add_setting('hero-settings-text', array(
            "default" => "De leukste haar-accessoires", // default
            "sanitize_callback" => array($this, "sanitize_custom_text")// sanitize
        ));
        // add Control
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, "hero-section-text", array(
            "label" => "Hero text",
            "section" => "hero-section",
            "settings" => "hero-settings-text",
            "type" => "text",
        )));



        
    }
    public function sanitize_custom_option($input) {
        return ($input === "No") ? false : true; 
    }

    public function sanitize_custom_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING); 
    }


}