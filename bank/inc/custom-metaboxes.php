<?php

/**
 * Table of content
 *
 * Metabox for custom posts
 * - Metabox for slider post type
 * - metabox for team post type
 * - Metabox for reports post type
 * Metabox for pages
 */


/**
 * Metabox for custom posts
 */

/**
 * metabox for slider post type
 * Create a link text box in slider post only.
 * This function create an text box
 */
	function esaf_slider_link_textbox() {
		global $post;
		$url_value = get_post_meta($post->ID,'link', true);
		?>
		<input type ="text" name = "slider_link" value = "<?php echo $url_value;?>">
		<?php
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('slider_link', __("Enter the link here"), 'esaf_slider_link_textbox',array('sliders','videos'), 'side','default',null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['slider_link'])) {
			$url_value = $_POST['slider_link'];
			update_post_meta($post->ID,'link',$url_value);
		}
	});

/**
 * metabox for team post type
 */
	function esaf_team_extra_fields() {
		global $post;
		$team_array = get_post_meta($post->ID,'team_extra_details',true);
		if(!$team_array) {
			$keys = array('position','dob','res_address','off_address','mob_phone','res_phone','off_phone','email','qualification','academic','profile_image','list_image');
			$team_array = array_fill_keys($keys, null);
		}
		?>
			<table>
				<tr>
					<td><?php _e('Position', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[position]" value="<?php echo $team_array['position']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Date of Birth', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[dob]" value="<?php echo $team_array['dob']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Residential Address', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[res_address]" value="<?php echo $team_array['res_address']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Official Address', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[off_address]" value="<?php echo $team_array['off_address']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Phone(Mobile)', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[mob_phone]" value="<?php echo $team_array['mob_phone']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Phone(Residential)', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[res_phone]" value="<?php echo $team_array['res_phone']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Phone(Official)', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[off_phone]" value="<?php echo $team_array['off_phone']; ?>"></td>
				</tr>
				<tr>
					<td><?php _e('Email', 'esaftheme');?></td>
					<td><input type="text" name="team_extra[email]" value="<?php echo $team_array['email']; ?>"></td>
				</tr>

				<tr>
					<td><?php _e('List Image', 'esaftheme');?></td>
					<td>
						<input id="name_list_image" type="text" name="team_extra[list_image]" value="<?php echo $team_array['list_image']; ?>" />
						<input id="upload_list_image" type="button" class="button" value="Upload Image" />
						<?$img = $team_array['list_image']? $team_array['list_image'] : "http://placehold.it/100x100" ;?>
						<div id = 'prev_list_image'><img src="<?php echo $img; ?>" width = '100px' hieght = '100px' /></div>
					</td>
				</tr>
				<tr>
					<td><?php _e('Main profile Image', 'esaftheme');?></td>
					<td>
						<input id="name_profile_image" type="text" name="team_extra[profile_image]" value="<?php echo $team_array['profile_image']; ?>" />
						<input id="upload_profile_image" type="button" class="button" value="Upload Image" />
						<?$img = $team_array['profile_image']? $team_array['profile_image'] : "http://placehold.it/100x100" ;?>
						<div id = 'prev_profile_image'><img src="<?php echo $img; ?>" width = '100px' hieght = '100px' /></div>
					</td>
				</tr>
				<tr>
					<td colspan ="2"><?php _e('Education/Professional Qualification', 'esaftheme');?></td>
				</tr>
				<tr>
				<td colspan ="2"><?php wp_editor( $team_array['qualification'], 'mycustomeditor', array('textarea_name'=>"team_extra[qualification]",'media_buttons' => false,'textarea_rows' => 3) );?></td>
				</tr>
				<tr>
					<td colspan ="2"><?php _e('Academic journey', 'esaftheme');?></td>
				</tr>
				<tr>
					<td colspan ="2"><?php wp_editor( $team_array['academic'], 'mycustomeditor2', array('textarea_name'=>"team_extra[academic]",'media_buttons' => false,'textarea_rows' => 3) );?></td>
				</tr>
			</table>
		<?php
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('team_details', __("Extra team details"), 'esaf_team_extra_fields',array('members'), 'normal','default',null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['team_extra'])) {
			$team_array = $_POST['team_extra'];
			update_post_meta($post->ID,'team_extra_details',$team_array);
		}

	});

