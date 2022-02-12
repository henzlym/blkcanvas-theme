
<?php $query_string = isset( $args['query_string'] ) ? ' ' . $args['query_string'] : ''; ?>
<?php query_posts( $query_string ); ?>
<div class="blkcanvas-template-2">
    <div class="archive-body vertical">
        <?php
        if ( have_posts() ) :

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

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div>
</div>