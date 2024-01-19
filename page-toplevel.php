<?php
/*
Template Name: Top Level Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<?php include 'components/hero.php'; ?>

<section class="subpage-section">
<h2>subpage section</h2>
    <div class="subpages--image"></div>

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


<?php include 'components/update-carousel.php'; ?>




    <?php			
	    endwhile;
	?>
<?php get_footer(); ?>


