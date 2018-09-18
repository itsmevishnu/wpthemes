<?php
get_header(); ?>

	<div class="main-conatiner">
		<div class="container">

			<nav class="breadcrumb">
				<?php 
					if ( function_exists( 'bcn_display' ) ) {
					  bcn_display();
					} 
				?>
			</nav>
		
			<div class="inner-wrapper">
				<div class="common-tab">
					<div class="search-result tab-content">
						<div class="tab-pane active" role="tabpanel">
							<?php if ( have_posts() ) : ?>
								<h2>
									<?php 
										printf( __( 'Search Results for: %s', 'esaf_textdomain' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); 
									?>
								</h2>
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();
									get_template_part( 'template-parts/content', 'search' );
								endwhile;
			
								the_posts_pagination( array(
									'prev_text'          => __( 'Previous page', 'esaf_textdomain' ),
									'next_text'          => __( 'Next page', 'esaf_textdomain' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'esaf_textdomain' ) . ' </span>',
								) );

								else :
									get_template_part( 'template-parts/content', 'none' );

								endif;
							?>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
