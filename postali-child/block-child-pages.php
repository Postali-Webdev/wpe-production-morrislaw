<?php 
/** 
* Child Pages
*/
?>
<div id="child-pages" data-cues="fadeIn" data-duration="1000">
    <?php if ( is_page(14) ) { // Homepage – list first-level practice areas
        $pa_args = array(
            'posts_per_page'    =>  '-1',
            'order'             =>  'ASC',
            'orderby'           =>  'menu_order',
            'post_type'         =>  'page',  
            'hierarchical'      =>  'true',              
            'tax_query'         =>  array(
                array(
                'taxonomy'  => 'page_type',
                'field'     => 'slug',
                'terms'     => 'practice-area',
                )
            ),
        );
        $pa_query = new WP_Query($pa_args);
        
        if ($pa_query->have_posts()):
            while ($pa_query->have_posts()): $pa_query->the_post(); 
                $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                $title = get_field('short_title');
                ?>
                <div class="practice-area card homepage" style="background-image: url('<?php echo $background_img[0]; ?>');">
                    <a href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h2><?php echo $title; ?></h2></a>
                    <div class="card_lower">
                        <p><?php the_field('page_excerpt'); ?></p>
                    </div>
                </div> 
            <?php endwhile;
        endif;
        wp_reset_postdata();
    } else if ( is_page(74) ) { // Homepage – list first-level practice areas
        $pa_args = array(
            'posts_per_page'    =>  '-1',
            'order'             =>  'ASC',
            'orderby'           =>  'menu_order',
            'post_type'         =>  'page',  
            'hierarchical'      =>  'true',                 
            'tax_query'         =>  array(
                array(
                'taxonomy'  => 'page_type',
                'field'     => 'slug',
                'terms'     => 'practice-area-berkeley',
                )
            ),
        );
        $pa_query = new WP_Query($pa_args);
        
        if ($pa_query->have_posts()):
            while ($pa_query->have_posts()): $pa_query->the_post(); 
                $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                $title = get_field('short_title');
                ?>
                <div class="practice-area card homepage" style="background-image: url('<?php echo $background_img[0]; ?>');">
                    <a href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h2><?php echo $title; ?></h2></a>
                    <div class="card_lower">
                        <p><?php the_field('page_excerpt'); ?></p>
                    </div>
                </div> 
            <?php endwhile;
        endif;
        wp_reset_postdata();
    
    } else if ( is_page(610) ) { // Hide boxes where they shouldn't appear ?>
        <div class="spacer-30"></div>
    <?php } else { // Practice Area Parent – list 2nd level practice areas
        $ID = get_the_ID();
        $children = get_children($ID);
        foreach ( $children as $child ) {
            $child_ID = $child->ID;
            $child_link = get_permalink($child_ID);
            $child_title = get_field('short_title', $child_ID);
            $child_intro = get_field('page_excerpt', $child_ID);
        ?>
            <div class="practice-area card">
                <a href="<?php echo $child_link; ?>" title="Learn more about <?php echo $child_title; ?>"><h3><?php echo $child_title; ?></h3></a>
                <div class="card_lower">
                    <p><?php echo $child_intro; ?></p>
                </div>
            </div> 
        <?php } 
        // Add additional charges
        if ( have_rows( 'p3_add_charges' ) ) :
            while ( have_rows( 'p3_add_charges' ) ) : the_row(); 
                $charge_title = get_sub_field('section_title');
                $charge_intro = get_sub_field('section_content');
            ?>
            <div class="practice-area card">
                <h3><?php echo $charge_title; ?></h3>
                <div class="card_lower">
                    <p><?php echo $charge_intro; ?></p>
                </div>
            </div> 
            <?php endwhile;
        endif;
    } ?>
</div>