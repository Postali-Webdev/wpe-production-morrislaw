<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/

    $phone_num_berk = get_field('phone', 'options');
    $address_link_berk = get_field('address_link', 'options');
    $address_text_berk = get_field('address', 'options');
    $address_el_berk = "<p><strong>Berkeley Office</strong><br>PH: <a href='tel:{$phone_num_berk}' title='Call Today'>{$phone_num_berk}</a><br><a href='{$address_link_berk}' title='Get Directions' target='_blank'>{$address_text_berk}</a></p>";
    $phone_num_oak = get_field('phone_oakland', 'options');
    $address_link_oak = get_field('address_link_oakland', 'options');
    $address_text_oak = get_field('address_oakland', 'options');
    $address_el_oak = "<p><strong>Oakland Office</strong><br>PH: <a href='tel:{$phone_num_oak}' title='Call Today'>{$phone_num_oak}</a><br><a href='{$address_link_oak}' title='Get Directions' target='_blank'>{$address_text_oak}</a></p>";
    
?>


<footer>
    <div id="footer-tri" class="flip triangle-div remove">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="spacer-45">&nbsp;</div>
                    <div class="logo-holder">
                        <?php the_custom_logo(); ?>
                    </div>
                </div>
                <div class="spacer-60">&nbsp;</div>
                
                <div class="column-33">
                    <div class="menus">
                    <p><strong>Quick Links</strong></p>
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav-links'
                        );
						wp_nav_menu( $args );
					?>	
                    </div>
                    <div class="menus">
                    <p><strong>Practice Areas</strong></p>
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav-practice'
                        );
						wp_nav_menu( $args );
					?>	
                    </div>
                </div>
                <div class="column-66">
                    <div class="column-50">
                        <div class="contact-holder">
                            <div class="contact-holder_upper">
                                <div class="left">
                                    <p><strong>Berkeley Office</strong></p>
                                    <div class="map">
                                        <iframe title="Berkeley map" src="<?php echo esc_url( the_field('google_map', 'options') ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="right">
                                    
                                    <div class="spacer-15"></div>
                                    <p>PH: &nbsp; <a href='tel:<?php echo $phone_num_berk; ?>' title='Call Today'><?php echo $phone_num_berk; ?></a></p>
                                    <div class="spacer-15"></div>
                                    <p><a href="<?php echo $address_link_berk; ?>"><?php echo $address_text_berk; ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column-50">
                        <div class="contact-holder">
                            <div class="contact-holder_upper">
                                <div class="left">
                                    <p><strong>Oakland Office</strong></p>
                                    <div class="map">
                                        <iframe title="Oakland map" src="<?php echo esc_url( get_field('google_map_oakland', 'options') ); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="right">
                                    
                                    <div class="spacer-15"></div>
                                    <p>PH: &nbsp; <a href='tel:<?php echo $phone_num_oak; ?>' title='Call Today'><?php echo $phone_num_oak; ?></a></p>
                                    <div class="spacer-15"></div>
                                    <p><a href="<?php echo $address_link_oak; ?>"><?php echo $address_text_oak; ?></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer-30"></div>
                <div class="column-full">
                    <div class="social-media">
                        <a href="<?php the_field('facebook_link', 'options'); ?>" target="_blank" class="social-item"><span class="facebook"></span></a>
                        <a href="<?php the_field('instagram_link', 'options'); ?>" target="_blank" class="social-item"><span class="instagram"></span></a>
                        <a href="<?php the_field('linkedin_link', 'options'); ?>" target="_blank" class="social-item"><span class="linkedin"></span></a>
                        <a href="<?php the_field('youtube_link', 'options'); ?>" target="_blank" class="social-item"><span class="youtube"></span></a>
                        <a href="<?php the_field('tiktok_link', 'options'); ?>" target="_blank" class="social-item"><span class="tiktok"></span></a>
                    </div>
                    <p class="copyright">© <?php echo date("Y"); ?> Morris Law PC, A Criminal Defense Firm</p>
                    <?php if(is_page_template('front-page.php')) { ?>
                    <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag-reversed.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:10px auto 10px;"></a>
                    <?php } ?>
                </div>
                <div class="spacer-30">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="mobile-cta">
    <div class="container">
        <div class="columns">
            <div class="column-50"><a href="tel:<?php echo $phone_num_berk; ?>" title="Call Today"><?php echo $phone_num_berk; ?></a></div>
            <div class="column-50"><a href="/contact/" title="Contact Morris Law">Online Form</a></div>
        </div>
    </div>
</div>

</body>
</html>

<script>
scrollCue.init()
</script>

<script src="//blazeo.com/scripts/invitation.ashx?company=morrisdefense" async></script>