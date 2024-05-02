<li class="resource-card square card-color">
  <a href="<?php the_permalink(); ?>">
    <div class="resource--text">
      <h4 class="resource-title">
          <?php the_title(); ?>
      </h4>
        <?php the_excerpt();?>
        
      <div class="continue-reading">
        Continue reading &#10142;
      </div>
    </div>  
  </a>  
</li>