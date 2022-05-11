<?php return array(
    // Fonts
    'font_size_body' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Site font size', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '1em',
        'selectors' => array(
            'body' => '--font-size-base'
        ),
        'setting' => 'font_size_body',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_line_height' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Site line height', 'blkcanvas'),
            'type' => 'number',
            'input_attrs' => array(
                'step' => 0.1,
                'min' => 0,
                'max' => 2
            ),
        ),
        'default' => 1.5,
        'selectors' => array(
            'body' => '--font-line-height'
        ),
        'setting' => 'font_line_height',
        'section' => 'fonts_global',
        'transport' => 'postMessage',
    ),
    'font_select_site_title' => array(
        'control' => array(
            'class' => 'Fonts_Search_Select',
            'label' => __('Site title font', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            '.site-title' => '--site-title-font-family'
        ),
        'setting' => 'font_select_site_title',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_weight_site_title' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Site title font weight', 'blkcanvas'),
            'type' => 'number',
            'input_attrs' => array(
                'step' => 100,
                'min' => 100,
                'max' => 900
            ),
        ),
        'default' => 400,
        'selectors' => array(
            '.site-title' => '--site-title-font-weight'
        ),
        'setting' => 'font_weight_site_title',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_select_body' => array(
        'control' => array(
            'class' => 'Fonts_Search_Select',
            'label' => __('Body font', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--font-family'
        ),
        'setting' => 'font_select_body',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_select_headers' => array(
        'control' => array(
            'class' => 'Fonts_Search_Select',
            'label' => __('Header font', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            'h1,h2,h3,h4' => 'font-family'
        ),
        'setting' => 'font_select_headers',
        'section' => 'fonts_global',
        'transport' => 'refresh',
    ),
    'font_size_single_title' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Title font size', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '',
        'selectors' => array(
            'body' => '--single-title-font-size'
        ),
        'setting' => 'font_size_single_title',
        'section' => 'fonts_single',
        'transport' => 'postMessage',
    ),
    'font_weight_single_title' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Title font weight', 'blkcanvas'),
            'type' => 'number',
            'input_attrs' => array(
                'step' => 100,
                'min' => 100,
                'max' => 900
            ),
        ),
        'default' => 400,
        'selectors' => array(
            'body' => '--single-title-font-weight'
        ),
        'setting' => 'font_weight_single_title',
        'section' => 'fonts_single',
        'transport' => 'postMessage',
    ),
    'font_lineheight_single_title' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Title font line height', 'blkcanvas'),
            'type' => 'number',
            'input_attrs' => array(
                'step' => 0.1,
                'min' => 0,
                'max' => 1.5
            ),
        ),
        'default' => 1.1,
        'selectors' => array(
            'body' => '--single-title-font-lineheight'
        ),
        'setting' => 'font_lineheight_single_title',
        'section' => 'fonts_single',
        'transport' => 'postMessage',
    ),
    'font_text_transform_single_title' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Title font text transform', 'blkcanvas'),
            'type' => 'radio',
            'choices' => array(
                'capitalize' => 'Capitalize',
                'uppercase' => 'Uppercase',
                'lowercase' => 'Lowercase'
            ),
        ),
        'default' => 'capitalize',
        'selectors' => array(
            'body' => '--single-title-font-text-transform'
        ),
        'setting' => 'font_text_transform_single_title',
        'section' => 'fonts_single',
        'transport' => 'postMessage',
    ),
    'font_size_archive_headers' => array(
        'control' => array(
            'class' => 'WP_Customize_Control',
            'label' => __('Archive header font size', 'blkcanvas'),
            'type' => 'text',
        ),
        'default' => '20px',
        'selectors' => array(
            'body.archive .entry-title, body.search .entry-title' => 'font-size'
        ),
        'setting' => 'font_size_archive_headers',
        'section' => 'fonts_archive',
        'transport' => 'postMessage',
    ),
);