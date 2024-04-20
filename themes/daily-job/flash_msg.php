<?php
    if (isset($_SESSION['Success'])) {
      echo '<div class="alert alert-success" role="alert" id="success-alert">
              <h4 class="alert-heading">Well done!</h4>
              <p>' . $_SESSION['Success'] . '</p>
            </div>';
      unset($_SESSION['Success']);
  }

  // Check for error message
  if (isset($_SESSION['Error'])) {
      echo '<div class="alert alert-danger" role="alert" id="error-alert">
              <h4 class="alert-heading">Error!</h4>
              <p>' . $_SESSION['Error'] . '</p>
            </div>';
      unset($_SESSION['Error']);
  }

  // Check for warning message
  if (isset($_SESSION['Warning'])) {
      echo '<div class="alert alert-warning" role="alert" id="warning-alert">
              <h4 class="alert-heading">Warning!</h4>
              <p>' . $_SESSION['Warning'] . '</p>
            </div>';
      unset($_SESSION['Warning']);
  }
?>

<script>
    jQuery(document).ready(function($) {
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
    });
</script>
