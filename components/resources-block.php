<ul class="card-container">
	<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		    'post_type' => 'resource',
		    'orderby' => 'menu_order',
		    'order' => 'ASC',
			'paged' => $paged,
		);
		$the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
		    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <?php include 'cards/resource-card.php';?>
		    <?php endwhile; ?>
		</ul>
<?php
		$total_pages = $loop->max_num_pages;

if ($total_pages > 1){

	$current_page = max(1, get_query_var('paged'));

	echo paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => '/page/%#%',
		'current' => $current_page,
		'total' => $total_pages,
		'prev_text'    => __('« prev'),
		'next_text'    => __('next »'),
	));
} ?>
		
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>	 			    
	