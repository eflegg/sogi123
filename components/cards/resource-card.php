


<li class="card square card-color">
    <div class="question--text">
        <h4 class="resource-title">
        <?php the_title(); ?>
</h4>
        <p><?php echo the_excerpt();?></p>
      
    
    <?php
    $category_out=array();
    $categories = get_the_category();?>
<?php
    foreach ($categories as $category_one) {
        if (empty(get_term_children($category_one->term_id,$category_one->taxonomy))){
        $category_out[] ='<li class="button btn--category">' .$category_one->name.'</li>';
        }
    }

    $category_out = implode( '', $category_out);
    
    ?>
<ul class="card--categories">
    <?php echo $category_out;?>
</ul>
<span class="continue-reading">
            <a href="<?php the_permalink(); ?>">Continue reading &#10142;</a>
        </span>


    </div>
        
</li>