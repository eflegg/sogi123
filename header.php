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

if( get_field('sig_colour') ):
	$colour = get_field('sig_colour');
endif;

?>



<body <?php body_class(); ?> style="--sigcolor: <?php echo $colour ?>;">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
	<div class="site">
		<header>
			<h1><a href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.66 160.48"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M0,121.23H43V128H32.78v25.63H43v6.81H0v-6.81H26V128H0ZM32.78,82v24.17L43,110.94v6.7L0,97.44V90.67l43-20.2v6.7ZM26,85.17,7.05,94.05,26,102.94ZM43.14.27A39.09,39.09,0,0,1,44.66,11.1h0c0,9.55-2.86,15.05-5.71,20.37s-5.86,11-6.17,21.88v6.71H43v6.81H0v-18a16.39,16.39,0,0,1,28.53-11A61.78,61.78,0,0,1,33,28.26c2.67-5,4.9-9.32,4.9-17.16h0a32.28,32.28,0,0,0-1.08-8.33Zm-26.75,39a9.59,9.59,0,0,0-9.58,9.58V60.06H26V48.87A9.59,9.59,0,0,0,16.39,39.29ZM21.78,4.82a8.81,8.81,0,1,1-12.45.12L4.51.12A15.62,15.62,0,1,0,26.6,0Z"/></g></g></svg></a></h1>
			<nav>
				<?php
				wp_nav_menu( array(
				    'theme_location' => 'main',
					'menu_class' => 'main'
				) );
				?>
			</nav>
			<a href="#" class="menu-toggle">Menu</a>
		</header>





















