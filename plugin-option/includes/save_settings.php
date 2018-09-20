<?php 

function our_admin_form_save() {
  
	/*
	*	Check current user capability for edit settings
	*/
	if(!current_user_can('manage_options')){
		wp_redirect(get_admin_url().'admin.php?page=our_settings_page&save_error='.urlencode('You are not allowed to edit this seetings') );
		exit();
	}

	/*
	*	Verify nonce field
	*/
	check_admin_referer('our_form_settings_fields_verify');
	
	/*
	*	Collecting values on array is user pass any value
	*/ 
	$values = array();
	if( isset($_POST['text_field']) ){
	$text_field = sanitize_text_field( $_POST['text_field']);
	$values['text_field'] = $text_field;
	}
	if( isset($_POST['number_field']) ){
	$number_field = sanitize_text_field($_POST['number_field']);
	$values['number_field'] = $number_field;
	}
	if( isset($_POST['checkbox_field']) ){
	$checkbox_field = sanitize_text_field( $_POST['checkbox_field']);
	$values['checkbox_field'] = $checkbox_field;
	}
	/*
	*	Add option for our form if not exist 
	*/ 
	if(!get_option( 'our_settings' )){

				add_option( 'our_settings', array());
		}
	/*
	*	update settings 
	*/ 
	
	update_option( 'our_settings', $values);
	wp_redirect(get_admin_url().'admin.php?page=our_settings_page&save_success='.urlencode('Setting saved successfully') );
	exit();
	
}

add_action( 'admin_post_example_admin_form', 'our_admin_form_save' );