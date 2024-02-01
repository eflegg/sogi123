<?php
/*
Template Name: Single Post
*/


get_header(); ?>
	<?php while ( have_posts() ) : the_post();?>

	<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
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
 

<?php include 'components/update-carousel.php';?>









	<?php			
	endwhile;
	?>
<?php get_footer(); ?>

