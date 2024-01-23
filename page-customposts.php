<?php
/*
Template Name: Posts - Custom
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

	<?php include 'components/hero.php'; ?>


    <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Questions Answered'):?>

        <!-- list of questions -->

		<?php 
			$dataType = "question"; 
			$category = "Questions";
			$path = "components/cards/question-card.php";
			?>
		<?php include 'components/reusable-filter.php';?>
        <?php include 'components/questions-block.php';?>

                <?php else:?>

                            <!-- list of resources -->
		<?php 
			$dataType = "resource"; 
			$category = "Resources";
			$path = 'components/cards/resource-card.php';
			
			?>
		<?php include 'components/reusable-filter.php';?>
         <?php include 'components/resources-block.php';?>



    <?php endif;
	?>

 		<?php include 'components/update-carousel.php';?>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>