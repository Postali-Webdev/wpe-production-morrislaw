<?php
/**
 * Custom Testimonials 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_testimonials() {

// set up labels
	$labels = array(
 		'name' => 'Testimonials',
    	'singular_name' => 'Testimonial',
    	'add_new' => 'Add New Testimonial',
    	'add_new_item' => 'Add New Testimonial',
    	'edit_item' => 'Edit Testimonial',
    	'new_item' => 'New Testimonial',
    	'all_items' => 'All Testimonials',
    	'view_item' => 'View Testimonials',
    	'search_items' => 'Search Testimonials',
    	'not_found' =>  'No Testimonials Found',
    	'not_found_in_trash' => 'No Testimonials found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Testimonials',
    );
    //register post type
	register_post_type( 'Testimonials', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-format-quote',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'page-attributes'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'publicly_queryable' => true,
		'rewrite' => array( 'slug' => 'client-reviews', 'with_front' => false ),
		)
	);

}

add_action( 'init', 'create_custom_post_type_testimonials' );