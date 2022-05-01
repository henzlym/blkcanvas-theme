<?php return array(
    // Title Tag
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