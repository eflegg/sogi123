<?php

$rows = get_field('page_links'); 

if( $rows ) { ?>
  <ul class="subpages--list">
    <div class="childcells"> 
      <?php foreach( $rows as $row ) { 
        $page = $row['child_page']; 
        $permalink = get_permalink( $page->ID );
        $title = get_the_title( $page->ID );
        $excerpt = get_the_excerpt( $page->ID );

        ?>
      <li class="childcell child-page-block fade-me">
        <a class="subpage-link" href="<?php echo esc_url($permalink); ?>" rel="bookmark">
        <div class="display-flex align-items-center justify-space-between">
            <div class="left--child">
              <h3 class=" subpage-title"><?php echo $title; ?></h3>
              <div class="subpage-excerpt"><?php echo $excerpt; ?></div>
            </div>
            <div class="right--child">
              <?php include 'svg/circle-chevron.php';?>
            </div>
            
        </div>
        </a>
      </li>
    <?php } ?>
    </div>
  </ul>
<?php } ?>