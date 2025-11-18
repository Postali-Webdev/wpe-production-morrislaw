<div class="card">
    <h2><?php the_title(); ?></h2>
    <div class="cat-wrap">
        <span class="yellow"><?php the_field('category'); ?></span>
        <span class="date"><?php echo get_the_date('F j, Y'); ?></span>
    </div>
    <p><?php the_field('result'); ?></p>
</div> 