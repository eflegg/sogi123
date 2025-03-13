<?php
$parent = get_the_title($post->post_parent); ?>
<?php if ($parent === "Where We Support"): ?>
      <?php $bgColor = '#3D52B9'; ?>
<?php else: ?>
      <?php $bgColor = '#6f46c3'; ?>
<?php endif; ?>

<?php
$arguments = array(
      'post_type' => 'post',
      'orderby' => 'date',
      'order' => 'DESC',
      'posts_per_page' => 3,
);
$custom_query = get_posts($arguments);
if ($custom_query): ?>

      <section style="background-color: <?php echo $bgColor; ?>" class="updates-section carousel-container">
            <div class="custom-container">
                  <div class="slider-wrapper">
                        <ul class="image-list">
                              <?php
                              foreach ($custom_query as $post) {
                                    setup_postdata($post);
                                    include 'cards/update-card.php';
                              }
                              ?>
                        </ul>
                        <div class="more-updates">
                              <?php if ($current_lang == 'fr'): ?>
                                    <a href='<?php echo home_url('/actualites'); ?>' class="view-all fade-me">Voir tout <span class="arrow">&rarr;</span></a>
                              <?php else: ?>
                                    <a href='<?php echo home_url('/updates'); ?>' class="view-all fade-me">View all <span class="arrow">&rarr;</span></a>
                              <?php endif; ?>

                        </div>
                  </div>
            </div>

      </section>
<?php wp_reset_postdata();
endif; ?>