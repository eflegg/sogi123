
<div class="three-by-container">
	 				<?php
					$args = array(
					    'post_type' => 'question',
					    'orderby' => 'menu_order',
					    'order' => 'ASC'
					);
					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					        <div>
								<span class="client">
									<?php the_title(); ?>
								</span>
								<div class="content">
									
									<span class="button">
										<a href="<?php the_permalink(); ?>">Learn More</a>
									</span>
								</div>
									
							</div>

					    <?php endwhile; ?>

					    <?php wp_reset_postdata(); ?>

					<?php endif; ?>
						 			    
				</div>