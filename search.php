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

        <header class="page-header alignwide">
            <h1 class="page-title">
                <?php
                printf(
                    /* translators: %s: Search term. */
                    esc_html__( 'Results for "%s"', 'blkcanvas' ),
                    '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>
            <div class="search-result-count">
                <?php
                printf(
                    esc_html(
                        /* translators: %d: The number of search results. */
                        _n(
                            '%d result for your search.',
                            '%d results for your search.',
                            (int) $wp_query->found_posts,
                            'blkcanvas'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
            </div><!-- .search-result-count -->
        </header><!-- .page-header -->


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
                get_template_part( 'template-parts/cards/card', '', array( 'card_class' => 'horizontal' , 'show_byline' => false, 'show_read_more' => false ) );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
