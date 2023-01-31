<?php return array(
    'header_scripts' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Header Script Code:', 'blkcanvas'),
            'type' => 'textarea',
        ),
        'default' => '',
        'setting' => 'header_scripts',
        'section' => 'header-footer-scripts',
        'transport' => 'refresh',
    ),
);