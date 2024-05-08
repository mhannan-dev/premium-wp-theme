<?php
/*
@package beachX
	========================
	ADMIN ENQUEUE FUNCTIONS
	========================
*/

function beachX_sunset_load_admin_scripts( $hook ){
	if( 'toplevel_page_beachX_sunset' !== $hook ){ return; }
	wp_enqueue_style( 'beachX_sunset_admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_media();
	wp_enqueue_script( 'beachX-sunset-admin-script', get_template_directory_uri() . '/js/sunset.admin.js', array('jquery'), '1.0.0', true );
	
}
add_action( 'admin_enqueue_scripts', 'beachX_sunset_load_admin_scripts' );
