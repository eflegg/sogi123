<?php
/**
 * The template for displaying search forms in davedeveau
 *
 * @package davedeveau
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'davedeveau' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'davedeveau' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'davedeveau' ); ?>">
</form>

