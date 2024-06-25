<li 
	id="post-" 
	v-for="(item, index) in filteredItems"
	:key="item.id"
	class="resource-card square card-color">
		<a v-bind:href="item.link">
		<div class="resource--text">
      <h4 class="resource-title" v-html="item.title.rendered"></h4>
      <div v-html=item.excerpt.rendered></div>
      <div class="continue-reading">
        Continue reading &#10142;
      </div>
    </div> 
		</a>
</li>