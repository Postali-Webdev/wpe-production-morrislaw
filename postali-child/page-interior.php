<?php
/**
 * Template Name: Interior
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
$title = get_the_title();
?>
<div class="page-content">

<section class="page-header">
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
                    <a href="tel:<?php the_field('phone', 'options'); ?>" class="button"><?php the_field('phone', 'options'); ?></a>
                    <a href="/contact/" class="button outline">Online Form</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-content" id="blog-holder">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div class="spacer-30 divider">&nbsp;</div>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

</div>
<?php get_footer(); ?>