<div class="ajax-filters position-relative">	
	<section class="new-search">
		<div class="header-search-container search-visible resource-search">
				<?php get_search_form(); ?>
		</div>
	</section>
	
	<form id="ajax-filter-multi" class="ajax-filter-multi ">
		<?php
		$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
		$lang = pll_current_language();

		if($lang === 'en'):
			$parent_cat = get_terms(['taxonomy'=>'category','parent'=> 12, 'lang'=>'en']);
		else: 
			$parent_cat = get_terms(['taxonomy'=>'category','parent'=> 99, 'lang'=>'fr', 'hide_empty' => false]);
		endif;
		?>  

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
		<button class="clear-filters btn--skinny" type="submit" value="Resources">Clear Filters</button>
	</form>
</div>