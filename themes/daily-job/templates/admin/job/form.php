<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/css/inbox-styles.css'; ?>">

<div class="job-form-container">
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <label for="job_type">Job Type:</label>
        <select class="job-type-select" id="job_type" name="job_type" required>
            <option value="">Select Job Type</option>
            <option value="full-time">Full Time</option>
            <option value="part-time">Part Time</option>
        </select><br>
        <input type="hidden" name="action" value="submit_job_form">
        <label for="job_title">Job Title:</label>
        <input type="text" id="job_title" name="job_title" required><br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required><br>
        <input class="submit" type="submit" value="Submit">
    </form>
</div>
