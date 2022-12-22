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
        'templates',
        'title-tagline',
        'ads',
        'analytics'
    );
    $sections = array();
    $settings = array();
    foreach ($site_areas as $key => $area ) {
        if ( 
            file_exists( get_template_directory() . '/includes/customizer/sections/'.$area.'.php' )
        ) {
            $area_sections = include get_template_directory() . '/includes/customizer/sections/'.$area.'.php';

            $sections = array_merge($sections, $area_sections);
        }
        if ( 
            file_exists( get_template_directory() . '/includes/customizer/settings/'.$area.'.php' ) 
        ) {
            $area_settings = include get_template_directory() . '/includes/customizer/settings/'.$area.'.php';

            $settings = array_merge($settings, $area_settings);
        }
    }

    $theme_settings = array(
        'panels' => array(
            'ads' => array(
                'id' => 'ads',
                'title' => 'Ads',
                'priority' => 160
            ),
            'analytics' => array(
                'id' => 'analytics',
                'title' => 'Analytics',
                'priority' => 160
            ),
            'colors' => array(
                'id' => 'colors',
                'title' => 'Colors',
                'priority' => 160
            ),
            'fonts' => array(
                'id' => 'fonts',
                'title' => 'Fonts',
                'priority' => 160
            ),
            'performance' => array(
                'id' => 'performance',
                'title' => 'Performance',
                'priority' => 160
            ),
            'templates' => array(
                'id' => 'templates',
                'title' => 'Templates',
                'priority' => 160
            ),
        ),
        'sections' => $sections,
        'settings' => $settings,
    );

    return apply_filters('blkcanvas_theme_settings',$theme_settings);
}