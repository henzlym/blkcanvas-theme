<?php
function bca_header_scripts() {
    echo "<!-- BCA HEADER SCRIPTS -->";
    echo get_theme_mod( 'header_scripts', '' );
    echo "<!-- BCA HEADER SCRIPTS -->";
}
add_action( 'wp_head', 'bca_header_scripts' );
