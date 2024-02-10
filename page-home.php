<?php
/*
Template Name: Home Page
*/

get_header(); ?>
	<?php while ( have_posts() ) : the_post();
	?>

<main id="main" class="site-main" role="main">
<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'https://picsum.photos/seed/picsum/1000';
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>



<section class="at-a-glance section-container">

   


    <div class="search-circle">
        <div class="search-inner">
            <?php get_search_form(); ?>
        </div>
    </div>



    

    <div class="inner">

   
    <div class="left">
        <h2 class="h3 fade-me">SOGI 123 <br>At a Glance</h2>
        <div class="image--at-a-glace">
            <div class="image-item">

            <?php $image = get_field('at_a_glance_image');
            include 'components/flexible-content/image-display.php';?>
      
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
            <h3 class="fade-me">Questions We're Getting</h3>
            <a href='<?php echo home_url('/our-work/questions-answered'); ?>' class="view-all fade-me">View all -></a>
        </div>
        <div class="right">
        <?php
            $postsPerPage = 3;
            ?>
        <?php 
        $questions_getting = get_field('questions_were_getting');
        if($questions_getting):?>
        <ul class="card-container">
            <?php foreach( $questions_getting as $post ): 
            	$the_question = get_field('questions');
                if($the_question):?>
                    <?php $question = $the_question['question'];?>
                    <?php $answer = $the_question['answer'];
                    endif;

                // Setup this post for WP functions (variable must be named $post).
                setup_postdata($post); ?>
            <?php include 'components/cards/question-card.php';?>
            <?php endforeach; ?>
            </ul>
            <?php 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>

          <?php else:?>  
            <?php include 'components/questions-block.php';?>
        <?php endif;?>

        </div>
    </div>
</section>


<?php include 'components/update-carouselNEWTRY.php';?>




          </main>

<?php			
	endwhile;
	?>
<?php get_footer(); ?>