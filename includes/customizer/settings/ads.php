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
    'in_content_ad_insertion_type' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Select the type of insertion used for in-content ads.', 'blkcanvas'),
            'type' => 'radio',
            'choices' => array(
                'indexes' => 'Set the insertion number for each in-content ad',
                'every_nth' => 'Set the insertion number for nth paragraph'
            )
        ),
        'default' => 'every_nth',
        'setting' => 'in_content_ad_insertion_type',
        'section' => 'ads_single',
        'transport' => 'refresh',
    ),
    'in_content_ad_insertion_nth' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Insert ads after every Nth paragraph', 'blkcanvas'),
            'type' => 'number',
            'active_callback' => function () { 
                $insertion_ad_type = get_theme_mod( 'in_content_ad_insertion_type', 'every_nth' );
                return $insertion_ad_type === 'every_nth'; 
            },
        ),
        'default' => 3,
        'setting' => 'in_content_ad_insertion_nth',
        'section' => 'ads_single',
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
    'in_content_ad_1_insertion' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Set insertion number for In-content ad 1', 'blkcanvas'),
            'type' => 'number',
            'active_callback' => function () { 
                $insertion_ad_type = get_theme_mod( 'in_content_ad_insertion_type', 'every_nth' );
                return $insertion_ad_type === 'indexes'; 
            },
        ),
        'default' => 3,
        'setting' => 'in_content_ad_1_insertion',
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
    'in_content_ad_2_insertion' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Set insertion number for In-content ad 2', 'blkcanvas'),
            'type' => 'number',
            'active_callback' => function () { 
                $insertion_ad_type = get_theme_mod( 'in_content_ad_insertion_type', 'every_nth' );
                return $insertion_ad_type === 'indexes'; 
            },
        ),
        'default' => 6,
        'setting' => 'in_content_ad_2_insertion',
        'section' => 'ads_single',
        'transport' => 'refresh',
    ),
);