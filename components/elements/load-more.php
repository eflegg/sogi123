<?php 
$current_lang = pll_current_language();
?> 

<p class="display-4 load-more" v-if="filteredItems?.length === 0">Sorry, there are no results that match your selections.</p>
<div v-show="lastPage === false" class="load-more">
  
  <p v-cloak class="highlight">Viewing {{ filteredItems?.length }} of {{ totalItems }} results.</p>
  Affichage de 9 résultats sur 111
  <button class="btn btn--skinny" v-show="lastPage === false" v-on:click="loadMore()">
    View More
    <?php ///$current_lang === 'fr' ? 'Afficher plus de résultats' : 'View more'; ?>
  </button>
</div>