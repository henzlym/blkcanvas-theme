<?php return array(
    // Performance
    'enable_cache' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Enable Cache', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'enable_cache',
        'section' => 'performance_global',
        'transport' => 'postMessage',
    ),
    'enable_gzip' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Enable Gzip', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'enable_gzip',
        'section' => 'performance_global',
        'transport' => 'postMessage',
    ),
    'lazy_loading_threshold_front_page' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Lazy loading threshold - Desktop', 'blkcanvas'),
            'description' => 'Filters the threshold for how many of the first content media elements to not lazy-load.',
            'type' => 'number',
        ),
        'default' => 3,
        'setting' => 'lazy_loading_threshold_front_page',
        'section' => 'performance_front_page',
        'transport' => 'postMessage',
    ),
    'lazy_loading_threshold_front_page_mobile' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Lazy loading threshold - Mobile', 'blkcanvas'),
            'description' => 'Filters the threshold for how many of the first content media elements to not lazy-load.',
            'type' => 'number',
        ),
        'default' => 1,
        'setting' => 'lazy_loading_threshold_front_page_mobile',
        'section' => 'performance_front_page',
        'transport' => 'postMessage',
    ),
    'lazy_loading_threshold_archive' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Lazy loading threshold - Desktop', 'blkcanvas'),
            'description' => 'Filters the threshold for how many of the first content media elements to not lazy-load.',
            'type' => 'number',
        ),
        'default' => 5,
        'setting' => 'lazy_loading_threshold_archive',
        'section' => 'performance_archive',
        'transport' => 'postMessage',
    ),
    'lazy_loading_threshold_archive_mobile' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Lazy loading threshold - Mobile', 'blkcanvas'),
            'description' => 'Filters the threshold for how many of the first content media elements to not lazy-load.',
            'type' => 'number',
        ),
        'default' => 3,
        'setting' => 'lazy_loading_threshold_archive_mobile',
        'section' => 'performance_archive',
        'transport' => 'postMessage',
    ),
);