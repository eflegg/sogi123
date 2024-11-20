<?php
/*
Template Name: Parent Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">

<?php 
// $bgImage = get_field('hero_image');
// $defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_cool.jpg';
// $heroHeadline = get_field('hero_headline');
// $heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>


	<section style="background-color: #3D52B9;" class="section-container province-list ">
	<div class="custom-container">

	
		<div class="intro fade-me">
			<h2><?php the_field('where_we_support_title');?></h2>
			<div class="white"><?php the_field('where_we_support_intro');?></div>
		</div>
		<ul class="subpages--list ">
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
			</div>
		</section>

<?php include 'components/update-carouselNEWTRY.php';?>

</main>

<?php			
	endwhile;
	?>
<?php get_footer(); ?>