/**
 * Metabox for reports post type
 */


/**
 * Metabox for pages
 */

/**
 * Extra RTE for pages
 */
	function esaf_other_textbox() {
		global $post;
		$other_value = get_post_meta($post->ID,'others', true);
		wp_editor( $other_value, 'mycustomeditor', array('textarea_name'=>"others",'textarea_rows' => 8) );
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('others', __("Extra editor"), 'esaf_other_textbox',array('page'), 'normal','default',null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['others'])) {
			$other_value = $_POST['others'];
			update_post_meta($post->ID,'others',$other_value);
		}
	});

/**
 * dropdown menu for pages
 */
	function esaf_page_dropdown_menu() {
		global $post;
		$choosen_dropdown_menu_value = get_post_meta($post->ID,'leftdropdownmenu', true); ?>
		<p>
	        <select name='leftdropdownmenu' id='leftdropdownmenu'>
	        	<option value = "0"> — Select a Menu — </option>
	            <?php $menus = get_terms('nav_menu');
	            foreach ($menus as $menu): ?>
	            	<option <?php if( $choosen_dropdown_menu_value == $menu->name ) { echo "selected"; } ?>
	            		value = "<?php echo esc_attr($menu->name); ?>"><?php echo esc_html($menu->name); ?>
	            	</option>
	            <?php endforeach; ?>
	        </select>
	    </p>
		<?php
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('esaf_page_dropdown_menu', __("Choose left side menu"), 'esaf_page_dropdown_menu',array('page'), 'side','default',null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['leftdropdownmenu'])) {
			$other_value = $_POST['leftdropdownmenu'];
			update_post_meta($post->ID,'leftdropdownmenu',$other_value);
		}
	});

/**
 * Create a new custom meta box for adding new uploader
 */
function esaf_report_uploader() {
		global $post;
		$file = get_post_meta($post->ID,'upload_file', true);
		$file = $file? $file : '';
		?>
		<input id="upload_file_name" type="text" name="upload_file" value="<?php echo $file; ?>" />
		<input id="upload_file_button" type="button" class="button" value="Upload File" />
		<?php
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('report_file', __("Upload the report document"), 'esaf_report_uploader',array('reports'), 'normal','default',null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['upload_file'])) {
			$file = $_POST['upload_file'];
			update_post_meta($post->ID,'upload_file',$file);
		}
	});


/**
 * Create a new custom meta box for adding more link in product pages
 */
function esaf_product_more_textbox() {
		global $post;
		$more_link = get_post_meta($post->ID,'more_link', true);
		?>
		<input type ="text" id="excerpt" name = "more_link" value = "<?php echo $more_link;?>">
		<?php
	}
	//Hook the function to create a new metabox
	add_action('add_meta_boxes', function() {
		add_meta_box('more_link', __("Enter the URL for more details page"), 'esaf_product_more_textbox',array('products','careers'), 'side','default', null);
	});
	//save the metabox values along with the post saves
	add_action('save_post', function(){
		global $post;
		if(isset($_POST['more_link'])) {
			$more_link = $_POST['more_link'];
			update_post_meta($post->ID,'more_link',$more_link);
		}
	});
	/**
 * Create a new custom meta box for adding more apply now in product pages and career
 */
