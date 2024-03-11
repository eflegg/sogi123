<?php
/*
Template Name: Top Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>


<main id="main" class="site-main" role="main">
<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'http://sogi123.local/wp-content/uploads/2024/02/banner_hot.jpg';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>

<section class="top-level-section section-container">
    <div class="custom-container">

   
<article class="top-level__shape position-absolute">
<div class="triangle">
    <div class="top"></div>
    <div class="bottom"></div>
</div>

    <div class="circle"></div>

</article>


    <div class="inner">
    <div class="left">
        <div class="image--top-level">
            <div class="image-item">
                <?php $image = get_field('circle_image');?>
                <?php include 'components/flexible-content/image-display.php';?>
    
            </div>
            <div class="shape">

            </div>
        </div>

    </div>

    <div class="right">
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
    </div>
    </div>
    </div>
</section>


<?php include 'components/update-carouselNEWTRY.php';?>


</main>

    <?php			
	    endwhile;
	?>
<?php get_footer(); ?>


