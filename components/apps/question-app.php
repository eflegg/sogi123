<?php
$current_lang = pll_current_language();
?>

<div id="questionApp" data-filter="<?php echo get_field('active_category'); ?>">
	<div class="filters flex">
		<div class="ajax-filters-single">
			<h2 class="h3"><?php echo $current_lang === 'fr' ? 'Filtrer par catégorie' : 'Filter by Category'; ?></h2>

			<!-- Question Category Filter -->
			<?php
			$filters = get_terms(array(
				'taxonomy'   => 'question-category',
				'hide_empty' => false,
			));

			$label = $current_lang === 'fr' ? 'Filtrer par catégorie' : 'Filter by Category';
			?>

			<div class="custom-select custom-select-single" :class="{ selected: selectedCat !== 'all' }">
				<label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
				<select
					v-model="selectedCat"
					v-on:change="filterProjects">
					<option disabled value="all"><?php echo $label; ?></option>
					<?php foreach ($filters as $filter): ?>
						<option value="<?php echo $filter->term_id; ?>"><?php echo $current_lang === 'fr' ? get_field('french_translation', $filter) : $filter->name; ?></option>
					<?php endforeach; ?>
					<option value="all">All Categories</option>
				</select>
			</div>
		</div>
	</div>
	<ul v-show="loadResults" class="card-container">
		<?php get_template_part('components/cards/question-card-app'); ?>
	</ul>
	<div v-show="loading" class="loader"></div>
	<?php get_template_part('components/elements/load-more'); ?>

</div><!-- #questionsApp-->