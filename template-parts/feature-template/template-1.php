
<?php $query_string = isset( $args['query_string'] ) ? ' ' . $args['query_string'] : ''; ?>
<?php query_posts( $query_string ); ?>
<div class="blkcanvas-template-1">
    <div class="main-card">
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
            get_template_part( 'template-parts/cards/card', get_post_type(), array( 'card_class' => 'horizontal feature-card', 'show_author' => false, 'show_thumbnail' => true ) );

        endwhile;

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
    </div>

    <?php rewind_posts(); query_posts( $query_string . '&offset=1&posts_per_page=3' ); ?>

    <div class="blkcanvas-template_archive columns">
        <div>
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
                get_template_part( 'template-parts/cards/card', '', array( 'card_class' => 'horizontal', 'show_thumbnail' => true, 'show_excerpt' => false, 'show_byline' => false  ) );
            endwhile;

            else :

            get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>
        
        <?php rewind_posts(); query_posts( $query_string . '&offset=4&posts_per_page=1' ); ?>

        <div>
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
                get_template_part( 'template-parts/cards/card', '', array( 'card_class' => 'feature-card', 'show_thumbnail' => true, 'show_excerpt' => false, 'show_byline' => false ) );
            endwhile;

            else :

            get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>
    </div>
</div>