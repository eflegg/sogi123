<?php
/*
Template Name: Perspectives
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
					$args = array(
					    'post_type' => 'post'
					);
					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					        <div class="tile">
								<span class="label">
									Perspective
								</span>
								<div class="content">
									<h3><?php echo the_title(); ?></h3>
									<span class="button">
										<a href="<?php the_permalink(); ?>">Learn More</a>
									</span>
								</div>
								<div class="tile-image" style="background-image: url('<?php the_field( 'thumbnail_image' ); ?>');"></div>
								<a class="click-link" href="<?php the_permalink(); ?>"></a>
							</div>

					    <?php endwhile; ?>

					    <?php wp_reset_postdata(); ?>

					<?php endif; ?>
						 				

							

					    
				</div>
			</div>
 		</section>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>