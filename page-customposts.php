<?php
/*
Template Name: Posts - Custom
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
?>

	<?php include 'components/hero.php'; ?>


    <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Questions Answered'):?>

	<section style="background-color: #FFFCE3; position: relative;" class="question-container section-container">

		
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
		<section class="resource-container">

	
		<?php 
			$dataType = "resource"; 
			$category = "Resources";
			$path = 'components/cards/resource-card.php';
			
			?>
		<?php include 'components/reusable-filter.php';?>
         <?php include 'components/resources-block.php';?>

		 </section>

    <?php endif;
	?>

 		<?php include 'components/update-carousel.php';?>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>