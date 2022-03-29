<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function blkcanvas_get_theme_settings()
{
    $settings = array(
        'panels' => array(
            'templates' => array(
                'id' => 'templates',
                'title' => 'Templates Settings',
            ),
            'fonts' => array(
                'id' => 'fonts',
                'title' => 'Font Settings',
            ),
        ),
        'sections' => array(
            'templates_global' => array(
                'capability' => 'edit_theme_options',
                'id' => 'templates_global',
                'title' => 'Global',
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
        'settings' => array(
            // Templates
            'container_width' => array(
                'control' => array(
                    'class' => 'WP_Customize_Control',
                    'label' => __('Site container width', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '1180px',
                'selectors' => array(
                    '.site,.site-header-container,.wp-block-cover__inner-container,.wp-block-group__inner-container,.footer-container' => 'max-width'
                ),
                'setting' => 'container_width',
                'section' => 'templates_global',
                'transport' => 'refresh',
            ),
            'content_width' => array(
                'control' => array(
                    'class' => 'WP_Customize_Control',
                    'label' => __('Site content width', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '1180px',
                'selectors' => array(
                    '.entry-content,.wp-block-cover__inner-container' => 'max-width'
                ),
                'setting' => 'content_width',
                'section' => 'templates_global',
                'transport' => 'refresh',
            ),
            // Fonts
            'font_size_body' => array(
                'control' => array(
                    'class' => 'WP_Customize_Control',
                    'label' => __('Site font size', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '16px',
                'selectors' => array(
                    'body' => 'font-size'
                ),
                'setting' => 'font_size_body',
                'section' => 'fonts_global',
                'transport' => 'postMessage',
            ),
            'font_size_headers' => array(
                'control' => array(
                    'class' => 'WP_Customize_Control',
                    'label' => __('Site font size', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '16px',
                'selectors' => array(
                    'body' => 'font-size'
                ),
                'setting' => 'font_size_body',
                'section' => 'fonts_global',
                'transport' => 'postMessage',
            ),
            'font_select_body' => array(
                'control' => array(
                    'class' => 'Fonts_Search_Select',
                    'label' => __('Body font', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '',
                'selectors' => array(
                    'body' => 'font-family'
                ),
                'setting' => 'font_select_body',
                'section' => 'fonts_global',
                'transport' => 'postMessage',
            ),
            'font_select_headers' => array(
                'control' => array(
                    'class' => 'Fonts_Search_Select',
                    'label' => __('Header font', 'blkcanvas'),
                    'type' => 'text',
                ),
                'default' => '',
                'selectors' => array(
                    'h1,h2,h3,h4' => 'font-family'
                ),
                'setting' => 'font_select_headers',
                'section' => 'fonts_global',
                'transport' => 'postMessage',
            ),
            // Colors
            'header_bg_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Header background color', 'blkcanvas'),
                ),
                'default' => '#ffff',
                'selectors' => array(
                    '.site-header' => 'background-color'
                ),
                'setting' => 'header_bg_color',
                'section' => 'colors',
                'transport' => 'postMessage',
                
            ),
            'header_accent_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Header links color', 'blkcanvas'),
                ),
                'default' => '#1e73be',
                'selectors' => array(
                    'header.site-header a' => 'color',
                    'header.site-header button' => 'background-color'
                ),
                'setting' => 'header_accent_color',
                'section' => 'colors',
                'transport' => 'refresh',
                
            ),
            'header_text_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Header text color', 'blkcanvas'),
                ),
                'default' => '#1e73be',
                'selectors' => array(
                    '.site-header, .site-header button' => 'color'
                ),
                'setting' => 'header_text_color',
                'section' => 'colors',
                'transport' => 'refresh',
                
            ),
            'links_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Links Color', 'blkcanvas'),
                ),
                'default' => '#1e73be',
                'selectors' => array(
                    'a' => 'color'
                ),
                'editor_selectors' => array(
                    'a' => 'color'
                ),
                'setting' => 'links_color',
                'section' => 'colors',
                'transport' => 'refresh',
                
            ),
            'footer_links_color' => array(
                'control' => array(
                    'class' => 'WP_Customize_Color_Control',
                    'label' => __('Footer Links Color', 'blkcanvas'),
                ),
                'default' => '#1e73be',
                'selectors' => array(
                    'footer a' => 'color'
                ),
                'editor_selectors' => array(
                    'footer a' => 'color'
                ),
                'setting' => 'footer_links_color',
                'section' => 'colors',
                'transport' => 'postMessage',
                
            )
        ),
        'controls' => array(

        )
    );

    return apply_filters('blkcanvas_theme_settings',$settings);
}