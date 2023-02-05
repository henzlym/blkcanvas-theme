<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sandbox
 */

get_header();
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
                get_template_part( 'template-parts/cards/card', '', 
					array( 
						'card_class' => 'entry horizontal' , 
						'show_byline' => get_theme_mod('archive_byline', true), 
						'show_author' => get_theme_mod('archive_author'), 
						'show_date' => get_theme_mod('archive_date', true), 
						'show_read_more' => get_theme_mod('archive_read_more'),
						'show_thumbnail' => get_theme_mod('archive_thumbnail', true),
						'thumbnail_size' => get_theme_mod('archive_thumbnail_size', 'thumbnail'),
						'show_excerpt' => get_theme_mod('archive_excerpt')
					) 
				);

			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
