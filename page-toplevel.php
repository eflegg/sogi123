<?php
/*
Template Name: Top Level Page
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

<section class="top-level-section section-container">
    <div class="inner">
    <div class="left">
        <div class="image--top-level">
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


<?php include 'components/update-carousel.php'; ?>




    <?php			
	    endwhile;
	?>
<?php get_footer(); ?>


