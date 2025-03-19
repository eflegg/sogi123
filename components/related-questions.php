<?php
$categories = get_the_category();
$category_id = $categories[1]->cat_ID;
print_r($category_id);
$args = array(
  'post_type' => 'question',
  'posts_per_page' => 3,
  'ignore_sticky_posts' => 1,
  'category' => $category_id,
  'post__not_in' => array($post->ID),
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
?>
  <ul class="card-container">
    <?php
    while ($the_query->have_posts()) {
      $the_query->the_post();

      $the_question = get_field('questions');
      if ($the_question):
        $question = $the_question['question'];
        $answer = $the_question['answer'];
      endif;
    ?>


      <li class="card question-card card-color">
        <a href="<?php the_permalink(); ?>">
          <div class="question--text">
            <span class="the-question">
              "<?php echo $question; ?>"
            </span>
            <span class="the-answer">
              <?php echo $answer; ?>
            </span>
            <span class="continue-reading"><?php echo $current_lang === 'fr' ? 'Lire la suite' : 'Continue reading' ?> &#10142;</span>
          </div>
        </a>
      </li>
    <?php
    }
    ?>
  </ul><?php
      } else {
        // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata(); ?>