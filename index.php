<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();
	?>

	<?php include 'components/hero.php'; ?>


    <?php 
			$dataType = "post"; 
			$category = "Updates";
			$path = "components/cards/update-card.php";
			?>
		<?php include 'components/reusable-filter.php';?>

    <div class="filter"></div>

    <section class="updates">

    </section>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <a href=<?php the_permalink();?>>
           <h2><?php the_title() ;?></h2> 
           </a>
           <a href=<?php the_permalink();?>>
            <?php the_post_thumbnail(); ?> 
            <?php the_excerpt(); ?> 
        </a>
        <?php endwhile; else : ?> 
            <p><?php _e( 'No Posts To Display.' ); ?></p>
        <?php endif; ?> 


    <?php			
	endwhile;
	?>


<?php get_footer(); ?>