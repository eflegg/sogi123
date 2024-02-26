
<div class="ajax-filters position-relative">
	
	<section class="new-search">
		<div class="header-search-container search-visible resource-search">
				<?php get_search_form(); ?>
		</div>
	</section>
	
	<form id="ajax-filter-multi" class="ajax-filter-multi ">
		
		<button class="clear-filters btn--skinny" type="submit" value="Resources">Clear Filters</button>
		
		<!-- <select name="city">
			<option value="">Select city...</option>
			<option value="athens">Athens</option>
			<option value="milano">Milan</option>
			<option value="copenhagen">Copenhagen</option>
		</select>
		<select name="region">
			<option value="">Select a region...</option>
			<option value="British Columbia">British Columbia</option>
			<option value="prairies">Prairies</option>
			<option value="Atlantic Canada">Atlantic Canada</option>
		</select> -->

		<?php
		$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
		$parent_cat = get_terms(['taxonomy'=>'category','parent'=> 12]);?>  

		<?php foreach ($parent_cat as $catVal) :?> 

		
				<?php $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
				$child_cat = get_terms( 'category', $child_arg );?>


				<select data-type=<?php echo $dataType;?> class="cat-select" name="<?php echo $catVal->name;?>" id="cat-select">
			
					<option data-slug="" data-type=<?php echo $dataType;?> class="cat-list_item active" value=''><?php echo $catVal->name;?></option>
					<?php foreach($child_cat as $child_term):?>
						<option data-type=<?php echo $dataType;?> data-slug="<?= $child_term->slug; ?>" class="cat-list_item"  value="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></option>
					<?php endforeach ;?>


				</select>

				<?php endforeach; ?>
	

	</form>

</div>

