<?php 
/**
* Template Name: Blank Page
* Template Post Type: post, page, projects
* @package WordPress
* @subpackage blkcanvaas
* @since Blkcanvas 1.0.0
*/

get_header('blank'); ?>

<main id="primary" class="site-main">

<?php
while ( have_posts() ) :
    the_post();

    the_content();

endwhile; // End of the loop.
?>

</main><!-- #main -->

<?php get_footer('blank'); ?>