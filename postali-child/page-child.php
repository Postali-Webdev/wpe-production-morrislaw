<?php
/**
 * Practice Area Child
 * Template Name: Practice Area – Child
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();

if ( is_tree(74) ) { //berkeley 
    $phone_num = get_field('phone', 'options');
} else { //oakland/global
    $phone_num = get_field('phone_oakland', 'options');
}

?>
<div class="page-content">

<?php if (is_page(137)) { // Criminal Court Process Page 
    $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
    <div class="add-background" style="background-image: url('<?php echo esc_attr( $background_img[0] ); ?>' );">
        <section class="page-header simple background-overlay">  
            <div class="container breadcrumbs">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            </div>
            <div class="container">
                <div class="columns">
                    <div class="column-50">
                        <h1><?php the_field('header_title'); ?></h1>
                    </div>
                    <div class="column-50">
                        <div class="intro">
                            <?php the_field('header_intro'); ?>
                        </div>
                        <div class="cta-holder">
                            <span class="cta">Call for a Free Consult</span>
                            <a href="tel:<?php echo $phone_num; ?>" class="button"><?php echo $phone_num; ?></a>
                            <a href="/contact/" class="button outline">Online Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
<?php } else { ?>
    <section class="page-header two-column">
        <div class="container breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h1><?php the_field('header_title'); ?></h1>
                </div>
                <div class="column-50">
                    <div class="intro">
                        <?php the_field('header_intro'); ?>
                    </div>
                    <div class="cta-holder">
                        <span class="cta">Call for a Free Consult</span>
                        <a href="tel:<?php echo $phone_num; ?>" class="button"><?php echo $phone_num; ?></a>
                        <a href="/contact/" class="button outline">Online Form</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<section class="main-content">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

</div>
<?php get_footer(); ?>