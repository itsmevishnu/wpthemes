<?php
/**
 * Template for displaying search forms 
 * */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input class="search-input" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php _e( "Search", 'esaftheme' );?>" type="text">
	<button type="submit" class="search-submit" >           
</form>
