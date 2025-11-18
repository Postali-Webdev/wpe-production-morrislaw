<?php 
/**
 * Pre-Footer Block
 */
$global_title = get_field('global_pre-footer_title', 'options');
$global_content = get_field('global_pre-footer_content', 'options');
$image = get_field('global_pre-footer_image', 'options');
$pf_title = get_field('pre-footer_title');
$pf_content = get_field('pre-footer_content');

if ( is_tree(74) ) { //berkeley 
    $phone_num = get_field('phone', 'options');
} else { //oakland/global
    $phone_num = get_field('phone_oakland', 'options');
}

?>
<section id="pre-footer">
    <div class="container">
        <div class="columns">
            <div class="column-50 content">
                <div class="content_holder">
                    <?php if ( !empty($pf_title) ) { ?>
                        <h2><?php echo $pf_title; ?></h2>
                    <?php } else { ?>
                        <h2><?php echo $global_title; ?></h2>
                    <?php }

                    if ( !empty($pf_content) ) { ?>
                        <p><?php echo $pf_content; ?></p>
                    <?php } else { ?>
                        <p><?php echo $global_content; ?></p>
                    <?php } ?>
                    <div class="cta-holder">
                        <span class="cta">Call for a Free Consult</span>
                        <a href="tel:<?php echo $phone_num; ?>" class="button cta"><?php echo $phone_num; ?></a>
                        <?php if(is_tree('74')) { ?> <!-- berkeley -->
                        <a href="/berkeley/contact/" class="button outline cta">Online Form</a>
                        <?php } else { ?>
                        <a href="/contact/" class="button outline cta">Online Form</a>
                        <?php } ?>
                    </div>
                    <div class="spacer-120"></div>
                    <div class="spacer-120"></div>
                </div>
            </div>
            <div class="column-50 pre-footer-image placeholder">
                <div class="overlay">
                    <div class="spacer-120"></div>
                    <div class="spacer-120"></div>
                    <div class="spacer-120"></div>
                </div>
            </div>
        </div>
    </div>
</section>