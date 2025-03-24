<?php
$categories = get_the_category();
if (count($categories) > 1):
  $category_id = $categories[1]->cat_ID;
  $args = array(
    'post_type' => 'question',
    'posts_per_page' => 3,
    'ignore_sticky_posts' => 1,
    'category' => $category_id,
    'post__not_in' => array($post->ID),
    'orderby' => 'rand',
  );
else:
  $args = array(
    'post_type' => 'question',
    'posts_per_page' => 3,
    'ignore_sticky_posts' => 1,
    'post__not_in' => array($post->ID),
    'orderby' => 'rand',
  );
endif;

$the_query = new WP_Query($args);

if ($the_query->have_posts()) { ?>
  <section class="questions-getting section-container">
    <div class="inner custom-container">
      <div class="left fade-me">
        <h3 class=""><?php echo $current_lang === 'fr' ? 'Questions que nous recevons' : 'Related Questions' ?></h3>
        <?php if ($current_lang == 'fr'): ?>
          <a href='<?php echo home_url('/notre-travail/les-reponses-a-vos-questions/'); ?>' class="view-all fade-me">Voir tout <span class="arrow">&rarr;</span></a>
        <?php else: ?>
          <a href='<?php echo home_url('/our-work/questions-answered'); ?>' class="view-all fade-me">View all <span class="arrow">&rarr;</span></a>
        <?php endif; ?>

      </div>
      <div class="right">

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
        </ul>
      </div>
    </div>
  </section>
<?php
} else {
  // no posts found
}
/* Restore original Post Data */
wp_reset_postdata(); ?>