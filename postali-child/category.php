<?php
/**
 * Category Archive
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>


<div class="page-content">

<section class="add-background" style="background-image: url('/wp-content/uploads/2022/03/resources-legal-blog.jpg');">
	<div class="page-header simple background-overlay">
		<div class="container breadcrumbs">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
		</div>
		<div class="container">
			<div class="columns">
				<div class="column-66">
					<h1><?php single_cat_title() ?></h1>
					<div class="spacer-60">&nbsp;</div>
					<?php get_template_part('block', 'category-select'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="main-content" id="blog-holder">
	<div class="container">
		<div id="card-holder">
			<?php while( have_posts() ) : the_post();
				$background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$title = get_the_title();
				$date = get_the_date();
				$ID = get_the_ID();
				$terms = get_the_terms($ID, 'category');
			?>
				<div class="practice-area card" style="background-image: url('<?php echo $background_img[0]; ?>');">
				<div class="overlay">
					<div class="card_upper post-data">
						<div class="left">
							<span class="label"><?php echo $date; ?></span>
						</div>
						<div class="right">
							<span class="label">Topic:</span>
							<div class="link-list">
								<?php if ( !empty($terms) ):
									foreach ( $terms as $term ) { ?>
									<span class="link-item">
										<a href="/blog/categories/<?php echo $term->slug; ?>/"><p><?php echo $term->name; ?></p></a>
									</span>
								<?php } 
								endif; ?>
							</div>
						</div>
					</div>
					<a class="highlight" href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h2><?php echo $title; ?></h2></a>
					<div class="spacer-15"></div>
                </div>
            </div>
			<?php endwhile; ?>
		</div>
	</div>

	<?php the_posts_pagination(); ?>

</section>

<?php get_footer(); ?>