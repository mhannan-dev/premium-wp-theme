<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/inbox-styles.css'; ?>">
<div class="wrap">
    <h1 class="contact-page-title">Inbox</h1>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Email</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $args = array(
                'post_type' => 'contact_post',
                'posts_per_page' => 10,
                'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
            );
            $contact_posts = new WP_Query($args);
            if ($contact_posts->have_posts()) {
                while ($contact_posts->have_posts()) {
                    $contact_posts->the_post();
                    $email = get_post_meta(get_the_ID(), 'email', true);
                    $name = get_post_meta(get_the_ID(), 'name', true);
            ?>
                    <tr>
                        <td><?php echo get_the_ID(); ?></td>
                        <td><?php echo $name; ?></td>
                        <td><a href="<?php echo get_edit_post_link(); ?>"><?php echo get_the_title(); ?></a></td>
                        <td><?php echo get_the_content(); ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo get_the_date(); ?></td>
                    </tr>
            <?php
                }
                wp_reset_postdata();
            } else {
                echo '<tr><td colspan="6">No contact posts found.</td></tr>';
            }
            ?>
       </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="pagination">
        <?php
        echo paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $contact_posts->max_num_pages,
            'prev_text' => __('« Previous'),
            'next_text' => __('Next »'),
            'mid_size' => 1, // Number of links to show before and after the current page
            'end_size' => 1, // Number of links to show at the beginning and end of the list
            'prev_next' => true, // Whether to include previous and next links
            'add_args' => false, // Whether to add query arguments to the links
            'add_fragment' => '', // Optional additional fragment identifier to append to each link
            'before_page_number' => '', // Text or HTML to display before each page number
            'after_page_number' => '', // Text or HTML to display after each page number
            'link_before' => '', // Text or HTML to display before each link
            'link_after' => '', // Text or HTML to display after each link
            'echo' => true, // Whether to echo the generated output or return it
            'aria_current' => 'page', // Value for the aria-current attribute of the current link
            'class' => 'pagination-links', // Additional classes to add to the list of links
            'before_page_number' => '<span class="screen-reader-text">' . __('Page') . ' </span>', // Text to prepend to each page number
            'current_class' => (get_query_var('paged') == 0) ? 'current' : '',
        ));
        ?>
    </div>
</div>