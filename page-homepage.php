<?php
/*
Template Name: Homepage
*/

get_header('home'); ?>
	<?php while ( have_posts() ) : the_post();
	?>

		<section class="hero home-hero">
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

 		<section class="director">
 			<div class="container">
 				<div class="directions-container">
 					<div class="direction" id="direction1">
 						<?php echo the_field('direction_1'); ?>
 						<span class="doodads" id="doodads1"></span>
 						<a href="<?php echo the_field('destination_1'); ?>" class="click-link"></a>
 					</div>
 					<div class="direction" id="direction2">
 						<?php echo the_field('direction_2'); ?>
 						<span class="doodads" id="doodads2"></span>
 						<a href="<?php echo the_field('destination_2'); ?>" class="click-link"></a>
 					</div>
 					<div class="direction" id="direction3">
 						<?php echo the_field('direction_3'); ?>
 						<span class="doodads" id="doodads3"></span>
 						<a href="<?php echo the_field('destination_3'); ?>" class="click-link"></a>
 					</div>
 				</div>
 			</div>
 		</section>

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

 		<section class="logo-soup">
 			<div class="container">
 				<div class="logo-cards">

 					<?php

					// Check rows exists.
					if( have_rows('client_logos') ):

					    // Loop through rows.
					    while( have_rows('client_logos') ) : the_row();

					        // Load sub field value.
					        $client_logo = get_sub_field('client_logo');
					        ?>

					        <div class="card fade-me">
		 						<img src="<?php echo $client_logo; ?>">
		 					</div>

					        <?php

					    // End loop.
					    endwhile;

					// No value.
					else :
					    // Do something...
					endif;

					?>
 				</div>
 			</div>
 		</section>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>