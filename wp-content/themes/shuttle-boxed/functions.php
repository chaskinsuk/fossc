<?php

// ----------------------------------------------------------------------------------
//	Register Front-End Styles And Scripts
// ----------------------------------------------------------------------------------

function shuttle_child_frontscripts() {

	wp_enqueue_style( 'shuttle-style', get_template_directory_uri() . '/style.css', array( 'shuttle-bootstrap', 'shuttle-shortcodes' ) );
	wp_enqueue_style( 'shuttle-style-boxed', get_stylesheet_directory_uri() . '/style.css', array( 'shuttle-style' ), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'shuttle_child_frontscripts' );


// ----------------------------------------------------------------------------------
//	Hide blog options in customizer - Blog layout used
// ----------------------------------------------------------------------------------

function shuttle_child_adminscripts() {

	if ( is_customize_preview() ) {

		// Add theme stylesheets
		wp_enqueue_style( 'shuttle-child-backend', get_stylesheet_directory_uri() . '/styles/backend/style-backend.css', '', '' );

	}
}
add_action( 'admin_enqueue_scripts', 'shuttle_child_adminscripts' );


// ----------------------------------------------------------------------------------
//	Update Options Array With Child Theme Color Values
// ----------------------------------------------------------------------------------

// Add child theme settings to options array - UPDATED 20180819
function shuttle_updateoption_child_settings() {

	// Set theme name combinations
	$name_theme_upper = 'Shuttle';
	$name_theme_lower = strtolower( $name_theme_upper );

	// Set possible options names
	$name_options_free  = 'shuttle_redux_variables';
	$name_options_child = 'shuttle_child_settings_boxed';

	// Get options values (theme options)
	$options_free = get_option( $name_options_free );

	// Get child settinsg values
	$options_child_settings = get_option( $name_options_child );

	// Only set child settings values if not already set 
	if ( $options_child_settings != 1 ) {

		$options_free['shuttle_styles_skinswitch']  = '1';
		$options_free['shuttle_styles_skin']        = 'boxed';
		$options_free['shuttle_blog_style']         = 'option1';
		$options_free['shuttle_blog_style1layout']  = 'option1';
		$options_free['shuttle_header_styleswitch'] = 'option1';

		// Add child settings to theme options array
		update_option( $name_options_free, $options_free );

	}

	// Set the child settings flag
	update_option( $name_options_child, 1 );

}
add_action( 'init', 'shuttle_updateoption_child_settings', 999 );

// Remove child theme settings from options array - UPDATED 20180819
function shuttle_removeoption_child_settings() {

	// Set theme name combinations
	$name_theme_upper = 'Shuttle';
	$name_theme_lower = strtolower( $name_theme_upper );

	// Set possible options names
	$name_options_free  = 'shuttle_redux_variables';
	$name_options_child = 'shuttle_child_settings_boxed';

	// Get options values (theme options)
	$options_free = get_option( $name_options_free );

	// Determine if Pro version is installed
	$themes = wp_get_themes();
	foreach ( $themes as $theme ) {
		if( $theme == $name_theme_upper . ' Pro' ) {
			$indicator_pro_installed = '1';
		}
	}

	// If Pro version is not installed then remove child settings on theme switch
	if ( $indicator_pro_installed !== '1' ) {

		$options_free['shuttle_styles_skinswitch']  = '';
		$options_free['shuttle_styles_skin']        = '';
		$options_free['shuttle_blog_style']         = '';
		$options_free['shuttle_blog_style1layout']  = '';
		$options_free['shuttle_header_styleswitch'] = '';

		// Add child settings to theme options array
		update_option( $name_options_free, $options_free );

	}

	// Delete the child settings flag
	delete_option( $name_options_child );

}
add_action( 'switch_theme', 'shuttle_removeoption_child_settings' );

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	show_admin_bar(false);
	}
}

/* CJH Login */
function ajax_login_init(){

    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => home_url(),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', 'ajax_login_init');
}

function ajax_login(){

    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}