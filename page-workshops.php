<?php
/*
Template Name: Workshops
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

 		 <section class="image-tiles">
 			<div class="container">
	 			<div class="three-by-container">

	 				<?php
					$featured_posts = get_field('active_workshops');
					if( $featured_posts ): ?>

					    <?php foreach( $featured_posts as $post ): 

					        // Setup this post for WP functions (variable must be named $post).
					        setup_postdata($post); ?>

							<div class="tile">
								<span class="label">
									Workshop
								</span>
								<div class="content">
									<h3><?php echo the_field('high_blip'); ?></h3>
									<span class="button">
										<a href="<?php the_permalink(); ?>">Learn More</a>
									</span>
								</div>
								<div class="tile-image" style="background-image: url('<?php the_field( 'thumbnail_image' ); ?>');"></div>
								<a class="click-link" href="<?php the_permalink(); ?>"></a>
							</div>

					    <?php endforeach; ?>

					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
					<?php endif; ?>
				</div>
			</div>
 		</section>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>