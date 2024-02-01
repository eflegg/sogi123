<?php
/*
Template Name: Second Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
?>
<?php include 'components/hero.php'; ?>


<?php
$sidebarType = 'donate';
?>


 
  <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Where We Support'):?>
	<section style="background-color: #3D52B9;" class="section-container province-list">
		<div class="intro">
			<h2>Intro text</h2>
			<p class="white">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci.</p>
		</div>
		<ul class="subpages--list">
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
				<div class="childcells"> 
					<?php
					foreach ( $children as $post ) : setup_postdata( $post );
					?>

					<?php include 'components/child-page-block.php';?>

					<?php
				endforeach;
					wp_reset_postdata();
					?>
				</div>
			<?php endif; ?>
			</ul>
		</section>
		<?php else:?>

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
					<h2>I am the content and flexible content section</h2>
						</div>
						</section>
	
	<?php endif;
	?>



<?php include 'components/update-carousel.php'; ?>






<?php			
	endwhile;
	?>
<?php get_footer(); ?>


