<?php
/**
 * About us template part for slider
 */
get_header();
?>
<div class="inner-banner">
	<?php
	$slider_args = array(
		'post_type' => 'sliders',
		'post_status' => 'publish',
		'posts_per_page' => 1,
		'tax_query' => array(
	array('taxonomy' => 'slider-type',
			'field'    => 'slug',
			'terms'    => 'about-slider',
		)
	),
	'order' => 'ASC',
	'order_by' => 'date'
	);
	$sliders = new WP_query($slider_args);
	if($sliders->have_posts()) {
	while($sliders->have_posts()):$sliders->the_post()
	?>
<img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="<?php echo get_the_title();?>">
<?php endwhile;
wp_reset_query();
}
?>
</div>