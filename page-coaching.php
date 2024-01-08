<?php
/*
Template Name: Coaching
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
									if( have_rows('client_types') ):

									    // Loop through rows.
									    while( have_rows('client_types') ) : the_row();

									        // Load sub field value.
									        $client_type = get_sub_field('client_type');
									        $client_description = get_sub_field('client_description');
									        
									        ?>
									        <li>
												<div>
													<h3><?php echo $client_type; ?></h3>
												</div>
												<div>
													<p><?php echo $client_description; ?></p>
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


 		<section class="contained-image">
 			<div class="container">
 				<?php 
				$image = get_field('wide_graphic');
				if( !empty( $image ) ): ?>
				    <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
				<?php echo the_field('image_caption'); ?>
 			</div>
 		</section>

 		<section class="icon-grid">
 			<div class="container">
 				<h2>How We Work</h2>
 				<div class="grid">

 					<?php
					// Check rows exists.
					if( have_rows('approach_tiles') ):

					    // Loop through rows.
					    while( have_rows('approach_tiles') ) : the_row();

					        // Load sub field value.
					        $tile_title = get_sub_field('title');
					        $tile_description = get_sub_field('description');
					        $tile_icon = get_sub_field('icon');
					        
					        ?>
					        <div class="grid-item">
		 						<span class="icon" style="background-image: url('<?php echo $tile_icon; ?>');"></span>
		 						<div class="text">
		 							<h3><?php echo $tile_title; ?></h3>
		 							<p><?php echo $tile_description; ?></p>
		 						</div>
		 					</div>
					        <?php

					    // End loop.
					    endwhile;

					// No value.
					else :
					    // Do something...
					endif;?>
 				</div>
 			</div>
 		</section>
	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>