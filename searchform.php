<!-- search -->
<form class="search" method="get" action="<?php echo esc_url( home_url() ); ?>" role="search">
	<div class="input-group">
		<input class="search-input" type="search" name="s" placeholder="<?php _e( 'Enter search term...', 'blkcanvas' ); ?>">
		<button class="search-submit overlay" type="submit" role="button" aria-label="Search Button">Search</button>
        <button class="search-close" type="button" role="button" aria-label="Search Close Button">X</button>
	</div>
	<button class="search-trigger" type="button" role="button" aria-label="Search Button"><?php get_template_part('template-parts/svg/search'); ?></button>
</form>
<!-- /search -->