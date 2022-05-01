<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function blkcanvas_get_theme_settings()
{
 
    $site_areas = array(
        'colors',
        'fonts',
        'performance',
        'templates'
    );
    $sections = array();
    $settings = array();
    foreach ($site_areas as $key => $area ) {
        if ( 
            file_exists( get_template_directory() . '/includes/customizer/sections/'.$area.'.php' ) &&
            file_exists( get_template_directory() . '/includes/customizer/settings/'.$area.'.php' ) 
        ) {
            $area_sections = include get_template_directory() . '/includes/customizer/sections/'.$area.'.php';
            $area_settings = include get_template_directory() . '/includes/customizer/settings/'.$area.'.php';

            $sections = array_merge($sections, $area_sections);
            $settings = array_merge($settings, $area_settings);
        }
    }

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