<?php
$current_lang = pll_current_language();
?>
<!-- <section class="new-search">
	<div class="header-search-container search-visible resource-search">
		<?php //get_search_form();
		?>
	</div>
</section> -->
<div id="resourceApp" data-filter="<?php echo get_field('active_category'); ?>">
	<div class="new-search">
		<div class="app-search header-search-container search-visible resource-search">
			<label class="screen-reader-text" for="post-search">Search posts</label>
			<input v-on:keyup.enter="searchProjects" id="post-search" name="search" type="text" v-model="searchTerm" placeholder="<?php echo $current_lang === 'fr' ? 'Recherche...' : 'Search Resources'; ?>" />
			<button class="custom-search-btn" v-on:click="searchProjects">
				<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M12.6472 23.2944C18.5275 23.2944 23.2944 18.5275 23.2944 12.6472C23.2944 6.7669 18.5275 2 12.6472 2C6.7669 2 2 6.7669 2 12.6472C2 18.5275 6.7669 23.2944 12.6472 23.2944Z" fill="none" />
					<path class="icon-stroke" d="M28.0214 28.0212L20.1668 20.1666M23.2944 12.6472C23.2944 18.5275 18.5275 23.2944 12.6472 23.2944C6.7669 23.2944 2 18.5275 2 12.6472C2 6.7669 6.7669 2 12.6472 2C18.5275 2 23.2944 6.7669 23.2944 12.6472Z" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
				<span class="screen-reader-text"><?php echo $current_lang === 'fr' ? 'Recherche...' : 'Search Resources'; ?></span>
			</button>
		</div>
	</div>

	<div class="filters flex">

		<div class="ajax-filter-multi">
			<!-- Grade Level -->
			<?php
			$filters = get_terms(array(
				'taxonomy'   => 'grade-level',
				'hide_empty' => false,
			));

			$label = $current_lang === 'fr' ? 'Tous les niveaux scolaires' : 'All Grade Levels';
			?>

			<div class="custom-select" :class="{ selected: selectedGrade !== 'all' }">
				<label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
				<select
					v-model="selectedGrade"
					v-on:change="filterProjects">
					<option disabled value="all"><?php echo $label; ?></option>
					<?php foreach ($filters as $filter): ?>
						<option value="<?php echo $filter->term_id; ?>"><?php echo $current_lang === 'fr' ? get_field('french_translation', $filter) : $filter->name; ?></option>
					<?php endforeach; ?>
					<option value="all"><?php echo $label; ?></option>
				</select>
			</div>

			<!-- Language -->
			<?php
			$filters = get_terms(array(
				'taxonomy'   => 'resource-language',
				'hide_empty' => false,
			));

			$label = $current_lang === 'fr' ? 'Toutes les langues' : 'All Languages';
			?>

			<div class="custom-select" :class="{ selected: selectedLang !== 'all' }">
				<label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
				<select
					v-model="selectedLang"
					v-on:change="filterProjects">
					<option disabled value="all"><?php echo $label; ?></option>
					<?php foreach ($filters as $filter): ?>
						<option value="<?php echo $filter->term_id; ?>"><?php echo $current_lang === 'fr' ? get_field('french_translation', $filter) : $filter->name; ?></option>
					<?php endforeach; ?>
					<option value="all"><?php echo $label; ?></option>
				</select>
			</div>
			<!-- Region -->
			<?php
			$filters = get_terms(array(
				'taxonomy'   => 'region',
				'hide_empty' => false,
			));

			$label = $current_lang === 'fr' ? 'Toutes les régions' : 'All Regions';
			?>

			<div class="custom-select" :class="{ selected: selectedRegion !== 'all' }">
				<label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
				<select
					v-model="selectedRegion"
					v-on:change="filterProjects">
					<option disabled value="all"><?php echo $label; ?></option>
					<?php foreach ($filters as $filter): ?>
						<option value="<?php echo $filter->term_id; ?>"><?php echo $current_lang === 'fr' ? get_field('french_translation', $filter) : $filter->name; ?></option>
					<?php endforeach; ?>
					<option value="all"><?php echo $label; ?></option>
				</select>
			</div>


			<!-- Type filter - uses selectedType not selected as in filter component -->
			<?php
			$filters = get_terms(array(
				'taxonomy'   => 'resource-type',
				'hide_empty' => false,
			));

			$label = $current_lang === 'fr' ? 'Tous les types de ressources' : 'All Resource Types';
			?>

			<div class="custom-select" :class="{ selected: selectedType !== 'all' }">
				<label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
				<select
					v-model="selectedType"
					v-on:change="filterProjects">
					<option disabled value="all"><?php echo $label; ?></option>
					<?php foreach ($filters as $filter): ?>
						<option value="<?php echo $filter->term_id; ?>"><?php echo $current_lang === 'fr' ? get_field('french_translation', $filter) : $filter->name; ?></option>
					<?php endforeach; ?>
					<option value="all"><?php echo $label; ?></option>
				</select>
			</div>
			<div><button class="clear-filters btn--skinny" v-if="selected !== 'all'" v-on:click="clearFilters()"><?php echo $current_lang === 'fr' ? 'Effacer les filtres de recherche' : 'Clear Filters'; ?></button>
			</div>
		</div>
	</div>
	<ul v-show="loadResults" class="card-container">
		<?php get_template_part('components/cards/resource-card-app'); ?>
	</ul>
	<div v-show="loading" class="loader"></div>
	<?php get_template_part('components/elements/load-more'); ?>

</div><!-- #newsApp-->