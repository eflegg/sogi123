<?php
/*
Template Name: Home Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>


<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';
if(get_field('sig_colour') ):
	$colour = get_field('sig_colour');
endif;
?>
<?php include 'components/hero.php'; ?>

<section class="at-a-glance section-container">
    <div class="inner">

   
    <div class="left">
        <h2 class="h3">SOGI 123 <br>At a Glance</h2>
        <div class="image--at-a-glace">
            <div class="image-item">
<img src="https://picsum.photos/seed/picsum/1000" alt="">
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






</section>

<section class="questions-getting section-container">
    <div class="inner">
        <div class="left">
            <h3>Questions We're Getting</h3>
            <p class="view-all">View all -></p>
        </div>
        <div class="right">
            <?php
            $postsPerPage = 3;
            ?>
            <?php include 'components/questions-block.php';?>

        </div>
    </div>
</section>

<?php include 'components/update-carousel.php'; ?>






<?php			
	endwhile;
	?>
<?php get_footer(); ?>