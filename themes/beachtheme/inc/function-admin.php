<?php
/*
@package beachxtheme
	========================
		ADMIN PAGE
	========================
*/
function sunset_add_admin_page() {
    add_menu_page( 'BeachX Theme Options', 'BeachX', 'manage_options', 'beachX_sunset', 'beachX_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
    
    add_submenu_page( 'beachX_sunset','BeachX Sidebar Options', 'Sidebar', 'manage_options', 'beachX_sunset', 'beachX_theme_create_page');
    add_submenu_page( 'beachX_sunset','BeachX Theme Options', 'Theme Options', 'manage_options', 'beachX_theme', 'beachX_theme_support_page');
	add_submenu_page( 'beachX_sunset', 'Sunset Contact Form', 'Contact Form', 'manage_options', 'beachX_sunset_theme_contact', 'sunset_contact_form_callback' );
    add_submenu_page( 'beachX_sunset', 'BeachX CSS Options', 'Custom CSS', 'manage_options', 'beachX_sunset_css', 'beachX_sunset_settings_page');
}
add_action( 'admin_menu', 'sunset_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'beachX_sunset_custom_settings' );

function beachX_sunset_custom_settings() {
	register_setting( 'beachX_sunset-settings-group', 'profile_picture' );
	register_setting( 'beachX_sunset-settings-group', 'first_name' );
	register_setting( 'beachX_sunset-settings-group', 'last_name' );
	register_setting( 'beachX_sunset-settings-group', 'user_description' );
	register_setting( 'beachX_sunset-settings-group', 'twitter_handler', 'beachX_sunset_sanitize_twitter_handler' );
	register_setting( 'beachX_sunset-settings-group', 'facebook_handler' );
	
	add_settings_section( 'beachX-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'beachX_sunset');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'beachX_sunset_sidebar_profile', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'beachX_sunset_sidebar_name', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'beachX_sunset_sidebar_description', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'beachX_sunset', 'beachX-sidebar-options');

	//Theme Support Options
	register_setting( 'sunset-theme-support', 'post_formats' );
	register_setting( 'sunset-theme-support', 'custom_header' );
	register_setting( 'sunset-theme-support', 'custom_background' );

	add_settings_section( 'sunset-theme-options', 'Theme Options', 'sunset_theme_options', 'beachX_sunset_theme' );
	
	add_settings_field( 'post-formats', 'Post Formats', 'sunset_post_formats', 'beachX_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-header', 'Custom Header', 'theme_custom_header_callback', 'beachX_sunset_theme', 'sunset-theme-options' );
	add_settings_field( 'custom-background', 'Custom Background', 'theme_custom_background_callback', 'beachX_sunset_theme', 'sunset-theme-options' );
	//Contact Form Options
	register_setting( 'beachX-contact-options', 'activate_contact' );
	
	add_settings_section( 'beachX-contact-section', 'Contact Form', 'theme_admin_contact_section', 'beachX_sunset_theme_contact');
	
	add_settings_field( 'activate-form', 'Activate Contact Form', 'theme_activate_contact_callback', 'beachX_sunset_theme_contact', 'beachX-contact-section' );
}


function sunset_theme_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function sunset_post_formats() {
	$options = get_option( 'post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function sunset_sidebar_options() {
    // Callback for settings section
}

function beachX_sunset_sidebar_name() {
    $firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'. $firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function beachX_sunset_sidebar_description() {
    $description = esc_attr( get_option( 'user_description' ) );
	echo '<textarea name="user_description" placeholder="Description">' . $description . '</textarea>';
}

function sunset_sidebar_twitter() {
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'. $twitter .'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}

function sunset_sidebar_facebook() {
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'. $facebook 	.'" placeholder="Facebook handler" />';
}




// Template submenu functions
function beachX_theme_create_page() {
    require_once( get_template_directory() . '/inc/templates/beachX_admin.php' );
}

function beachX_theme_support_page() {
    require_once( get_template_directory() . '/inc/templates/theme_support.php' );
}

function beachX_sunset_settings_page() {
    echo '<h1>BeachX css page</h1>';
}
function beachX_sunset_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if( empty($picture) ){
		echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove" id="remove-picture">';
	}
    
}
function theme_custom_header_callback() {
	$options = get_option( 'custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}
function theme_custom_background_callback() {
	$options = get_option( 'custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}
function sunset_contact_form_callback() {
	require_once( get_template_directory() . '/inc/templates/sunset-contact-form.php' );
}
function theme_admin_contact_section() {
	echo 'Activate and Deactivate the Built-in Contact Form';
}

function theme_activate_contact_callback() {
	$options = get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="activate_contact" value="1" '.$checked.' /></label>';
}