<?php
/**
 * Template part for the left side bar of about page
 */
?>
<div class="left-tab">
	<?php
		$menu_name = get_post_meta( get_the_ID(), 'leftdropdownmenu', true );
		if ( $menu_name != "0" ) {
			$header_menu_args = array(
				'menu' => $menu_name,
				'container' => '',
				'container_class' => '',
				'items_wrap' => '<ul class="nav nav-tabs">%3$s</ul>'
				);
			wp_nav_menu($header_menu_args);
		}	
	/**
	 * Page side bar widgets
	 */
		if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="left-ad-wraper">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>	
		<?php endif; ?>	
</div>