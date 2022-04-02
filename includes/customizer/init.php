<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

require_once get_template_directory() . '/includes/customizer/fonts/init.php';
require_once get_template_directory() . '/includes/customizer/settings.php';

function blkcanvas_customize_register($wp_customize)
{
    //All our sections, settings, and controls will be added here
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    $theme_settings = blkcanvas_get_theme_settings();

    if (isset($theme_settings['panels']) && is_array($theme_settings['panels']) ) {
        foreach ($theme_settings['panels'] as $key => $panel) {
            // Panels
            $panel_args = $panel;
            unset($panel_args['id']);
                    
            if (isset($panel_args['priority'])) {
                $panel_args['priority'] = $panel['priority'];
            }
    
            $wp_customize->add_panel($panel['id'], $panel_args );
        }
    }

    if (isset($theme_settings['sections']) && is_array($theme_settings['sections'])) {
        foreach ($theme_settings['sections'] as $key => $section) {
            // Sections
            $secion_args = $section;
            unset($secion_args['id']);
    
            if (isset($secion_args['priority'])) {
                $secion_args['priority'] = $section['priority'];
            }
    
            $wp_customize->add_section($section['id'], $secion_args );
        }
    }

    foreach ($theme_settings['settings'] as $key => $setting) {
        // Settings
        $wp_customize->add_setting($setting['setting'], array(
            'default'   => $setting['default'],
            'transport' => $setting['transport'],
        ));

        if (isset($setting['control']) && !empty($setting['control'])) {
            // Controls
            $customizer_class = isset( $setting['control']['class'] ) ? $setting['control']['class'] : 'WP_Customize_Control';
            $control_args = array(
                'label'      => __($setting['control']['label'], 'blkcanvas'),
                'section'    => $setting['section'],
                'settings'   => $setting['setting'],
            );

            $wp_customize->add_control(
                new $customizer_class(
                    $wp_customize,
                    $setting['setting'],
                    $control_args
                )
            );
        }
    }

}
add_action('customize_register', 'blkcanvas_customize_register');

function blkcanvas_get_font_value( $mod_name, $mod, $type = 'css' )
{
    $font_settings = array(
        'font_select_headers',
        'font_select_body'
    );

    if ( in_array( $mod_name, $font_settings ) ) {
        $font = explode('|', $mod);
        if (
            $type == 'link' &&
            is_array($font) && 
            ( 
                isset( $font[0] ) && 
                isset( $font[1] ) && 
                isset( $font[2] ) 
            ) 
        ) {
            $pattern = '/regular|[0-9]+italic/';
            $patterns = array( '/regular/', '/[0-9]+italic;/', '/[0-9]+italic/', '/italic;/', '/900;/' );
            $replacements = array( '400', '', '', '', '900' );
            return  $font[0] . ':wght@' . preg_replace($patterns, $replacements, $font[2] );
        }

        if (is_array($font) && ( isset( $font[0] ) && isset( $font[1] ) ) ) {
            return '\'' . $font[0] . '\',' . $font[1];
        }
        
    }

    return $mod;
}
/**
 * This will generate a line of CSS for use in header output. If the setting
 * ($mod_name) has no defined value, the CSS will not be output.
 * 
 * @uses get_theme_mod()
 * @param string $selector CSS selector
 * @param string $style The name of the CSS *property* to modify
 * @param string $mod_name The name of the 'theme_mod' option to fetch
 * @param string $prefix Optional. Anything that needs to be output before the CSS property
 * @param string $postfix Optional. Anything that needs to be output after the CSS property
 * @param bool $echo Optional. Whether to print directly to the page (default: true).
 * @return string Returns a single line of CSS with selectors and a property.
 * @since MyTheme 1.0
 */
function blkcanvas_generate_css($selector, $style, $mod_name, $default = false, $prefix = '', $postfix = '', $echo = false )
{
    $return = '';
    $mod = get_theme_mod($mod_name, $default);
    $mod = blkcanvas_get_font_value( $mod_name, $mod );
    if (!empty($mod)) {
        $return = sprintf(
            '%s{%s:%s;}',
            $selector,
            $style,
            $prefix . $mod . $postfix
        );
        if ($echo) {
            echo $return;
        }
    }
    return $return;
}

function blkcanvas_customize_css()
{
    $font_settings = array(
        'font_select_headers',
        'font_select_body'
    );
    $css = '';
    $google_fonts = [];
    $theme_settings = blkcanvas_get_theme_settings();
    foreach( $theme_settings['settings'] as $key => $setting ){
        if (isset($setting['selectors'])) {
            foreach ($setting['selectors'] as $selector => $style ) {
                
                $css .= blkcanvas_generate_css( $selector, $style, $setting['setting'], $setting['default'] );
                
                if ( in_array( $setting['setting'], $font_settings ) ) {
                    $font = get_theme_mod($setting['setting'], $setting['default'] );
                    $google_fonts[] = blkcanvas_get_font_value( $setting['setting'], $font,'link' );
                }
            }
        }
        if( isset($setting['root_selectors']) ){
            foreach ($setting['root_selectors'] as $selector => $style ) {
                $css .= blkcanvas_generate_css( ':root', $style, $setting['setting'], $setting['default'] );
            }
        }
    }

    $query_args = array(
        'family'  => implode( '&family=', $google_fonts ),
        'display' => 'swap',
    );
    $fonts = add_query_arg( $query_args, null );
    blkcanvas_load_fonts( $fonts );
?>
    <style id="blkcanvas-theme-settings-css" type="text/css">
        <?php echo $css; ?>
    </style>
<?php
}
add_action('wp_head', 'blkcanvas_customize_css');

/**
 * Used by hook: 'customize_preview_init'
 * 
 * @see add_action('customize_preview_init',$func)
 */
function blkcanvas_customizer_live_preview()
{
    wp_enqueue_script(
        'blkcanvas-themecustomizer',            //Give the script an ID
        get_template_directory_uri() . '/includes/customizer/theme-customizer.js', //Point to file
        array('jquery', 'customize-preview'),    //Define dependencies
        '',                        //Define a version (optional) 
        true                        //Put script in footer?
    );

    $theme_settings = blkcanvas_get_theme_settings();
    wp_add_inline_script( 
        'blkcanvas-themecustomizer', 
        'const BLKCANVAS_CUSTOMIZER_SETTINGS = ' . json_encode( $theme_settings['settings'] ), 
        'before' 
    );


}
add_action('customize_preview_init', 'blkcanvas_customizer_live_preview');
