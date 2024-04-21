<?php
/*
Plugin Name: Custom Post Plugin
Description: It is a custom post type registering plugin for my personal project.
Version: 1.0
*/

function customBannerFunction()
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
add_action('init', 'customBannerFunction', 0);


// Function to add meta boxes for custom fields
function add_banner_metaboxes()
{
    add_meta_box(
        'banner_fields',
        'Banner Fields',
        'render_banner_fields',
        'banner', 
        'normal', 
        'default'
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

