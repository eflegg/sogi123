<li class="update-card slide">
    <div class="tab">

    </div>
    <div class="inner">
        <p class="post-date"><?php echo get_the_date();?></p>
        
        <h4 class="post-title">
            <?php the_title(); ?>
        </h4>
        <div class="content">
           <?php the_excerpt(); ?>
        </div>
            <span class="button">
                <a href="<?php the_permalink(); ?>">Learn More</a>
            </span>
    </div>
        
</li>