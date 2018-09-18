<?php
/**
 * The 404 error page
 */
get_header();
?>
	<div class="main-conatiner">
		<div class="container">

			<nav class="breadcrumb">
		      <?php if ( function_exists( 'bcn_display' ) ) {
		          bcn_display();
		      } ?>
		    </nav>
		    
			<div class="inner-wrapper">
				<div class="common-tab"> 
					<section class="error-404 not-found tab-content">
						<div class="tab-pane active" role="tabpanel">						
							<h2>
								<?php 
									_e( 'Oops! That page can&rsquo;t be found.', 'esaf_textdomain' ); 
								?>
							</h2>
							<div class="page-content">
								<p>
									<?php 
										_e( 'It looks like nothing was found at this location.', 'esaf_textdomain' ); 
									?>
								</p>
							</div><!-- .page-content -->							
						</div>
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();