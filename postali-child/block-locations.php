<?php 
/** 
* Locations Block
*/
if ( have_rows('locations', 'options') ): ?>
<div class="container">
    <div id="locations" >
        <h3 class="section-title">Click a location in blue for more information.</h3>
    <?php while ( have_rows('locations', 'options') ):the_row(); 
        $county = get_sub_field('county');
        $include_link = get_sub_field('include_page_link');
        $county_link = get_sub_field('county_link');
        $include_towns = get_sub_field('include_towns'); 
    ?>
        <div class="county">
            <?php if ( $include_link == true ) { ?>
                <div class="county_title link">
                    <a class="loc-title" href="<?php echo $county_link; ?>" title="Learn More About <?php echo $county; ?> Criminal Defense"><h2><?php echo $county; ?> County</h2><span class="link-arrow_1"></span></a>
                </div>
            <?php } else { ?>
                <div class="county_title">
                    <h2 class="loc-title"><?php echo $county; ?> County</h2>
                </div>
            <?php } ?>
            <?php if ( ( $include_towns == true ) && ( have_rows('towns', 'options') ) ): ?>
                <div class="county_towns">
                    <?php while ( have_rows('towns', 'options') ):the_row(); 
                        $town = get_sub_field('town');
                        $include_sub_link = get_sub_field('include_subpage_link');
                        $town_link = get_sub_field('town_link');
                    ?>
                        <?php if ( $include_sub_link == true ) { ?>
                            <div class="towns link">
                                <a class="town-title" href="<?php echo $town_link; ?>" title="Learn More About <?php echo $town; ?> Criminal Defense"><h3><?php echo $town; ?></h3><span class="link-arrow_2"></span></a>
                            </div>
                        <?php } else { ?>
                            <div class="towns">
                                <h3 class="town-title"><?php echo $town; ?></h3>
                            </div>
                        <?php } ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>  
    <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>