 jQuery(document).ready(function($){
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;

	jQuery('#_upld_files_button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				jQuery("#img img").attr('src' , attachment.url);
				jQuery("#"+id).val(attachment.url);
				
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		};
		wp.media.editor.open(button);
		return false;
	}); 
	//dding listing image
 	jQuery('#upload_list_image').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				jQuery("#prev_list_image img").attr('src' , attachment.url);
				jQuery("#name_list_image").val(attachment.url);
				
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		};
		wp.media.editor.open(button);
		return false;
	});
	//for upload profile image
	jQuery('#upload_profile_image').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				jQuery("#prev_profile_image img").attr('src' , attachment.url);
				jQuery("#name_profile_image").val(attachment.url);
				
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		};
		wp.media.editor.open(button);
		return false;
	});
	//uploading files for report
	jQuery('#upload_file_button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				jQuery("#upload_file_name").val(attachment.url);
				
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		};
		wp.media.editor.open(button);
		return false;
	});
});