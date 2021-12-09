<?php 
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	} // Exit if accessed directly
?>
<div class="moove-gdpr-button-holder">
	<?php if ( isset( $content->allow_v ) && $content->allow_v ) : ?>
	  <button class="mgbutton moove-gdpr-modal-allow-all button-visible"  aria-label="<?php echo esc_attr( $content->allow_label ); ?>"><?php echo esc_attr( $content->allow_label ); ?></button>
	<?php endif; ?>

	<?php if ( isset( $content->reject_v ) && $content->reject_v ) : ?>
	  <button class="mgbutton moove-gdpr-modal-reject-all button-visible"  aria-label="<?php echo esc_attr( $content->allow_label ); ?>"><?php echo esc_attr( $content->reject_label ); ?></button>
	<?php endif; ?>
	
	<?php if ( isset( $content->settings_v ) && $content->settings_v ) : ?>
  	<button class="mgbutton moove-gdpr-modal-save-settings button-visible" aria-label="<?php echo esc_attr( $content->settings_label ); ?>"><?php echo esc_attr( $content->settings_label ); ?></button>
  <?php endif; ?>
</div>
<!--  .moove-gdpr-button-holder -->