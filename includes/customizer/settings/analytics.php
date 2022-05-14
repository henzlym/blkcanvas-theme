<?php return array(
    // Title Tag
    'enable_site_tracking' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Enable site tracking', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => false,
        'setting' => 'enable_site_tracking',
        'section' => 'analytics_global',
        'transport' => 'refresh',
    ),
    'site_tracking_tool' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Select tracking tool', 'blkcanvas'),
            'type' => 'radio',
            'choices' => array(
                'google-analytics' => 'Google Analytics',
                'google-tag-manager' => 'Google Tag Manager'
            ),
            'active_callback' => function(){ return get_theme_mod( 'enable_site_tracking' ); }
        ),
        'default' => 'google-analytics',
        'setting' => 'site_tracking_tool',
        'section' => 'analytics_global',
        'transport' => 'refresh',
    ),
    'site_tracking_id '=> array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Tracking ID:', 'blkcanvas'),
            'type' => 'text',
            'active_callback' => function(){ return get_theme_mod( 'enable_site_tracking' ); }
        ),
        'default' => '',
        'setting' => 'site_tracking_id',
        'section' => 'analytics_global',
        'transport' => 'refresh',
    ),
);