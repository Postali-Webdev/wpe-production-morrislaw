<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<section id="search-results" class="page-header">
    <div class="container">
        <div class="columns">
            <div class="column-75 center">
                <div class="spacer-120"></div>
                <div class="spacer-60"></div>
                <h1><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
                <diiv class="spacer-15"></div>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>

                        <div class="card result">
                            <h2>
                                <a href="<?php the_permalink();?>">
                                <?php the_title();?>
                                </a>
                            </h2>
                            <p><?php echo get_the_excerpt();?></p>
                        </div>

                    <?php endwhile; ?>

                    <?php get_template_part('partials/pagination', null, array('query'=>$wp_query )); ?>

                    <?php else : ?>

                        <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    <div class="spacer-90"></div>
    </div>
</section>

<?php get_footer();
