<?php
define('BLKCANVAS_PLUGINS_ROOT', get_template_directory() . '/includes/plugins/' );
define('BLKCANVAS_PLUGINS_URI', get_template_directory_uri() . '/includes/plugins/' );
if ( class_exists( 'woocommerce' ) ) {
    add_action('init', 'load_woocommerce_plugins', 1);
}

function load_woocommerce_plugins()
{
    if ( get_theme_mod( 'blkcanvas_plugins_woocommerce_registration_form', false ) == 'on' ) {
        require_once BLKCANVAS_PLUGINS_ROOT . 'blkcanvas-woocommerce-registration-form/plugin.php';
    }
}

