<?php
/**
 * Case Results Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

 global $wp_query;
$total_pages = $wp_query->max_num_pages;

get_header(); ?>


<div class="page-content">

<div class="add-background" style="background-image: url('/wp-content/uploads/2022/03/case-results-hero.jpg');">
    <section class="page-header simple background-overlay">
        <div class="container breadcrumbs">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-66 center">
                    <h1>Case Results</h1>
                    <div class="spacer-120"></div>
                    <div class="spacer-90"></div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="main-content" id="blog-holder">
	<div class="container">
        <div class="columns">
            <div class="column-33 filter-wrapper">
                <div class="title-row">
                    <p class="yellow">Filter By</p>
                    <span class="clear-filters inactive">Clear Filters</span>
                </div>
                <div class="filters">
                    <p class="filter-btn" data-list="category-list">Category</p>
                    <div id="category-list" class="filter-list">
                        <?php 
                        $cat_arr = get_terms('results-category'); 

                        foreach( $cat_arr as $cat ) {
                            $cat_name = $cat->name;
                            $cat_slug = $cat->slug;
                            echo "<p class='filter-option' data-option='${cat_slug}'>${cat_name}</p>";
                        }
                        ?>
                    </div>
                    <?php /* <p class="filter-btn" data-list="date-list">Date</p>
                    <div id="date-list" class="filter-list">
                        <p class="filter-option" data-option="date-newest">Newest</p>
                        <p class="filter-option" data-option="date-oldest">Oldest</p>
                        <p class="filter-option" data-option="date-default">Default</p>
                    </div> */ ?>
                </div>
            </div>
            <div class="column-75">
                <div class="results-wrapper">
                    <?php while( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'block', 'result-card' ); ?>
                    <?php endwhile; 
                    wp_reset_postdata(); ?>
                </div>
                <?php if( $total_pages > 10 ) :?>
                    <p class="button ajax-load-more-btn">Load More</p>
                <?php endif; ?>
            </div>
        </div>
	</div>
</section>

<?php get_footer(); ?>