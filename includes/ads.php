<?php
function bca_render_box_ad( $content )
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
add_action('the_content', 'bca_render_box_ad', 1, 1);