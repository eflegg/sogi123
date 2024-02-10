





<section style="background-image: url('<?php if(!$bgImage): echo $defaultImage;  else: echo $bgImage;  endif;  ?>'); background-size: cover;" class="hero display-flex flex-column justify-end">
 		
				<div class="content">
					<div class="text">
						<h1 class="fade-me"><?php echo $heroHeadline; ?><?php if(!$searchTermHeader): null; else: echo $searchTermHeader; endif;?></h1>
						<p class="white fade-me">
						<?php echo $heroContent; ?>
					</p>
						<!-- check for button? render button -->


						<?php if(is_front_page()):?>

							<?php 
							$heroButton = get_field('home_button');?>
							<?php 
							if($heroButton):?>
							<?php $heroButtonText = $heroButton['home_hero_text'];?>
							<?php $heroButtonLink = $heroButton['home_hero_link'];?>
							<?php endif;?>

							<?php
							$defaultButtonText = "Learn More";
							$defaultButtonLink = home_url('/updates');?>
						 
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


