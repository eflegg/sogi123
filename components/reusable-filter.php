
<div class="ajax-filters filter-by-category">
	<form class="category-form" id="ajax-filter">
		<h2>Filter by Category</h2>

<?php
	$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 ); // get all categories that are parents, even the empty ones
	//category name that fulfills the above arguments
	$parent_cat = get_terms('category','$parent_cat_arg');?>  

<!-- don't really need the foreach, it's just one category i need -->
<?php foreach ($parent_cat as $catVal) :?> 

	<?php if($catVal->name == $category) :?>

		<!-- echo '<h2>'.$catVal->name.'</h2>'; // Parent Category to display if i want it -->
	
		<?php $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
		$child_cat = get_terms( 'category', $child_arg );?>
		<select data-type=<?php echo $dataType;?> class="cat-select" name="categories" id="cat-select">
		<option data-slug="" data-type=<?php echo $dataType;?> class="cat-list_item" value="Choose a category">Category</option>
		<option data-slug="" data-type=<?php echo $dataType;?> class="cat-list_item active" value="<?php echo $catVal->slug; ?>">All categories</option>
		<?php foreach($child_cat as $child_term):?>
			<option data-type=<?php echo $dataType;?> data-slug="<?= $child_term->slug; ?>" class="cat-list_item"  value="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></option>
		<?php endforeach ;?>
	</select>


		<?php endif;?>
		<?php endforeach; ?>

		</form>
	</div>




<ul role="toolbar" class="cat-list <?php echo $dataType;?>">
		 <li class="btn--category lg">
			<button class="button btn--category btn--category lg">
				<a class="cat-list_item active" href="#!" data-slug="" data-type=<?php echo $dataType;?>>All
			</a>
		</button>
	</li>

			<?php foreach( $child_cat as $child_term )  :?>

				<li class="btn--category lg">
					<button class="button btn--category btn--category lg">
						<a class="cat-list_item" href="#!" data-slug="<?= $child_term->slug; ?>" data-type=<?php echo $dataType;?>>
							<?php echo $child_term->name; ?>
						</a>
					</button>
				</li>
				<?php endforeach; ?>
			</ul> 

	