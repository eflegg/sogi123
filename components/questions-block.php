


			
			
			<ul class="card-container">
	 				<?php
					$args = array(
					    'post_type' => 'question',
					    'orderby' => 'menu_order',
					    'order' => 'ASC'
					);
					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					    <?php include 'cards/question-card.php';?>

					    <?php endwhile; ?>

					    <?php wp_reset_postdata(); ?>

					<?php endif; ?>
						 			    
			</ul>