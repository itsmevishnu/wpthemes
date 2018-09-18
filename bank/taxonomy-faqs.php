<?php
/**
* Taxonomy template for the product type
*/
get_header();
?>
<?php get_template_part('template-parts/sticky-menu');?>
<div class="main-conatiner">
	
		<?php
		if ( function_exists('category_image_src') ) {
			$category_image = category_image_src( array( 'size' => 'full' ) , false );
		} else {
			$category_image = '';
		}
		?>
		<?php if($category_image): ?>
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
							'taxonomy' => 'faqs',
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
					</ul>

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
					<?php echo wpautop( term_description() ); ?>
					<div class="acrdn-wrapper">
						<div class="panel-group invest-accordion" id="accordion" role="tablist" aria-multiselectable="true">
							<?php
								$faq_args = array(
									'post_type' => 'faq',
									'post_status' => 'publish',
									'posts_per_page' => -1,
									'tax_query' => array(
										array('taxonomy' => 'faqs',
										'field'    => 'slug',
										'terms'    => get_queried_object()->slug,
										'include_children' =>false,
									)
								),
								'order' => 'ASC',
								'order_by' => 'menu_order'
								);
								$faq = new WP_query($faq_args);
								if ( $faq -> have_posts() ):
									while( $faq -> have_posts() ):$faq->the_post();
									?>					
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed"><?php echo get_the_title(); ?></a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
												<div class="panel-body">
													<p><?php echo wpautop(get_the_content()); ?></p>
												</div>
											</div>
										</div>								
									<?php endwhile;?>
									<?php wp_reset_query();?>
								<?php endif;?>
						</div>
					</div>
				</div>
		</div>
	</div>
 </div>
<?php get_template_part('template-parts/footer-image-menu');?>
</div>
<?php get_footer(); ?>
