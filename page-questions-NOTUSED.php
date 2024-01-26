<?php
/*
Template Name: Questions
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

	<?php include 'components/hero.php'; ?>

 		 <section class="project-tiles">
 			<div class="container">
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

					        <div class="tile">
								<span class="client">
									<?php the_title(); ?>
								</span>
								<div class="content">
									
									<span class="button">
										<a href="<?php the_permalink(); ?>">Learn More</a>
									</span>
								</div>
									<?php $image = get_field('thumbnail_image'); ?>
								<div class="project-image" style="background-image: url('<?php echo $image ?>"></div>
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