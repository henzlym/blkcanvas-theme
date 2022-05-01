<?php return array(
    // Fonts
    'font_size_body' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Site font size', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '1em',
        'selectors' => array(
            'body' => '--font-size-base'
        ),
        'setting' => 'font_size_body',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_select_site_title' => array(
        'control' => array(
            'class' => 'Fonts_Search_Select',
            'label' => __('Site title font', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            '.site-title' => '--site-title-font-family'
        ),
        'setting' => 'font_select_site_title',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_select_body' => array(
        'control' => array(
            'class' => 'Fonts_Search_Select',
            'label' => __('Body font', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--font-family'
        ),
        'setting' => 'font_select_body',
        'section' => 'fonts_global',
        'transport' => 'refresh',
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
        'transport' => 'refresh',
    ),
    'font_size_archive_headers' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Archive header font size', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '20px',
        'selectors' => array(
            'body.archive .entry-title' => 'font-size'
        ),
        'setting' => 'font_size_archive_headers',
        'section' => 'fonts_archive',
        'transport' => 'postMessage',
    ),
);
