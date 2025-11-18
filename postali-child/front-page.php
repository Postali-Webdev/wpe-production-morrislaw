<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/
get_header(); 

if ( is_tree(74) ) { //berkeley 
    $phone_num = get_field('phone', 'options');
} else { //oakland/global
    $phone_num = get_field('phone_oakland', 'options');
}


$p1_img = get_field('p1_right_photo'); 
$p5_img = get_field('p5_image');
?>

<div class="page-content">

<section class="page-header">
    <div class="container">
        <div class="columns grid">
            <div class="column-50 slider">
                <div class="slideshow hp-slides image-one"></div>
                <div class="slideshow hp-slides image-two"></div>
                <div class="slideshow hp-slides image-three"></div>
            </div>
            <div class="column-50 content">
                <h1><?php the_field('header_right_h1'); ?></h1>
                <span class="headline"><?php the_field('header_right_title'); ?></span>
                <span class="headline_sub"><?php the_field('header_right_subtitle'); ?></span>
                <div class="spacer-15"></div>
                <p><?php the_field('header_right_intro'); ?></p>
                <div class="cta-holder">
                    <span class="cta">Call for a Free Consult</span>
                    <a href="tel:<?php echo $phone_num; ?>" class="button"><?php echo $phone_num; ?></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="panel1">
    <div class="container">
        <div class="columns">
            <div class="column-50">
                <div class="content-holder">
                    <h2><?php the_field('p1_title'); ?></h2>
                    <?php the_field('p1_upper'); ?>
                    <div class="spacer-30"></div>
                </div>
                <div class="quote-animation" data-cues="slideInUp" data-duration="1000">
                    <div class="quote-holder">
                        <div class="quote_left" style="background-image: url('/wp-content/uploads/2022/01/quotation-mark.svg');" alt="left quotation mark"></div>
                        <span class="quote"><?php the_field('p1_quote'); ?></span>
                        <div class="quote_right" style="background-image: url('/wp-content/uploads/2022/03/quotation-mark-end.svg');" alt="right quotation mark"></div>
                        <span class="quote_author"><?php the_field('p1_author'); ?></span>
                    </div>
                </div>
                <div class="content-holder">
                    <div class="spacer-30"></div>
                    <?php the_field('p1_lower'); ?>
                </div>
            </div>
            <div class="column-50">
                <img src="<?php echo esc_url($p1_img['url']); ?>" alt="<?php echo esc_attr($p1_img['alt']); ?>" data-cue="slideInUp" data-duration="1000"/>
            </div>
        </div>
    </div>
</section>

<section class="panel2">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p2_title'); ?></h2>
                <?php the_field('p2_content'); ?>
                <div class="spacer-30"></div>
                <div class="quote-holder" data-cues="slideInUp" data-duration="1000">
                    <span class="quote"><?php the_field('p2_quote'); ?></span>
                </div>
                <div class="content-holder">
                    <div class="spacer-30"></div>
                    <?php the_field('p2_lower'); ?>
                </div>
                <?php if( have_rows('p2_awards') ): ?>
                <div class="awards-block">
                <?php while( have_rows('p2_awards') ): the_row(); ?>  
                    <div class="award">
                    <?php 
                    $image = get_sub_field('award_image');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</section>

<section class="hp-videos">
    <div class="container">
        <div class="columns videos-header">
            <div class="column-75">
                <h2><?php the_field('video_panel_title'); ?></h2>
                <p><?php the_field('video_panel_subtitle'); ?></p>
            </div>
            <div class="column-25">
                <a href="https://www.tiktok.com/@sethmorrisdefense/" target="blank" class="button">More Videos</a>
            </div>
            <div class="spacer-30"></div>
        </div>
        <div class="columns videos">
        <?php if( have_rows('video_embed') ): $count = 0;?>
        <?php while( have_rows('video_embed') ): the_row(); $count++; ?>  
            <div class="column-33">
                <div class="tiktok-embed-wrapper" style="width: 100%;max-width:325px;min-width:325px;overflow:visible;max-height:525px;">

                    <?php
                    $video_id = get_sub_field('video');
                    $is_first = ($count === 1);
                    $autoplay = $is_first ? '1' : '0';
                    $muted = $is_first ? '1' : '0';
                    $loading_attr = $is_first ? 'eager' : 'lazy';
                    ?>
                    <iframe
                        src="https://www.tiktok.com/embed/v2/<?php echo esc_attr($video_id); ?>?autoplay=<?php echo $autoplay; ?>&muted=<?php echo $muted; ?>"
                        title="TikTok video"
                        <?php echo $is_first ? 'playsinline' : ''; ?>
                        loading="<?php echo $loading_attr; ?>"
                        allow="autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        scrolling="no"
                        style="display:block;width:100%;aspect-ratio:9/16;height:auto;border:0;overflow:hidden;">
                    </iframe>
                </div>
            </div>
        <?php endwhile; ?>
        <script async src="https://www.tiktok.com/embed.js"></script>
        <?php endif; ?> 
        </div>
    </div>
