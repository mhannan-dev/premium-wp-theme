<?php
/*
Plugin Name: Job Listings Plugin
Description: Creates a custom post type for job listings.
Version: 1.0
Author: Muhammad Hannan
*/

function register_jobs_menu() {
    add_menu_page(
        'Jobs',            
        'Jobs',             
        'manage_options',   
        'job_list_menu',        
        'render_create_job_page' 
    );
}
add_action('admin_menu', 'register_jobs_menu');

function register_create_job_submenu() {
    add_submenu_page(
        'job_list_menu',           
        'Create Job',          
        'Create Job',          
        'manage_options',      
        'create_job_submenu',  
        'render_job_create_page' 
    );
}
add_action('admin_menu', 'register_create_job_submenu');

function render_create_job_page() {
    include(plugin_dir_path(__FILE__) . './views/list.php');
}

function render_job_create_page() {
    include(plugin_dir_path(__FILE__) . './views/form.php');

}
