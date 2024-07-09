<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Julie_Starter
 */
$current_lang = pll_current_language(); 

get_header();
?>

<main id="main" class="site-main" role="main">
<?php 
// $bgImage = get_field('hero_image');
// $defaultImage = 'https://picsum.photos/seed/picsum/1000';
// $heroHeadline = get_field('hero_headline');
// $heroContent = get_field('hero_content');
?>
<?php include 'components/hero.php'; ?>

		<section class="error-404 not-found section-container default-type">
			<div class="page-content">
				<?php if($current_lang === 'fr'): ?>
					<p><?php esc_html_e( 'Page non disponible. Veuillez retourner à la', 'themename' ); ?> <a href="/"><?php esc_html_e( "page d'accueil.", "themename" ); ?> </a></p>
				<?php else: ?>
					<p><?php esc_html_e( 'Page Not Found. Please return to the', 'themename' ); ?> <a href="/"><?php esc_html_e( 'home page.', 'themename' ); ?> </a></p>
			<?php endif; ?>
				


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

</main>

<?php get_footer(); ?>