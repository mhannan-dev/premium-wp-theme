<?php
/*
Template Name: Contact Posts
*/
get_header();
?>

<div class="wrap">
    <h1>All Contact Posts</h1>
    <ul>
        <?php
        $args = array(
            'post_type' => 'contact_post',
            'posts_per_page' => -1,
        );
        $contact_posts = new WP_Query($args);
        if ($contact_posts->have_posts()) {
            while ($contact_posts->have_posts()) {
                $contact_posts->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            wp_reset_postdata();
        } else {
            echo '<li>No contact posts found.</li>';
        }
        ?>
    </ul>
</div>

<?php
get_footer();
?>
