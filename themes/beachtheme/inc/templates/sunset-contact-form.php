<h1>Sunset Contact Form</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'beachX-contact-options' ); ?>
	<?php do_settings_sections( 'beachX_sunset_theme_contact' ); ?>
	<?php submit_button(); ?>
</form>