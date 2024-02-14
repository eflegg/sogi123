<li class="childcell child-page-block fade-me">
    <div class="display-flex align-items-center justify-space-between">
        <div class="left--child">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="thumbnail"><?php the_post_thumbnail( 'small-thumb' ); ?></div>
            <?php endif; ?>
            <h3 class=" subpage-title"><?php the_title(); ?></h3>
            <span class="desc"><?php echo get_post_meta( get_the_ID(), 'desc', true ); ?></span>
            <div class="subpage-excerpt"><?php the_excerpt(); ?></div>
        </div>
        <div class="right--child">
            <a class="subpage-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php include 'svg/circle-chevron.php';?></a>
        </div>
    </div>
</li>
