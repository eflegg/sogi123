<li class="update-card-container  update-color  single-slide fade-me">
    <div class="update-card">
    <div class="tab">

    </div>
    <div class="inner">
        <p class="post-date"><?php echo get_the_date();?></p>
        
        <h4 class="post-title">
            <?php the_title(); ?>
        </h4>
        <div class="content">
           <?php the_excerpt(); ?>
           <a class="learn-button" href="<?php the_permalink(); ?>">Learn More</a>
        </div>
       
         
    </div>  
    </div>
</li>