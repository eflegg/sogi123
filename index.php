<?php get_header(); ?>
<main id="main" class="site-main" role="main">
<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_hot.jpg';
$heroHeadline = "Updates";
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>

<section class="updates-page section-container">
    <?php 
            $dataType = "post"; 
            $category = "Updates";
            $path = "components/cards/update-card.php";
            ?>
        <?php include 'components/reusable-filter.php';?>



    <div class="updates--inner">

 
        <ul class="card-container">
	 				<?php
					$args = array(
					    'post_type' => 'post',
					    'orderby' => 'menu_order',
					    'order' => 'ASC',
						'posts_per_page' => -1
					);

					$the_query = new WP_Query( $args ); ?>

					<?php if ( $the_query->have_posts() ) : ?>

					    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					    <?php include 'components/cards/update-card.php';?>

					    <?php endwhile; ?>

					    <?php wp_reset_postdata(); ?>

					<?php endif; ?>
						 			    
			</ul>
            </div>

            </section>
			

			</main>

<?php get_footer(); ?>