<?php $query_string = isset( $args['query_string'] ) ? ' ' . $args['query_string'] : ''; ?>
<?php query_posts( $query_string . '&offset=3&posts_per_page=1' ); ?>
<div class="blkcanvas-template-3">
        <div class="archive-header">
            <h2>Category</h2>
            <a href="http://">See all Category</a>
        </div>
        <div class="archive-body">
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
                    get_template_part( 'template-parts/cards/card', get_post_type(), array( 'show_tags' => false, 'show_author' => false, 'show_date' => false, 'thumbnail_class' => '' ) );

                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            </div>

            <?php rewind_posts(); query_posts( $query_string . '&offset=3&posts_per_page=2' ); ?>

            <div class="secondary-card">
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
                    get_template_part( 'template-parts/cards/card', '', array( 'show_tags' => false, 'show_author' => false, 'show_date' => false ) );
                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
            </div>
        </div>
    </div>