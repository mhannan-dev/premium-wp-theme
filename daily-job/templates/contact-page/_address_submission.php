<?php
// Start session if not already started
if (!session_id()) {
    session_start();
}

// Include WordPress functions
require_once('../../../../../wp-load.php');

function addressSubmission()
{
    // var_dump(isset($_POST['post_id'])); exit;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $address = isset($_POST['address']) ? sanitize_text_field($_POST['address']) : '';
        $phoneNo = isset($_POST['phone_no']) ? sanitize_text_field($_POST['phone_no']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $postId = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
       
        // Check if all required fields are provided
        if (!empty($address) && !empty($phoneNo) && !empty($email)) {
            // Check if post ID is provided
            if ($postId > 0) {
                // Post ID provided, update existing post
                updateContactAddress($postId, $address, $phoneNo, $email);
            } else {
                // Post ID not provided, create new post
                createContactAddress($address, $phoneNo, $email);
            }
        } else {
            set_flash_message('Error', 'Please fill in all required fields.');
        }
    } else {
        set_flash_message('Error', 'Form was not submitted.');
    }

    wp_redirect(admin_url('admin.php?page=contact-information'));
    exit;
}

// Update or create contact address
function updateContactAddress($postId, $address, $phoneNo, $email)
{
    $post_args = array(
        'ID'            => $postId,
        'post_title'    => 'Contact Address',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'contact_address',
    );

    // Update post
    $updated_post_id = wp_update_post($post_args);

    if (!is_wp_error($updated_post_id)) {
        update_post_meta($postId, 'address', $address);
        update_post_meta($postId, 'phone_no', $phoneNo);
        update_post_meta($postId, 'email', $email);
        set_flash_message('Success', 'Updated successfully.');
    } else {
        set_flash_message('Error', 'Failed to update data.');
    }
}

// Create new contact address
function createContactAddress($address, $phoneNo, $email)
{
    $post_args = array(
        'post_title'    => 'Contact Address',
        'post_content'  => '',
        'post_status'   => 'publish',
        'post_type'     => 'contact_address',
    );

    // Create new post
    $post_id = wp_insert_post($post_args);

    if ($post_id) {
        update_post_meta($post_id, 'address', $address);
        update_post_meta($post_id, 'phone_no', $phoneNo);
        update_post_meta($post_id, 'email', $email);
        set_flash_message('Success', 'Created successfully.');
        exit;
    } else {
        set_flash_message('Error', 'Failed to create data.');
        exit;
    }
}

// Set flash message in session
function set_flash_message($type, $message)
{
    $_SESSION[$type] = $message;
}

// Process form submission
addressSubmission();
?>