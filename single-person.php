<?php
/*
Template Name: Single Person
*/


get_header(); ?>
	<?php while ( have_posts() ) : the_post();?>


<?php 
$image = get_field('wide_portrait');
?>


		<section class="hero people-hero" style="background-image: url('<?php echo esc_url($image['url']); ?>">
			<img src="<?php echo esc_url($image['url']); ?>" class="img-responsive visible-xs visible-sm visible-md">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12">
 						<div class="content">
 							<div class="text">
 								<h4><?php echo the_field('role'); ?></h4>
 								<h1><?php echo the_title(); ?> <span class="pronouns"><?php echo the_field('pronouns'); ?></span></h1>
 								<p><?php echo the_field('intro_blip'); ?></p>
 								<div class="contact">
 									<?php echo the_field('contact'); ?>
 								</div>
 							</div>	
 						</div>
 					</div>
 				</div>
 			</div>
 		</section>

 		<section class="wide-copy">
 			<div class="container">
 				<div class="row">
 					<div class="content">
 						<div class="col-xs-12 col-lg-6">
	 						<div class="text">
	 							<?php echo the_field('main_content'); ?>
	 						</div>
	 					</div>
	 					<div class="col-xs-12 col-lg-5 col-lg-offset-1">
	 						<?php
							$featured_posts = get_field('linked_posts');
							if( $featured_posts ): ?>

								<div class="text pop-text">
		 							<h3>Perspectives:</h3>
		 							<ul>
		 								<?php foreach( $featured_posts as $post ): 

								        // Setup this post for WP functions (variable must be named $post).
								        setup_postdata($post); ?>
								        <li>
								            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								        </li>
								   		<?php endforeach; ?>

		 							</ul>
		 						</div>
								 

							    <?php 
							    // Reset the global post object so that the rest of the page works correctly.
							    wp_reset_postdata(); ?>
							<?php endif; ?>







	 						
	 					</div>
	 					
	 				</div>
 				</div>	
 			</div>
 		</section>















	<?php			
	endwhile;
	?>
<?php get_footer(); ?>