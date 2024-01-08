<?php
/*
Template Name: Single Workshop
*/


get_header(); ?>
	<?php while ( have_posts() ) : the_post();?>


	<section class="hero">
 			<div class="container">
 				<div class="row">
 					<div class="col-xs-12">
 						<div class="content">
 							<div class="text">
 								<h4>Workshop</h4>
 								<h1><?php echo the_title(); ?></h1>
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
				$image = get_field('thumbnail_image');
				if( !empty( $image ) ): ?>
				    <img class="img-responsive" src="<?php echo $image ?>"/>
				<?php endif; ?>
				</div>
				<div class="col-xs-12 col-lg-8">
					<div class="text">
						<?php echo the_field('main_description'); ?>
						<br>

						<span class="button">
							<a href="<?php echo the_field('book_now_url'); ?>" target="_blank">Book a Call to Get Started</a>
						</span>
					</div>
				</div>
			</div>		
		</div>
	</section>


	<?php			
	endwhile;
	?>
<?php get_footer(); ?>