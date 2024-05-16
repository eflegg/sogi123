


			
			
			<ul class="card-container">
	 				<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					    'post_type' => 'question',
					    'orderby' => 'menu_order',
					    'order' => 'ASC',
						'posts_per_page' => $postsPerPage,
						'paged' => $paged,
					);

					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			

					    <?php include 'cards/question-card.php';?>

					

					    <?php endwhile; ?>
						</ul>

						<?php
							$big = 999999999; // need an unlikely integer
							echo paginate_links( array(
							'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $the_query->max_num_pages
							) );
							?>

					    <?php wp_reset_postdata(); ?>

					<?php endif; ?>
						 			    
		