<?php
/*
Template Name: Second Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php include 'components/hero.php'; ?>




<?php include 'components/update-carousel.php'; ?>






<?php			
	endwhile;
	?>
<?php get_footer(); ?>