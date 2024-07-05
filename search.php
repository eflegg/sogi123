<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package davedeveau
 */
$current_lang = pll_current_language(); 

get_header(); ?>



<main id="main" class="site-main" role="main">

<?php 
$bgImage = get_field('hero_image');
$defaultImage = 'https://picsum.photos/seed/picsum/1000';
$heroHeadline = $current_lang == 'fr-CA' ? 'Vos résultats de recherche pour:' : 'Search Results for: ';
$heroContent = get_field('hero_content');
$searchTermHeader = get_search_query();
?>

<?php include 'components/hero.php'; ?>

	<section id="primary" class="section-container search-results default-type">
		<?php if ( have_posts() ) : 

				global $query_string;
				$query_args = explode("&", $query_string);
				$search_query = array();

				foreach($query_args as $key => $string) {
				$query_split = explode("=", $string);
				$search_query[$query_split[0]] = urldecode($query_split[1]);
				} // foreach

				$the_query = new WP_Query($search_query);
				if ( $the_query->have_posts() ) : 
				?>
				<!-- the loop -->

				<ol class="results-list">    
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<li >
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt();?>
						<a class="continue-reading" href="<?php the_permalink(); ?>"><p class="continue-reading"><?php if($current_lang == 'fr'): echo "Lire la suite..."; else: echo "Continue reading..."; endif; ?></p></a>
					</li>   
				<?php endwhile; ?>
				</ol>
				<!-- end of the loop -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php if($current_lang == 'fr'): echo "Désolé, aucun article ne correspond à vos critères."; else: echo "Sorry, no posts matched your criteria."; endif; ?></p>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php davedeveau_content_nav( 'nav-below' ); ?>

		<?php else : ?>
<h2 class="h3">
<?php if($current_lang == 'fr'): echo "Désolé, nous n'avons rien trouvé qui corresponde à votre recherche."; else: echo "Sorry, we can't seem to find anything that matches your search"; endif; ?>
</h2>
			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>
	<section class="new-search">
		<h4><?php if($current_lang == 'fr'): echo "Essayez une autre recherche ?"; else: echo "Try another search?"; endif; ?></h4>
		<div class="header-search-container search-visible">
				<?php get_search_form(); ?>
			</div>
	</section>

	</section><!-- #primary -->

	<?php include 'components/update-carouselNEWTRY.php';?>
	</main>


<?php get_footer(); ?>