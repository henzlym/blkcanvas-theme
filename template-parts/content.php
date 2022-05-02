<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blkcanvas
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
	<header class="entry-header">
		<span class="entry-categories"><?php the_category( "&nbsp;&nbsp;" ); ?></span>
		
		<?php if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
		
		<?php if ( 'post' === get_post_type() ) :?>
		<div class="entry-meta">
			<?php
			blkcanvas_posted_by();
			blkcanvas_posted_on();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php blkcanvas_post_thumbnail(); ?>
	
	<?php blkcanvas_content(); ?>

	<?php the_tags('<p class="entry-tags">Tags: ', ' ', '</p>'); ?>

	<?php 
	the_post_navigation(
		array(
			'class' => 'entry-pagination',
			'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'blkcanvas' ) . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'blkcanvas' ) . '</span> <span class="nav-title">%title</span>',
		)
	);
	?>

</article><!-- #post-<?php the_ID(); ?> -->
