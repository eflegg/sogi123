<!-- <?php
	$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 ); // get all categories that are parents, even the empty ones
	//category name that fulfills the above arguments
	$parent_cat = get_terms('category','$parent_cat_arg');?>  -->

<!-- don't really need the foreach, it's just one category i need -->
<?php foreach ($parent_cat as $catVal) :?> 

	<?php if($catVal->name == $category) :?>

		<!-- echo '<h2>'.$catVal->name.'</h2>'; // Parent Category to display if i want it -->
	
		<?php $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
		$child_cat = get_terms( 'category', $child_arg );?>
	
		 <ul class="cat-list">
		 <li><a class="cat-list_item active" href="#!" data-slug="" data-type=<?php echo $dataType;?>>All <?php echo $catVal->name ;?></a></li>
			<?php foreach( $child_cat as $child_term )  :?>
		<!-- //Child Category -->
				<li>
					<a class="cat-list_item" href="#!" data-slug="<?= $child_term->slug; ?>" data-type=<?php echo $dataType;?>>
						<?= $child_term->name; ?>
					</a>
				</li>
				<?php endforeach; ?>
		</ul>

		<?php endif;?>
		<?php endforeach; ?>