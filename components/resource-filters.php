

	
	
	
	
<div class="filter-by-category__resources <?php echo $filterClass;?>">	
	
<div class="ajax-filters">
	<form class="category-form" id="ajax-filter__resources">
	<?php
		$parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
		$parent_cat = get_terms(['taxonomy'=>'category','parent'=> 12]);?>  

		<?php foreach ($parent_cat as $catVal) :?> 

		
				<?php $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
				$child_cat = get_terms( 'category', $child_arg );?>


				<select data-type=<?php echo $dataType;?> class="cat-select" name="<?php echo $catVal->name;?>" id="cat-select">
			
					<option data-slug="" data-type=<?php echo $dataType;?> class="cat-list_item active" value="<?php echo $catVal->slug; ?>"><?php echo $catVal->name;?></option>

			


					<?php foreach($child_cat as $child_term):?>
						<option data-type=<?php echo $dataType;?> data-slug="<?= $child_term->slug; ?>" class="cat-list_item"  value="<?php echo $child_term->slug; ?>"><?php echo $child_term->name; ?></option>
					<?php endforeach ;?>


				</select>

				<?php endforeach; ?>
				
			</form>
		</div>
</div>












	