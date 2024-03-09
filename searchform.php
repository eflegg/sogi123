<?php
/**
 * A custom search form based on the template for displaying search forms in davedeveau
 *
 * 
 */
?>


<form role="search" method="get" class="custom-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'davedeveau' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'davedeveau' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label> 
    <hr class="search-vert-line">

    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'davedeveau' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
   

    <button type="submit" name="submit" class="no-btn custom-search__submit " id="searchsubmit2" value="<?php echo esc_attr_x( 'Search', 'submit button', 'davedeveau' ); ?>">
    <img src="<?php bloginfo('template_url'); ?>/images/svg/graphite-search.svg" />
    </button>

</input>
</form>


