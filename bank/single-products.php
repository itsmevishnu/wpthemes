<?php
/**
 * Template Name: Single column template 
 */
	get_header();
?>
<?php get_template_part('template-parts/sticky-menu');?>

<?php if(have_posts()): the_post();?>
	<div class="main-conatiner">

		<?php if ( get_the_post_thumbnail_url( get_the_ID() ) ) { ?>
			<div class="inner-banner">
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()) ;?>" alt="Banner image of <?php echo get_the_title(); ?>">
			</div>
		<?php } ?>
			
		<div class="container">

			<nav class="breadcrumb">
		      <?php if ( function_exists( 'bcn_display' ) ) {
		          bcn_display();
		      } ?>
		    </nav>

			<div class="inner-wrapper">
				<div class="common-tab">

					<div class="left-tab">
						<nav class="sidebar" role="navigation">
						    <div class="sidebar-nav navbar-collapse">								
								<?php
									/*
									* Reports taxonomy terms listing
									*/
									$taxonomy_name = 'account';	
									
									$current_terms = get_the_terms( get_the_ID(), $taxonomy_name );

									$current_term_id = $current_terms[0]->term_id;

									$parent  = get_term_by( 'id', $current_term_id, $taxonomy_name);
									// climb up the hierarchy until we reach a term with parent = '0'
									while ( $parent->parent != '0' ) {
									  $term_id = $parent->parent;
									  $parent  = get_term_by( 'id', $term_id, $taxonomy_name );
									}
									$term_id = $parent->term_id;

									$term_children = get_term_children( $term_id, $taxonomy_name );
									if ( $term_children ) {
									echo '<ul id="side-menu">';
									foreach ( $term_children as $child ) {

									  $term = get_term_by( 'id', $child, $taxonomy_name );
									  $class = ( $current_term_id === $term->term_id ) ? 'active' : '';
									  echo '<li class="' . $class . '" ><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '<span class="fa arrow"></span></a>';

									    $account_arg = array(
									      'post_type' => 'products',
									      'post_status' => 'publish',
									      'posts_per_page' => -1,
									      'tax_query' => array(
									        array('taxonomy' => $taxonomy_name,
									            'field'    => 'slug',
									            'terms'    => $term->slug,
									            'include_children' =>false,
									          )
									        ),
									      'order' => 'ASC',
									      'order_by' => 'menu_order'
									    );
									    $accounts = new WP_query($account_arg);
									    echo "<ul class='nav-second-level' >";
									    if($accounts->have_posts()):
									      while($accounts->have_posts()):$accounts->the_post();?>
									          <li>
									            <a href="<?php echo get_the_permalink(); ?>" >
									              <?php echo get_the_title(); ?>
									            </a>                        
									          </li>

									      <?php 
									      endwhile;
									    endif;
									    echo "</ul></li>";                    
									  }
									echo '</ul>';
									} else {
									echo '<ul id="side-menu">';
									  echo '<li class="active" ><a href="' . $parent->slug . '">' . $parent->name . '<span class="fa arrow"></span></a>';
									    $account_arg = array(
									      'post_type' => 'products',
									      'post_status' => 'publish',
									      'posts_per_page' => -1,
									      'tax_query' => array(
									        array('taxonomy' => $taxonomy_name,
									            'field'    => 'slug',
									            'terms'    => $parent->slug,
									            'include_children' =>false,
									          )
									        ),
									      'order' => 'ASC',
									      'order_by' => 'menu_order'
									    );
									    $accounts = new WP_query($account_arg);
									    echo "<ul class='nav-second-level' >";
									    if($accounts->have_posts()):
									      while($accounts->have_posts()):$accounts->the_post();?>
									          <li>
									            <a href="<?php echo get_the_permalink(); ?>" >
									              <?php echo get_the_title(); ?>
									            </a>                        
									          </li>

									      <?php 
									      endwhile;
									    endif;
									    echo "</ul></li></ul>";
									    
									}
									wp_reset_query();

								?>
							</div>                              
						</nav>

						<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
						  <?php dynamic_sidebar( 'sidebar-4' ); ?>
						<?php endif; ?>
					</div>

					<div class="right-tab">					
						<h2><?php echo get_the_title();?></h2>
						<div class="account-more-dtls">
							<?php 
								echo wpautop( do_shortcode( get_the_content() ) );
							?>
						</div>
						<div class="inside-more-block">

						  	<?php if ( get_post_meta( get_the_ID(), 'salient_feature', true ) || get_post_meta( get_the_ID(), 'digital_feature', true ) || get_post_meta( get_the_ID(), 'other_feature', true ) ) { ?>
						  	 
						  	<h5>Features</h5>
							<div class="two-col-b">
								<div class="acnt-more-blk left-b">									
									<?php
										if ( get_post_meta( get_the_ID(), 'salient_feature', true ) ) {
											echo wpautop( do_shortcode( get_post_meta( get_the_ID(), 'salient_feature', true ) ) );
										}
									?>
								</div>
								<?php
									if ( get_post_meta( get_the_ID(), 'digital_feature', true ) ) {
										echo '<div class="acnt-more-blk right-b">' . wpautop( do_shortcode( get_post_meta( get_the_ID(), 'digital_feature', true ) ) ) . '</div>';
									}
								?>								
							</div>
						    <?php
								if ( get_post_meta( get_the_ID(), 'other_feature', true ) ) {
									echo '<div class="acnt-more-blk full-b">' . wpautop( do_shortcode( get_post_meta( get_the_ID(), 'other_feature', true ) ) ) . '</div>';
								}
							?>
							<?php } ?>

							<div class="button-wrap">
								<?php if( $apply_link = get_post_meta(get_the_ID(),'apply_link', true) ) : ?>
									<a href="<?php echo $apply_link; ?>" class="btn-red">
										<span>APPLY ONLINE</span>
									</a>
								<?php endif; ?>
								<?php if( $more_link = get_post_meta(get_the_ID(),'more_link', true )): ?>
									<a href="<?php echo $more_link; ?>" class="btn-red">
										<span>KNOW RULES</span>
									</a>
								<?php endif;?>
							</div>							

							<div class="branch-atm-location">
								<div class="branchloc">                    
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/branch-atm.png" alt="">
									<label>Locate Branch / ATMs</label>
									<input class="input-location" type="text" name="location" placeholder="Location">
									<div class="atm-locate">
										<input type="radio" class="radiobox" id="atm_location" name="atm_loca">
										<span></span>
										<label for="atm_loca">ATM</label>
									</div>
									<div class="brch-locate">
										<input type="radio" class="radiobox" id="branch_lo" name="atm_loca">
										<span></span>
										<label for="branch_lo">Branch</label>
									</div>
									<a href="/find-your-nearest-branch/" class="btn-trans">
										<span>View the location &nbsp;> </span>
									</a>
								</div>
							</div>

							<div class="interest-info" style="background: url(<?php echo get_stylesheet_directory_uri(); ?>/images/interest-rate-bg.jpg) no-repeat center center;">
								<div class="int-in">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/interest-rate.png" alt="">
									<label>Interest Rates</label>
									<a href="/interest-rates/" class="btn-trans">
								    <span>View &nbsp;> </span>
								  </a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php get_template_part('template-parts/footer-image-menu');?>
	</div>
<?php endif;?>
<?php get_footer();