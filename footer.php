		
		
		
		<footer>

			<section class="our-impact">
				<div class="support-our-work">

				</div>
			</section>

			<section class="container">
				<div class="footer-content">
					<div class="subscribe-container">
						<?php echo the_field('subscribe_blip', 'option'); ?>
						<?php echo the_field('subscribe_form', 'option'); ?>
					</div>
					<div class="contact-container">
						<div class="mailing">
							<?php echo the_field('mailing_address', 'option'); ?>
						</div>
						<div class="emails">
							<?php echo the_field('email_addresses', 'option'); ?>
						</div>
						<div class="place">
							<?php echo the_field('land_acknowledgment', 'option'); ?>
						</div>
					</div>
				</div>
				<div class="legal">
					<p>&copy; Harc Creative Inc. <?php the_time('Y'); ?> - All Rights Heartfully Reserved</p>
					<ul class="socmed">
						<li class="insta"><a href="<?php echo the_field('instagram_url', 'option'); ?>" target="_blank">Instagram</a></li>
						<li class="linkedin"><a href="<?php echo the_field('linkedin_url', 'option'); ?>" target="_blank">Linkedin</a></li>
					</ul>
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
