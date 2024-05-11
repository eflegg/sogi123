<li class="update-card-container  update-color  single-slide">
<a class="card-link" href="<?php the_permalink(); ?>">
    <div class="update-card">
          
            <div class="tab"></div>
            <div class="inner">
                <p class="post-date"><?php echo get_the_date();?></p>
                <h4 class="post-title">
                    <?php the_title(); ?>
                </h4>
                <?php the_excerpt(); ?>
                <div class="content">
                <p class="learn-button" >Learn More</p>
                </div>
            </div>  

        </div>
</a>
    </li>