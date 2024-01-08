<?php
/*
Template Name: Single Project
*/


get_header(); ?>
	<?php while ( have_posts() ) : the_post();?>


<?php 
$image = get_field('hero_image');
?>

 		<section class="project-hero" style="background-image: url('<?php echo esc_url($image['url']); ?>')">
			<img src="<?php echo esc_url($image['url']); ?>" class="img-responsive visible-xs visible-sm">
				<div class="content">
					<h1 style="background-image: url('<?php echo the_field('project_logo'); ?>');" class="image"><?php echo the_title(); ?></h1>
				</div>
 		</section> 


 		<section class="project-intro">
 			<div class="container">
				<div class="content">
					<div class="intro-text">
						<?php echo the_field('main_story'); ?>
					</div>
				
					<div class="services">
						

						<?php
						$featured_posts = get_field('related_services');
						if( $featured_posts ): ?>
							<h3>How We Helped</h3>
						    <ul>
						    <?php foreach( $featured_posts as $post ): 

						        // Setup this post for WP functions (variable must be named $post).
						        setup_postdata($post); ?>
						        <li>
						            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						        </li>
						    <?php endforeach; ?>
						    </ul>
						    <?php 
						    // Reset the global post object so that the rest of the page works correctly.
						    wp_reset_postdata(); ?>
						<?php endif; ?>


						<?php if( get_field('collaborators') ): ?>
						<div class="collaborators">
							<h3>Collaborators</h3>
							<?php echo the_field('collaborators'); ?>
						</div>
						<?php endif; ?>
						

					</div>
				</div>
 			</div>
 		</section>

 		<div class="first-flow" style="background-color: <?php echo the_field('sig_colour'); ?>">

			<?php 
			$images = get_field('first_flow');
			if( $images ): ?>
			    
			        <?php foreach( $images as $image ): ?>
			            
			                     <img src="<?php echo esc_url($image['sizes']['background-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-responsive fade-me" />
			                
			        <?php endforeach; ?>
			    
			<?php endif; ?>




		</div>
		
		<?php if( get_field('testimonial') ): ?>
			<section class="testimonial" style="background-color: <?php echo the_field('sig_colour'); ?>">
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

 		<div class="second-flow" style="background-color: <?php echo the_field('sig_colour'); ?>">
			<?php 
			$images = get_field('second_flow');
			if( $images ): ?>
			    
			        <?php foreach( $images as $image ): ?>
			            
			                     <img src="<?php echo esc_url($image['sizes']['background-image']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-responsive fade-me" />
			                
			        <?php endforeach; ?>
			    
			<?php endif; ?>
		</div>


	<?php			
	endwhile;
	?>
<?php get_footer(); ?>