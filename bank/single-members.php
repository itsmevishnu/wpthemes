<?php
/**
 * team post template file
 */
get_header(); 
get_template_part( 'template-parts/sticky-menu' );
if(have_posts()):
	while(have_posts()):the_post();
	$team_array = get_post_meta( get_the_id(), 'team_extra_details', true );

?>
<div class="main-conatiner">

	<?php if( get_the_post_thumbnail_url( get_the_id() ) ): ?>
		<div class="inner-banner">        
			<img src="<?php echo get_the_post_thumbnail_url( get_the_ID() ); ?>" alt="<?php echo get_the_title(); ?>">       
		</div>
	<?php endif; ?>

	<div class="container">

		<nav class="breadcrumb">
			<?php if ( function_exists( 'bcn_display' ) ) {
			  bcn_display();
			} ?>
	    </nav>

		  <div class="inner-wrapper">
			<div class="full-page">             
			  <div class="team-dtls-page">
			  <div class="row"> 
				<!-- Sidebar -->
				<div class="col-md-4">
				  <div class="team-side-bar">
					<div class="team-img-hlder"> 
					  <img src="<?php echo $team_array['profile_image']?>" class="img-responsive" alt="<?php echo get_the_title();?>">
					</div>  
					<ul class="team-personal-info">
					  <li><?php echo get_the_title();?></li>                      
					  <li class="design">
						<?php echo $team_array['position'];?>
					  </li>                      
					</ul> 
													  
				  </div>
				</div>
				
				<!-- MAIN CONTENT -->
				<div class="col-md-8">
				  <div class="team-tab-wrap">  
				  <h5 class="team-tittle">Board of Directors</h5>                 
					<div class="tab-content" id="myTabContent">
					  <div role="tabpanel" class="tab-pane active" id="home">
						<div class="inside-sec"> 
						  <ul class="team-personal-info">
							<?php if ( get_the_title() ) { ?>
							<li>
							  <p> <span>Name</span><b><?php echo get_the_title();?></b></p>
							</li>
							<?php } ?>
							
							<?php if ( $team_array['dob'] ) { ?>
							<li>
							  <p> <span>Date of Birth</span><b><?php echo $team_array['dob'];?></b></p>
							</li>
							<?php } ?>

							<?php if ( $team_array['res_address'] ) { ?>
							<li>
							  <p> <span>Residential Address</span>
								<b><?php echo $team_array['res_address'];?></b></p>
							</li>
							<?php } ?>

							<?php if ( $team_array['off_address'] ) { ?>
							<li>
							  <p> <span>Office Address</span>
									<b><?php echo $team_array['off_address'];?></b>
								</p>
							</li>
							<?php } ?>

							<?php if ( $team_array['mob_phone'] || $team_array['res_phone'] || $team_array['off_phone'] ) { ?>
							<li>
							  <p> <span>Phone</span>
								<b>M : <?php echo $team_array['mob_phone'];?><br>
								R : <?php echo $team_array['res_phone'];?> <br>
								O : <?php echo $team_array['off_phone'];?></b> 
							  </p>
							</li>
							<?php } ?>

							<?php if ( $team_array['off_address'] ) { ?>
							<li>
							  <p> <span> E-mail</span> <a href="mailto:<?php echo $team_array['email'];?>"><?php echo $team_array['email'];?></a> </p>
							</li>
							<?php } ?>

							<?php if ( $team_array['qualification'] ) { ?>
							<li>
							  <p> <span>Professional / Educational Qualifications</span><b>
								<?php echo $team_array['qualification'];?>
							  </b>
							  </p>
							</li>
							<?php } ?>                        
						  </ul>

							<?php if ( $team_array['academic'] ) { ?>
							<h5 class="team-tittle">ACADEMIC JOURNEY</h5>
							<div class="tab-team-inner">
							<?php echo wpautop($team_array['academic']);?>
							</div>
							<?php } ?>
					  		<?php if ( get_the_content() ) { ?>
							<h5 class="team-tittle">ACADEMIC JOURNEY</h5>
							<div class="tab-team-inner">
							<?php echo wpautop(get_the_content());?>
							</div>
							<?php } ?>
						</div>
					  </div>                     
					</div>
				  </div>
				</div> 
			  </div>
			</div>
		
	<?php 
		$term_details =  wp_get_post_terms(get_the_id(),'team',array("fields" => "names"));
		$team_args = array(
			'post_type'      => 'members',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'tax_query'      => array(
				array('taxonomy'   => 'team',
						'field'    => 'slug',
						'terms'    => $term_details[0],
					)
				),
			'order'        => 'ASC',
			'post__not_in' => array(get_the_id()),
			'order_by'     => 'menu_order'
		);
		$board_members = new WP_query($team_args);
		if($board_members->have_posts()): 
		$i = 1;
	?>
			<div class="team-short-list">              
				<?php
					while($board_members->have_posts()): $board_members->the_post();
					$team_array = get_post_meta(get_the_id(),'team_extra_details',true);
					?>
			  <div class="team-blk item-<?php echo $i; ?>"> 
				<a href="<?php echo get_the_permalink(get_the_id());?>">
				  <div class="img-wrap">                                          
					<img src="<?php echo $team_array['list_image'];?>" alt="">
				  </div> 
				  <p><?php echo get_the_title();?></p>
				</a>
			  </div>
			<?php endwhile;?>
			<?php wp_reset_query();?>
			</div>   
		<?php endif;?>
	
			  <?php endwhile; ?>
<?php endif; ?>
					 
			 
			</div>
		  </div>
		</div>
		<?php get_template_part( 'template-parts/footer-image-menu' );?>

</div>

<?php get_footer(); ?>