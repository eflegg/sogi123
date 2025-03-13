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

		<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container custom-container">
			<!-- list of questions -->
			<?php
			$dataType = "question";
			$category = "Questions";
			$path = "components/cards/question-card.php";
			$postsPerPage = -1;

			include 'components/reusable-filter-questions.php';
			include 'components/questions-block.php'; ?>
		</section>

		<?php include 'components/update-carouselNEWTRY.php'; ?>

	</main>
<?php endwhile; ?>
<?php get_footer(); ?>