<?php
/**
 * Practice Area Landing
 * Template Name: Practice Area – Landing
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
?>

<div class="page-content">

<section class="page-header simple">
    <div class="container breadcrumbs">
	    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
    </div>
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <h1><?php the_field('header_title'); ?></h1>
                <p><?php the_field('header_intro'); ?></p>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <?php get_template_part('block', 'practice-areas'); ?>
    </div>
</section>

<?php get_footer(); ?>