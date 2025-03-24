<?php
/*
Template Name: Updates Page
*/
?>

<?php get_header(); ?>
<main id="main" class="site-main" role="main">
	<?php include 'components/hero.php'; ?>
	<div style="background-color: #6F46C3;">
		<section class="updates-page section-container custom-container">
			<?php get_template_part('components/apps/updates-app'); ?>

		</section>
	</div>
</main>

<?php get_footer(); ?>