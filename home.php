<?php get_header(); ?>

<?php global $query_string; ?>
<main id="primary" class="site-main">

    <?php get_template_part( 'template-parts/feature-template/template', '1', array('query_string' => $query_string . '&posts_per_page=1' ) );?>

    <?php rewind_posts();?>

    <?php get_template_part( 'template-parts/feature-template/template', '2', array('query_string' => $query_string . '&offset=5&posts_per_page=4' ) );?>


</main><!-- #main -->

<?php get_footer(); ?>