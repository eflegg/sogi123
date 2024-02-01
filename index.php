<?php get_header(); ?>
<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
if(get_field('sig_colour') ):
	$colour = get_field('sig_colour');
endif;
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
			
<!-- 
            <?php while ( have_posts() ) : the_post();
	?>
    <?php			
	endwhile;
	?> -->


<?php get_footer(); ?>