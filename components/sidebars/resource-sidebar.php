
<?php 
$featured_resources = $sidebarSettings['featured_resources'];?>

<div class="resources-sidebar <?php echo $sidebarType;?>">
    <div class="share--inner">
        <h3>Featured Resources</h3>



<ul>
    <?php foreach( $featured_resources as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>">- <?php the_title(); ?></a>
          
        </li>
    <?php endforeach; ?>
    </ul>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
       
     
    </div>