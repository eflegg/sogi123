<?php


get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
if(get_field('sig_colour') ):
	$colour = get_field('sig_colour');
endif;
?>
<?php include 'components/hero.php'; ?>

<section class="section-container default">

<?php echo get_the_content();?>

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


	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>