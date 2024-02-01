

<section style="background-image: url('<?php echo $bgImage ?>'); background-size: cover;"class="hero display-flex flex-column justify-end">
 		
				<div class="content ">
					<div class="text">
						<h1><?php echo the_title();?><?php echo the_field('hero_headline'); ?></h1>
						<p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede.</p>
						<?php echo the_field('hero_content'); ?>
						<!-- check for button? render button -->
						<?php if(is_front_page()){
							echo '<button class="btn--skinny">
							Learn More
					</button>';}
					
				;?>
						<!-- <button class="btn--skinny">
							Learn More
					</button> -->
					</div>	
			
 			</div>
 		</section>