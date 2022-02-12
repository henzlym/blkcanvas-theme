<header id="masthead" class="site-header default sticky">
    <div class="site-header-container">
        <div class="site-branding">
            
            <img class="blkcanvas-search-icon" src="<?php echo get_template_directory_uri(); ?>/img/search-icon.png" alt="Search Icon" srcset="">
            
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
                    'menu_id'        => 'primary-menu'
                )
            );
            ?>
            
            

        </nav><!-- #site-navigation -->
    </div>
</header><!-- #masthead -->