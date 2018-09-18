<?php 
/**
 * Template Name: Home Template
 */
get_header('home');?>
<div class="main-conatiner">

	<div class="home-slider"> 
		<div class="slider-home-block">
			<div class="slider-video-block">
			<?php
			$youtube_arg = array(
				'post_type' => 'videos',
				'post_status' => 'publish',
				'posts_per_page' => 2,
				'order' => 'ASC',
				'order_by' => 'date'
			);
			$videos = new WP_query($youtube_arg);
			if($videos->have_posts()){
				while($videos->have_posts()): $videos->the_post();
				?>
				<p class="txt-bld"><?php echo get_the_content();?></p> 
				<div class="slider-video">
				<a target="_blank" href = "<?php echo get_post_meta( get_the_ID(), 'link', true);?>">
					<img src="<?php echo get_the_post_thumbnail_url( get_the_ID());?>" alt="<?php echo get_the_title();?>">
				</a>
				</div>
				<?php
				endwhile;
			}else{
				_e('No video found', 'esaftheme');
			}
			?>     
				
			</div>
			<div id="owl-demo" class="owl-carousel owl-theme">
			<?php
				$slider_args = array(
					'post_type' => 'sliders',
					'post_status' => 'publish',
					'posts_per_page' => 10,
					'tax_query' => array(
						array('taxonomy' => 'slider-type',
								'field'    => 'slug',
								'terms'    => 'home-slider',
							)
						),
					'order' => 'ASC',
					'order_by' => 'date'
				);
				$sliders = new WP_query($slider_args);
				if($sliders->have_posts()) {
					while($sliders->have_posts()):$sliders->the_post()
						?>
						<div class="item">
							<div class="slider-wrapper">
							<?php
							$slider_link_to = get_post_meta( get_the_id(), 'link', true );
							if ( $slider_link_to ) { ?>
								<a href="<?php echo $slider_link_to; ?>" alt="<?php echo get_the_title(); ?>">
							<?php } ?>									
									<img src="<?php echo get_the_post_thumbnail_url(get_the_id()); ?>" alt="<?php echo get_the_title();?>">
									<span class="slider-caption"><?php echo get_the_content(); ?></span>
							<?php if ( $slider_link_to ) { ?>
								</a>
							<?php } ?>									   
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_query();	
				} else {
					_e('No sliders found','esaftheme');
				}
			?>
			
			</div>
		</div>

		<div class="container">

			<div class="home-info-block">
			<?php 
				$quick_menu_args = array(
					'menu' => 'quick_menu',
					'container' => null,
					'theme_location' => 'quick_menu'
				);
				wp_nav_menu($quick_menu_args);
			?>
			</div>

			<div class="slider-video-mob">
				<?php
					$youtube_arg = array(
						'post_type' => 'videos',
						'post_status' => 'publish',
						'posts_per_page' => 2,
						'order' => 'ASC',
						'order_by' => 'date'
					);
					$videos = new WP_query($youtube_arg);
					if($videos->have_posts()){
						while($videos->have_posts()): $videos->the_post();
						?>
						<p class="txt-bld"><?php echo get_the_content();?></p> 
						<div class="slider-video">
						<a target="_blank" href = "<?php echo get_post_meta(get_the_ID(),'link',true);?>">
							<img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="<?php echo get_the_title();?>">
						</a>
						</div>
						<?php
						endwhile;
					}else{
						_e('No video found', 'esaftheme');
					}
				?>
			</div>
		</div>
	</div>
	       
</div>
<?php get_footer('home');?>