<?php
/**
 * Template Name: Meet the Team
 * @package Postali Child
 * @author Postali LLC
 */
get_header();
$title = get_the_title();
?>
<div class="page-content">

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<section class="page-header" style="background-image: url('<?php echo $image[0]; ?>')">
<?php endif; ?>
    <div class="container breadcrumbs">
	    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </div>
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="main-content" id="attorneys">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h3><?php the_field('intro_text_top'); ?></h3>
                <p><?php the_field('intro_text_bottom'); ?></p>
            </div>
            <div class="spacer-60"></div>
            <div class="column-full">


            <?php if( have_rows('attorneys') ): ?>
            <?php while( have_rows('attorneys') ): the_row(); ?>
                <?php $post_object = get_sub_field('attorney'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    
                    <div class="attorney-box">
                    <div class="box-img">
                    <?php 
                    $image = get_field('header_photo');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    </div>
                    <div class="box-content">
                        <?php $attorney_name = get_the_title(); ?>
                        <h2><?php echo $attorney_name; ?></h2>
                        <?php 
                        $firstname = $attorney_name;
                        $arr = explode(' ',trim($firstname));
                        ?>
                        <p class="title"><?php the_field('title'); ?></p>
                        <a href="<?php the_permalink(); ?>" class="button">Read <?php echo $arr[0]; ?>'s Bio</a>
                    </div>
                </div>

                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

</div>
<?php get_footer(); ?>