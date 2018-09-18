<?php
/**
 * Template Name: Vision Mission template 
 */
	get_header();
?>

<?php get_template_part('template-parts/sticky-menu');?>

<?php if(have_posts()): the_post();?>
	<div class="main-conatiner">

		<?php if ( get_the_post_thumbnail_url( get_the_ID() ) ) { ?>
			<div class="inner-banner">
				<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="Banner image of <?php echo get_the_title(); ?>">
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
					<?php get_template_part('template-parts/left-sidebar-menu');?>
					<div class="right-tab">               
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="visionmission">
			                    <h2><?php echo get_the_title();?></h2>
			                    <div class="vision-mission-block">
				                    <ul>
				                        <li>
				                            <?php 
												echo wpautop( get_the_content() );
											?>
				                        </li>
				                        <li>
				                        	<?php
												echo wpautop( get_post_meta( get_the_ID(), 'others', true ) );
											?>
				                        </li>
				                    </ul>
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