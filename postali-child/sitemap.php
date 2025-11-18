<?php
/**
 * Template Name: Sitemap
 *
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); ?>


<section class="intro">
    <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
    </div>
</section>

<section class="page-header">
    <div class="container skinny">
        <div class="columns">
            <div class="column-50 center">
                <h1>Sitemap</h1>
            </div>
        </div>
        <div class="columns">
            <div class="column-50">
                <h2>Pages</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_list_pages("title_li=" ); ?>
                </ul> 
            </div>
            <div class="column-50">
                <h2>Blog Posts</h2> 
                <div class="spacer-30"></div>
                <ul>
                    <?php wp_get_archives('type=postbypost'); ?>
                </ul>
			</div>
        </div>
    </div>
</section>

<?php get_footer();