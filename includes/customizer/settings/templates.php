<?php return array(
    // GLOBAL
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
            'body' => '--global-padding-x',
            'body' => '--wp--style--block-gap'
        ),
        'setting' => 'container_padding_x',
        'section' => 'templates_global',
        'transport' => 'postMessage',
    ),
    // HEADER
    'header_is_sticky' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Sticky Header', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'header_is_sticky',
        'section' => 'templates_header',
        'transport' => 'refresh',
    ),
    'header_boxshadow' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Box shadow', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => '',
        'setting' => 'header_boxshadow',
        'section' => 'templates_header',
        'transport' => 'refresh',
    ),
    'header_enable_search' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Enable search in header', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'header_enable_search',
        'section' => 'templates_header',
        'transport' => 'refresh',
    ),
    // NAVIGATION
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
    // SINGLE
    'single_thumbnail' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show featured image', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'single_thumbnail',
        'section' => 'templates_single',
        'transport' => 'refresh',
    ),
    'single_thumbnail_size' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Featured image size', 'blkcanvas'),
            'type' => 'select',
            'choices' => wp_list_pluck( bca_theme_image_sizes(), 'name', 'name' ),
            'active_callback' => function () { return get_theme_mod( 'single_thumbnail' ); },
        ),
        'default' => 'medium',
        'setting' => 'single_thumbnail_size',
        'section' => 'templates_single',
        'transport' => 'refresh',
    ),
    'single_categories' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show categories', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'single_categories',
        'section' => 'templates_single',
        'transport' => 'refresh',
    ),
    'single_tags' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show tags', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'single_tags',
        'section' => 'templates_single',
        'transport' => 'refresh',
    ),
    // ARCHIVE
    'archive_template' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Template', 'blkcanvas'),
            'type' => 'radio',
            'choices' => array(
                'list' => 'List',
                'columns' => 'Columns'
            )
        ),
        'default' => 'list',
        'setting' => 'archive_template',
        'section' => 'templates_archive',
        'selectors' => array(
            'body' => '--archive-template-columns'
        ),
        'transport' => 'refresh',
    ),
    'archive_columns' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Number of columns', 'blkcanvas'),
            'type' => 'number'
        ),
        'default' => ( get_theme_mod( 'archive_template', 'list' ) == 'list') ? 1 : 3,
        'setting' => 'archive_columns',
        'section' => 'templates_archive',
        'selectors' => array(
            'body' => '--archive-template-columns'
        ),
        'transport' => 'refresh',
    ),
    'archive_thumbnail' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show featured image', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'archive_thumbnail',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    'archive_thumbnail_size' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Featured image size', 'blkcanvas'),
            'type' => 'select',
            'choices' => wp_list_pluck( bca_theme_image_sizes(), 'name', 'name' ),
            'active_callback' => function () { return get_theme_mod( 'archive_thumbnail' ); },
        ),
        'default' => 'thumbnail',
        'setting' => 'archive_thumbnail_size',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    'archive_excerpt' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show excerpt', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => false,
        'setting' => 'archive_excerpt',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    // Condition settings - Excerpt
    'archive_excerpt_length' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Excerpt character length', 'blkcanvas'),
            'type' => 'number',
            'active_callback' => function () { return get_theme_mod( 'archive_excerpt' ); },
        ),
        'default' => 20,
        'setting' => 'archive_excerpt_length',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    // End Condition settings - Excerpt
    'archive_byline' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show byline', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => true,
        'setting' => 'archive_byline',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    // Conditional Settings - Byline
    'archive_author' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show author', 'blkcanvas'),
            'type' => 'checkbox',
            'active_callback' => function () { return get_theme_mod( 'archive_byline', true ); },
        ),
        'default' => false,
        'setting' => 'archive_author',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
    'archive_date' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show published date', 'blkcanvas'),
            'type' => 'checkbox',
            'active_callback' => function () { return get_theme_mod( 'archive_byline', true ); },
        ),
        'default' => true,
        'setting' => 'archive_date',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
     // End Condition settings - Byline
    'archive_read_more' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Show read more button', 'blkcanvas'),
            'type' => 'checkbox',
        ),
        'default' => false,
        'setting' => 'archive_read_more',
        'section' => 'templates_archive',
        'transport' => 'refresh',
    ),
);
