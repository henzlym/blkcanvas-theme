<?php return array(
    // Title Tag
    'export_settings' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Export Settings', 'blkcanvas'),
            'type' => 'textarea',
            'input_attrs' => array( 'disabled' => true )
        ),
        'default' => bca_export_theme_mods(),
        'setting' => 'export_settings',
        'section' => 'utilities',
        'transport' => 'refresh',
    ),
    'import_settings' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Import Settings', 'blkcanvas'),
            'type' => 'textarea',
            'input_attrs' => array()
        ),
        'default' => '',
        'setting' => 'import_settings',
        'section' => 'utilities',
        'transport' => 'refresh',
        'sanitize_callback' => 'bca_import_theme_mods_sanitize',
    )
);