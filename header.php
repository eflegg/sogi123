<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php wp_head(); ?>

</head>

<?php 

$colour = '#3857a2';

if(get_field('sig_colour') ):
	$colour = get_field('sig_colour');
	
endif;

?>



<body <?php body_class(); ?> style="--sigcolor: <?php echo $colour ?>;">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	<div class="site">
		<header>
			<h1><a href=<?php get_home_url();?>>SOGI 123</a></h1>
			<nav class="js-navigation"
				aria-hidden="true"
				aria-label="Main">
				<?php
				wp_nav_menu( array(
				    'theme_location' => 'main',
					'menu_class' => 'main'
				) );
				?>
			</nav >
			<div class="header-buttons">
					<!-- language switcher -->
	<ul><?php pll_the_languages();?></ul>
				<button class="btn--fat">
					Donate
				</button>
				<button class="btn--round header-search">
					search icon
				</button>

				<!-- <a href="#" class="menu-toggle">Menu</a> -->
				<button  aria-expanded="false"
       aria-label="Menu" class="menu-toggle">Menu</button>
			</div>
	
		</header>





















