<?php
$current_lang = pll_current_language();
?>

<div id="updatesApp" data-filter="<?php echo get_field('active_category'); ?>">
  <div class="filters flex">
    <div class="ajax-filters-single">
      <h2 class="h4"><?php echo $current_lang === 'fr' ? 'Filtrer par catégorie' : 'Filter by Category'; ?></h2>

      <!--Updates Category Filter -->
      <?php
      if ($current_lang === 'fr'):
        $category = 259;
      else:
        $category = 6;
      endif;
      $filters = get_terms(array(
        'taxonomy'   => 'category',
        'hide_empty' => false,
        'parent' => $category,
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
            <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
          <?php endforeach; ?>
          <option value="all">All Categories</option>
        </select>
      </div>
    </div>
  </div>
  <ul v-show="loadResults" class="card-container updates-card-container">
    <?php get_template_part('components/cards/update-card-app'); ?>
  </ul>
  <div v-show="loading" class="loader"></div>
  <?php get_template_part('components/elements/load-more'); ?>

</div><!-- #updatesApp-->