<?php
// Template Name: Contact Form Submission

if (!session_id()) {
    session_start();
}

// Include WordPress core functions
require_once('../../../wp-load.php');

// Process form submission
function process_form_submission() {
    // Check if request method is POST
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        set_flash_message('Warning', "Form not submitted.");
        return;
    }

    // Sanitize input fields
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Insert new contact post
    $post_id = insert_contact_post($name, $subject, $message); // Pass name as well

    // Handle success or error
    if ($post_id) {
        add_post_meta($post_id, 'email', $email, true);
        set_flash_message('Success', "Successfully submitted!");
    } else {
        set_flash_message('Error', "Error submitting form.");
    }
}

function insert_contact_post($name, $subject, $message) {
    $post_id = wp_insert_post(array(
        'post_title' => $subject,
        'post_content' => $message,
        'post_status' => 'publish',
        'post_type' => 'contact_post'
    ));

    if ($post_id && !is_wp_error($post_id)) {
        add_post_meta($post_id, 'name', $name, true);
    }
    return $post_id;
}

// Set flash message in session
function set_flash_message($type, $message) {
    $_SESSION[$type] = $message;
    wp_redirect(home_url('/contact'));
    exit;
}

// Process form submission
process_form_submission();
