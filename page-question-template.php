<?php
/*
Template Name: Questions Page Template 
*/

get_header(); ?>
<?php while (have_posts()) : the_post();
?>

	<main id="main" class="site-main" role="main">

		<?php include 'components/hero.php'; ?>

		<?php
		$pageTitle = get_the_title(); ?>

		<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container custom-container resources-page">
			<?php get_template_part('components/apps/question-app'); ?>
		</section>

		<?php include 'components/update-carouselNEWTRY.php'; ?>

	</main>
<?php endwhile; ?>
<?php get_footer(); ?>