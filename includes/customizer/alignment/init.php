<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Add our Customizer content
 * @see https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2
 * @see https://github.com/maddisondesigns/customizer-custom-controls
 */
if (class_exists('WP_Customize_Control')) {
    // Add all your Customizer Custom Control classes here...
    class Alignment_Customize_Control extends WP_Customize_Control
    {
        /**
         * The type of control being rendered
         */
        public $type = 'alignment_customize_control';
        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            // Enqueue our scripts here...
            $asset = include( get_template_directory() . '/build/alignment.asset.php' );
            wp_enqueue_script('alignment-customizer', get_template_directory_uri() . '/build/alignment.js', array(), $asset['version'], true );
            wp_enqueue_style('alignment-customizer', get_template_directory_uri() . '/build/style-alignment.css', array(), $asset['version'] );

        }

        /**
         * Render the control in the customizer
         */
        public function render_content()
        {
            // Render our control HTML here...
            require __DIR__ . '/index.php';
        }
    }
}
