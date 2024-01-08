<?php
/*
Template Name: Service Area
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

 		<section class="intro-w-image">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12 col-lg-4">
 						<?php 
						$image = get_field('intro_image');
						if( !empty( $image ) ): ?>
						    <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
 					</div>
 					<div class="col-xs-12 col-lg-8">
 						<div class="text">
 							<?php echo the_field('intro_content'); ?>
 						
							<div class="client-types rule-list">
								<ul>

									<?php

									// Check rows exists.
									if( have_rows('service_particulars') ):

									    // Loop through rows.
									    while( have_rows('service_particulars') ) : the_row();

									        // Load sub field value.
									        $particular_title = get_sub_field('particular_title');
									        $particular_description = get_sub_field('particular_description');
									        
									        ?>
									        <li>
												<div>
													<h3><?php echo $particular_title; ?></h3>
												</div>
												<div>
													<p><?php echo $particular_description; ?></p>
												</div>
											</li>
									        <?php

									    // End loop.
									    endwhile;

									// No value.
									else :
									    // Do something...
									endif;?>
								</ul>
							</div>
						</div>
 					</div>
 				</div>		
 			</div>
 		</section>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>