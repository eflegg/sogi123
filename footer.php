		
		<?php 
$bgImage = 'https://picsum.photos/seed/picsum/1000';

?>
		
		<footer>

			<section class="our-impact" style="background-image: url('<?php echo $bgImage ?>'); background-size: cover;" class="our-impact">
				<div class="blue-triangle"></div>
				<div class="text">
					<p class="eyebrow">our impact</p>
					<p class="testimonial">“Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a ped. Donec nec justo eget felis facilisis fermentum.”</p>
					<p class="attribution"><span class="name">FIRSTNAME</span>, Lorem Ipsum</p>
				</div>
			
			</section>

			<section class="main-footer">
				<div class="support-our-work">
					<h4>Support Our Work</h4>
					<p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam gravida non commodo a sodales sit amet nisi.</p>
					<a class="button btn--skinny" href="#">Donate</a>
				</div>

				<div class="footer-nav--section">
					<div class="inner">

						<div class="logo"><h2>SOGI 123</h2></div>
						<div class="display-flex">
							<div class="footer-nav">
								<nav class="footer-nav"
								aria-hidden="true"
								aria-label="Main">
								<?php
							wp_nav_menu( array(
								'theme_location' => 'main',
								'menu_class' => 'main'
								) );
								?>
						</nav >
					</div>
					<div class="socials"></div>
				</div>
			</div>
		</div>
				<div class="decorative"></div>
				
				<div class="legal">
					<div class="legal-inner">

						<p>&copy; SOGI 123 <?php the_time('Y'); ?> </p>
						<p class="harc-attribution">Site Design by Harc Creative</p>
					</div>
				
				</div>
			</section>
		</footer>


	</div> <!-- End Site Wrapper -->

	<!-- <div class="drawer">
		<div class="drawer-wrap nav-drawer">
			<div class="nav-container">
				<?php
				wp_nav_menu( array(
				    'theme_location' => 'main',
					'menu_class' => 'main'
				) );
				?>
			</div>
			<div class="contact">
				<div class="contact-details">
					<?php echo the_field('email_addresses', 'option'); ?>
				</div>
			</div>
			<h1><a href="/">Harc</a></h1>
			<a href="#" class="menu-toggle">Close Menu</a>
		</div>
	</div> -->



	<?php wp_footer(); ?>
    </body>
</html>
