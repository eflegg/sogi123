<?php
$current_lang = pll_current_language();
?>

<template v-for="(item, index) in filteredItems">
  <li
    id="post-"
    v-if="item.language === '<?php echo $current_lang; ?>'"
    :key="item.id"
    class="update-card-container update-color single-slide">
    <a v-bind:href="item.link">
      <div class="update-card">
        <div class="tab"></div>
        <div class="inner">
          <p class="post-date">
            {{item.formatted_date}}
          </p>
          <h4 class="post-title" v-html="item.title.rendered">
          </h4>
          <div v-html="item.excerpt.rendered"></div>
          <div class="content">
            <p class="learn-button"><?php echo $current_lang === 'fr' ? 'En savoir plus' : 'Learn More'; ?></p>
          </div>
        </div>
      </div>
    </a>
  </li>
</template>