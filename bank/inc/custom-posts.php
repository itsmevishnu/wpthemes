<?php

/**
 * used to create some custom posts
 */
function esaf_custom_posts() {
	//create account custom post type
	esaf_create_custom_posts(esaf_custom_lables('Product','Products'), 'products', 'dashicons-archive');
	//create FAQ custom post type
	esaf_create_custom_posts(esaf_custom_lables('FAQ','FAQs'), 'faq', 'dashicons-editor-help');
	//create milestone custom post type
	esaf_create_custom_posts(esaf_custom_lables('Milestone','Milestones'), 'milestones', 'dashicons-chart-area');
	// create team custom post type
	esaf_create_custom_posts(esaf_custom_lables('Member','Memebers'), 'members', 'dashicons-groups');
	// create career custom post type
	esaf_create_custom_posts(esaf_custom_lables('Career','Careers'), 'careers', 'dashicons-welcome-learn-more');
	//create slider custom post type
	esaf_create_custom_posts(esaf_custom_lables('Slider','Sliders'), 'sliders', 'dashicons-images-alt');
	//create testimonial post type
	esaf_create_custom_posts(esaf_custom_lables('Testimonial','Testimonials'), 'testimonials', 'dashicons-testimonial');
	//create a video link for home
	esaf_create_custom_posts(esaf_custom_lables('Video','Videos'), 'videos', 'dashicons-admin-collapse');
	//create services post type
	esaf_create_custom_posts(esaf_custom_lables('Service','Services'),'services', 'dashicons-admin-site');
	//create a awards post type 
	esaf_create_custom_posts(esaf_custom_lables('Award','Awards'), 'awards', 'dashicons-awards');
	//create reports post type 
	esaf_create_custom_posts(esaf_custom_lables('Report','Reports'),'reports', 'dashicons-clipboard');
	//create channels post type
	esaf_create_custom_posts(esaf_custom_lables('Channel','Channels'), 'channels','dashicons-rss');
	//create media post type
	esaf_create_custom_posts(esaf_custom_lables('Media','Media'), 'media','dashicons-format-gallery');
}
/**
 * Create labels for each custom posts
 * @param  [type] $singular singular name for the custom posts
 * @param  [type] $plural   Plural name for the custom posts
 * @return [type]  an array of various labels for the custom posts
 */
function esaf_custom_lables($singular, $plural) {
	$labels = array(
		'name'               => __( $plural,  'esaftheme' ),
		'singular_name'      => __( $singular,  'esaftheme' ),
		'menu_name'          => __( $plural, 'esaftheme' ),
		'name_admin_bar'     => __( $singular, 'esaftheme' ),
		'add_new'            => __( 'Add New', 'esaftheme' ),
		'add_new_item'       => __( 'Add New ' . $singular, 'esaftheme' ),
		'new_item'           => __( 'New '. $singular, 'esaftheme' ),
		'edit_item'          => __( 'Edit ' . $singular, 'esaftheme' ),
		'view_item'          => __( 'View '. $singular, 'esaftheme' ),
		'all_items'          => __( 'All '.$plural, 'esaftheme' ),
		'search_items'       => __( 'Search ' .$plural , 'esaftheme' ),
		'parent_item_colon'  => __( 'Parent '. $plural, 'esaftheme' ),
		'parent_item_colon'  => __( 'Parent '. $plural, 'esaftheme' ),
		'not_found'          => __( 'No '.$plural.' found.', 'esaftheme' ),
		'not_found_in_trash' => __( 'No '.$plural.' found in Trash.', 'esaftheme' )
		);
	return $labels;
}
/**
 * Create the custom post types
 * @param  [type] $esaf_labels [Labels for the custom posts]
 * @param  [type] $slug        [slug of the custom posts]
 * @param  [type] $menu_icon   [icon shown in the dash board]
 * @return [type]              
 */
function esaf_create_custom_posts($esaf_labels, $slug, $menu_icon){
	$args = array(
		'labels'             => $esaf_labels,
		'description'        => __( 'Description.', 'esaftheme' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'			 => $menu_icon,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt','revisions')
		);
	register_post_type( $slug, $args );
}

// hook the function to  init hook
add_action('init', 'esaf_custom_posts' );