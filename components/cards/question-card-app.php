<?php
$current_lang = pll_current_language();
?>

<template v-for="(item, index) in filteredItems">
  <li
    id="post-"
    v-if="item.language === '<?php echo $current_lang; ?>'"
    :key="item.id"
    class="card question-card card-color">
    <a v-bind:href="item.link">
      <div class="question--text">
        <span class="the-question">
          {{item.acf.questions.question}}
        </span>
        <span class="the-answer">
          {{item.acf.questions.answer}}
        </span>
        <span class="continue-reading"><?php echo $current_lang === 'fr' ? 'Lire la suite' : 'Continue reading' ?> &#10142;</span>
      </div>
    </a>
  </li>
</template>