<?php
require_once('../../../../../wp-load.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['address']) && isset($_POST['phone_no']) && isset($_POST['email'])) {
        // Create a new post
        $post_args = array(
            'post_title'    => 'Contact Address',
            'post_content'  => '',
            'post_status'   => 'publish',
            'post_type'     => 'contact_address',
        );
        $post_id = wp_insert_post($post_args);

        if ($post_id) {
            update_post_meta($post_id, 'address', $_POST['address']);
            update_post_meta($post_id, 'phone_no', $_POST['phone_no']);
            update_post_meta($post_id, 'email', $_POST['email']);
        }
        echo 'success';
    } else {
        echo "<p>Error: Please fill in all required fields.</p>";
    }
} else {
    echo "<p>Error: Form was not submitted.</p>";
}
?>
