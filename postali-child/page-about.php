<?php
/**
 * Template Name: About
 * @package Postali Child
 * @author Postali LLC
**/
get_header();

$header_img = get_field('header_photo');
$p1_img = get_field('p1_photo');
?>

<div class="page-content">

<section class="page-header">
    <div class="banner-image">
        <?php echo wp_get_attachment_image( $header_img['id'], "full", false, ['class' => 'attorney-image'] ) ?>
        <div class="quote-holder" data-cues="slideInUp" data-duration="1000">
            <img class="quote_left" src="/wp-content/uploads/2022/01/quotation-mark.svg" alt="left quotation mark">
            <span class="quote"><?php the_field('header_quote'); ?></span>
            <img class="quote_right" src="/wp-content/uploads/2022/03/quotation-mark-end.svg" alt="right quotation mark">
        </div>
    </div>
  
    <div class="container">
        <div class="columns">
            <div class="column-50 placeholder">
            </div>
            <div class="column-50 content">
                <div class="content_holder">
                    <div class="spacer-15"></div>
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <div class="spacer-30"></div>
                    <span class="headline_sub"><?php the_field('header_subtitle'); ?></span>
                    <div class="spacer-15"></div>
                    <h1><?php the_field('header_title'); ?></h1>
                    <?php if( get_field('bio_intro') ) : ?>
                        <p><?php the_field('bio_intro'); ?></p>
                    <?php endif; ?>
                    <div class="cta-row">
                        <span class="cta">Call Today At</span>
                        <div class="buttons-wrap">
                            <a href="tel:<?php the_field('phone', 'options'); ?>" class="button"><?php the_field('phone', 'options'); ?></a>
                            <?php if(is_tree('74')) { ?> <!-- berkeley -->
                            <a href="/berkeley/contact/" class="button outline">Online Form</a>
                            <?php } else { ?>
                            <a href="/contact/" class="button outline">Online Form</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php the_field('p1_upper'); ?>
            </div>
        </div>
    </div>
    <div class="scroll-animation" data-cues="slideInUp" data-duration="1000">
        <div class="seperator-img" style="background-image: url('<?php echo $p1_img; ?>');"><div class="overlay">&nbsp;</div></div>
    </div>
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php the_field('p1_lower'); ?>
            </div>
        </div>
    </div>
</section>

<section class="panel2">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php if ( have_rows( 'p2_accordion' ) ): ?>
                    <div class="accordions" data-cues="fadeIn" data-duration="1000">
                        <?php while ( have_rows( 'p2_accordion' ) ): the_row(); ?>
                            <div class="accordions_title"><h3><?php the_sub_field('section_title'); ?>:</h3><span></span></div>
                            <div class="accordions_content">
                                <?php the_sub_field('section_content'); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

</div>

<?php get_footer();?>