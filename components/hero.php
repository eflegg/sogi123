<?php
$current_lang = pll_current_language(); 
$searchTermHeader = get_search_query();
// $defaultImage = get_field('hero_default_image', 'options');
$bgImage = get_field('hero_image');
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');

if(is_page_template('page-customposts.php') || is_page_template('page-resource-template.php')):
	$defaultImage = '/wp-content/uploads/2024/02/banner_hot.jpg';
elseif(is_page_template('page-toplevel.php')):
	$defaultImage = '/wp-content/uploads/2024/02/banner_hot.jpg';
elseif(is_page_template('page-updates.php')):
	$defaultImage = '/wp-content/uploads/2024/02/banner_hot.jpg';
elseif(is_page_template('page-secondlevel.php')): 
	$defaultImage = '/wp-content/uploads/2024/02/banner_cool.jpg';
else:
	$defaultImage = get_field('hero_default_image', 'options');
endif;

if(is_search()):
	$bgImage = get_field('hero_image');
	$defaultImage = get_field('hero_default_image', 'options');
	$heroHeadline = $current_lang == 'fr' ? 'Vos résultats de recherche pour: ' : 'Search Results for: ';
	$heroContent = '';
	$searchTermHeader = get_search_query();
endif; 

if(is_404()):
	$heroHeadline = '404 Page Not Found';
	$heroContent = '';
endif; 

$darken = get_field('add_darkening_overlay');
if($darken =='Yes'):
	$opacity = get_field('opacity_value');
else: $opacity = 0;
endif;
?>

<section style="background-image: url('<?php if(!$bgImage): echo $defaultImage;  else: echo $bgImage;  endif;  ?>'); background-size: cover; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.<?php echo $opacity;?>);" class="hero display-flex flex-column justify-end">
 		
	<div class="content">
		<div class="text">
			<h1 class="fade-me"><?php echo $heroHeadline ? $heroHeadline : get_the_title(); ?><?php echo $searchTermHeader ? $searchTermHeader : null; ?></h1>
			<p class="white fade-me">
				<?php echo $heroContent; ?>
			</p>
			<!-- check for button? render button -->
			<?php if(is_front_page()):
				$heroButton = get_field('home_button');
				if($heroButton):
				$heroButtonText = $heroButton['home_hero_text'];
				$heroButtonLink = $heroButton['home_hero_link'];
				endif;

				$defaultButtonText = "Learn More";
				$defaultButtonLink = home_url('/updates'); ?>
			 
				<a href="<?php echo $heroButtonLink ? $heroButtonLink : $defaultButtonLink; ?>">
					<span class="button btn--skinny fade-me">
						<?php if($heroButtonText): echo $heroButtonText; else: echo $defaultButtonText; endif; ?>
				</span>
				</a>
			<?php endif;?>

		
		</div>	

	</div>
 <?php if(is_front_page()):?>
	<article class="home-hero__shape position-absolute">
		<div class="inner">
			<img src="<?php bloginfo('template_url'); ?>/images/svg/home-hero-shape.svg" />
		</div>
	</article>
<?php endif;?>
</section>