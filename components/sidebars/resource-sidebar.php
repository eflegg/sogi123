<?php 
$current_lang = pll_current_language(); 
$featured_resources = $sidebarSettings['featured_resources'];
?>

<div class="resources-sidebar <?php echo $sidebarType;?>">
    <div class="share--inner">
        <h3 class="resource-sidebar__title"><?php if($current_lang == 'fr'): echo 'Ressources en vedette'; else: echo 'Featured Resources'; endif; ?></h3>

<ul>
    <?php if($featured_resources): 
        foreach( $featured_resources as $post ): 

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach; endif;?>
    </ul>
    <?php 
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); ?>
       
     
    </div>