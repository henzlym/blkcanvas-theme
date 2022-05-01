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