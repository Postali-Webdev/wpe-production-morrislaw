<?php
/**
 * Single Post
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
$title = get_the_title();
$date = get_the_date();
$ID = get_the_ID();
$terms = get_the_terms($ID, 'category');


foreach( $terms as $category ) {
    $category_id = $category->term_id;
    echo $category_id;
}

$args = [
    'posts_per_page'    => 3,
    'category'          => $category_id,
    'post__not_in' => array( $post->ID ),
    'sort_order' => 'desc'
];
$featured_posts = get_posts($args);
$post_count = count($featured_posts);

?>
<div class="page-content">

<section class="page-header">
    <div class="container breadcrumbs">
	    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </div>
    <div class="container">
        <div class="columns">
            <div class="column-75 center">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="main-content" id="blog-holder">
    <div class="container">
        <div class="columns">
            <div class="column-33 sticky-column">

                <div class="floating-contact">
                    <div class="row">
                        <div class="left">
                            <img src="/wp-content/uploads/2022/01/blog-seth-morris-head.png" alt="Headshot of Attorney Seth Morris"/>
                        </div>
                        <div class="right">
                            <p>Attorney Seth Morris</p>
                        </div>
                    </div>
                    <div class="row">
                        <p class="cta">Contact Today At</p>
                        <a href="tel:510-225-9955" class="button">510-225-9955</a>
                    </div>
                    <div class="row">
                        <a href="/contact/">Online Form</a>
                    </div>
                </div>

            </div>
            <div class="column-50">
                <div class="post-data">
                    <div class="left">
                        <span class="label"><?php echo $date; ?></span>
                    </div>
                    <div class="right">
                        <span class="label">Topic:</span>
                        <div class="link-list">
                            <?php foreach ( $terms as $term ) { ?>
                                <span class="link-item">
                                    <a href="/blog/categories/<?php echo $term->slug; ?>/"><p><?php echo $term->name; ?></p></a>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="post-data author">
                    <p>Written by Attorney Seth Morris</p>
                </div>
                <div class="spacer-30 divider">&nbsp;</div>
                <?php the_content(); ?>
                <div class="spacer-30">&nbsp;</div>
            </div>
        </div>
        <?php if( $featured_posts ) : ?>
        <div class="columns">
            <div class="column-full">
                <div class="related-posts">
                    <div class="columns">
                        <div class="column-50 center">
                            <h2>Related Blog Posts</h2>
                        </div>
                    </div>
                    <div class="featured-blogs-container grid-<?php echo ( $post_count < 1 ? 3 : $post_count ); ?>">
                        <?php foreach ($featured_posts as $post) {
                            $post_title = get_the_title();
                            $post_link = get_permalink($post->ID);
                            $image = get_the_post_thumbnail_url($post->ID) ? get_the_post_thumbnail_url($post->ID) : '/wp-content/uploads/2022/06/morris-blog-What-is-the-Difference-Between-an-Acquittal-and-Not-Guilty.jpg';
                            ?>
                            <a href="<?php esc_html_e($post_link); ?>" class="related-post">
                                <h4><?php esc_html_e($post_title); ?></h4>
                                <img src="<?php esc_html_e($image)?>" alt="">
                            </a>
                        <?php } ?>            
                    </div>    
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

</div>
<?php get_footer(); ?>