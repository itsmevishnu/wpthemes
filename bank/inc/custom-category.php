<?php
//create category for sliders
esaf_create_category(esaf_category_labels('Slider', 'Sliders'), 'slider-type', 'sliders');
//create category for services
esaf_create_category(esaf_category_labels('Service', 'Service'), 'service-type', 'services');
//custom category for video post type
esaf_create_category(esaf_category_labels('Video','Videos'),'video-type','videos');
//custom category for team post type
esaf_create_category(esaf_category_labels('Team','Teams'),'team','members');
//custom category for faq post type
esaf_create_category(esaf_category_labels('FAQ','FAQs'),'faqs','faq');
//custom category for career post type
esaf_create_category(esaf_category_labels('Career','Careers'),'career','careers');
//custom category for milstone post type
esaf_create_category(esaf_category_labels('Milestone','Milestones'),'milestones-category','milestones');
//custom category for account post type
esaf_create_category(esaf_category_labels('Product','Products'),'account','products');
//custom category for report post type
esaf_create_category(esaf_category_labels('Report','Reports'),'report','reports');
//custom category for award post type
esaf_create_category(esaf_category_labels('Award','Awards'),'awards-category','awards');
//custom category for channel post type
esaf_create_category(esaf_category_labels('Channel','Channels'),'channel','channels');
//custom category for media post judy_type(array)
esaf_create_category(esaf_category_labels('Media','Media'),'medias','media');


/**
 * Create different category lables
 * @param  [type] $singular [singular name]
 * @param  [type] $plural   [plural name]
 * @return [type]           [description]
 */
function esaf_category_labels($singular, $plural){
	return $labels =  array(
		'name'              => __( $singular . ' Type', 'esaftheme' ),
		'singular_name'     => __( $singular. ' Type', 'esaftheme' ),
		'search_items'      => __( 'Search '.$plural.' Type', 'esaftheme' ),
		'all_items'         => __( 'All '.$plural.' Type', 'esaftheme' ),
		'parent_item'       => __( 'Parent '.$singular.' Type', 'esaftheme' ),
		'parent_item_colon' => __( 'Parent '.$singular.' Type:', 'esaftheme' ),
		'edit_item'         => __( 'Edit '.$singular.' Type', 'esaftheme' ),
		'update_item'       => __( 'Update '.$singular.' Type', 'esaftheme' ),
		'add_new_item'      => __( 'Add New '.$singular.' Type', 'esaftheme' ),
		'new_item_name'     => __( 'New '.$singular.' Type', 'esaftheme' ),
		'menu_name'         => __( $singular.' Type', 'esaftheme' ),
	);
}

/**
 * Create the category for the post types
 * @param  [type] $labels    [various labels]
 * @param  [type] $slug      [Slug of the category]
 * @param  [type] $post_type [post type]
 * @return [type]            [description]
 */
function esaf_create_category($labels,$slug, $post_type){
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $slug ),
	);
	register_taxonomy( $slug, $post_type, $args );
}
