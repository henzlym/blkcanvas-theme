<?php
function blkcanvas_render_box_ad( $content )
{
	global $post;

	if (is_admin()) return $content;
	if (is_front_page()) return $content;
	if (!is_singular() || !is_main_query()) return $content;

	if (has_blocks($post)) {
		$paragraphs = 0;
		$in_content_ad_insertion_nth = 0;
		$insertion_ad_type = get_theme_mod( 'in_content_ad_insertion_type', 'every_nth' );
		if ($insertion_ad_type == 'every_nth') {
			$in_content_ad_insertion_nth = get_theme_mod( 'in_content_ad_insertion_nth', 3 );
		}
		$box_ads = array(
			array(
				'id' => 'in_content_ad_1',
				'ad' => get_theme_mod('in_content_ad_1'),
				'index' => get_theme_mod('in_content_ad_1_insertion', 3)
			),
			array(
				'id' => 'in_content_ad_2',
				'ad' => get_theme_mod('in_content_ad_2'),
				'index' => get_theme_mod('in_content_ad_2_insertion', 6)
			)
		);
		$content = "";
		$blocks = parse_blocks( $post->post_content );
		foreach ( $blocks as $block ) {


			if ( 'core/paragraph' === $block['blockName'] ) {

				if ($insertion_ad_type == 'every_nth') {
					if ( $paragraphs % $in_content_ad_insertion_nth === 0 && $paragraphs !== 0 ) {
						$content .= ( isset( $box_ads[0]['ad'] ) && $box_ads[0]['ad'] ) ? $box_ads[0]['ad'] : '';
						array_shift($box_ads);
					}
				}

				if ($insertion_ad_type == 'indexes') {
					if ( isset( $box_ads[0]['ad'] ) && $box_ads[0]['index'] == $paragraphs && $paragraphs !== 0 ) {
						$content .= ( isset( $box_ads[0]['ad'] ) && $box_ads[0]['ad'] ) ? $box_ads[0]['ad'] : '';
						array_shift($box_ads);
					}
				}

				$paragraphs++;
				
			}

			$content .= render_block($block);

			 
		}

	}

	return $content;

}

/**
 * Enqueue scripts and styles.
 */
function blkcanvas_ad_scripts() {
	
	wp_enqueue_script( 'blkcanvas-ads', get_template_directory_uri() . '/build/js/ads.min.js', [], BCA_VERSION, true );

}


/**
 * Ads
 */
function blkcanvas_render_header_ad()
{
	if (get_theme_mod('enable_ads', false) && get_theme_mod('script_url', '')) {
		?>
		<div class="ad-container">
			<div id="banner-ad_header" class="ad-slot"></div>
		</div>
		<?php
	}
}


function blkcanvas_init_ad_scripts()
{
	if (get_theme_mod('enable_ads', false) && $script_url = get_theme_mod('script_url', '')) {
		$loading = get_theme_mod('load_js', '');
		echo '<script '.$loading.' src="'.$script_url.'"></script>';
	}
}



function blkcanvas_critical_css_add_ads_css( $template_css, $template )
{
    if ($template !== 'base') {
        return $template_css;
    }
    
	$file = get_template_directory() . '/build/css/components/ads.min.css';
	$template_css = $template_css . file_get_contents( $file );

	return $template_css;
}



function blkcanvas_render_footer_ad()
{
	if (get_theme_mod('enable_ads', false) && get_theme_mod('script_url', '')) {
		?>
		<div class="ad-container footer-slot">
			<div id="banner-ad_footer" class="ad-slot"></div>
		</div>
		<?php
	}
}



function blkcanvas_init_ads()
{
	if (!get_theme_mod( 'enable_ads' )) return;
	
	add_action( 'wp_footer', 'blkcanvas_init_ad_scripts');
	add_filter( 'blkcanvas_critical_css', 'blkcanvas_critical_css_add_ads_css', 10, 2 );
	add_action( 'wp_body_open', 'blkcanvas_render_header_ad');
	add_action('the_content', 'blkcanvas_render_box_ad', 1, 1);
	add_action( 'get_footer', 'blkcanvas_ad_scripts' );
	add_action( 'wp_footer', 'blkcanvas_render_footer_ad');
}

add_action('init', 'blkcanvas_init_ads');