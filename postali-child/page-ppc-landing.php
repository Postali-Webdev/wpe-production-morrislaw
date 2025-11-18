<?php
/*
Template Name: PPC Landing
*/

/* declare variables */
$headerText = get_field('header_text_color');
$benefitsBG = get_field('benefits_background_color');
$benefitsText = get_field('benefits_txt_color');
$testimonialsBG = get_field('testimonials_background_color');
$testimonialsText = get_field('testimonials_txt_color');
$aboutBG = get_field('about_background_color');
$aboutText = get_field('about_txt_color');
$aboutColumns = get_field('attorneys_panel_layout');
	if ($aboutColumns == '5050') {
		$column1 = "50";
		$column2 = "50";
	} elseif ($aboutColumns == '6633') {
		$column1 = "66";
		$column2 = "33";
	}
$awardsBG = get_field('awards_background_color');
$resultsBG = get_field('results_background_color');
$resultsText = get_field('results_txt_color');
$resultsCategory = get_field('results_category');
$ctaBG = get_field('cta_background_color');
$ctaText = get_field('cta_txt_color');
$pageFooterBG = get_field('page_footer_background_color');
$pageFooterText = get_field('page_footer_txt_color');
?>
<?php get_header(); ?>

<div class="ppc-landing content-container">

<?php $background_img = get_field('header_background_image'); ?>

	<section class="page-header" id="header" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
		<div class="container">
			<div class="columns">
                <div class="spacer-60 mobile-hide"></div>
				<div class="column-50 right" style="background-image:url(<?php echo esc_url($background_img['url']); ?>);">
					<div class="spacer-60"></div>
					<div class="spacer-120"></div>
					<div class="spacer-120"></div>
				</div>
				<div class="column-50 left">
					<h1><?php the_field('header_headline'); ?></h1>
                    <div class="spacer-15"></div>
					<p class="intro large" style="color:<?php echo $headerText; ?>  !important;"><?php the_field('header_value_proposition'); ?></p>
					<div class="spacer-30"></div>
					<p class="italic"><?php the_field('header_cta_text'); ?></p>
					<a class="button" href="tel:<?php the_field('header_cta_phone'); ?>" title="Call Today" class="button"><?php the_field('header_cta_phone'); ?></a>
				
                </div>
			</div>
		<div>
	</section>

	<section class="white wide benefits" id="panel1" style="background-color:<?php echo $benefitsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-full">
					<h2 style="color:<?php echo $benefitsText; ?>  !important;"><?php the_field('benefits_headline'); ?></h2>
                    <div class="spacer-30"></div>
                    <?php if( have_rows('benefits_repeater') ): ?>
                        <div class="benefits-list">
                            <?php while( have_rows('benefits_repeater') ) : the_row(); ?>
                                <div class="benefits-list_item">
                                    <h3><?php the_sub_field('benefit_title'); ?></h3>
                                    <p style="color:<?php echo $benefitsText; ?>  !important;"><?php the_sub_field('benefit_copy'); ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
				    <?php endif; ?>
                </div>
			</div>
		<div>
	</section>

	<section id="panel2" class="tan testimonials" style="background-color:<?php echo $testimonialsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-75">
                    <div class="testimonial left-border review">
                        <div class="spacer-15"></div>
                        <?php $logo_img = get_field('testimonial_logo'); ?>
                        <?php if( !empty( $logo_img ) ): ?>
                            <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>" class="testimonial-img" />
                        <?php endif; ?>
                        <h3><?php the_field('testimonials_headline'); ?></h3>
                        <p style="color:<?php echo $testimonialsText; ?>  !important;"><?php the_field('testimonial_copy'); ?></p>
                        <p class="small_caps testimonial_author" style="color:<?php echo $testimonialsText; ?>  !important;"><?php the_field('testimonial_author'); ?></p>
                    </div>
                </div>
			</div>
		<div>
	</section>

	<section id="panel3" class="white wide about" style="background-color:<?php echo $aboutBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-<?php echo $column1; ?>">
                	<h2 style="color:<?php echo $aboutText; ?>  !important;"><?php the_field('about_the_firm_headline'); ?></h2>
					<p style="color:<?php echo $aboutText; ?>  !important;"><?php the_field('about_the_firm_copy'); ?></p>
				</div>
				<div class="column-<?php echo $column2; ?>" id="attorney-img">
					<div class="attorney_blocks">
					<?php if( have_rows('attorneys_repeater') ): ?>
					<?php while( have_rows('attorneys_repeater') ) : the_row(); ?>
						<a class="headshot" href="<?php the_sub_field('attorney_page_link'); ?>">
							<?php $attorney_img = get_sub_field('attorney_image'); ?>
							<?php if( !empty( $attorney_img ) ): ?>
								<img src="<?php echo esc_url($attorney_img['url']); ?>" alt="<?php echo esc_attr($attorney_img['alt']); ?>" class="attorney-img" />
							<?php endif; ?>
						</a>
					<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</div>
		<div>
	</section>

    <?php if( have_rows('awards_repeater') ): //hide section if not using awards ?>
        <section id="awards" style="background-color:<?php echo $awardsBG; ?>">
            <div class="container">
                <div class="columns">
                    <div class="column-full">
                    <?php while( have_rows('awards_repeater') ) : the_row(); ?>
                    <?php $award_img = get_sub_field('award_image'); ?>
                        <?php if( !empty( $award_img ) ): ?>
                            <img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_attr($award_img['alt']); ?>" class="award-img" />
                        <?php endif; ?>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

	<section id="panel4" class="results tan" style="background-color:<?php echo $resultsBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-75">
                    <div class="result left-border">
                        <h3><?php the_field('results_headline'); ?></h3>
                        <p style="color:<?php echo $resultsText; ?>  !important;"><?php the_field('results_copy'); ?></p>
                    </div>
				</div>
			</div>
		</div>
	</section>

	<section class="teal wide footer-cta" id="panel5" style="background-color:<?php echo $ctaBG; ?>">
		<div class="container">
			<div class="columns">
				<div class="column-50 first">
					<h2 style="color:<?php echo $ctaText; ?>  !important;"><?php the_field('footer_value_proposition'); ?></p>
					<p style="color:<?php echo $ctaText; ?>  !important;"><?php the_field('footer_incentive_offer'); ?></p>
					<a class="button" href="tel:<?php the_field('footer_cta_phone'); ?>" title="Call Today"><?php the_field('footer_cta_phone'); ?></a>
				</div>
				<div class="column-50">
                    <div class="form-holder">
                        <p class="form-intro" style="color:<?php echo $ctaText; ?>  !important;"><?php the_field('form_cta_copy'); ?></p>
                        <?php $form = get_field('form_embed');
                            echo do_shortcode($form); 
                        ?>
                    </div>
				</div>
			</div>
		</div>
	</section>
</div>

<div id="footer-spacer" class="spacer-120"></div>
<div id="footer-spacer" class="spacer-120"></div>

<?php get_footer(); ?>