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
);