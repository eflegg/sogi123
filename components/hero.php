<?php
$searchTermHeader = get_search_query();
// $defaultImage = get_field('hero_default_image', 'options');
$bgImage = get_field('hero_image');
$heroHeadline = get_field('hero_headline');
$heroContent = get_field('hero_content');

if(is_page_template('page-customposts.php')):
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
	$defaultImage = 'https://picsum.photos/seed/picsum/1000';
	$heroHeadline = 'Search Results for: ';
	$heroContent = get_field('hero_content');
	$searchTermHeader = get_search_query();
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
			<h1 class="fade-me"><?php echo $heroHeadline; ?><?php echo $searchTermHeader ? $searchTermHeader : null; ?></h1>
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
			 
				<a href="<?php if(!$heroButtonLink): echo $defaultButtonLink; else: echo $heroButtonLink; endif; ?>">
					<span class="button btn--skinny fade-me">
						<?php if(!$heroButtonText): echo $defaultButtonText; else: echo $heroButtonText; endif; ?>
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