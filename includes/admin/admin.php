<?php
require_once get_template_directory() . '/includes/admin/settings.php';
/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */
if ( !class_exists('BlkCanvas_Admin' ) ):
class BlkCanvas_Admin {

    private $settings_api;

    function __construct() {
        $this->settings_api = new BlkCanvas_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
        add_action( 'customize_register', array( $this, 'admin_customizer') );
        add_action( 'wp_head', array( $this, 'site_customizer_css'));
        add_action( 'customize_preview_init', array( $this, 'localize_settings_css') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        // add_options_page( 'Site Settings', 'Site Settings', 'manage_options', 'settings_api_test', array($this, 'plugin_page') );
        add_menu_page( 'Site Settings', 'Site Settings', 'manage_options', 'blkcanvas-theme', array($this, 'plugin_page'), 'dashicons-admin-site-alt3', 1 );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'title_tagline',
                'title' => __( 'Site Identity', 'blkcanvas' )
            ),
            array(
                'id'    => 'colors',
                'title' => __( 'Colors', 'blkcanvas' ),
                'groups' => array(
                    'global',
                    'header',
                    'footer'
                )
            ),
            array(
                'id'    => 'blkcanvas_woocommerce',
                'title' => __( 'Woocommerce Settings', 'blkcanvas' )
            ),
            array(
                'id'    => 'footer',
                'title' => __( 'Footer', 'blkcanvas' )
            ),
            array(
                'id'    => 'plugins',
                'title' => __( 'Plugins', 'blkcanvas' )
            ),
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'title_tagline' => array(
                array(
                    'name'    => 'custom_logo',
                    'label'   => __( 'Logo', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'file',
                    'file_type' => 'image',
                    'default' =>  '',
                ),
            ),
            'blkcanvas_woocommerce' => array(
                array(
                    'name'    => 'blkcanvas_add_to_cart_bg_color',
                    'label'   => __( 'Add to cart background color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce button.button.alt,.woocommerce a.button' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_add_to_cart_bg_hover_color',
                    'label'   => __( 'Add to cart background hover color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce button.button.alt:hover,.woocommerce a.button:hover' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_add_to_cart_text_color',
                    'label'   => __( 'Add to cart text color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce button.button.alt,.woocommerce a.button' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_add_to_cart_text_hover_color',
                    'label'   => __( 'Add to cart text hover color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce button.button.alt:hover,.woocommerce a.button:hover' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_proceed_checkout_bg_color',
                    'label'   => __( 'Proceed to checkout background color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_proceed_checkout_bg_hover_color',
                    'label'   => __( 'Proceed to checkout background hover color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_proceed_checkout_text_color',
                    'label'   => __( 'Proceed to checkout text color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce-cart .wc-proceed-to-checkout a.checkout-button' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_proceed_checkout_text_hover_color',
                    'label'   => __( 'Proceed to checkout text hover color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover' => 'color')
                ),
            ),
            'colors' => array(
                array(
                    'name'    => 'blkcanvas_site_background_color',
                    'label'   => __( 'Site background color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('body' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_site_text_color',
                    'label'   => __( 'Site text color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('body' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_site_link_color',
                    'label'   => __( 'Site link color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('a,a:hover' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_site_header_bg_color',
                    'label'   => __( 'Header background color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('header' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_site_header_link_color',
                    'label'   => __( 'Header links color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('header a' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_site_header_link_hover_color',
                    'label'   => __( 'Header links hover color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('header a:hover,body:not(.home) header li.current-menu-item a' => 'color')
                ),
                array(
                    'name'    => 'blkcanvas_site_footer_bg_color',
                    'label'   => __( 'Footer background color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('footer' => 'background-color')
                ),
                array(
                    'name'    => 'blkcanvas_site_footer_text_color',
                    'label'   => __( 'Footer text color', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'color',
                    'default' => '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        ),
                        'control' => array(
                            'class' => 'WP_Customize_Color_Control',
                        )
                    ),
                    'selectors' => array('footer *' => 'color')
                ),
            ),
            'footer' => array(
                array(
                    'name'    => 'blkcanvas_footer_copy_right_text',
                    'label'   => __( 'Copyright Text', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'text',
                    'default' =>  '{copyright} {year} Copyright {sitename}.',
                ),
            ),
            'plugins' => array(
                array(
                    'name'    => 'blkcanvas_plugins_woocommerce_registration_form',
                    'label'   => __( 'Enable Woocommerce Registration Form', 'blkcanvas' ),
                    'desc'    => __( '', 'blkcanvas' ),
                    'type'    => 'checkbox',
                    'default' =>  '',
                    'customizer_settings' => array(
                        'setting' => array(
                            'transport' => 'refresh'
                        )
                    )
                ),
            )
        );

        return $settings_fields;
    }

    function admin_customizer( $wp_customize )
    {
        $sections = $this->get_settings_sections();
        $fields = $this->get_settings_fields();
        
        $wp_customize->add_panel( 'theme_settings_panel', array(
            'title' => 'Theme Settings',
            'priority' => 10,
        ) );
        
        foreach ($sections as $key => $section) {
            $wp_customize->add_section( $section['id'] , array(
                'title'      => __( $section['title'], 'blkcanvas' ),
                'priority'   => 30,
            ) );

            if( isset( $fields[$section['id']] ) ){
                foreach ($fields[$section['id']] as $key => $field) {

                    $wp_customize->add_setting( $field['name'] , array(
                        'default'   => $field['default'],
                        'transport' => 'refresh',
                    ) );

                    if( isset( $field['customizer_settings'] ) ){
                        if( $field['customizer_settings']['control']['class'] !== '' ){
                            $wp_customize->add_control( new $field['customizer_settings']['control']['class']( $wp_customize, $field['name'], array(
                                'label'      => __( $field['label'], 'blkcanvas' ),
                                'section'    => $section['id'],
                                'settings'   => $field['name'],
                                'type'     => $field['type'],
                            ) ) );
                        } else {
                            $args = array(
                                'label'    => __( $field['label'], 'mytheme' ),
                                'section'  => $section['id'],
                                'settings' => $field['name'],
                                'type'     => $field['type'],
                            );
    
                            $wp_customize->add_control(
                                $field['name'], 
                                $args
                            );
                        }
                    }

                }
            }


        }

    }
    function site_customizer_css()
    {
        ?>
        <style type="text/css" id="blkcanvas-customizer-css">
            <?php 
            $sections = $this->get_settings_fields();
            foreach ($sections as $key => $fields) {
            
                foreach ($fields as $key => $field) {
                    if(isset($field['selectors'])){
                        $this->generate_css($field['selectors'],$field['name'], $field['default']);
                    }
                }
            }
            ?> 
        </style>
        <?php
    }
    function generate_css( $selectors, $mod_name, $default, $echo=true ) {
        $return = '';
        $mod = get_theme_mod($mod_name, $default);
        if ( ! empty( $mod ) ) {

            foreach ($selectors as $selector => $style) {
                $return = sprintf('%s { %s:%s; }',
                    $selector,
                    $style,
                    $mod
                );
                if ( $echo ) {
                    echo $return;
                }
            }
        }
        return $return;
    }
    function localize_settings_css()
    {
        wp_enqueue_script( 
            'blkcanvas-customizer',			//Give the script an ID
            get_template_directory_uri().'/includes/admin/customizer.js',//Point to file
            array( 'jquery','customize-preview' ),	//Define dependencies
            '',						//Define a version (optional) 
            true						//Put script in footer?
        );
        
        $customizer_fields = array();
        $sections = $this->get_settings_fields();

        foreach ($sections as $key => $fields) {
            
            foreach ($fields as $key => $field) {
                
                if( isset( $field['selectors'] ) ){
                
                    $customizer_fields[] = $field;
                }
            }
        }

        $localize_args = array(
            'settings' => $customizer_fields,
        );
        wp_localize_script( 'blkcanvas-customizer', 'themeCustomizer', $localize_args);
    }
    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}

new BlkCanvas_Admin;
endif;