<?php
/*
Template Name: Single Question
*/


get_header(); ?>
<?php while (have_posts()) : the_post(); ?>


	<main id="main" class="site-main" role="main">

		<?php
		$bgImage = get_field('hero_image');
		$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_transflag.jpg';
		$heroHeadline = get_field('hero_headline');
		$heroContent = get_field('hero_content');
		?>
		<?php include 'components/hero.php'; ?>


		<?php
		$sidebarSettings = get_field('sidebar_settings');
		if ($sidebarSettings): ?>
			<?php
			$sidebarType = $sidebarSettings['sidebar_type']; ?>

			<section class="container-with-sidebar section-container default-type <?php echo $sidebarType; ?>">

				<aside class="sidebar-container">

					<?php include 'components/sidebars/sidebar-picker.php'; ?>

				<?php endif; ?>


				</aside>

				<div class="flexible-content">
					<?php if ($current_lang === 'fr'): ?>
						<h2>Notre réponse</h2>
					<?php else: ?>
						<h2>Our Answer:</h2>
					<?php endif; ?>
					<?php echo the_content(); ?>
					<?php include 'components/flexible-content/flexible-content.php'; ?>
				</div>


			</section>
			<section class="questions-getting section-container">
				<div class="inner custom-container">
					<div class="left fade-me">
						<h3 class="">Related Questions</h3>
						<?php if ($current_lang == 'fr'): ?>
							<a href='<?php echo home_url('/notre-travail/les-reponses-a-vos-questions/'); ?>' class="view-all fade-me">Voir tout <span class="arrow">&rarr;</span></a>
						<?php else: ?>
							<a href='<?php echo home_url('/our-work/questions-answered'); ?>' class="view-all fade-me">View all <span class="arrow">&rarr;</span></a>
						<?php endif; ?>

					</div>
					<div class="right">
						<?php include 'components/related-questions.php'; ?>
					</div>
				</div>
			</section>

			<?php include 'components/update-carouselNEWTRY.php'; ?>


	</main>



<?php
endwhile;
?>
<?php get_footer(); ?>