<section class="blog-roll">
	<div class="container">
		<h3 class="waypoint-me">What's New:</h3>
		<div class="row">
			<ul>
				<?php
					$args = array(
						'post_type' => 'post',
						'order' => 'ASC',
						'showposts'=> 3
					);
					query_posts($args);
					while (have_posts()) : the_post();
				?>
				<div class="col-xs-12 col-lg-4">
					<li class="clearfix">
						<?php
							$image = get_field('background_image_small');
						?>
						<img src="<?php echo $image['url']; ?>" class="img-responsive">
						<div class="content">
							<h5><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h5>
							<?php echo excerpt(18); ?></p>
							<span class="button">
								<a href="<?php echo the_permalink(); ?>">Read More</a>
							</span>
						</div>
					</li>
				</div>
				<?php
					endwhile;
					wp_reset_query();
				?>
			</ul>
		</div>
	</div>
</section>
