<?php
/**
 * Table of content
 *
 * Shortcode - Accordion wrapper creation
 * Shortcode - Accordion-item creation
 */

/**
 * Shortcode - Accordion wrapper creation
 */
function easf_accordion_fun( $atts, $content = "" ) {
	$atts = shortcode_atts( array(), $atts, 'esaf-accordion' );
	return '<div class="acrdn-wrapper"><div class="panel-group invest-accordion" id="accordion" role="tablist" aria-multiselectable="true">'. do_shortcode($content) .'</div></div>';
}
add_shortcode( 'esaf-accordion', 'easf_accordion_fun' );

/**
 * Shortcode - Accordion-item creation
 */
function easf_accordion_item_fun( $atts, $content = "" ) {
	$atts = shortcode_atts( array(
		'title' => null
	), $atts, 'esaf-accordion-item' );
	$content = wpautop( trim( $content ) );
	return '<div class="panel panel-default"><div class="panel-heading" role="tab" id="headingOne"><h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-" aria-expanded="false" class="collapsed" aria-controls="collapse-">'.$atts['title'].'</a></h4></div><div id="collapse-" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne"><div class="panel-body"><p>'. do_shortcode($content) .'</p></div></div></div>';
}
add_shortcode( 'esaf-accordion-item', 'easf_accordion_item_fun' );

/**
 * Shortcode - Milestones creation
 */
function easf_milestones_fun( $atts, $content = "" ) {
	$atts = shortcode_atts( array(), $atts, 'esaf-milestones' );

	$custom_terms = get_terms('milestones-category');
                $output = '<div class="milestone-tabs">';

                	$output .= '<div id="sync1" class="owl-carousel">';
						foreach($custom_terms as $custom_term) {
						    wp_reset_query();
						    $args = array('post_type' => 'milestones',
						        'tax_query' => array(
						            array(
						                'taxonomy' => 'milestones-category',
						                'field' => 'slug',
						                'terms' => $custom_term->slug,
						            ),
						        ),
						     );

						     $loop = new WP_Query($args);
						     if($loop->have_posts()) {
						     	$output .=  '<div class="item"><div class="owl-demo-milestone owl-carousel">';
							        while($loop->have_posts()) : $loop->the_post();
							            $output .=  '<div class="item"><img src="' . get_the_post_thumbnail_url() . '" alt=""></div>';
							        endwhile;
						        $output .=  '</div></div>';				        
						     }
						     
						}
					$output .= '</div>';

					$output .=  '<div id="sync2" class="owl-carousel">';	
						foreach($custom_terms as $custom_term) {
							$output .=  '<div class="item">'.$custom_term->name.'</div>';
						}
					$output .=  '</div>';
					
				$output .=  '</div>';

	return $output;
}
add_shortcode( 'esaf-milestones', 'easf_milestones_fun' );

/**
 * Shortcode - Awards creation
 */
function easf_awards_fun( $atts, $content = "" ) {
	$atts = shortcode_atts( array(), $atts, 'esaf-milestones' );

	$custom_terms = get_terms('awards-category');
                $output = '<div class="milestone-tabs">';

                	$output .= '<div id="sync1" class="owl-carousel">';
						foreach($custom_terms as $custom_term) {
						    wp_reset_query();
						    $args = array('post_type' => 'awards',
						        'tax_query' => array(
						            array(
						                'taxonomy' => 'awards-category',
						                'field' => 'slug',
						                'terms' => $custom_term->slug,
						            ),
						        ),
						     );

						     $loop = new WP_Query($args);
						     if($loop->have_posts()) {
						     	$output .=  '<div class="item"><div class="owl-demo-milestone owl-carousel">';
							        while($loop->have_posts()) : $loop->the_post();
							            $output .=  '<div class="item"><img src="' . get_the_post_thumbnail_url() . '" alt=""></div>';
							        endwhile;
						        $output .=  '</div></div>';				        
						     }
						     
						}
					$output .= '</div>';

					$output .=  '<div id="sync2" class="owl-carousel">';	
						foreach($custom_terms as $custom_term) {
							$output .=  '<div class="item">'.$custom_term->name.'</div>';
						}
					$output .=  '</div>';
					
				$output .=  '</div>';

	return $output;
}
add_shortcode( 'esaf-awards', 'easf_awards_fun' );