<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container">

			<!-- article -->
			<article class="row" id="post-404">
				<div class="col">

					<h1><?php _e( 'Page not found', 'blkcanvas' ); ?></h1>
					<p><strong>We're sorry, but that page could not be found.</strong></p>
					<h2 style="text-transform: none; font-size: 23px; margin-top: 20px;">Let us know</h2>
					<p>Expecting to see a different page?</p>
					<p>This might be because you have entered the web address incorrectly or the page has moved.</p>
					<p>Please <a href="mailto:#?subject=404 page not found" id="blkcanvas-error-notify">contact us</a> or visit our <a href="/">homepage</a>.</p>


					<h2>
						<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Return home?', 'blkcanvas' ); ?></a>
					</h2>
				</div>
			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
