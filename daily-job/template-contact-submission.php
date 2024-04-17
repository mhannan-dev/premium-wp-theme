<?php
// Template Name: Contact Form Submission
if (!session_id()) {
    @session_start();
}

require_once( dirname( __FILE__ ) . '/../../../wp-load.php' );

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Load WordPress sanitization functions
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    // Sanitize and retrieve form data
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Create new post
    $post_id = wp_insert_post(array(
        'post_title' => $subject,
        'post_content' => $message,
        'post_status' => 'publish',
        'post_type' => 'contact_post'
    ));

    // Add custom field for email
    if ($post_id && !is_wp_error($post_id)) {
        add_post_meta($post_id, 'email', $email, true);
        // Set flash message
        $_SESSION['flash_message'] = "Form submitted successfully!";
        wp_redirect(home_url('/contact'));
        exit;
    } else {
        // Error handling
        echo "Error submitting form.";
    }
} else {
    echo "Form not submitted.";
}
?>
