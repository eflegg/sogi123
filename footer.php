		<section class="impact-3-by">
 			<div class="container">
 				<h2><?php echo the_field('featured_projects_headline'); ?></h2>
 				<div class="three-by-container">

 					<?php
					$featured_posts = get_field('featured_projects');
					if( $featured_posts ): ?>

					    <?php foreach( $featured_posts as $post ): 

					        // Setup this post for WP functions (variable must be named $post).
					        setup_postdata($post); ?>

					        <div class="tile">
								<span class="client">
									<?php the_title(); ?>
								</span>
								<div class="content">
									<h3><?php echo the_field('high_value'); ?></h3>
									<span class="button">
										<a href="<?php the_permalink(); ?>">Learn More</a>
									</span>
								</div>
									<?php $image = get_field('thumbnail_image'); ?>
								<div class="project-image" style="background-image: url('<?php echo $image ?>"></div>
								<a class="click-link" href="<?php the_permalink(); ?>"></a>
							</div>
					    <?php endforeach; ?>

					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
					<?php endif; ?>
 				</div>
 			</div>	
 		</section>

 		<section class="cta-block">
			<div class="container"> 
				<div class="row">
				<div class="col-xs-12 col-lg-5">
					<div class="discovery">
						<img src="<?php echo the_field('discovery_headshot', 'option'); ?>">
						<?php echo the_field('discovery_cta', 'option'); ?>
						<span class="button"><a href="<?php echo the_field('discovery_booking_url', 'option'); ?>" target="_blank">Schedule a discovery call</a></span>
					</div>
				</div>
				<div class="col-xs-12 col-lg-7">
					<div class="form">
						<h3>Start a Conversation</h3>
						<?php echo the_field('contact_form', 'option'); ?>
					</div>
				</div>
			</div>
			</div>
		</section>	

		<footer>
			<div class="container">
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
			</div>
		</footer>


	</div> <!-- End Site Wrapper -->

	<div class="drawer">
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
	</div>



	<?php wp_footer(); ?>
    </body>
</html>
