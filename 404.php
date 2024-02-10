<?php


get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">
<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'https://picsum.photos/seed/picsum/1000';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>

<section class="section-container default-type">

<?php echo get_the_content();?>

<h2>Oops, nothing here</h2>

	<!-- <section class="wide-copy default">
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
	</section> -->

</section>
<?php include 'components/update-carousel.php'; ?>


	</main
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>