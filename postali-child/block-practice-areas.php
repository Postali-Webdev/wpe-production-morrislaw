<?php 
/** 
* Practice Areas List
*/
?>
<div id="practice-areas" data-cues="fadeIn" duration="1000">
    <?php 
    if ( is_tree(74) ) { // Berkeley Pages
        $args = array(
            'posts_per_page'         => '-1',
            'order'                  => 'DESC',
            'orderby'                => 'menu_order',
            'post_type'              => 'page',
            'tax_query'              => array(
                'relation' => 'OR',
                array(
                    'post_type'        => 'page',
                    'taxonomy'         => 'page_type',
                    'terms'            => 8,
                    'include_children' => true,
                ),
            )
        );
    } else {
        $args = array(
            'posts_per_page'         => '-1',
            'order'                  => 'DESC',
            'orderby'                => 'menu_order',
            'post_type'              => 'page',
            'tax_query'              => array(
                'relation' => 'OR',
                array(
                    'post_type'        => 'page',
                    'taxonomy'         => 'page_type',
                    'terms'            => 3,
                    'include_children' => true,
                ),
            )
        );
    }
    $query = new WP_Query($args);
    
    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post(); 
            $background_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
            $title = get_field('short_title');
            $ID = get_the_ID();
            $children = get_children($ID);
            ?>
            <div class="practice-area card" style="background-image: url('<?php echo $background_img[0]; ?>');">
                <div class="overlay">
                    <a href="<?php the_permalink(); ?>" title="Learn more about <?php echo $title; ?>"><h2><?php echo $title; ?></h2></a>
                    <div class="spacer-15"></div>
                    <div class="card_lower pa-<?php echo $ID; ?>">
                        <?php if ( ( !empty($children) ) ) { 
                            foreach ( $children as $child ) { 
                                $type = get_post_type($child);
                            } ?>
                            <span class="related">Related Topics:</span>
                            <div class="link-list">
                                <?php foreach ( $children as $child ) {
                                    $child_ID = $child->ID;
                                    $child_link = get_permalink($child_ID);
                                    $child_title = get_field('short_title', $child_ID);
                                ?>
                                    <span class="link-item">
                                        <a href="<?php echo $child_link; ?>" title="Learn more about <?php echo $child_title; ?>"><h3><?php echo $child_title; ?></h3></a>
                                    </span>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> 
        <?php endwhile;
    endif;
    wp_reset_postdata(); ?>
</div>