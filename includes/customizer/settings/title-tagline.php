<?php return array(
    // Title Tag
    'site_logo_max_width' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Site logo max-width', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '150px',
        'selectors' => array(
            'body' => '--site-logo-max-width'
        ),
        'setting' => 'site_logo_max_width',
        'section' => 'title_tagline',
        'transport' => 'postMessage',
    ),
    'show_site_tagline' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show site tagline', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'show_site_tagline',
        'section' => 'title_tagline',
        'transport' => 'refresh',
    ),
);