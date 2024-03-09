<?php
/*
Template Name: Second Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">

<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_cool.jpg';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>





 
  <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Where We Support'):?>
	<section style="background-color: #3D52B9;" class="section-container province-list">
		<div class="intro fade-me">
			<h2 ><?php the_field('where_we_support_title');?></h2>
			<p class="white"><?php the_field('where_we_support_intro');?></p>
		</div>
		<ul class="subpages--list custom-container">
			<?php
			global $post;
			$args = array(
				'parent'      => $post->ID,
				'post_type'   => 'page',
				'post_status' => 'publish'
			); 
			$children = get_pages( $args );

			if ( ! empty( $children ) ) :
				?>
				<!-- <div class="childcells">  -->
					<?php
					foreach ( $children as $post ) : setup_postdata( $post );
					?>

					<?php include 'components/child-page-block.php';?>

					<?php
				endforeach;
					wp_reset_postdata();
					?>
				<!-- </div> -->
			<?php endif; ?>
			</ul>
		</section>

		

		<?php else:?>

			<?php
        $sidebarSettings = get_field('sidebar_settings');
        if ($sidebarSettings):?>
		<?php
		$sidebarType = $sidebarSettings['sidebar_type'];?>
		<?php $parent = get_the_title( $post->post_parent ); ?>
<?php if($parent === "Where We Support"):?>
	<?php $typeColor = 'blue';?>
	<?php endif; ?>
	
			<section class="container-with-sidebar section-container default-type <?php echo $typeColor;?> <?php echo $sidebarType;?>">
				<aside class="sidebar-container">
				<?php include 'components/sidebars/sidebar-picker.php';?>

				<?php endif; ?>

				</aside>
				<div class="flexible-content">

					<?php echo the_content(); ?>


					<?php include 'components/flexible-content/flexible-content.php'; ?>



			

					</div>
			</section>
	
	<?php endif;
	?>



<?php include 'components/update-carouselNEWTRY.php';?>




</main>

<?php			
	endwhile;
	?>
<?php get_footer(); ?>


