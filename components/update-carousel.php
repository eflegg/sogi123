
<section class="updates-section carousel-container">

<div class="carousel">



      <div class="prev nav-left controls">
<=
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
        =>
      </div>
      </div>

</section>