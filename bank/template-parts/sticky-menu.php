<?php
/**
 * Sticky menu
 */
?>
    <section class="slide-h">
        <div class="slide-call" style="z-index: 202;">
            <div class="call-click">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/call-2-action-01.png" />
            </div>
            <div class="call-hidden">
                <div class="home-info-block slide-info">
					<?php 
						$quick_menu_args = array(
							'menu' => 'quick_menu',
							'container' => null,
							'theme_location' => 'quick_menu'
						);
						wp_nav_menu($quick_menu_args);
					?>
                </div>
            </div>
        </div>
    </section>