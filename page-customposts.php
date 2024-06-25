<?php
/*
Template Name: Posts - Custom
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">

<?php include 'components/hero.php'; ?>

    <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Questions Answered'):?>

	<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container custom-container">		
		<!-- list of questions -->
		<?php 
			$dataType = "question"; 
			$category = "Questions";
			$path = "components/cards/question-card.php";
			$postsPerPage = -1;
		
		include 'components/reusable-filter.php';
        include 'components/questions-block.php'; ?>
	</section>

    <?php else:?>

	<!-- list of resources -->
	<section style="background-color: #FFFCE3; position: relative;" class="has-filter-container section-container custom-container resources-page">
		<?php 
			$dataType = "resource"; 
			$category = "Resources";
			$path = 'components/cards/resource-card.php';
			$postsPerPage = -1;

		 include 'components/resource-filtersOLD.php';
		 ?>
		 <ul class="card-container">
			 <?php
			 echo do_shortcode('[ajax_load_more id="alm_4165885267" loading_style="grey" container_type="ul" css_classes="card-container" post_type="resource" posts_per_page="12" scroll="false" orderby="menu_order"]');
	         //include 'components/resources-block.php';
	         ?>
	     </ul>

<?php 
// get_the_posts_pagination( array(
//     'mid_size'  => 2,
//     'prev_text' => __( 'Back', 'textdomain' ),
//     'next_text' => __( 'Onward', 'textdomain' ),
// ) ); 
?>
		 </section>

    <?php endif; ?>

<?php include 'components/update-carouselNEWTRY.php';?>

</main>
<?php endwhile; ?>
<?php get_footer(); ?>