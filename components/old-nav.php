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
					<div class="lang-switcher display-flex align-items-center">
					<?php include 'components/svg/globe-logo.php';?>
				
					<?php pll_the_languages( array( 'dropdown' => 1 ) ); ?>
					</div>
			
							<a href='<?php echo home_url('/donate'); ?>' class="btn--fat button  text-center"><span>Donate</span></a>
					
		
				<button  id="header-search" class="header-search no-btn">
				<?php include 'components/svg/header-search-icon.php';?>
			
				</button>
				<div class="header-search-container"
				>
				<?php get_search_form(); ?>
			</div>

		
			</div>
			<div class="js-hamburger-menu">
				<button 
				class="button btn-nav  button--red js-menu-button menu-toggle" 
					aria-expanded="false"
					aria-label="Menu"
					>
					<span class="screen-reader-text">Menu</span>
					<span class="burger-1"></span>
					<span class="burger-2"></span>
					<span class="burger-3"></span>
			
				</button>
			</div>