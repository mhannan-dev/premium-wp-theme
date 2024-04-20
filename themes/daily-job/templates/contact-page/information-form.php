<?php
$args = array(
    'post_type' => 'contact_address',
    'posts_per_page' => 1
);
$post_id = 0;
$contact_query = new WP_Query($args);

if ($contact_query->have_posts()) {
    while ($contact_query->have_posts()) {
        $contact_query->the_post();
        $address = get_post_meta(get_the_ID(), 'address', true);
        $phone_no = get_post_meta(get_the_ID(), 'phone_no', true);
        $email = get_post_meta(get_the_ID(), 'email', true);
        $post_id = get_the_ID();
    }
}
wp_reset_postdata();
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/inbox-styles.css'; ?>">
<div class="wrap">
    <?php
        get_template_part(get_template_directory() . '/flash_msg.php');
    ?>
    <h1>Contact Information</h1>
    <p>This is the Contact Information page. You can customize this page according to your requirements.</p>
    <div class="address-information">
    <form id="contact-form" action="<?php echo esc_url(get_template_directory_uri() . '/templates/contact-page/_address_submission.php'); ?>" method="POST">
        <input type="hidden" name="post_id" value="<?php echo esc_attr($post_id); ?>">
        
        <div class="home">
            <label for="address">Home Address:</label>
            <input type="text" name="address" id="address" placeholder="Enter address" value="<?php echo esc_attr($address); ?>"> <br>
            <span id="address-error"></span>
        </div>
        
        <div class="home">
            <label for="phone_no">Phone:</label>
            <input type="text" name="phone_no" id="phone_no" placeholder="Enter phone no" value="<?php echo esc_attr($phone_no); ?>"> <br>
            <span id="phone_no-error"></span>
        </div>
        
        <div class="home">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Enter Email" value="<?php echo esc_attr($email); ?>"> <br>
            <span id="email-error"></span>
        </div>
        
        <div class="home">
            <input type="submit" class="submit-btn" value="Update">
        </div>
    </form>

    </div>
</div>
<script>
    jQuery(document).ready(function($) {
    $('#contact-form').submit(function(e) {
        e.preventDefault();
        $('.error-msg').text('');
        var address = $('#address').val().trim();
        var phoneNo = $('#phone_no').val().trim();
        var email = $('#email').val().trim();

        var hasError = false; 

        if (address === '' && phoneNo === '' && email === '') {
            $('#address-error').text('Please enter a valid address.');
            $('#phone_no-error').text('Please enter a valid phone number.');
            $('#email-error').text('Please enter a valid email address.');
            return false;
        }

        if (address === '') {
            $('#address-error').text('Please enter a valid address.');
            hasError = true;
        }

        if (phoneNo === '' || !/^\d{11}$/.test(phoneNo)) {
            $('#phone_no-error').text('Please enter a valid 14-digit phone number.');
            hasError = true;
        }

        if (email === '' || !isValidEmail(email)) {
            $('#email-error').text('Please enter a valid email address.');
            hasError = true;
        }

        if (hasError) {
            return false;
        }
        this.submit();
    });

    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});

</script>
