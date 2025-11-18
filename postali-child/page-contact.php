<?php
/**
 * Template Name: Contact
 * @package Postali Parent
 * @author Postali LLC
 */
get_header();
?>

<div class="page-content">

<section class="page-header">
    <div class="container">
        <div class="columns">
            <div class="column-50 left">
                <div class="overlay">
                    <div class="breadcrumbs">
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    </div>
                    <h1><?php the_title(); ?></h1>

                    <?php if (is_page('740')) { ?>

                    <div class="address-info">
                        <a class="address" href="<?php the_field('address_link', 'options'); ?>" title="Get Directions" target="_blank"><?php the_field('address', 'options'); ?></a>
                        <a class="directions" href="<?php the_field('directions', 'options'); ?>" title="Get Directions" target="_blank">Get Directions</a>
                    </div>
                    <div class="hours-info">
                    <p><?php the_field('hours', 'options'); ?></p>
                    </div>
                    <a class="email" href="mailto:<?php the_field('email', 'options'); ?>" title="Email Morris Law"><?php the_field('email', 'options'); ?></a>
                    <div class="spacer-15"></div>
                    <a href="tel:<?php the_field('phone', 'options'); ?>" class="button phone"><?php the_field('phone', 'options'); ?></a>

                    <?php } else { ?>

                    <div class="address-info">
                        <a class="address" href="<?php the_field('address_link_oakland', 'options'); ?>" title="Get Directions" target="_blank"><?php the_field('address_oakland', 'options'); ?></a>
                        <a class="directions" href="<?php the_field('directions_oakland', 'options'); ?>" title="Get Directions" target="_blank">Get Directions</a>
                    </div>
                    <div class="hours-info">
                    <p><?php the_field('hours_oakland', 'options'); ?></p>
                    </div>
                    <a class="email" href="mailto:<?php the_field('email_oakland', 'options'); ?>" title="Email Morris Law"><?php the_field('email_oakland', 'options'); ?></a>
                    <div class="spacer-15"></div>
                    <a href="tel:<?php the_field('phone_oakland', 'options'); ?>" class="button phone"><?php the_field('phone_oakland', 'options'); ?></a>

                    <?php } ?>
                    <div class="spacer-120"></div>
                </div>
            </div>
            <div class="column-50 right">
                <span class="form-intro">Please send us a message using our contact form. Messages are monitored 24 hours a day, 7 days a week.</span>
                <?php $form = get_field('contact_form', 'options');
                echo do_shortcode($form); ?>
            </div>
        </div>
        <div class="chevron-map triangle-div map">
            <?php if (is_page('740')) { ?>
                <iframe title="Berkeley map" src="<?php echo esc_url( the_field('google_map', 'options') ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php } else { ?>
                <iframe title="Oakland map" src="<?php echo esc_url( get_field('google_map_oakland', 'options') ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php } ?>
        </div>
    </div>
</section>

</div>

<?php get_footer(); ?>