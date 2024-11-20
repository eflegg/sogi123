<?php 
$current_lang = pll_current_language(); 
$featured_resources = $sidebarSettings['featured_resources'];
$custom_resources = $sidebarSettings['custom_resource_links'];
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
    <?php endforeach; endif;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata();

           // Check for custom resource links
if( $custom_resources ) {
    foreach( $custom_resources as $row ) { 
        $link = $row['custom_link']; ?>
        <li>
            <?php if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </li>
  <?php  }
}
     ?>

</ul>
   

     
    </div>