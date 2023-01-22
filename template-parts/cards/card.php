<?php $card_class = isset( $args['card_class'] ) ? ' ' . $args['card_class'] : ''; ?>
<?php $show_thumbnail = isset( $args['show_thumbnail'] ) ? $args['show_thumbnail'] : true; ?>
<?php $show_byline = isset( $args['show_byline'] ) ? $args['show_byline'] : true; ?>
<?php $show_author = isset( $args['show_author'] ) ? $args['show_author'] : true; ?>
<?php $show_date = isset( $args['show_date'] ) ? $args['show_date'] : true; ?>
<?php $show_tags = isset( $args['show_tags'] ) ? $args['show_tags'] : true; ?>
<?php $show_excerpt = isset( $args['show_excerpt'] ) ? $args['show_excerpt'] : true; ?>
<?php $show_read_more = isset( $args['show_read_more'] ) ? $args['show_read_more'] : true; ?>
<?php $thumbnail_class = isset( $args['thumbnail_class'] ) ? $args['thumbnail_class'] : ''; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('card' . $card_class ); ?>>
	
	<?php if( $show_thumbnail && has_post_thumbnail( get_the_ID() ) ): ?>
	<div class="entry-thumbnail"><?php blkcanvas_post_thumbnail( $thumbnail_class ); ?></div>
	<?php endif; ?>

	<header class="entry-header">

		<?php if( $show_tags ): ?>
		<span class="entry-categories"><?php the_category( "&nbsp;&nbsp;" ); ?></span>
		<?php endif; ?>

		<?php if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
		
		<?php if ( 'post' === get_post_type( get_the_ID() ) && $show_byline ) :?>
		<div class="entry-meta">
			<?php
			if ($show_author) {
				blkcanvas_posted_by();
			}
			if ($show_date) {
				blkcanvas_posted_on();
			}
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php if( $show_excerpt ): ?>

			<?php 
			if( $show_read_more ): 
				add_filter( 'wp_trim_excerpt', 'blkcanvas_excerpt_more' ); 
			endif; 
			?>
			
			<?php the_excerpt(); ?>

			<?php 
			if( $show_read_more ): 
				remove_filter( 'wp_trim_excerpt', 'blkcanvas_excerpt_more' ); 
			endif; 
			?>

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php if( is_singular() ): ?>
	<?php blkcanvas_content(); ?>
	<?php endif; ?>

	

</article><!-- #post-<?php the_ID(); ?> -->