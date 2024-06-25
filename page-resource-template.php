<?php
/*
Template Name: Resource Page Template
*/

get_header();

?>

<main id="primary" class="site-main">
	<?php include 'components/hero.php'; ?>
	<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container custom-container resources-page">

		<?php get_template_part('components/apps/resource-app'); 
		?>
	</section>


<?php include 'components/update-carouselNEWTRY.php';?>
</main><!-- #main -->

<?php
get_footer();