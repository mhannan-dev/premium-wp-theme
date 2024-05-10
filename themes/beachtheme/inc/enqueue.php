<?php
/*
@package beachx
	========================
	ADMIN ENQUEUE FUNCTIONS
	========================
*/

function beachX_sunset_load_admin_scripts( $hook ){
	// var_dump($hook); exit; 
	if( 'toplevel_page_beachX_sunset' == $hook ){
		wp_enqueue_style( 'beachX_sunset_admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all' );
        wp_enqueue_media();
        wp_enqueue_script( 'beachx-sunset-admin-script', get_template_directory_uri() . '/js/sunset.admin.js', array('jquery'), '1.0.0', true );
    }  else if ( 'beachx_page_beachX_sunset_css' == $hook ){
        wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/sunset.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'beachx-custom-css-script', get_template_directory_uri() . '/js/sunset.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { return; }
}
add_action( 'admin_enqueue_scripts', 'beachX_sunset_load_admin_scripts' );

