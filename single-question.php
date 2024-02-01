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
					<h2>I am the content and flexible content section</h2>
          </div>
         

</section>
 

<?php include 'components/update-carousel.php';?>





	<!-- <section class="intro-w-image">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-4">
					<?php 
				$image = get_field('thumbnail_image');
				if( !empty( $image ) ): ?>
				    <img class="img-responsive" src="<?php echo $image ?>"/>
				<?php endif; ?>
				</div>
				<div class="col-xs-12 col-lg-8">
					<div class="text">
						<?php echo the_content(); ?>

						<?php
						$featured_posts = get_field('author');
						if( $posts ): ?>
						    <?php foreach( $posts as $post ): 

						        // Setup this post for WP functions (variable must be named $post).
						        setup_postdata($post); ?>
						        <div class="author">
									<img src="<?php echo the_field('cropped_headshot'); ?>">
									<p>Written by <span class="author-name"><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></span></p>
								</div>
						    <?php endforeach; ?>
						    <?php 
						    // Reset the global post object so that the rest of the page works correctly.
						    wp_reset_postdata(); ?>
						<?php endif; ?>
												
					</div>
				</div>
			</div>		
		</div>
	</section> -->





	<?php			
	endwhile;
	?>
<?php get_footer(); ?>

