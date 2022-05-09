<?php return array(
    // Ads
    'enable_ads' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Enable Ads', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => false,
        'setting' => 'enable_ads',
        'section' => 'ads_global',
        'transport' => 'refresh',
    ),
    'script_url' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Script url', 'blkcanvas'),
            'type' => 'url',
            'active_callback' => function () { return get_theme_mod( 'enable_ads' ); },
        ),
        'default' => '',
        'setting' => 'script_url',
        'section' => 'ads_global',
        'transport' => 'refresh',
    ),
    'load_js' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Load script', 'blkcanvas'),
            'type' => 'radio',
            'choices' => array(
                '' => 'Default',
                'async' => 'Async',
                'defer' => 'Defer'
            ),
            'active_callback' => function () { return get_theme_mod( 'enable_ads' ); },
        ),
        'default' => 'async',
        'setting' => 'load_js',
        'section' => 'ads_global',
        'transport' => 'refresh',
    ),
    'in_content_ad_1' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('In-content ad 1', 'blkcanvas'),
            'type' => 'textarea',
        ),
        'default' => '',
        'setting' => 'in_content_ad_1',
        'section' => 'ads_single',
        'transport' => 'refresh',
    ),
    'in_content_ad_2' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('In-content ad 2', 'blkcanvas'),
            'type' => 'textarea',
        ),
        'default' => '',
        'setting' => 'in_content_ad_2',
        'section' => 'ads_single',
        'transport' => 'refresh',
    ),
);