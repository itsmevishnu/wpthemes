<?php
/**
 * Service content template parts
 */
?>
<div class="wearehere">
	<?php $options = get_option( 'theme_options' ); ?>
	<div class="container">
		<h3><?php echo $options['footer_menu_title'];?></h3>
		<p><?php echo wpautop($options['footer_menu_content']); ?></p>
		
		<?php 
		$footer_img_menu = array(
				'menu'           => 'footer_image_menu',
				'container'      => null,
				'theme_location' => 'footer_image_menu'
			);
		wp_nav_menu($footer_img_menu);
		?>
	</div>
</div>