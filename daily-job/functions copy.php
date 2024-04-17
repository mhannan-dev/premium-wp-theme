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

    // Enqueue styles and scripts
    add_action('wp_enqueue_scripts', 'daily_job_enqueue_assets'); // Update function name here
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
        'contact'           => array('js/contact.js', array('jquery'), '1.0.0', true),
        'ajaxchimp'         => array('js/jquery.ajaxchimp.min.js', array('jquery'), '1.0.0', true),
        'form'              => array('js/jquery.form.js', array('jquery'), '4.3.0', true),
        'validation'        => array('js/jquery.validate.min.js', array('jquery'), '1.19.1', true),
        'mail-script'       => array('js/mail-script.js', array('jquery'), '1.0.0', true),
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

function custom_banner_post_type()
{

    $labels = array(
        'name'                  => _x('Banners', 'Post Type General Name', 'daily-job'),
        'singular_name'         => _x('Banner', 'Post Type Singular Name', 'daily-job'),
        'menu_name'             => __('Banners', 'daily-job'),
        'name_admin_bar'        => __('Banner', 'daily-job'),
        'archives'              => __('Banner Archives', 'daily-job'),
        'attributes'            => __('Banner Attributes', 'daily-job'),
        'parent_item_colon'     => __('Parent Banner:', 'daily-job'),
        'all_items'             => __('All Banners', 'daily-job'),
        'add_new_item'          => __('Add New Banner', 'daily-job'),
        'add_new'               => __('Add New', 'daily-job'),
        'new_item'              => __('New Banner', 'daily-job'),
        'edit_item'             => __('Edit Banner', 'daily-job'),
        'update_item'           => __('Update Banner', 'daily-job'),
        'view_item'             => __('View Banner', 'daily-job'),
        'view_items'            => __('View Banners', 'daily-job'),
        'search_items'          => __('Search Banner', 'daily-job'),
        'not_found'             => __('Not found', 'daily-job'),
        'not_found_in_trash'    => __('Not found in Trash', 'daily-job'),
        'featured_image'        => __('Featured Image', 'daily-job'),
        'set_featured_image'    => __('Set featured image', 'daily-job'),
        'remove_featured_image' => __('Remove featured image', 'daily-job'),
        'use_featured_image'    => __('Use as featured image', 'daily-job'),
        'insert_into_item'      => __('Insert into banner', 'daily-job'),
        'uploaded_to_this_item' => __('Uploaded to this banner', 'daily-job'),
        'items_list'            => __('Banners list', 'daily-job'),
        'items_list_navigation' => __('Banners list navigation', 'daily-job'),
        'filter_items_list'     => __('Filter banners list', 'daily-job'),
    );
    $args = array(
        'label'                 => __('Banner', 'daily-job'),
        'description'           => __('Custom Banner Post Type', 'daily-job'),
        'labels'                => $labels,
        'supports'              => array('title', 'custom-fields'),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-images-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'register_meta_box_cb'  => 'add_banner_metaboxes',
    );
    register_post_type('banner', $args);
}
add_action('init', 'custom_banner_post_type', 0);

// Function to add meta boxes for custom fields
function add_banner_metaboxes()
{
    add_meta_box(
        'banner_fields',
        'Banner Fields',
        'render_banner_fields',
        'banner', // Post type
        'normal', // Context
        'default' // Priority
    );
}

// Function to render custom fields
function render_banner_fields()
{
    global $post;
    // Use nonce for verification
    wp_nonce_field(basename(__FILE__), 'banner_fields_nonce');

    // Fetch saved values for fields
    $heading = get_post_meta($post->ID, 'heading', true);
    $sub_heading = get_post_meta($post->ID, 'sub_heading', true);
    $paragraph = get_post_meta($post->ID, 'paragraph', true);
?>
    <p>
        <label for="heading">Heading:</label>
        <input type="text" id="heading" name="heading" value="<?php echo esc_attr($heading); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="sub_heading">Sub Heading:</label>
        <input type="text" id="sub_heading" name="sub_heading" value="<?php echo esc_attr($sub_heading); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="paragraph">Paragraph:</label>
        <textarea id="paragraph" name="paragraph" style="width: 100%; height: 100px;"><?php echo esc_textarea($paragraph); ?></textarea>
    </p>
<?php
}

// Save custom field values
function save_banner_fields($post_id)
{
    // Check nonce
    if (!isset($_POST['banner_fields_nonce']) || !wp_verify_nonce($_POST['banner_fields_nonce'], basename(__FILE__))) {
        return;
    }

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions
    if (isset($_POST['post_type']) && 'banner' == $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Save heading field
    if (isset($_POST['heading'])) {
        update_post_meta($post_id, 'heading', sanitize_text_field($_POST['heading']));
    }

    // Save sub heading field
    if (isset($_POST['sub_heading'])) {
        update_post_meta($post_id, 'sub_heading', sanitize_text_field($_POST['sub_heading']));
    }

    // Save paragraph field
    if (isset($_POST['paragraph'])) {
        update_post_meta($post_id, 'paragraph', wp_kses_post($_POST['paragraph']));
    }
}
add_action('save_post', 'save_banner_fields');



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

function add_contact_submenus()
{
    add_submenu_page(
        'contact',
        __('Inbox', 'daily-job'),
        __('Inbox', 'daily-job'),
        'edit_posts',
        'edit.php?post_type=contact_post',
        'contact_menu_page_callback'
    );

    add_submenu_page(
        'contact',
        __('Information', 'daily-job'),
        __('Information', 'daily-job'),
        'edit_posts',
        'contact-information',
        'contact_information_page_callback'
    );
}
add_action('admin_menu', 'add_contact_submenus');

function contact_menu_page_callback()
{
    // Content for Contact page
    echo '<div class="wrap">';
    echo '<h1>All Contact</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Name</th>';
    echo '<th>Subject</th>';
    echo '<th>Message</th>';
    echo '<th>Email</th>';
    echo '<th>Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $args = array(
        'post_type' => 'contact_post',
        'posts_per_page' => -1,
    );

    $contact_posts = new WP_Query($args);
    if ($contact_posts->have_posts()) {
        while ($contact_posts->have_posts()) {
            $contact_posts->the_post();
            $email = get_post_meta(get_the_ID(), 'email', true);
            $name = get_post_meta(get_the_ID(), 'name', true);
            echo '<tr>';
            echo '<td>' . get_the_ID() . '</td>';
            echo '<td>' . $name . '</td>'; // Display the name
            echo '<td><a href="' . get_edit_post_link() . '">' . get_the_title() . '</a></td>';
            echo '<td>' . get_the_content() . '</td>';
            echo '<td>' . $email . '</td>';
            echo '<td>' . get_the_date() . '</td>';
            echo '</tr>';
        }
        wp_reset_postdata();
    } else {
        echo '<tr><td colspan="5">No contact posts found.</td></tr>'; // Adjust colspan for additional column
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

function contact_information_page_callback()
{
    echo '<div class="wrap">';
    echo '<h1>Contact Information Page</h1>';
    echo '</div>';
}
