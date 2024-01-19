<?php
/*
Template Name: Second Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php include 'components/hero.php'; ?>

<!-- does page title NOT = where support? 
  render sidebar and content 
  else 
  render support content  -->

 
  <?php
	$pageTitle = get_the_title();
	if($pageTitle === 'Where We Support'):?>
	<?php echo $pageTitle; ?>
	<section class="intro">
		<h2>Intro text</h2>
		<p>intro description</p>
	</section>
	<section class="province-list">
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
					<li class="childcell">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="thumbnail"><?php the_post_thumbnail( 'small-thumb' ); ?></div>
						<?php endif; ?>
						<div class="subpage-title"><?php the_title(); ?></div>
						<span class="desc"><?php echo get_post_meta( get_the_ID(), 'desc', true ); ?></span>
						<div class="subpage-excerpt"><?php the_excerpt(); ?></div>
						<a class="subpage-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">arrow icon</a>
						</li>
					<?php
				endforeach;
					wp_reset_postdata();
					?>
				</div>
			<?php endif; ?>
			</ul>
		</section>
		<?php else:?>
			<div class="page-container">
				<aside class="sidebar-container">
				<?php
					$sidebarType = 'resources';
						if($sidebarType && $sidebarType === "share") :?>
						<?php include "components/sidebars/share-sidebar.php"; ?>

							<?php elseif ($sidebarType && $sidebarType === "resources"):?>
						<?php include "components/sidebars/resource-sidebar.php"; ?>

						<?php elseif ($sidebarType && $sidebarType === "donate"):?>
						<?php include "components/sidebars/donate-sidebar.php"; ?>

						<?php else:?>
						<?php echo '<p>sidebar</p>'; ?>
						

					<?php endif; ?>
				</aside>
				<section class="flexible-content">
				<?php echo the_content(); ?>
					<h2>I am the content and flexible content section</h2>
				</section>
			</div>
	
	<?php endif;
	?>



	<!-- <?php
        $sidebarSettings = get_field('sidebar_settings');
        if ($sidebarSettings):?>
		<?php
		$sidebarType = $sidebarSettings['sidebar_type'];
			if($sidebarType && $sidebarType == "share") :?>
        	<?php include "components/sidebars/share-sidebar.php"; ?>

		  	<?php elseif ($sidebarType && $sidebarType == "resources"):?>
			<?php include "components/sidebars/share-resources.php"; ?>

			<?php elseif ($sidebarType && $sidebarType == "donate"):?>
			<?php include "components/sidebars/share-donate.php"; ?>

			<?php else:?>
			 <?php echo '<p>sidebar</p>'; ?>
			
		<?php endif; ?>
	<?php endif; ?> -->


		





<?php include 'components/update-carousel.php'; ?>






<?php			
	endwhile;
	?>
<?php get_footer(); ?>