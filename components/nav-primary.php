<?php 
$current_lang = pll_current_language(); ?>
<nav id="site-navigation" class="main-navigation">
	<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'julie-starter' ); ?></span>
		<span class="bar bar1"></span>
	  <span class="bar bar2"></span>
	  <span class="bar bar3"></span>
	</button>
	<div class="nav-drawer">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'main',
				'menu_id'        => 'main',
			)
		);
		?>

		<div class="header-buttons">
		<!-- language switcher -->
		<div class="lang-switcher display-flex align-items-center">
			<?php include(get_template_directory() . "/components/svg/globe-logo.php");?>
			<?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
		</div>
		<a href='<?php echo home_url('/donate'); ?>' class="btn--fat button  text-center"><span><?php if($current_lang == 'fr'): echo 'Faire un don'; else: echo 'Donate'; endif; ?></span></a>
		<button id="header-search" class="header-search no-btn"><?php include(get_template_directory() . "/components/svg/header-search-icon.php"); ?></button>
		<div class="header-search-container">
			<?php get_search_form(); ?>
		</div>	
	</div>
	</div>
	<div class="header-buttons header-buttons-small-screens">
		<!-- language switcher -->
		<div class="lang-switcher display-flex align-items-center">
			<?php include(get_template_directory() . "/components/svg/globe-logo.php");?>
			<?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
		</div>
		<a href='<?php echo home_url('/donate'); ?>' class="btn--fat button  text-center"><span><?php if($current_lang == 'fr'): echo 'Faire un don'; else: echo 'Donate'; endif; ?></span></a>
	</div>
</nav><!-- #site-navigation -->