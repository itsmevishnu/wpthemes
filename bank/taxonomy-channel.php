<?php
/**
* Taxonomy template for the channels
*/
get_header(); ?>
<?php get_template_part('template-parts/sticky-menu');?>
<div class="main-conatiner">
	
		<?php
		if ( function_exists('category_image_src') ) {
			$category_image = category_image_src( array( 'size' => 'full' ) , false );
		} else {
			$category_image = '';
		}
		?>
		<?php if( $category_image ): ?>
			<div class="inner-banner">
				<img src="<?php echo $category_image; ?>" alt="<?php echo get_the_title(); ?>">
			</div>
		<?php endif;?>
	
	<div class="container">
	
		<nav class="breadcrumb">
			<?php if ( function_exists( 'bcn_display' ) ) {
			  bcn_display();
			} ?>
		</nav>


		<div class="inner-wrapper">
			<div class="common-tab">
				<div class="left-tab">

					<ul class="nav">
					<?php
					/**
					 * Reports taxonomy terms listing
					 */
						$current_term_id = get_queried_object()->term_id;
						$terms = get_terms([
								'taxonomy' => 'channel',
								'hide_empty' => false,
						]);
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							echo '<ul class="nav nav-tabs" role="tablist">';
								foreach ($terms as $term) {
									$url = get_term_link($term); ?>
										<li class="<?php if( $current_term_id == $term->term_id ) { echo "active"; } ?>">
										<a href="<?php echo $url;?>">
											<?php echo $term->name; ?>
										</a>
									</li>
								<?php
								}
							echo '</ul>';
						}
					?>


					<?php
					/**
					* Post side bar widgets
					*/
					if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				<?php endif; ?>

			</div>
			<div class="right-tab">
				<h2><?php echo single_term_title();?></h2>
				<div class="account-rules">
				<?php
				echo wpautop( term_description() );
				?>
			</div>
				<?php
				$channels_args = array(
					'post_type'      => 'channels',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'tax_query'       => array(
						array(
						'taxonomy'         => 'channel',
						'field'            => 'slug',
						'terms'            => get_queried_object()->slug,
						'include_children' =>false,
					)
				),
				'order'    => 'ASC',
				'order_by' => 'menu_order'
			);
			$channels = new WP_query($channels_args);
			if($channels->have_posts()):
				?>
				<div class="sub-tab">
					<ul class="nav nav-tabs" role="tablist">
						<?php $i = 0;?>
						<?php while($channels->have_posts()):$channels->the_post();?>
							<?php $class = (0 === $i)? 'active' : '' ;?>
							<li role="presentation" class="<?php echo $class;?>"><a href="#<?php echo get_post_field( 'post_name',get_the_id() );?>" aria-controls="<?php echo  get_post_field( 'post_name',get_the_id() );?>" role="tab" data-toggle="tab" ><?php echo strtoupper(get_the_title());?></a>
							</li>
							<?php $i ++ ;?>
						<?php endwhile;?>
					</ul>
					<div class="tab-content">
						<?php $i = 0;?>
						<?php while($channels->have_posts()):$channels->the_post();?>

							<?php $class = (0 === $i)? 'active' : '' ;?>
							<div role="tabpanel" class="tab-pane <?php echo $class;?>" id="<?php echo get_post_field( 'post_name',get_the_id() );?>">
								<?php echo wpautop(get_the_content());?>
							</div>
							<?php $i ++ ;?>
						<?php endwhile;?>
					</div>
					<?php wp_reset_query();?>
				</div>
			<?php endif;?>

		</div>
	</div>
</div>
</div>

<?php get_template_part( 'template-parts/footer-image-menu' );?>
</div>
<?php get_footer(); ?>
