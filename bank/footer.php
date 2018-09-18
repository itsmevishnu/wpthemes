<?php
/**
 * Footer file
 */
?>
<footer>
	<div class="container">
		<div class="footer-primary menu-first">
			<?php
				$footer_menu_args = array(
					'menu'            => 'footer_menu',
					'container'       => null,
					'container_class' => '',
					'theme_location'  => 'footer_menu'
					);
				wp_nav_menu( $footer_menu_args );
			?>
		</div>
		<div class="footer-primary menu-second">
			<?php
				$footer_second_menu_args = array(
					'menu'            => 'footer_second_menu',
					'container'       => null,
					'container_class' => '',
					'theme_location'  => 'footer_second_menu'
					);
				wp_nav_menu( $footer_second_menu_args );
			?>
		</div>
		<div class="footer-primary menu-third">
			<?php
				$footer_third_menu_args = array(
					'menu'            => 'footer_third_menu',
					'container'       => null,
					'container_class' => '',
					'theme_location'  => 'footer_third_menu'
					);
				wp_nav_menu( $footer_third_menu_args );
			?>
		</div>
		<?php $options = get_option('theme_options'); ?>
		<ul class="mob-socialmedia">            
			<li class="footer-fb">
				<a href="<?php echo $options['facebook_url'];?>" target="_blank">
					<img src="<?php echo get_template_directory_uri()?>/images/icon_footer_fb.png" alt="facebook" />
				</a>
			</li>
			<li class="footer-twt">
				<a href="<?php echo $options['twitter_url']?>" target="_blank">
					<img src="<?php echo get_template_directory_uri()?>/images/icon_footer_twit.png" alt="twitter" />
				</a>
			</li>
			<li class="footer-gplus">
				<a href="<?php echo $options['google_url'];?>" target="_blank">
					<img src="<?php echo get_template_directory_uri()?>/images/icon_footer_gplus.png" alt="google plus" />
				</a>
			</li>
			<li class="footer-yt">
				<a href="<?php echo $options['youtube_url'];?>" target="_blank">
					<img src="<?php echo get_template_directory_uri()?>/images/icon_footer_youtb.png" alt="youtube" />
				</a>
			</li>
		</ul>     
	</div>
	<div class="mob-footer-wrapper">          
		<div class="mob-foot-block">
			<div class="foot-content" style="display: none;">
				<div class="menu-first">
					<?php
						$footer_mob_menu_args = array(
							'menu'           => 'footer_menu',
							'container'      => null,
							'theme_location' => 'footer_menu'
							);
						wp_nav_menu( $footer_mob_menu_args );
					?>
				</div>
				<div class="menu-second">
					<?php
						$footer_mob_second_menu_args = array(
							'menu'            => 'footer_second_menu',
							'container'       => null,
							'container_class' => '',
							'theme_location'  => 'footer_second_menu'
							);
						wp_nav_menu( $footer_mob_second_menu_args );
					?>
				</div>
				<div class="menu-third">
					<?php
						$footer_mob_third_menu_args = array(
							'menu'            => 'footer_third_menu',
							'container'       => null,
							'container_class' => '',
							'theme_location'  => 'footer_third_menu'
							);
						wp_nav_menu( $footer_mob_third_menu_args );
					?>
				</div>
			</div>

			<div class="heading">
				<h4>
					<img src="<?php echo get_template_directory_uri()?>/images/logo_foot.png" alt="ESAF">
				</h4>
				<div class="plus-arrow"></div>
			</div>

		</div>            
	</div>

		<div class="footer-secondary">
		<div class="container">
			<?php $options = get_option('theme_options'); ?>
			<p class=""><?php echo $options['copy_right']; ?></p>
			<ul>            
				<li class="footer-fb">
					<a href="<?php echo $options['facebook_url'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri()?>/images/icon_fb.png" alt="facebook" />
					</a>
				</li>
				<li class="footer-twt">
					<a href="<?php echo $options['twitter_url']?>" target="_blank">
						<img src="<?php echo get_template_directory_uri()?>/images/icon_twit.png" alt="twitter" />
					</a>
				</li>
				<li class="footer-gplus">
					<a href="<?php echo $options['google_url'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri()?>/images/icon_gplus.png" alt="google plus" />
					</a>
				</li>
				<li class="footer-yt">
					<a href="<?php echo $options['youtube_url'];?>" target="_blank">
						<img src="<?php echo get_template_directory_uri()?>/images/icon_youtb.png" alt="youtube" />
					</a>
				</li>
			</ul>
		</div>
		</div>
	</footer>
	
	<?php wp_footer();?>
</body>
</html>