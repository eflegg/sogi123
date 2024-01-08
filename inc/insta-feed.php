<div class="instagram">
	<div class="container">
	    <div class="content">
	        <h3 class="our-story-title underbar">Our Story</h3>
	        <div class="underline"></div>
            <?php if( get_field('our_story_text', 2) ): ?>
	        <p><?php echo the_field('our_story_text', 2); ?></p>
            <?php endif; ?>
	    </div>
	    
	    <div class="insta-wrapper">
	        <?php

			  function fetchData($url){
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL, $url);
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
			  $result = curl_exec($ch);
			  curl_close($ch); 
			  return $result;
			  }    
			    
			  $result = fetchData("https://api.instagram.com/v1/users/2256713644/media/recent/?access_token=2256713644.057f2b1.078e14cbf573433ea07e2fe96771fe78&count=3");
			
			
			$result = json_decode($result);
			foreach ($result->data as $post) {
			    if(empty($post->caption->text)) {
			    // Do Nothing
			    }
			    else {
			        echo '<div><a class="instagram-unit" target="blank" href="'.$post->link.'">
			        <img src="'.$post->images->low_resolution->url.'" class="img-circle" alt="'.$post->caption->text.'" width="100%" height="auto" /></a></div>';
			 }
			
			}
			    
			?>
	    </div>
	</div> <!-- End of Wrapper -->
</div>