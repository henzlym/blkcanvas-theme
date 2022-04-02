<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<header id="masthead" class="site-header sticky">
    <div class="site-header-container">
        <div class="site-branding">
                        
            <?php blkcanvas_logo(); ?>
            
            <div class="hamburger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <?php get_template_part('searchform'); ?>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </div>
</header><!-- #masthead -->
<?php wp_body_open(); ?>
<div id="page" class="site">