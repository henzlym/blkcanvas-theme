<?php
function bca_is_seo_plugin_active()
{
    $plugins = array(
        'wordpress-seo/wp-seo.php',
        'seo-by-rank-math/rank-math.php'
    );

    foreach ($plugins as $key => $plugin) {
        if(in_array($plugin, apply_filters('active_plugins', get_option('active_plugins')))){ 
            /* Yoast is active */
            return true;
        }
    }

    return false;
    
}

function bca_theme_image_sizes()
{
    $sizes = array(
        array(
            'name' => 'thumbnail',
            'width' => 360,
            'height' => 0,
            'crop' => true
        ),
        array(
            'name' => 'small',
            'width' => 540,
            'height' => 0,
            'crop' => true
        ),
        array(
            'name' => 'medium',
            'width' => 720,
            'height' => 0,
            'crop' => true
        ),
        array(
            'name' => 'medium_large',
            'width' => 960,
            'height' => 0,
            'crop' => true
        ),
        array(
            'name' => 'large',
            'width' => 1024,
            'height' => 0,
            'crop' => true
        )
    );

    return apply_filters( 'bca_theme_image_sizes', $sizes );

}