<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/inbox-styles.css'; ?>">
<div class="wrap">
    <h1>Contact Information</h1>
    <p>This is the Contact Information page. You can customize this page according to your requirements.</p>
    <div class="address-information">
        <form action="<?php echo esc_url(get_template_directory_uri() . '/templates/contact-page/_address_submission.php'); ?>" method="post">
            <div class="home">
                <label for="address">Home Address:</label>
                <input type="text" name="address" id="address" placeholder="Enter address">
            </div>
            <div class="home">
                <label for="phone_no">Phone:</label>
                <input type="text" name="phone_no" id="phone_no" placeholder="Enter phone no">
            </div>
            <div class="home">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Enter Email">
            </div>
            <br>
            <div class="home">
                <input type="hidden" name="csrf_token" value="<?php echo wp_create_nonce('address_submission_form'); ?>">
                <input type="submit" class="submit-btn" value="Update">
            </div>
        </form>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        console.log('jquery ready');
    });
</script>
