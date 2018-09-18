<?php
/**
 * This include some theme features that need some essential details
 * Created  by VJ
 */
function esaf_options_page_fun() {
	wp_enqueue_media();
	?>
	<div id="theme-options-wrap">
		<h2>Theme Settings</h2>
		<p><?php _e('Update various settings throughout your website.','esaftheme');?></p>
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'theme_options' ); ?>
			<?php do_settings_sections( __FILE__ ); ?>
			<input name="submit" type="submit"  class="button-primary" value="<?php _e( 'Save Changes', 'esaftheme' ); ?>" />
		</form>
	</div>	
	<?php
}

add_action( 'admin_init', 'register_and_build_fields' );

/**
 * declare sections for various options in theme options
 * ----------------------------------------------------------------------------
 */
function register_and_build_fields() {
	register_setting( 'theme_options', 'theme_options', 'validate_setting' );
	add_settings_section( 'general_settings', __('General Settings', 'esaftheme'), 'section_general', __FILE__ );

	function section_general() {
		
	}
	add_settings_field( 'logo', __('Logo','esaftheme'), 'logo_fun', __FILE__, 'general_settings' );

	add_settings_field( 'phone', __('Phone Number','esaftheme'), 'phone_fun', __FILE__, 'general_settings' );

	add_settings_field( 'facebook_url', __('Facebook URL ','esaftheme'), 'facebook_url_fun', __FILE__, 'general_settings' );
	add_settings_field( 'twitter_url', __('Twitter URL','esaftheme'), 'twitter_url_fun', __FILE__, 'general_settings' );
	add_settings_field( 'google_url', __('Google + URL','esaftheme'), 'google_url_fun', __FILE__, 'general_settings' );
	add_settings_field( 'youtube_url', __('Youtube URL','esaftheme'), 'youtube_url_fun', __FILE__, 'general_settings' );
	
	add_settings_field( 'copy_right', 'Copyright', 'copy_right_fun', __FILE__, 'general_settings');
	add_settings_field( 'footer_menu_title', 'Footer Image Menu Title', 'footer_menu_title_fun', __FILE__, 'general_settings');
	add_settings_field( 'footer_menu_content', 'Footer Image Menu Content', 'footer_menu_content_fun', __FILE__, 'general_settings');
	
	// add_settings_field( 'mob_logo', 'Mobile Logo', 'mob_logo_fun', __FILE__, 'general_settings' );

}

function validate_setting( $theme_options ) {
	return $theme_options;
}

/* * *  function call to create facebook url
 * ----------------------------------------------------------------------------
 */

function facebook_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[facebook_url]' type='text' value='{$options[ 'facebook_url' ]}' />";
}

/* * *  function call to create twitter url
 * ----------------------------------------------------------------------------
 */

function twitter_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[twitter_url]' type='text' value='{$options[ 'twitter_url' ]}' />";
}
/* * *  function call to create github url
 * ----------------------------------------------------------------------------
 */

function google_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[google_url]' type='text' value='{$options[ 'google_url' ]}' />";
}
/* * *  function call to create dribble url
 * ----------------------------------------------------------------------------
 */

function youtube_url_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[youtube_url]' type='text' value='{$options[ 'youtube_url' ]}' />";
}
/* * *  function call to create phone number
 * ----------------------------------------------------------------------------
 */

function phone_fun() {
	$options = get_option( 'theme_options' );
	echo "<input name='theme_options[phone]' type='text' value='{$options[ 'phone' ]}' />";
}


/* * *  function call to create a copyright text
 * ----------------------------------------------------------------------------
 */
function copy_right_fun() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[copy_right]' type='text' value='{$options['copy_right']}' />";
}
/**
 * include some title for the footer image menu
 */
function footer_menu_title_fun() {
	$options = get_option('theme_options');
	echo "<input name='theme_options[footer_menu_title]' type='text' value='{$options['footer_menu_title']}' />";
}
/**
 * Footer menu content function
 */
function footer_menu_content_fun() {
	$options = get_option('theme_options');
	wp_editor( $options['footer_menu_content'], 'mycustomeditor', array('textarea_name'=>"theme_options[footer_menu_content]",'media_buttons' => false,'textarea_rows' => 3) );
}
/**
 *  function call to create logo 
 * ----------------------------------------------------------------------------
 */
function logo_fun() {
	$options = get_option( 'theme_options' );
	echo "<div class='uploader'>
	<input type='text'  name='theme_options[logo]' id='_upld_files' value='{$options[ 'logo' ]}' />
	<input type = 'button' class='button-primary' name='_upld_files_button' id='_upld_files_button' value='Upload Logo' />
</div>";

echo main_image( $options[ 'logo' ] );
}

// function mob_logo_fun() {
// 	$options = get_option( 'theme_options' );
// 	echo "<div class='uploader'>
// 	<input type='text' name='theme_options[mob_logo]' id='_mob_upld_files' value='{$options[ 'mob_logo' ]}' />
// 	<input class='button' name='_mob_upld_files_button' id='_mob_upld_files_button' value='Upload' />
// </div>";

// echo main_image( $options[ 'mob_logo' ] );
// }

function main_image( $src = "http://placehold.it/209x251" ) {
	//$options = get_option('theme_options');
	$print	 = "<div id = 'img'><img src = '{$src}' title = 'ESAF logo' width = '250px' hieght = '300px' /></div>";
	return $print;
}

// add the admin options page
function add_theme_option_fun() {
	add_theme_page( 'Theme Options', 'Theme Options', 'administrator', 'theme_options', 'esaf_options_page_fun' );
}

add_action( 'admin_menu', 'add_theme_option_fun' );