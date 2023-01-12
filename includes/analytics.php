<?php
function blkcanvas_wp_head_analytics()
{

	blkcanvas_head_scripts();
	
}

function blkcanvas_head_scripts()
{
    $site_tracking_id = get_theme_mod( 'site_tracking_id' );
    
    if ( !$site_tracking_id ) return;
    
	?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( $site_tracking_id ); ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '<?php echo esc_attr( $site_tracking_id ); ?>');
        </script>
        <!-- / Global site tag (gtag.js) - Google Analytics -->
	<?php
}

function blkcanvas_init_analytics()
{
    if ( !get_theme_mod('enable_site_tracking') || !get_theme_mod( 'site_tracking_id' ) ) return;

    add_action( 'wp_head', 'blkcanvas_wp_head_analytics' );
}
add_action( 'init', 'blkcanvas_init_analytics');