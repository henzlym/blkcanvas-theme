<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    <meta name="description" content="<?php bloginfo('description'); ?>" />
</head>

<body <?php body_class(); ?>>
    <header id="masthead" class="header <?php echo blkcanvas_get_header_class(); ?>">
        <div class="blkcanvas-container">
            <?php blkcanvas_logo(); ?>
            <?php get_template_part('searchform'); ?>
            <div class="hamburger-menu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <?php blkcanvas_site_navigation(); ?>
            <!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
    <?php wp_body_open(); ?>
    <div id="page" class="site">