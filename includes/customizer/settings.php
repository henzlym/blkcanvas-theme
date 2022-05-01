<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function blkcanvas_get_theme_settings()
{
 
    $sections_colors = include get_template_directory() . '/includes/customizer/sections/colors.php';
    $sections_fonts = include get_template_directory() . '/includes/customizer/sections/fonts.php';
    $sections_templates = include get_template_directory() . '/includes/customizer/sections/templates.php';
    $sections = array_merge( $sections_colors, $sections_fonts, $sections_templates );
    
    $settings_colors = include get_template_directory() . '/includes/customizer/settings/colors.php';
    $settings_fonts = include get_template_directory() . '/includes/customizer/settings/fonts.php';
    $settings_templates = include get_template_directory() . '/includes/customizer/settings/templates.php';
    $settings = array_merge( $settings_colors, $settings_fonts, $settings_templates );
    // error_log(print_r($colors,true));


    $theme_settings = array(
        'panels' => array(
            'colors' => array(
                'id' => 'colors',
                'title' => 'Colors',
            ),
            'fonts' => array(
                'id' => 'fonts',
                'title' => 'Font',
            ),
            'performance' => array(
                'id' => 'performance',
                'title' => 'Performance',
            ),
            'templates' => array(
                'id' => 'templates',
                'title' => 'Templates',
            ),
        ),
        'sections' => $sections,
        'settings' => $settings,
    );

    return apply_filters('blkcanvas_theme_settings',$theme_settings);
}