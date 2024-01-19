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
        <?php include 'components/questions-block.php';?>

                <?php else:?>

                            <!-- list of resources -->

         <?php include 'components/resources-block.php';?>



    <?php endif;
	?>

 		<?php include 'components/update-carousel.php';?>

	
	<?php			
	endwhile;
	?>
<?php get_footer(); ?>