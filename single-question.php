<?php 

get_header(); ?>

<section >
   

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <?php include 'components/hero.php'; ?>
        <h2>(single question template)</h2>
        <h1><?php the_title();?></h1>

        <?php include 'components/sidebars/sidebar-picker.php';?>


          
            <?php echo the_content(); ?>
        

        <?php endwhile; endif; ?>
        <!-- closing php loop -->

   <?php include 'components/update-carousel.php';?>
</section>
<?php get_footer(); ?>