<?php

/**
 * Daily Job functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Daily_Job
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

function daily_job_setup()
{
    // Add theme support for automatic title tag
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');

    // Enqueue styles and scripts
    add_action('wp_enqueue_scripts', 'daily_job_enqueue_assets');
}
add_action('after_setup_theme', 'daily_job_setup');

/**
 * Enqueue styles and scripts
 */
function daily_job_enqueue_assets()
{
    // Stylesheets
    $styles = array(
        'bootstrap'         => array('css/bootstrap.min.css', array(), '4.5.2'),
        'owl-carousel'      => array('css/owl.carousel.min.css', array(), '2.3.4'),
        'magnific-popup'    => array('css/magnific-popup.css', array(), '1.1.0'),
        'font-awesome'      => array('css/font-awesome.min.css', array(), '4.7.0'),
        'themify-icons'     => array('css/themify-icons.css', array(), '1.0.0'),
        'nice-select'       => array('css/nice-select.css', array(), '1.0.0'),
        'flaticon'          => array('css/flaticon.css', array(), '1.0.0'),
        'gijgo'             => array('css/gijgo.css', array(), '1.9.13'),
        'animate'           => array('css/animate.min.css', array(), '3.7.2'),
        'slicknav'          => array('css/slicknav.css', array(), '1.0.10'),
        'sweetalert2-css'   => array('css/sweetalert2.min.css', array(), '11'),
        'main-style'        => array('css/main-style.css', array(), _S_VERSION)
    );

    // Scripts
    $scripts = array(
        'modernizr'         => array('js/vendor/modernizr-3.5.0.min.js', array(), '3.5.0', false),
        'popper'            => array('js/popper.min.js', array('jquery'), '1.16.0', true),
        'bootstrap'         => array('js/bootstrap.min.js', array('jquery'), '4.5.2', true),
        'owl-carousel'      => array('js/owl.carousel.min.js', array('jquery'), '2.3.4', true),
        'isotope'           => array('js/isotope.pkgd.min.js', array('jquery'), '3.0.6', true),
        'ajax-form'         => array('js/ajax-form.js', array('jquery'), '1.0.0', true),
        'waypoints'         => array('js/waypoints.min.js', array('jquery'), '4.0.1', true),
        'counterup'         => array('js/jquery.counterup.min.js', array('jquery'), '1.0', true),
        'imagesloaded'      => array('js/imagesloaded.pkgd.min.js', array('jquery'), '4.1.4', true),
        'scrollit'          => array('js/scrollIt.js', array('jquery'), '1.0.0', true),
        'scrollup'          => array('js/jquery.scrollUp.min.js', array('jquery'), '2.4.1', true),
        'wow'               => array('js/wow.min.js', array('jquery'), '1.1.3', true),
        'niceselect'        => array('js/nice-select.min.js', array('jquery'), '1.1.0', true),
        'slicknav'          => array('js/jquery.slicknav.min.js', array('jquery'), '1.0.10', true),
        'magnific-popup'    => array('js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true),
        'plugins'           => array('js/plugins.js', array('jquery'), '1.0.0', true),
        'gijgo'             => array('js/gijgo.min.js', array('jquery'), '1.9.13', true),
        'ajaxchimp'         => array('js/jquery.ajaxchimp.min.js', array('jquery'), '1.0.0', true),
        'form'              => array('js/jquery.form.js', array('jquery'), '4.3.0', true),
        'validation'        => array('js/jquery.validate.min.js', array('jquery'), '1.19.1', true),
        'mail-script'       => array('js/mail-script.js', array('jquery'), '1.0.0', true),
        'sweetalert2-js'    => array('js/sweetalert2.min.js', array('jquery'), '11', true),
        'main'              => array('js/main.js', array('jquery'), '1.0.0', true)
    );
    

    // Enqueue styles
    foreach ($styles as $handle => $args) {
        wp_enqueue_style($handle, get_template_directory_uri() . '/' . $args[0], $args[1], $args[2]);
    }

    // Enqueue scripts
    foreach ($scripts as $handle => $args) {
        wp_enqueue_script($handle, get_template_directory_uri() . '/' . $args[0], $args[1], $args[2], $args[3]);
    }
}
add_action('wp_enqueue_scripts', 'daily_job_enqueue_assets');





function post_type_contact_menu()
{
    add_menu_page(
        'Contact',
        'Contact',
        'manage_options',
        'contact-post',
        'contact_menu_page_callback'
    );

    add_submenu_page(
        'contact-post',
        'Information',
        'Information',
        'manage_options',
        'contact-information',
        'contact_information_page_callback'
    );
}
add_action('admin_menu', 'post_type_contact_menu');

function contact_menu_page_callback()
{
    include_once('templates/contact-page/inbox.php');
}

function contact_information_page_callback()
{
    include_once('templates/contact-page/information-form.php');
}

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
    include_once('templates/admin/job/list.php');
}
function render_job_create_page() {
    include_once('templates/admin/job/form.php');
}
