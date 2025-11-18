<?php
/**
 * Practice Area Parent
 * Template Name: Practice Area – Parent
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); 

$background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

if ( is_tree(74) ) { //berkeley 
    $phone_num = get_field('phone', 'options');
} else { //oakland/global
    $phone_num = get_field('phone_oakland', 'options');
}

?>

<div class="page-content">

<section class="page-header one-column" style="background-image: url('<?php echo esc_attr( $background_img[0] ); ?>' );">
    <div class="page-header_overlay">
        <div class="container breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-75 center">
                    <div class="spacer-60">&nbsp;</div>
                    <h1><?php the_field('header_title'); ?></h1>
                    <p><?php the_field('header_intro'); ?></p>
                    <div class="cta-holder">
                        <span class="cta">Call for a Free Consult</span>
                        <a href="tel:<?php echo $phone_num; ?>" class="button"><?php echo $phone_num; ?></a>
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
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p1_title'); ?></h2>
                <?php the_field('p1_content'); ?>
            </div>
        </div>
    </div>
</section>

<section class="panel2">
    <div class="panel2_overlay">
        <div class="container">
            <div class="columns">
                <div class="column-75 center">
                    <div class="scroll-animation" data-cue="slideInUp" data-duration="1000">
                        <div class="quote-holder">
                            <img class="quote_left" src="/wp-content/uploads/2022/01/quotation-mark.svg" alt="left quotation mark">
                            <span class="quote"><?php the_field('p2_quote'); ?></span>
                            <img class="quote_right" src="/wp-content/uploads/2022/03/quotation-mark-end.svg" alt="right quotation mark">
                        </div>
                        <span class="quote_author"><?php the_field('p2_author'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $childpages = get_pages('child_of=' . $post->ID); 
$addcharges = get_field( 'p3_add_charges' );
if ( ( count($childpages) > 0 ) || ( !empty($addcharges) ) ) { ?>
    <section class="panel3 fixed-section" id="child-two-column">
        <div class="container">
            <div class="columns">
                <div class="column-50" id="child-page-anchor">
                    <h2><?php the_field('p3_title'); ?></h2>
                    <p><?php the_field('p3_intro'); ?></p>
                </div>
                <div class="column-50">
                    <?php get_template_part('block', 'child-pages'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="panel3">
            <div class="container">
                <div class="columns">
                    <div class="column-50 center">
                        <h2><?php the_field('p3_title'); ?></h2>
                        <p><?php the_field('p3_intro'); ?></p>
                    </div>
                </div>
            </div>
        </section>
<?php } ?>

<section class="panel4 fixed-section-off">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <?php $p4title = get_field('p4_title'); 
                    if ( !empty($p4title) ): ?> 
                    <h2><?php echo $p4title; ?></h2>
                <?php endif; ?>
                <?php the_field('p4_content'); ?>
            </div>
        </div>
    </div>
</section>

<?php $add_panel = get_field('p5_option');
if ( $add_panel == true ): ?>
<section class="panel5">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p5_title'); ?></h2>
                <p><?php the_field('p5_intro'); ?></p>
            </div>
            <div class="column-full center horizontal-list">
                <?php if ( have_rows('p5_classification') ): ?>
                    <div class="classification" data-cues="slideInUp" data-duration="1000">
                        <?php while ( have_rows('p5_classification') ): the_row(); ?>
                            <div class="classification_box">
                                <h4><?php the_sub_field('section_title'); ?></h4>
                                <p><?php the_sub_field('section_content'); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="column-50 center">
                <p><?php the_field('p5_description'); ?></p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="panel6">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h2><?php the_field('p6_title'); ?></h1>
                <?php the_field('p6_content'); ?>
            </div>
            <div class="column-50 placeholder" data-cue="slideInUp" data-duration="1000"></div>
        </div>
    </div>
</section>

</div>

<?php get_footer(); ?>