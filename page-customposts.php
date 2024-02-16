<?php
/*
Template Name: Posts - Custom
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">

<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_hot.jpg';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>

	<?php include 'components/hero.php'; ?>


    <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Questions Answered'):?>

	<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container">

		
		<!-- list of questions -->
		
		<?php 
			$dataType = "question"; 
			$category = "Questions";
			$path = "components/cards/question-card.php";
			$postsPerPage = -1;
			?>
		<?php include 'components/reusable-filter.php';?>
        <?php include 'components/questions-block.php';?>
	</section>

                <?php else:?>

	<!-- list of resources -->
	<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container">

	
		<?php 
			$dataType = "resource"; 
			$category = "Resources";
			$path = 'components/cards/resource-card.php';
			
			?>

		<?php include 'components/resource-filters.php';?>
         <?php include 'components/resources-block.php';?>

		 </section>

    <?php endif;
	?>

<?php include 'components/update-carouselNEWTRY.php';?>

		 </main>
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>