function esaf_product_apply_textbox() {
	global $post;
	$apply_link = get_post_meta($post->ID,'apply_link', true);
	?>
	<input type ="text" id="excerpt" name = "apply_link" value = "<?php echo $apply_link;?>">
	<?php
}
//Hook the function to create a new metabox
add_action('add_meta_boxes', function() {
	add_meta_box('apply_link', __("Enter the URL of Apply now page"), 'esaf_product_apply_textbox',array('products','careers'), 'side','high', null);
});
//save the metabox values along with the post saves
add_action('save_post', function(){
	global $post;
	if(isset($_POST['apply_link'])) {
		$apply_link = $_POST['apply_link'];
		update_post_meta($post->ID,'apply_link',$apply_link);
	}
});
/*creating new meta box for features in account*/
function esaf_salient_feature_textbox() {
	global $post;
	$other_value = get_post_meta($post->ID,'salient_feature', true);
	wp_editor( $other_value, 'customeditor1', array('textarea_name'=>"salient_feature",'textarea_rows' => 8) );
}
//Hook the function to create a new metabox
add_action('add_meta_boxes', function() {
	add_meta_box('salient_feature', __("Salient Features"), 'esaf_salient_feature_textbox',array('products'), 'normal','high', null);
});
//save the metabox values along with the post saves
add_action('save_post', function(){
	global $post;
	if(isset($_POST['salient_feature'])) {
		$other_value = $_POST['salient_feature'];
		update_post_meta($post->ID,'salient_feature',$other_value);
	}
});

/*creating new meta box for digital features in account*/
function esaf_digital_feature_textbox() {
	global $post;
	$other_value = get_post_meta($post->ID,'digital_feature', true);
	wp_editor( $other_value, 'customeditor2', array('textarea_name'=>"digital_feature",'textarea_rows' => 8) );
}
//Hook the function to create a new metabox
add_action('add_meta_boxes', function() {
	add_meta_box('digital_feature', __("Alternate/Digital channel features"), 'esaf_digital_feature_textbox',array('products'), 'normal','default',null);
});
//save the metabox values along with the post saves
add_action('save_post', function(){
	global $post;
	if(isset($_POST['digital_feature'])) {
		$other_value = $_POST['digital_feature'];
		update_post_meta($post->ID,'digital_feature',$other_value);
	}
});

/*creating new meta box for digital features in account*/
function esaf_other_feature_textbox() {
	global $post;
	$other_value = get_post_meta($post->ID,'other_feature', true);
	wp_editor( $other_value, 'customeditor3', array('textarea_name'=>"other_feature",'textarea_rows' => 8) );
}
//Hook the function to create a new metabox
add_action('add_meta_boxes', function() {
	add_meta_box('other_feature', __("Other features"), 'esaf_other_feature_textbox',array('products'), 'normal','default',null);
});
//save the metabox values along with the post saves
add_action('save_post', function(){
	global $post;
	if(isset($_POST['other_feature'])) {
		$other_value = $_POST['other_feature'];
		update_post_meta($post->ID,'other_feature',$other_value);
	}
});

/*creating new meta box for display in account*/
function esaf_display_feature_textbox() {
	global $post;
	$display_as = get_post_meta( $post->ID, 'display_as', true ); ?>
		<p>
	        <select name='display_as' id='display_as'>
	        	<option value = "0" <?php if( "0" == $display_as ) { echo "selected"; } ?> > — Select from menu — </option>
	        	<option value = "faq" <?php if( "faq" == $display_as ) { echo "selected"; } ?> > FAQ </option>
	        </select>
	    </p>
		<?php
}
//Hook the function to create a new metabox
add_action('add_meta_boxes', function() {
	add_meta_box('display_as', __("Display in list"), 'esaf_display_feature_textbox', array('products'), 'side', 'default', null);
});
//save the metabox values along with the post saves
add_action( 'save_post', function() {
	global $post;
	if( isset( $_POST['display_as'] ) ) {
		$display_as = $_POST['display_as'];
		update_post_meta( $post->ID, 'display_as', $display_as );
	}
});	