		
		<?php 
$bgImage = get_field('footer_image', 'options');

?>
		
		<footer>

			<section class="our-impact" style="background-image: url('<?php echo $bgImage;?>'); background-size: cover;" class="our-impact">
				<div class="blue-triangle"></div>
				<div class="text">
					<h4 class="eyebrow fade-me">our impact</h4>
					<p class="testimonial fade-me">“<?php echo the_field('our_impact_testimonial', 'options');?>”</p>
					<h4 class="attribution fade-me"><span class="name"><?php echo the_field('attribution', 'options');?></span>, <?php echo the_field('attribution_title', 'options');?></h4>
				</div>
			
			</section>

			<section class="main-footer">
				<!-- <div class="support-our-work">
					<h4 class="fade-me">Support Our Work</h4>
					<p><?php echo the_field('support_our_work_text', 'options');?></p>
					<a class="button btn--skinny fade-me" href='<?php echo home_url('/donate'); ?>'>Donate</a>
				</div> -->

				<div class="footer-nav--section">
					<div class="inner">
					<div class="support-our-work">
					<h4 class="fade-me">Support Our Work</h4>
					<p><?php echo the_field('support_our_work_text', 'options');?></p>
					<a class="button btn--skinny fade-me" href='<?php echo home_url('/donate'); ?>'>Donate</a>
				</div>

						<div class="logo"><?php include 'components/svg/logo-colour.php';?></div>
						<div class="footer-nav--container display-flex">
							<div class="footer-nav">
								<nav class="footer-nav fade-me"
							
								aria-label="Footer Menu">
								<?php
								wp_nav_menu( array(
								'theme_location' => 'footfirst',
								'menu_class' => 'footer'
								) );
								?>
								</nav >
							</div>
						<div class="socials">
							<div class="social fade-me">
								<?php $facebookLink = get_field('facebook_link', 'options');
								if($facebookLink):?>
								<a href="<?php echo $facebookLink;?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
								<path d="M13.91 0C6.23 0 0 6.23 0 13.91C0 21.59 6.23 27.82 13.91 27.82C21.59 27.82 27.82 21.59 27.82 13.91C27.82 6.23 21.59 0 13.91 0ZM16.8 13.67C16.78 13.86 16.66 13.86 16.53 13.86C16.01 13.86 15.48 13.86 14.92 13.86V20.55H12.21V13.9H10.84V11.63H12.19C12.19 11.47 12.19 11.35 12.19 11.22C12.22 10.5 12.2 9.77 12.31 9.06C12.44 8.17 13.03 7.63 13.89 7.41C14.22 7.33 14.57 7.29 14.92 7.28C15.59 7.26 16.26 7.28 16.97 7.28V9.61C16.53 9.61 16.08 9.61 15.62 9.61C15.05 9.61 14.94 9.72 14.93 10.28C14.93 10.7 14.93 11.11 14.93 11.53C14.93 11.55 14.94 11.57 14.96 11.61H16.99C16.93 12.32 16.86 12.99 16.8 13.67Z" fill="#A428A3"/>
								</svg>
								</a>
								<?php endif;?>
							</div>
							<div class="social fade-me">
							<?php $instaLink = get_field('instagram_link', 'options');
								if($instaLink):?>
							<a href="<?php echo $instaLink;?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
								<path d="M13.9202 11.5899C12.6402 11.5799 11.5902 12.6099 11.5802 13.8899C11.5702 15.1699 12.6002 16.2199 13.8802 16.2299C15.1602 16.2399 16.2101 15.2099 16.2201 13.9299C16.2301 12.6499 15.2002 11.5999 13.9202 11.5899Z" fill="#A428A3"/>
								<path d="M17.42 8.30992C16.23 8.12992 11.77 8.13992 10.53 8.27992C9.30997 8.41992 8.49997 9.16992 8.30997 10.3899C8.10997 11.6799 8.14997 16.4899 8.30997 17.4599C8.47997 18.4699 9.04997 19.1599 10.05 19.4399C11.1 19.7299 16.14 19.6599 17.27 19.5399C18.5 19.4099 19.31 18.6499 19.5 17.4199C19.69 16.1799 19.65 11.6899 19.53 10.5399C19.4 9.30992 18.64 8.48992 17.42 8.30992ZM13.9 17.4999C11.92 17.4999 10.31 15.8899 10.31 13.9099C10.31 11.9299 11.92 10.3199 13.9 10.3199C15.88 10.3199 17.49 11.9299 17.49 13.9099C17.49 15.8899 15.88 17.4999 13.9 17.4999ZM17.64 11.0199C17.18 11.0199 16.8 10.6399 16.8 10.1799C16.8 9.71992 17.18 9.33992 17.64 9.33992C18.1 9.33992 18.48 9.71992 18.48 10.1799C18.48 10.6399 18.1 11.0199 17.64 11.0199Z" fill="#A428A3"/>
								<path d="M13.91 0C6.23 0 0 6.23 0 13.91C0 21.59 6.23 27.82 13.91 27.82C21.59 27.82 27.82 21.59 27.82 13.91C27.82 6.23 21.59 0 13.91 0ZM20.7 17.95C20.28 19.54 19.24 20.49 17.63 20.75C16.41 20.95 10.98 20.98 9.88 20.7C8.28 20.29 7.33 19.26 7.07 17.65C6.88 16.47 6.81 10.98 7.14 9.79C7.57 8.24 8.60001 7.33 10.17 7.07C11.54 6.85 15.45 6.9 17.1 6.99C18.07 7.04 18.95 7.34 19.67 8.03C20.36 8.68 20.71 9.5 20.8 10.42C20.91 11.52 21.02 16.73 20.7 17.95Z" fill="#A428A3"/>
								</svg>
								</a>
								<?php endif;?>
							</div>
							<div class="social fade-me">
							<?php $youtubeLink = get_field('youtube_link', 'options');
								if($youtubeLink):?>
							<a href="<?php echo $youtubeLink;?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
							<path d="M11.73 15.8699C13.08 15.1699 14.41 14.4799 15.77 13.7799C14.41 13.0699 13.08 12.3799 11.73 11.6699V15.8699Z" fill="#A428A3"/>
							<path d="M13.91 0C6.23 0 0 6.23 0 13.91C0 21.59 6.23 27.82 13.91 27.82C21.59 27.82 27.82 21.59 27.82 13.91C27.82 6.23 21.59 0 13.91 0ZM20 17.42C19.85 17.74 19.61 17.97 19.3 18.13C18.46 18.57 9.85999 18.56 8.75999 18.2C8.26999 18.04 7.93999 17.72 7.75999 17.23C7.32999 16.04 7.2 11.07 8.03 10.09C8.31 9.76 8.68 9.56 9.12 9.51C11.36 9.27 18.29 9.3 19.09 9.59C19.56 9.76 19.89 10.06 20.07 10.53C20.54 11.76 20.56 16.23 20.01 17.41L20 17.42Z" fill="#A428A3"/>
							</svg>
								</a>
								<?php endif;?>
							</div>
						</div>
				</div>
			</div>
		</div>
				<div class="decorative">
				<img src="<?php bloginfo('template_url'); ?>/images/footer.jpg" />
				</div>
				
				<div class="legal">
					<div class="legal-inner">

						<p class="">&copy; SOGI 123 <?php the_time('Y'); ?> </p>
						<p class="harc-attribution">Site Design by Harc Creative</p>
					</div>
				
				</div>
			</section>
		</footer>


	</div> <!-- End Site Wrapper -->




	<?php wp_footer(); ?>
    </body>
</html>
