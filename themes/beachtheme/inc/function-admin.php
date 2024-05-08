<?php
/*
@package beachxtheme
	========================
		ADMIN PAGE
	========================
*/
//Activate custom settings
add_action( 'admin_init', 'beachX_sunset_custom_settings' );

function beachX_sunset_custom_settings() {
	register_setting( 'beachX_beachX_sunset-settings-group', 'profile_picture' );
	register_setting( 'beachX_beachX_sunset-settings-group', 'first_name' );
	register_setting( 'beachX_beachX_sunset-settings-group', 'last_name' );
	register_setting( 'beachX_beachX_sunset-settings-group', 'user_description' );
	register_setting( 'beachX_beachX_sunset-settings-group', 'twitter_handler', 'beachX_sunset_sanitize_twitter_handler' );
	register_setting( 'beachX_beachX_sunset-settings-group', 'facebook_handler' );
	
	add_settings_section( 'beachX-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'beachX_sunset');
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'beachX_sunset_sidebar_profile', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-name', 'Full Name', 'beachX_sunset_sidebar_name', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'beachX_sunset_sidebar_description', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'beachX_sunset', 'beachX-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'beachX_sunset', 'beachX-sidebar-options');
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


function sunset_add_admin_page() {
    add_menu_page( 'BeachX Theme Options', 'BeachX', 'manage_options', 'beachX_sunset', 'beachX_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );
    
    add_submenu_page( 'beachX_sunset','BeachX Sidebar Options', 'Sidebar', 'manage_options', 'beachX_sunset', 'beachX_theme_create_page');
    add_submenu_page( 'beachX_sunset','BeachX Theme Options', 'Theme Options', 'manage_options', 'beachX_theme', 'beachX_theme_support_page');
    add_submenu_page( 'beachX_sunset', 'BeachX CSS Options', 'Custom CSS', 'manage_options', 'beachX_sunset_css', 'beachX_sunset_settings_page');
}
add_action( 'admin_menu', 'sunset_add_admin_page' );

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
	echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';
}
