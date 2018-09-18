<?php

/**
 * Table of content
 *
 * ESAF them base setup
 */
function esaf_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on esaf theme, use a find and replace
	 */
	load_theme_textdomain( 'esaf_textdomain' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );

	//add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	

}
add_action( 'after_setup_theme', 'esaf_setup' );

/*Remove empty paragraph tags from the_content*/
remove_filter('the_content', 'wpautop');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esaf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'esaf_textdomain' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'esaf_textdomain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page side bar widget', 'esaf_textdomain' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your page side bar.', 'esaf_textdomain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Post side bar widget', 'esaf_textdomain' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your post, custom post side bar.', 'esaf_textdomain' ),
		'before_widget' => '<div class="left-ad-wraper">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Account side bar widget', 'esaf_textdomain' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Add widgets here to appear in your product post, custom post side bar.', 'esaf_textdomain' ),
		'before_widget' => '<div class="left-ad-wraper">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'esaf_widgets_init' );

//include the theme feature file
require_once get_template_directory() . '/inc/theme-feature.php';
// include the custom post type creating file
require_once get_template_directory() . '/inc/custom-posts.php';
//include the theme options
require_once get_template_directory() . '/inc/theme-options.php';
//include the theme additional js and styles
require_once get_template_directory() . '/inc/custom-js.php';
//include the file for creating metaboxes
require_once get_template_directory() . '/inc/custom-metaboxes.php';
//include the styles and scripts to theme
require_once get_template_directory(). '/inc/custom-styles-js.php';
//include the walker file
require_once get_template_directory() . '/inc/custom-walker.php';
//include the category creation file
require_once get_template_directory() . '/inc/custom-category.php';
//include the custom short code file
require_once get_template_directory() . '/inc/custom-shortcode.php';


// determine the topmost parent of a term
function get_term_top_most_parent($term_id, $taxonomy){
    // start from the current term
    $parent  = get_term_by( 'id', $term_id, $taxonomy);
    // climb up the hierarchy until we reach a term with parent = '0'
    while ($parent->parent != '0'){
        $term_id = $parent->parent;

        $parent  = get_term_by( 'id', $term_id, $taxonomy);
    }
    return $parent;
}