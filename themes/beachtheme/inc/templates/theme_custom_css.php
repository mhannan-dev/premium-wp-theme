<h1>Sunset Custom CSS</h1>
<?php settings_errors(); ?>

<form id="save-custom-css-form" method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'theme-custom-css-options' ); ?>
	<?php do_settings_sections( 'beachX_sunset_css' ); ?>
	<?php submit_button(); ?>
</form>