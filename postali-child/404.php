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
            <div class="column-50 center">
                <div class="spacer-90"></div>
                <h1>404</h1>
                <div class="spacer-15"></div>
                <p>There seems to be a disconnect; we can’t find the page you’re looking for. Make sure you typed it in right, or you can go back to the homepage.</p>
                <div class="spacer-120"></div>
            </div>
        </div>
    </div>
</section>

</div>
<?php get_footer(); ?>