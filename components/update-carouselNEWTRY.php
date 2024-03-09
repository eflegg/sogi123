




<?php
$parent = get_the_title( $post->post_parent ); ?>
<?php if($parent === "Where We Support"):?>
      <?php $bgColor = '#3D52B9';?>
      <?php else:?>
            <?php $bgColor = '#6f46c3';?>   
      <?php endif;?>


<section style="background-color: <?php echo $bgColor;?>" class="updates-section carousel-container">
      <div class="new-container">
            <div class="slider-wrapper">
                        <!-- <button id="prev-slide" class="prev nav-left controls no-btn slide-button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" viewBox="0 0 28 50" fill="none">
                              <path d="M25.6316 48.0286L2.99992 25.0143L25.6316 1.99996" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
                              </svg>
                        </button> -->
                        <ul class="image-list">
                              <?php
                                    $arguments = array(
                                    'post_type' => 'post',  
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                    'posts_per_page' => 3,
                                    );
                                    $custom_query = get_posts($arguments);
                                    foreach ($custom_query as $post) {
                                          setup_postdata($post);
                                          include 'cards/update-card.php';
                                    
                                    }
                                    wp_reset_postdata();

                                    ?>
                        </ul>
                        <div class="more-updates">
                        <a href='<?php echo home_url('/updates'); ?>' class="view-all fade-me">View all <span class="arrow">&rarr;</span></a>
                        </div>

                  <!-- <button id="next-slide" class="next nav-right controls no-btn slide-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="50" viewBox="0 0 28 50" fill="none">
                        <path d="M1.63184 2L24.2635 25.0143L1.63184 48.0286" stroke="white" stroke-width="4" stroke-miterlimit="10"/>
                        </svg>
                  </button> -->

            </div>
      </div>

</section>


