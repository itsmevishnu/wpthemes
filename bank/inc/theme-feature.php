<?php
/**
 * This is the file including all the theme features
 */
/**
 * Add some features to theme asaf
 * The features are
 */
add_action('after_setup_theme', function(){
	//adding menu
	$esaf_menu_locations = array(
		'header_menu'        => __('Header Menu Left', 'esaftheme'),
		'header_right'       => __('Header Menu Right', 'esaftheme'),
		'main_menu'          => __('Main Menu', 'esaftheme'),
		'quick_menu'         => __('Quick Menu', 'esaftheme'),
		'footer_menu'        => __('Footer Menu', 'esaftheme'),
		'footer_second_menu' => __('Footer Second Menu','esaftheme'),
		'footer_third_menu'  => __('Footer Third Menu','esaftheme'),
		'footer_image_menu'  => __('Footer Image Menu','esaftheme'),
		);
	register_nav_menus( $esaf_menu_locations );
	//adding header to appearance
	$esaf_theme_header = array(
		'width' => 980,
		'height' => 60,
		'uploads' => true,
		);
	add_theme_support( 'custom-header', $esaf_theme_header);
});
//adding some extra mime type for logo and fav icons through media uploader
add_filter('upload_mimes', function($mime){
	$mime['svg'] = 'image/svg+xml';
	$mime['ico'] = 'image/x-icon';
	return $mime;
});
//setting featured image options for all the post type and pages
add_theme_support('post-thumbnails');
//adding excerpt option for page
add_action('init',function(){
	add_post_type_support( 'page', 'excerpt' );
});

//changing media menu to asset in admin dashboard
add_action( 'admin_menu', function(){
	global $menu;
	$menu[10][0] = __('Assets','esaftheme');
} );

//change the taxonomy descriptions to RTE
add_action("product-type_edit_form_fields", 'esaf_description_field', 10, 2);

function esaf_description_field($term, $taxonomy){
    ?>
    <tr valign="top">
        <th scope="row">Description</th>
        <td>
            <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => false)); ?>
            <script>
                jQuery(window).ready(function(){
                    jQuery('label[for=description]').parent().parent().remove();
                });
            </script>
        </td>
    </tr>
    <?php
} 