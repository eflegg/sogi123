<?php
$current_lang = pll_current_language();
$view_more = $current_lang === 'fr' ? 'Afficher plus de résultat' : 'View More';
$viewing = $current_lang === 'fr' ? 'Affichage de' : 'Viewing';
$of_var = $current_lang === 'fr' ? 'résultats sur' : 'of';
$results_var = $current_lang === 'fr' ? '' : ' results';
?>

<p v-show="loadResults" class="display-4 load-more" v-if="filteredItems?.length === 0">Sorry, there are no results that match your selections.</p>
<div v-show="loadResults && lastPage === false" class="load-more">

  <p v-cloak class="highlight"><?php echo $viewing; ?> {{ filteredItems?.length }} <?php echo $of_var; ?> {{ totalItems }}<?php echo $results_var; ?>.</p>
  <button class="btn btn--skinny" v-show="lastPage === false" v-on:click="loadMore()">
    <?php echo $view_more; ?>
  </button>
</div>