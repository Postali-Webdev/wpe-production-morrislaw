<?php
/**
 * Theme header.
 *
 * @package Postali Child
 * @author Postali LLC
**/
?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

<!-- Banner Preload -->
<?php if( is_page_template( ['page-about.php'] ) || is_singular(['attorneys']) ) : 
	$header_img = get_field('header_photo'); 
	if( $header_img ): ?>
		<link rel="preload" href="<?php echo $header_img['url'] . '.webp'; ?>" as="image" type="image/webp">
	<?php endif; ?>
<?php endif; ?>
<!-- /Banner Preload -->

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KNVXRDR');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
$global_schema = get_field('global_schema', 'options');
if( have_rows('location_schemas', 'options') ) {
    while( have_rows('location_schemas', 'options') ) {
        the_row();
        $location_page = get_sub_field('location_page');
        $location_schema = get_sub_field('location_schema');
        if( is_tree($location_page->ID) ) {
            if ( !empty($location_schema) ) {
                echo '<script type="application/ld+json">' . $location_schema . '</script>';
            }
        }
        else {
            if( !empty($global_schema) ) {
                echo '<script type="application/ld+json">' . $global_schema . '</script>';
            }                
        }
    }
}

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?><?php wp_footer(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if( is_front_page() ) : ?>
	<meta property="og:image" content="https://www.morrisdefense.com/wp-content/uploads/2022/03/homepage-hero-01-larger.jpg" />
<?php endif; ?>

<?php wp_head(); ?>

<!-- Meta Pixel Code --> <script> !function(f,b,e,v,n,t,s) {if(f.fbq)return;n=f.fbq=function(){n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)}; if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0'; n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s)}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('init', '669504755952425'); fbq('track', 'PageView'); </script> <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=669504755952425&ev=PageView&noscript=1" /></noscript> <!-- End Meta Pixel Code -->

</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KNVXRDR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<header>
	<div id="header-top" class="header-triangle">
		<div id="header-top_right">
			<div id="header-top_menu">
					<?php
						if ( is_tree(74) ) {
							$args = array(
								'container' => 'nav',
								'container_aria_label' => 'main navigation',
								'theme_location' => 'header-nav-berkeley'
							);
						} else {
							$args = array(
								'container' => 'nav',
								'container_aria_label' => 'main navigation',
								'theme_location' => 'header-nav'
							);
						}
						wp_nav_menu( $args );
					?>			
				<div id="header-top_mobile">
					<div id="menu-icon" class="toggle-nav">
						<span class="line line-1"></span>
						<span class="line line-2"></span>
						<span class="line line-3"></span>
					</div>
				</div>
			</div>
		</div>
		<div id="header-bottom" class="triangle-div">
			<?php the_custom_logo(); ?>
		</div>
	</div>
</header>

<a id="mini-logo" href="/" title="Back to Home"><img src="/wp-content/uploads/2022/01/logo-icon.svg" alt="Morris Law PC logo icon"/></a>

<div id="back-to-top">
	<a data-scroll href="#main-content" title="back to top">
		<span class="icon-form-dropdown-icon1">
			<svg xmlns="http://www.w3.org/2000/svg" width="29" height="45" viewBox="0 0 29 45">
			<g id="Group_922" data-name="Group 922" transform="translate(3164.562 -1080.75) rotate(90)">
				<line id="Line_13" data-name="Line 13" x2="28.25" transform="translate(1089.25 3150.062)" fill="none" stroke="#0AB4F3" stroke-width="2"/>
				<path id="Path_459" data-name="Path 459" d="M8142,3186.167h10v-9.976" transform="translate(-6899.793 6661.487) rotate(-45)" fill="none" stroke="#0AB4F3" stroke-width="2"/>
				<g id="Rectangle_669" data-name="Rectangle 669" transform="translate(1080.75 3135.562)" fill="none" stroke="#0AB4F3" stroke-width="2">
				<rect width="45" height="29" stroke="none"/>
				<rect x="1" y="1" width="43" height="27" fill="none"/>
				</g>
			</g>
			</svg>
		</span>
	</a>
</div>

<span id="main-content"></span>