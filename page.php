<?php


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

						<?php if( get_field('hero_headline') ) { ?>
							<h1><?php echo the_field('hero_headline'); ?></h1>
						<?php } else { ?>
							<h1><?php echo the_title(); ?></h1>
						<?php } ?>
						
						<?php echo the_field('hero_content'); ?>
					</div>	
				</div>
			</div>
		</div>
	</div>
</section>

<section class="wide-copy default">
	<div class="container">
		<div class="row">
			<div class="content">
				<div class="col-xs-12 col-lg-8">
					<div class="text">
						<?php echo the_field('main_content'); ?>
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