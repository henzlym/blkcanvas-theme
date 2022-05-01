<?php

function bca_title( $title )
{
    global $post;

    if (bca_is_seo_plugin_active()) return $title;

    if ( is_front_page() ) {
        return get_the_title( $post );
    }

    return $title;
}
add_filter( 'wp_title', 'bca_title' );

function bca_description( $description, $show )
{
    global $post;

    if (bca_is_seo_plugin_active()) return $description;

    if ( $show !== 'description') {
        return $description;
    }

    if (is_singular()) {
        return get_the_excerpt( $post );
    }
    return $description;

}
add_filter('bloginfo', 'bca_description', 10, 2);