</section>

<section class="panel3 fixed-section" id="child-two-column">
    <div class="container">
        <div class="columns">
            <div class="column-50" id="child-page-anchor">
                <h2><?php the_field('p3_title'); ?></h2>
                <p><?php the_field('p3_intro'); ?></p>
            </div>
            <div class="column-50">
                <?php get_template_part('block', 'child-pages'); ?>
            </div>
        </div>
    </div>
</section>

<div class="section-overlay fixed-section-off">

<section class="panel4 scrollTarget" id="scroll-toggle">
    <div class="image-overlay">
        <div class="img-holder show-mobile">
            <div style="background-image: url('/wp-content/uploads/2022/01/homepage-jail-background.jpg')" class="img-static"></div>
        </div>
        <div class="container">
            <div class="columns">
                <div class="column-50 column-spacer">&nbsp;</div>
                <div class="column-50">
                    <h2><?php the_field('p4_title'); ?></h2>
                    <p><?php the_field('p4_intro'); ?></p>
                </div>  
            </div>
        </div>
        <?php if ( have_rows( 'p4_offenses' ) ): ?>
            <div class="container">
                <div class="columns offense-block">
                    <?php while ( have_rows( 'p4_offenses' ) ): the_row(); 
                        $label = get_sub_field('section_label');
                        $title = get_sub_field('section_title');
                        $content = get_sub_field('section_content');
                        $add_second = get_sub_field('include_2nd');
                        $title_two = get_sub_field('section_title_2');
                        $content_two = get_sub_field('section_content_2');
                        $add_list = get_sub_field('include_list');
                    ?>
                        <div class="column-50 offense-block_left">
                            <span class="spacer-60">&nbsp;</span>
                            <span class="label"><?php echo $label; ?></span>
                        </div> 
                        <div class="column-50 offense-block_right">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $content; ?></p>
                            <span class="spacer-15">&nbsp;</span>
                            <?php if ( ( $add_list == true ) && ( have_rows('numbered_list') ) ):
                                $i = 1; ?>
                                <div class="list-holder">
                                    <?php while ( have_rows('numbered_list') ): the_row(); ?>
                                        <div class="list">
                                            <span class="list_number">0<?php echo $i; ?></span>
                                            <p class="list_item"><?php the_sub_field('list_item'); ?></p>
                                        </div>
                                    <?php $i++;
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ( $add_second == true ): ?>
                                <h3><?php echo $title_two; ?></h3>
                                <p><?php echo $content_two; ?></p>
                            <?php endif; ?>
                        </div> 
                        <div class="spacer-60">&nbsp;</div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="img-holder show-desktop">
                <img src="/wp-content/uploads/2022/03/homepage-jail-background-1.jpg" class="fade-img scrollFade" id="fade-img-target" >
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="panel5" id="scroll-toggle-off">
    <div class="overlay">
        <div class="container">
            <div class="columns">
                <div class="column-50 center">
                    <div class="spacer-90"></div>
                    <div class="section-separator"><img src="/wp-content/uploads/2022/01/homepage-down-arrow.svg" alt="arrow pointing down" id="separator-icon"></div>
                    <div class="spacer-90"></div>
                    <div class="scroll-animation" data-cues="slideInUp" data-duration="1000">
                        <span class="big-text"><?php the_field('p5_title'); ?></span>
                        <a class="button" href="<?php the_field('p5_page_link'); ?>" title="Contact Seth Morris">Contact Him Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div> <!-- End page overlay -->

<section class="panel6">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <div class="spacer-90"></div>
                <h2><?php the_field('p6_title'); ?></h2>
                <p><?php the_field('p6_intro'); ?></p>
                <div class="spacer-15"></div>
            </div>
        </div>
    </div>
    <?php get_template_part('block', 'locations'); ?>
</section>

<section class="panel7">
    <div class="container">
        <div class="columns">
            <div class="column-50 center">
                <h2><?php the_field('p7_title'); ?></h2>
                <p><?php the_field('p7_content'); ?></p>
                <a class="button" href="<?php the_field('p7_page_link'); ?>" title="See All News Media">See All News Media</a>
            </div>
        </div>
    </div>
</section>

</div>

<?php get_footer();?>