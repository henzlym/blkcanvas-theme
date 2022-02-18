<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function blkcanvas_get_theme_settings()
{
    $settings = array(
        'panels' => array(
            'colors',
        ),
        'sections' => array(
            'colors'
        ),
        'settings' => array(
            'links_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Links Color', 'blkcanvas'),
                ),
                'default' => '#000000',
                'selectors' => array(
                    'a' => 'color'
                ),
                'editor_selectors' => array(
                    'a' => 'color'
                ),
                'setting' => 'links_color',
                'section' => 'colors',
                'transport' => 'refresh',
                
            )
        ),
        'controls' => array(

        )
    );

    return apply_filters('blkcanvas_theme_settings',$settings);
}