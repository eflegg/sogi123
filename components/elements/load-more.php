<p class="display-4 load-more" v-if="filteredItems?.length === 0">Sorry, there are no results that match your selections.</p>
<div v-show="lastPage === false" class="load-more">
  <p v-cloak class="highlight">Viewing {{ filteredItems?.length }} of {{ totalItems }} results.</p>
  <button class="btn btn--skinny" v-show="lastPage === false" v-on:click="loadMore()">View More</button>
</div>