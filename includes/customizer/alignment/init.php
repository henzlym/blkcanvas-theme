<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}


/**
 * Add our Customizer content
 * @see https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-2
 */
if (class_exists('WP_Customize_Control')) {
    // Add all your Customizer Custom Control classes here...
    class Alignment_Customize_Control extends WP_Customize_Control
    {
        /**
         * The type of control being rendered
         */
        public $type = 'alignment_customize_control';

        public $webfonts_base_url = 'https://www.googleapis.com/webfonts/v1/webfonts';

        public $fonts = array();

        public function create_google_fonts_value( $family, $category, $weights )
        {
            return null;
        }
        public function request($url, $method = 'GET', $body = array())
        {

            $args = array(
                'method' => $method,
                //'sslverify' => true,
                'headers' => array(
                    'Accept' => 'application/json'
                ),
                'body' => $body
            );

            $response = wp_remote_request($url, $args);
            if (!is_wp_error($response) && ($response['response']['code'] == 200 || $response['response']['code'] == 201)) {
                $response = wp_remote_retrieve_body($response);
            } else {
                $error = new WP_Error( 'error', __( $response, "tpd" ) );
                return $error;
            }            

            return json_decode($response, true);
        }
        public function get_system_fonts()
        {
            $fonts = json_decode( file_get_contents( __DIR__ . '/fonts.json' ), true );
            return $fonts;
        }
        public function get_fonts()
        {
            $args = array(
                'key' => BLKCANVAS_GA_FONTS_API
            );
            $results = $this->request($this->webfonts_base_url, 'GET', $args);

            if(is_wp_error($results)) return 'Error in request';

            if (empty($results)) return 'No results found';

            return $results;
        }
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
