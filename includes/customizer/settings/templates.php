<?php return array(
    // Templates
    'container_width' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Container max-width', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '1180px',
        'selectors' => array(
            'body' => '--container-width'
        ),
        'setting' => 'container_width',
        'section' => 'templates_global',
        'transport' => 'postMessage',
    ),
    'content_width' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Content max-width', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '1180px',
        'selectors' => array(
            '.entry-content,.wp-block-cover__inner-container' => 'max-width'
        ),
        'setting' => 'content_width',
        'section' => 'templates_global',
        'transport' => 'postMessage',
    ),
    'container_padding_y' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Padding top/bottom', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '16px',
        'selectors' => array(
            'body' => '--global-padding-y'
        ),
        'setting' => 'container_padding_y',
        'section' => 'templates_global',
        'transport' => 'postMessage',
    ),
    'container_padding_x' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Padding left/right', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '16px',
        'selectors' => array(
            'body' => '--global-padding-x'
        ),
        'setting' => 'container_padding_x',
        'section' => 'templates_global',
        'transport' => 'postMessage',
    ),
    'header_is_sticky' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Sticky Header', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'header_is_sticky',
        'section' => 'templates_header',
        'transport' => 'postMessage',
    ),
    'navigation_alignment' => array(
        'control' => array(
            'class' => 'Alignment_Customize_Control',
            'choices' => array(
                'flex-start' => 'Left',
                'center' => 'Center',
                'flex-end' => 'Right'
            ),
            'label' => __('Navigation alignment', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => 'flex-start',
        'selectors' => array(
            'nav.site-navigation' => '--navigation-justify-content'
        ),
        'setting' => 'navigation_alignment',
        'section' => 'templates_navigation',
        'transport' => 'postMessage',
    ),
);
