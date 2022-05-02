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
	
	<?php if( is_singular() ): ?>
	<?php blkcanvas_content(); ?>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
