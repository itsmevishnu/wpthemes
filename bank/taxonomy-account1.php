<?php
/**
 * Taxonomy template for the product type
 */
get_header(); ?>
<?php get_template_part('template-parts/sticky-menu');?>
<div class="main-conatiner">
	<div class="inner-banner">
	<?php
		if (function_exists('category_image_src')) {
			$category_image = category_image_src( array( 'size' => 'full' ) , false );
		} else {
			$category_image = '';
		}
	?>
	<?php if ( $category_image ): ?>
		<img src="<?php echo $category_image;?>" alt="<?php echo get_the_title();?>">
	<?php endif;?>
	</div>
	<div class="container">
			<div class="inner-wrapper">
				<div class="common-tab">
					<div class="left-tab">
		                <ul class="nav">
		                <?php
										$term_parent = get_term_by( 'slug',get_queried_object()->slug,'account' );
										$sub_terms = get_term_children( $term_parent->term_id,'account');
		  				//check if subterm exist or not, if not have subterm, find parent id

		  					if( ! $sub_terms ) {
		  						$term_array = get_term( $term_parent->term_id,'account' );
		  						if ($term_array->parent){
		  							$sub_terms = get_term_children( $term_array->parent, 'account' );
		  						}

		  					}
		                ?>
		                <?php
		                	global $wp;
							$current_url = home_url(add_query_arg(array(),$wp->request));
		                ?>
		                <?php if($sub_terms) : ?>
		                <?php foreach ($sub_terms as $child):
		                	$term = get_term_by( 'id', $child, 'account' );
		                	$link = get_term_link( $term);
		                	$class = ($current_url.'/' === $link) ? 'active' : '';
		                	?>
		                  <li class = "<?php echo $class; ?>"><a href="<?php echo $link;?>"><?php echo $term->name; ?></a></li>
		              <?php endforeach;?>
		          <?php endif;?>
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
						<div class="account-rules">
						<?php
							echo wpautop( term_description() );
						?>
					</div>
					<?php
						$account_arg = array(
							'post_type' => 'products',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'tax_query' => array(
								array('taxonomy' => 'account',
										'field'    => 'slug',
										'terms'    => get_queried_object()->slug,
										'include_children' =>false,
									)
								),
							'order' => 'ASC',
							'order_by' => 'menu_order'
						);
					$accounts = new WP_query($account_arg);
					if($accounts->have_posts()):
					?>
				<div class="sub-tab">
                  <ul class="nav nav-tabs" role="tablist">
                  <?php $i = 0;?>
                  <?php while($accounts->have_posts()):$accounts->the_post();?>
                  	<?php $class = (0 === $i)? 'active' : '' ;?>
                      <li role="presentation" class="<?php echo $class;?>"><a href="#<?php echo get_post_field( 'post_name',get_the_id() );?>" aria-controls="<?php echo  get_post_field( 'post_name',get_the_id() );?>" role="tab" data-toggle="tab" ><?php echo strtoupper(get_the_title());?></a>
                      </li>
                      <?php $i ++ ;?>
                    <?php endwhile;?>
                  </ul>
                  <div class="tab-content">
                  <?php $i = 0;?>
                  <?php while($accounts->have_posts()):$accounts->the_post();?>

                    <?php $class = (0 === $i)? 'active' : '' ;?>
                    <div role="tabpanel" class="tab-pane <?php echo $class;?>" id="<?php echo get_post_field( 'post_name',get_the_id() );?>">
                      <?php echo wpautop( do_shortcode( get_the_content() ) );?>
                      <div class="button-wrap">
											<?php if( $apply_link = get_post_meta(get_the_ID(),'apply_link', true) ) : ?>
                        <a href="<?php echo $apply_link; ?>" class="btn-red">
                          <span>APPLY ONLINE</span>
                        </a>
												<?php endif; ?>
												<?php if( $more_link = get_post_meta(get_the_ID(),'more_link', true )): ?>
                        <a href="current-rules.html" class="btn-red">
                          <span>KNOW RULES</span>
												</a>
												<?php endif;?>
                      </div>
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

		<?php get_template_part('template-parts/footer-image-menu');?>
</div>
<?php get_footer(); ?>
