<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function blkcanvas_get_theme_settings()
{
    $colors = include get_template_directory() . '/includes/customizer/settings/colors.php';
    $fonts = include get_template_directory() . '/includes/customizer/settings/fonts.php';
    $templates = include get_template_directory() . '/includes/customizer/settings/templates.php';

    $settings = array_merge( $colors, $fonts, $templates );
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
            'templates' => array(
                'id' => 'templates',
                'title' => 'Templates',
            ),
        ),
        'sections' => array(
            'colors_global' => array(
                'capability' => 'edit_theme_options',
                'id' => 'colors_global',
                'title' => 'Global',
                'panel' => 'colors',
                'priority' => 160,
            ),
            'colors_header' => array(
                'capability' => 'edit_theme_options',
                'id' => 'colors_header',
                'title' => 'Header',
                'panel' => 'colors',
                'priority' => 160,
            ),
            'colors_footer' => array(
                'capability' => 'edit_theme_options',
                'id' => 'colors_footer',
                'title' => 'Footer',
                'panel' => 'colors',
                'priority' => 160,
            ),
            'templates_global' => array(
                'capability' => 'edit_theme_options',
                'id' => 'templates_global',
                'title' => 'Global',
                'panel' => 'templates',
                'priority' => 160,
            ),
            'templates_header' => array(
                'capability' => 'edit_theme_options',
                'id' => 'templates_header',
                'title' => 'Header',
                'panel' => 'templates',
                'priority' => 160,
            ),
            'templates_navigation' => array(
                'capability' => 'edit_theme_options',
                'id' => 'templates_navigation',
                'title' => 'Navigation',
                'panel' => 'templates',
                'priority' => 160,
            ),
            'fonts_global' => array(
                'capability' => 'edit_theme_options',
                'id' => 'fonts_global',
                'title' => 'Global',
                'panel' => 'fonts',
                'priority' => 160,
            ),
        ),
        'settings' => $settings,
        'controls' => array(

        )
    );

    return apply_filters('blkcanvas_theme_settings',$theme_settings);
}