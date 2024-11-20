<?php $current_lang = pll_current_language(); 

$post_date = get_the_date('F j, Y');
$formatter = new IntlDateFormatter('fr_CA', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
 
?>
<li class="update-card-container  update-color  single-slide">
    <a class="" href="<?php the_permalink(); ?>">

    <div class="update-card">
        <div class="tab"></div>
        <div class="inner">
            <p class="post-date">
                <?php if($current_lang == 'fr'): 
                    echo $formatter->format(get_post_timestamp());
               else: 
                   echo $post_date; ?>
                <?php endif; ?>
            </p>
            <h4 class="post-title">
                <?php the_title(); ?>
            </h4>
            <?php the_excerpt(); ?>
            <div class="content">
               <p class="learn-button" href="<?php the_permalink(); ?>"><?php echo $current_lang === 'fr' ? 'En savoir plus' : 'Learn More'; ?></p>
            </div>
        </div>  
    </div>
</a>
</li>