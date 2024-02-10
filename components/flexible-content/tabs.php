<div class="tab-container">
<!-- Tabs -->
<ul id="nav-tab" class="tab-nav">

<?php
    while ( have_rows('tab') ) : the_row();

    $tab_title = get_sub_field('tab_title');
    $tab_content = get_sub_field('tab_content');?>

       
  <li class="tab-color"> 
   
    <span data-link="tab-<?php echo get_row_index(); ?>"><?php echo $tab_title;?> </span>
    <svg  class="tab-top__svg " width="132" height="94" viewBox="0 0 132 94" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path tabIndex="0"  data-link="tab-<?php echo get_row_index(); ?>" d="M123.34 39.1401V29.0715V7.85986C123.34 3.52202 119.8 0 115.44 0H15.8C11.44 0 7.9 3.52202 7.9 7.85986V33.9367V39.1401C7.9 43.478 4.36 47 0 47V94H131.24V47C126.88 47 123.34 43.478 123.34 39.1401Z" fill="#3D52B9"/>
    </svg>
  
</li>

  <?php  endwhile;?>



</ul>

<!-- Tab panes -->
<div class="tab-content">


<?php
    while ( have_rows('tab') ) : the_row();

    $tab_title = get_sub_field('tab_title');
    $tab_content = get_sub_field('tab_content');?>

       
<div class="tab-pane tab-color" id="tab-<?php echo get_row_index(); ?>">
       <?php echo $tab_content;?>
    </div>

  <?php  endwhile;?>


    </div>



    
</div>






  