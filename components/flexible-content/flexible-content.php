
<?php

// Check value exists.
if( have_rows('flexible_content_picker') ):

    // Loop through rows.
    while ( have_rows('flexible_content_picker') ) : the_row();

        // Case: tabs layout.
        if( get_row_layout() == 'tabs_block' ):

			if( have_rows('tab') ):
				include 'tabs.php';	
			endif;

        // Case: Video Player.
        elseif( get_row_layout() == 'video_player' ): 
            $video = get_sub_field('video_link');
            // Do something...
            echo '<div class="embed-container">'.$video.'</div>';


          // Case: Full width image.
          elseif( get_row_layout() == 'full_width_image' ): 
            $image = get_sub_field('wide_image');
            // Do something...
            if($image):
       include 'image-display.php';
    endif;
   // Case: Text Editor.
   elseif( get_row_layout() == 'text_editor' ): 
    $text = get_sub_field('flexible_text');
    // Do something...
    if($text):
    echo $text;
endif;

        endif;

    // End loop.
    endwhile;

// No value.
else :
    // Do something...
	echo '<p>no blocks</p>';
endif;
?>