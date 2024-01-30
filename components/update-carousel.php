
<section class="updates-section carousel-container">

<div class="carousel">



      <div class="prev nav-left controls">
      <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" viewBox="0 0 28 50" fill="none">
<path d="M25.6316 48.0286L2.99992 25.0143L25.6316 1.99996" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
</svg>

      </div>

<ul class="updates-carousel carousel-content">
<?php
        $args = array(
            'post_type' => 'post',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => -1,
        );

        $the_query = new WP_Query( $args ); ?>

        <?php if ( $the_query->have_posts() ) : ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php include 'cards/update-card.php';?>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

        </ul>

     <div class="next nav-right controls">
     <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" viewBox="0 0 28 50" fill="none">
<path d="M1.63184 2L24.2635 25.0143L1.63184 48.0286" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
</svg>
    
      </div>
      </div>

</section>