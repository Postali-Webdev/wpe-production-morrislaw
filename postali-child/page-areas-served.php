<?php
/**
 * Areas Served
 * Template Name: Areas Served
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
$background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>

<div class="page-content">

<div class="add-background" style="background-image: url('<?php echo esc_attr( $background_img[0] ); ?>' );">
    <section class="page-header simple background-overlay">    
        <div class="container breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <h1><?php the_field('header_title'); ?></h1>
                    <p><?php the_field('header_intro'); ?></p>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="panel0">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <?php the_field('intro_copy'); ?>
            </div>
            <div class="column-50">
                <?php if( get_field('county_map') ) : $map_img = get_field('county_map'); ?>
                    <img src="<?php echo $map_img['url']; ?>" alt="<?php echo $map_img['alt']; ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <?php get_template_part('block', 'locations'); ?>
</section>

<?php get_footer(); ?>