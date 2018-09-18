<?php
/**
 * team type category page 
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
			<div class="full-page"> 
				<h2><?php echo single_term_title();?></h2>
				<div class="team-wrapper"> 
					<?php 
						$team_args = array(
							'post_type'      => 'members',
							'post_status'    => 'publish',
							'posts_per_page' => -1,
							'tax_query'      => array(
								array('taxonomy'   => 'team',
										'field'    => 'slug',
										'terms'    => get_queried_object()->slug,
									)
								),
							'order'    => 'ASC',
							'order_by' => 'date'
						);
					$board_members = new WP_query( $team_args );
					if($board_members->have_posts()): 
					$i = 1;
					while($board_members->have_posts()): $board_members->the_post();
					$team_array = get_post_meta( get_the_id(),'team_extra_details', true );
					?>
						<div class="team-blk item-<?php echo $i;?>">
						  <div class="team-blk-title">
							<h5 class="team-title"><?php echo get_the_title();?></h5>
						  </div>
						  <div class="team-position-content">
							<div class="img-wrap">                                          
							  <img src="<?php echo $team_array['list_image'];?>" alt="<?php echo get_the_title();?>">
							</div> 
							<p><?php echo $team_array['position'];?></p> 
							<a href="<?php echo get_the_permalink( get_the_id() ); ?>" class="readmore">Read more</a> 
						  </div>
						</div>
				
					<?php $i ++; ?>
					<?php endwhile;?>
					<?php wp_reset_query();?>
					<?php endif;?>
						</div>
			</div>
		</div>
	</div>
</div>			
<?php get_footer(); ?>