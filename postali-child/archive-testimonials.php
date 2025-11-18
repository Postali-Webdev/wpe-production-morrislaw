<?php
/**
 * Client Reviews Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$avvo = '/wp-content/uploads/2022/01/review-icon-avvo.svg';
$facebook = '/wp-content/uploads/2022/01/review-icon-facebook.svg';
$google = '/wp-content/uploads/2022/01/review-icon-google.svg';
$yahoo = '/wp-content/uploads/2022/01/review-icon-yahoo.svg';
get_header(); ?>


<div class="page-content">

<div class="add-background" style="background-image: url('/wp-content/uploads/2022/01/client-reviews-hero.jpg');">
    <section class="page-header simple background-overlay">    
        <div class="container breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <h1>Client Reviews</h1>
                    <div class="spacer-120"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="main-content" id="blog-holder">
	<div class="container">
        <div class="card-holder masonry-root">
		<?php while( have_posts() ) : the_post(); 
            $source = get_field('source');
            if ( $source == 'Avvo' ) {
                $img = $avvo;
            } elseif ( $source == 'Facebook' ) {
                $img = $facebook;
            } elseif ( $source == 'Google' ) {
                $img = $google;
            } elseif ( $source == 'Yahoo' ) {
                $img = $yahoo;
            }
        ?>
            <div class="card banner masonry-cell">
                <div class="masonry-item">
                    <span class="quote-mark">
                        <img src="/wp-content/uploads/2022/03/quotation-mark-white.svg" alt="quotation mark">
                    </span>
                    <p><?php the_field('testimonial'); ?></p>
                    <span class="author yellow">– <?php the_field('author'); ?></span>
                    <?php if ( !empty($source) ) { ?>
                        <div class="review-img"><img src="<?php echo $img; ?>" alt="<?php echo $source; ?> logo and five stars"/></div>
                    <?php } else { ?>
                        <div class="spacer-30"></div>
                    <?php } ?>
                    <div class="spacer-45"></div>
                </div>
            </div> 
		<?php endwhile; 
		wp_reset_postdata(); ?>
        </div>
	</div>

	<div id="pagination">
        <?php
        $page_args = array(
            'prev_text'          => __("<img src='/wp-content/uploads/2022/01/pagination-arrow.svg' alt='previous button'>"),
            'next_text'          => __("<img src='/wp-content/uploads/2022/01/pagination-arrow.svg' alt='next button'>")
        );
        $pagination = get_the_posts_pagination($page_args);    
        echo $pagination;
        ?>
    </div>

</section>

<?php get_footer(); ?>