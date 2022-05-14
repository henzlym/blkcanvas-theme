<?php
function blkcanvas_wp_head_analytics()
{

	blkcanvas_head_scripts();
	
}

function blkcanvas_head_scripts()
{
	?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_theme_mod( 'site_tracking_id' ); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo get_theme_mod( 'site_tracking_id' ); ?>');
        </script>
	<?php
}

function blkcanvas_init_analytics()
{
    if ( !get_theme_mod('enable_site_tracking') || get_theme_mod( 'site_tracking_id' ) ) return;

    add_action( 'wp_head', 'blkcanvas_wp_head_analytics' );
}
add_action( 'init', 'blkcanvas_init_analytics');