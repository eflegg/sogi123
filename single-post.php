<?php
/*
Template Name: Single Post
*/


get_header(); ?>
	<?php while ( have_posts() ) : the_post();?>

	<main id="main" class="site-main" role="main">

	<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_asexflag.jpg';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>


<?php
	$sidebarSettings = get_field('sidebar_settings');
	if ($sidebarSettings):?>
	<?php
		$sidebarType = $sidebarSettings['sidebar_type'];?>

<section class="container-with-sidebar section-container default-type <?php echo $sidebarType;?>">

      <aside class="sidebar-container">

	  <?php include 'components/sidebars/sidebar-picker.php';?>

              <?php endif; ?>
			

      </aside>

        <div class="flexible-content">
				<?php echo the_content(); ?>
				<?php include 'components/flexible-content/flexible-content.php';?>
          </div>
         

</section>
 



<?php include 'components/update-carouselNEWTRY.php';?>


</main>


	<?php			
	endwhile;
	?>
<?php get_footer(); ?>




