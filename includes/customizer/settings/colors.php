<?php return array(
    // Colors
    'site_background_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Background', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--site-background-color'
        ),
        'setting' => 'site_background_color',
        'section' => 'colors_global',
        'transport' => 'postMessage',

    ),
    'site_text_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Text', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--site-text-color'
        ),
        'setting' => 'site_text_color',
        'section' => 'colors_global',
        'transport' => 'postMessage',

    ),
    'site_links_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Links', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--site-links-color'
        ),
        'setting' => 'site_links_color',
        'section' => 'colors_global',
        'transport' => 'postMessage',

    ),
    'header_background_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Background', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'header.header' => '--header-background-color'
        ),
        'setting' => 'header_background_color',
        'section' => 'colors_header',
        'transport' => 'postMessage',

    ),
    'header_text_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Text', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'header.header' => '--header-text-color'
        ),
        'setting' => 'header_text_color',
        'section' => 'colors_header',
        'transport' => 'postMessage',

    ),
    'header_links_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Links', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'header.header' => '--header-links-color'
        ),
        'setting' => 'header_links_color',
        'section' => 'colors_header',
        'transport' => 'postMessage',

    ),
    'footer_background_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Background', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'footer.footer' => '--footer-background-color'
        ),
        'setting' => 'footer_background_color',
        'section' => 'colors_footer',
        'transport' => 'postMessage',

    ),
    'footer_text_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Text', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'footer.footer' => '--footer-text-color'
        ),
        'setting' => 'footer_text_color',
        'section' => 'colors_footer',
        'transport' => 'postMessage',

    ),
    'footer_links_color' => array(
        'control' => array(
            'class' => 'WP_Customize_Color_Control',
            'label' => __('Links', 'blkcanvas'),
        ),
        'default' => '',
        'selectors' => array(
            'footer.footer' => '--footer-links-color'
        ),
        'setting' => 'footer_links_color',
        'section' => 'colors_footer',
        'transport' => 'postMessage',

    )
);
