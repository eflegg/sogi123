<?php
/*
Template Name: About Us
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
						</div>
 					</div>
 				</div>		
 			</div>
 		</section>

 		 <section class="people-cards">
 			<div class="container">
 				<div class="cards-container">

 					<?php
					$featured_posts = get_field('people_cards');
					if( $featured_posts ): ?>
					    
					    <?php foreach( $featured_posts as $post ): 

					        // Setup this post for WP functions (variable must be named $post).
					        setup_postdata($post); ?>

					        <div class="card">
								<img src="<?php the_field( 'cropped_headshot' ); ?>">
								<div class="text">
									<div class="title">
										<h3><?php the_title(); ?></h3>
										<h4><?php the_field( 'role' ); ?></h4>
									</div>
									<p><?php the_field( 'intro_blip' ); ?></p>
									<span class="button"><a href="<?php the_permalink(); ?>">Dig Deeper</a></span>
								</div>
								<a href="<?php the_permalink(); ?>" class="click-link"></a>
							</div> 

					    <?php endforeach; ?>
					    
					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
					<?php endif; ?>
 				</div>
 			</div>
 		</section>

 		<section class="contained-image">
 			<div class="container">
 				<?php 
				$image = get_field('place_image');
				if( !empty( $image ) ): ?>
				    <img class="img-responsive" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>
				<?php echo the_field('image_caption'); ?>
 			</div>
 		</section>

 		<section class="wide-copy">
 			<div class="container">
 				<div class="row">
 					<div class="content">
 						<div class="col-xs-12 col-lg-8">
	 						<div class="text">
	 							<?php echo the_field('values_intro'); ?>
	 							<div class="values rule-list">
									<ul>
										<?php

										// Check rows exists.
										if( have_rows('values') ):

										    // Loop through rows.
										    while( have_rows('values') ) : the_row();

										        // Load sub field value.
										        $client_type = get_sub_field('value_title');
										        $client_description = get_sub_field('value_description');
										        
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
	 					<div class="col-xs-12 col-lg-4">
	 						<div class="text pop-text">
	 							<?php echo the_field('pop_text'); ?>
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