<?php
/*
Template Name: How We Help
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

		<section class="hero">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12">
 						<div class="content">
 							<div class="text">
 								<h4><?php echo the_field('hero_superheadline'); ?></h4>
 								<h1><?php echo the_field('hero_headline'); ?></h1>
 								<?php echo the_field('hero_content'); ?>
 							</div>	
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>

 		<?php if( get_field('testimonial') ): ?>
			<section class="testimonial">
	 			<div class="container">
	 				<div class="cards-container">
	 					<div class="card">
	 						<div class="quote">
	 							<h3><?php echo the_field('testimonial'); ?></h3>
	 						</div>
	 						<div class="attribution">
	 							<img src="<?php echo the_field('testimonial_headshot'); ?>">
	 							<div class="text">
	 								<?php echo the_field('testimonial_attribution'); ?>
	 							</div>
	 						</div>
	 					</div>
	 				</div>
	 			</div>
	 		</section>
		<?php endif; ?>

 		<section class="list-stack">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12 col-xl-9">
						<ul>

							<?php
							$featured_posts = get_field('service_areas');
							if( $featured_posts ): ?>

							    <?php foreach( $featured_posts as $post ): 

							        // Setup this post for WP functions (variable must be named $post).
							        setup_postdata($post); ?>

							        <li class="item">
										<div class="item-content">
											<div class="heading">
												<h3><?php echo the_title(); ?></h3>
											</div>	
											<div class="text">
												<p><?php echo the_field('high_blip'); ?></p>
											</div>
										</div>
										<span class="hover-background" style="background-color:<?php the_field( 'sig_colour' ); ?>"></span>
										<span class="doodads"></span>
										<span class="click-link"><a href="<?php the_permalink(); ?>">Learn More</a></span>
									</li>
							    <?php endforeach; ?>

							    <?php 
							    // Reset the global post object so that the rest of the page works correctly.
							    wp_reset_postdata(); ?>
							<?php endif; ?>




							
						</ul>	
					</div>
				</div>
 			</div>
 		</section>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>