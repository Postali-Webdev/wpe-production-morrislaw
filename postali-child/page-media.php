<?php
/**
 * Media Mentions Page
 * Template Name: Media Mentions
 * @package Postali Parent
 * @author Postali LLC
 */
$background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
get_header(); ?>

<div class="page-content">
    <div class="add-background" style="background-image: url('<?php echo esc_attr( $background_img[0] ); ?>' );">
        <section class="page-header simple background-overlay">
            <div class="container breadcrumbs">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-66 center">
                        <h1><?php the_field('header_title'); ?></h1>
                        <p><?php the_field('header_intro'); ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div class="spacer-15"></div>
                <div class="mentions-container">
                    <?php 
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $custom_query = new WP_Query(
                        array(
                            'post_type' => 'media_mentions',
                            'order'     => 'DESC',
                            'orderby' => 'meta_value_num date',
                            'meta_key'  => 'featured_mention',
                            'meta_query'    => [
                                ['featured_mention'  => 'true'],
                                ['featured_mention'  => 'false'],
                            ],
                            'offset'=> (($paged -1) * 10),  
                            'posts_per_page' => 10,
                        )
                    );

                    if ( $custom_query -> have_posts() ):
                    while($custom_query->have_posts()) : $custom_query->the_post(); 
                            $image = get_field('image');
                            $image_url = $image['url'];
                            $image_alt = $image['alt'];
                            $link = get_field('link');
                            $cta_text = get_field('cta_text');
                            $no_follow = get_field('add_no_follow');
                            $add_video = get_field('embed_video');
                            $video = get_field('video_script');
                        ?>		
                                <div class="media-mention">
                                    <?php 
                                        if ( !empty($image) && ($add_video == true) ) { ?>
                                            <div class="media-mention_image video">
                                                <a class="video-link" href="<?php echo esc_url($video); ?>" title="Watch Video" data-lity>
                                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                                                </a>
                                            </div> 
                                        <?php } else if ( !empty($image) ) { ?>
                                        <div class="media-mention_image">
                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" />
                                        </div>
                                    <?php } ?>
                                    <div class="media-mention_info">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                        <div class="desc"><?php the_content(); ?></div>
                                        <a class="mention-link" <?php echo ( $no_follow === true) ? "rel='nofollow'" : ''; ?> href="<?php echo $link; ?>" title="<?php the_title(); ?>" target="_blank"><?php echo $cta_text; ?> »</a>
                                    </div>
                                    <div class="spacer-30"></div>
                                </div> 
                                    <?php wp_reset_postdata(); ?>
                        <?php endwhile; ?>
                        </div>

                    <div id="pagination">
                        <?php function add_pagination($custom_query) {                    
                            $total_pages = $custom_query->max_num_pages;
                        
                            if ($total_pages > 1){
                                $current_page = max(1, get_query_var('paged'));
                        
                                echo paginate_links(array(
                                    'base' => get_pagenum_link(1) . '%_%',
                                    'format' => 'page/%#%/',
                                    'current' => $current_page,
                                    'total' => $total_pages,
                                    'prev_text'          => __("<img src='/wp-content/uploads/2022/01/pagination-arrow.svg' alt='previous button'>"),
                                    'next_text'          => __("<img src='/wp-content/uploads/2022/01/pagination-arrow.svg' alt='next button'>"),
                                ));
                            }
                        }
                        
                        add_pagination($custom_query); ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

</div><!-- #content -->

<?php get_footer();
