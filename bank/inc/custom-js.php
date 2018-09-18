<?php
//include admin js to theme
add_action('admin_enqueue_scripts',function(){
			wp_enqueue_script( 'upload', get_template_directory_uri() . '/inc/js/theme-upload.js', array(), '1.0.0', true );
});