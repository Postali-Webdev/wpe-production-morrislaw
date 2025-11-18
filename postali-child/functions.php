<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
    require_once dirname( __FILE__ ) . '/includes/media-mentions-cpt.php'; // Custom Post Type Media Mentions
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php';
	//require_once dirname( __FILE__ ) . '/includes/social-share.php'; // Social Media Sharing


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css

		wp_register_style( 'icomoon-font', 'https://cdn.icomoon.io/152819/MorrisLaw/style-cf.css?s87iu9 rel=stylesheet', array() );
		wp_enqueue_style('icomoon-font');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery')); 
		wp_enqueue_script('custom-scripts');

		// Lightbox pop-up modal
		wp_register_script('lightbox-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery')); 
		wp_enqueue_script('lightbox-scripts');

		// scrollCue library
		wp_register_style( 'scrollcue-styles', get_stylesheet_directory_uri() . '/assets/css/scrollCue.css');
		wp_enqueue_style( 'scrollcue-styles' );

		wp_register_script( 'scrollcue-js', get_stylesheet_directory_uri() . '/assets/js/scrollCue.min.js', array('jquery') );
		wp_enqueue_script( 'scrollcue-js' );	


		if ( is_page_template( 'front-page.php' ) ) {
			// Home Page Javascript			
			wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
			wp_enqueue_script('home-js');	
		}

		if ( is_page_template( 'page-parent.php' ) ) {
			// Parent Page Javascript			
			wp_register_script('parent-js', get_stylesheet_directory_uri() . '/assets/js/parent.min.js', array('jquery'));
			wp_enqueue_script('parent-js');	
		}

		// These scripts should be conditionally enqueued only on page templates where they are needed

		// Modernizr
		wp_register_script('modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.min.js', array('jquery'));
		wp_enqueue_script('modernizr');
		wp_register_script('modernizr-custom', get_stylesheet_directory_uri() . '/assets/js/modernizr-custom.js', array('jquery'));
		wp_enqueue_script('modernizr-custom');

		// Smooth Scroll
		wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
		wp_enqueue_script('smooth-scroll');
		//wp_register_script('smooth-scroll-settings', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-settings.min.js', array('jquery'));
		//wp_enqueue_script('smooth-scroll-settings');

        // Fitvids
        //wp_register_script('fitvids', get_stylesheet_directory_uri() . '/assets/js/fitvids.min.js',array('jquery'), null, true); 
		//wp_enqueue_script('fitvids');

		// Featherlight JS Call 
		// wp_register_script('featherlight-js', get_stylesheet_directory_uri() . '/assets/js/featherlight.min.js', array('jquery'));
		// wp_enqueue_script('featherlight-js');

		// initialize ajax scripts   page-results-reviews.php
		if ( is_post_type_archive( 'results' ) ) {
			wp_register_script( 'ajax-script', get_stylesheet_directory_uri() . '/assets/js/ajax-scripts.min.js', array('jquery') );
			wp_localize_script( 'ajax-script', 'ajax_filter_results', array('ajaxurl' => admin_url( 'admin-ajax.php' )));
			wp_enqueue_script( 'ajax-script' );
		}

	}

    //Remove Gutenberg Block Library CSS from loading on the frontend
    function remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
    } 
    add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

	function ajax_filter_results_by_category() {
		$filterArr = $_POST['filter'] ? $_POST['filter'] : 0;
		global $wp_query;

		if( $filterArr ) {
			$tax_query = [
				[
					'taxonomy'			=>	'results-category',
					'field'				=>	'slug',
					'terms'	=> $filterArr
				]
			];
		} else {
			$tax_query = [];
		}

		$args = [
			'post_type'			=>	'results',
			'post_status'		=>	'publish',
			'posts_per_page'	=>	10,
			'tax_query'			=> $tax_query
		];
		$filtered_query = new WP_Query($args);
		
		$response = '';
		if( $filtered_query->have_posts() ) {
			while( $filtered_query->have_posts() ) {
				$filtered_query->the_post();
				$response .= get_template_part('block', 'result-card');
			}
		} 
		echo $response;
		wp_die();
	} 
	add_action('wp_ajax_nopriv_filter_results_by_category', 'ajax_filter_results_by_category');
	add_action('wp_ajax_filter_results_by_category', 'ajax_filter_results_by_category');

	function ajax_results_pagination() {
		$filterArr = $_POST['filter'] ? $_POST['filter'] : 0;
		$offset = $_POST['offset'] ? $_POST['offset'] : 0;
		global $wp_query;

		if( $filterArr ) {
			$tax_query = [
				[	
					'taxonomy'			=>	'results-category',
					'field'				=>	'slug',
					'terms'	=> $filterArr
				]
			];
		} else {
			$tax_query = [];
		}

		$args = [
			'post_type'			=>	'results',
			'post_status'		=>	'publish',
			'posts_per_page'	=>	10,
			'offset'			=> 	$offset,
			'tax_query'			=> $tax_query
		];
		$paginated_query = new WP_Query($args);
		
		$response = '';
		if( $paginated_query->have_posts() ) {
			while( $paginated_query->have_posts() ) {
				$paginated_query->the_post();
				$response .= get_template_part('block', 'result-card');
			}
		} else {
			$response = 'end-of-results';
		}
		
		echo $response;
		wp_die();

	}
	add_action('wp_ajax_nopriv_load_results_pagination', 'ajax_results_pagination');
	add_action('wp_ajax_load_results_pagination', 'ajax_results_pagination');








	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
				'footer-nav-practice' => __( 'Footer Navigation - Practice Areas', 'postali' ),
                'footer-nav-links' => __( 'Footer Navigation - Quick Links', 'postali' ),
				'header-nav-berkeley' => __( 'Header Navigation – Berkeley', 'postali'),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Search Bar to Top Nav
	function mainmenu_navsearch($items, $args) {

		if ($args->theme_location == 'header-nav') {

			ob_start();
			?>
			<li class="menu-item menu-item-search search-holder">
				<span tabindex="0" class="menu-item-search_icon">
					<img src="/wp-content/uploads/2022/01/icon-search.svg" alt="search icon" class="search-icon" id="search-open">
					<img src="/wp-content/uploads/2022/02/plus-icon.svg" alt="close field icon" class="search-icon hide" id="search-close">
				</span>
				<span class="menu-item-search_bar hide">
					<?php echo get_search_form(); ?>
				</span>
			</li>

			<?php
			$new_items = ob_get_clean();

			$items .= $new_items;
		}

		return $items;
	}

	add_filter('wp_nav_menu_items', 'mainmenu_navsearch', 10, 2);

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Blocks',
			'menu_title'    => 'Global Blocks',
			'menu_slug'     => 'global_blocks',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-site', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Contact Info',
			'menu_title'    => 'Contact Info',
			'menu_slug'     => 'contact-info',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-index-card', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Locations',
			'menu_title'    => 'Locations',
			'menu_slug'     => 'locations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-store', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Schema',
			'menu_title'    => 'Schema',
			'menu_slug'     => 'schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

	}

	// Register Custom Taxonomy
	function page_type_tax() {

		$labels = array(
			'name' => 'Page Types',
			'singular_name' => 'Page Type',
			'menu_name' => 'Page Types',
			'all_items' => 'Page Types',
			'parent_item' => 'Parent Page Type',
			'parent_item_colon' => 'Parent Page Type:',
			'new_item_name' => 'New Page Type',
			'add_new_item' => 'Add New Page Type',
			'edit_item' => 'Edit Page Type',
			'update_item' => 'Update Page Type',
			'view_item' => 'View Page Type',
			'separate_items_with_commas' => 'Separate page types with commas',
			'add_or_remove_items' => 'Add or remove page types',
			'choose_from_most_used' => 'Choose from the most used page types',
			'popular_items' => 'Popular Page Types',
			'search_items' => 'Search Page Types',
			'not_found' => 'Page Type Not Found',
			'no_terms' => 'No page types',
			'items_list' => 'Page type list',
			'items_list_navigation' => 'Page type list navigation',
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_in_rest' => true,
			'show_tagcloud' => false,
		);

		register_taxonomy('page_type', array('page'), $args);
	}

	add_action('init', 'page_type_tax', 0);

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');


	// Widget Logic Conditionals
	function is_child($parent) {
		global $post;
			return $post->post_parent == $parent;
		}
		
		// Widget Logic Conditionals (ancestor) 
		function is_tree( $pid ) {
		global $post;
		
		if ( is_page($pid) )
		return true;
		
		$anc = get_post_ancestors( $post->ID );
		foreach ( $anc as $ancestor ) {
			if( is_page() && $ancestor == $pid ) {
				return true;
				}
		}
		return false;
	}

	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	function klf_acf_input_admin_footer() { ?>
	<script type="text/javascript">
	(function($) {

	acf.add_filter('color_picker_args', function( args, $field ){

	// add the hexadecimal codes here for the colors you want to appear as swatches
	args.palettes = ['#ffffff', '#ffde8a', '#0AB4F3', '#137CB8', '#2C2C2C', '#000000']

	// return colors
	return args;

	});

	})(jQuery);
	</script>

	<?php }

	add_action('acf/input/admin_footer', 'klf_acf_input_admin_footer');

function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 1; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

?>