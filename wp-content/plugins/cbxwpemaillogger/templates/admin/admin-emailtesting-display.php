<?php
	/**
	 * Provide a settings view for the plugin
	 *
	 * This file is used to markup the public-facing aspects of the plugin.
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    Cbxform
	 * @subpackage Cbxform/admin/templates
	 */
	if ( ! defined( 'WPINC' ) ) {
		die;
	}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<div class="cbxwpemaillogger_brand_wrap">
		<h2 class="h1">
			<img src="<?php echo CBXWPEMAILLOGGER_ROOT_URL . 'assets/images/icon_20.png'; ?>">	 CBX Email SMTP & Logger
			<p class="cbxwpemaillogger_brand_extra">
				<span class="cbxwpemaillogger_brand_version">
					<?php echo sprintf(esc_html__('Version: %s', 'cbxwpemaillogger'), CBXWPEMAILLOGGER_PLUGIN_VERSION); ?>
				</span>
				<a target="_blank" class="cbxwpemaillogger_brand_documentation" href="https://codeboxr.com/product/cbx-email-logger-for-wordpress/"><?php esc_html_e('Documentation', 'cbxwpemaillogger'); ?></a>
			</p>

		</h2>
	</div>
	<h1 class="wp-heading-inline wp-heading-inline-emailtesting"><?php esc_html_e( 'Email Testing', 'cbxwpemaillogger' ); ?></h1>
	<p>
		<a class="button button-primary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemaillogger' )); ?>"><?php esc_html_e( 'Log Listing', 'cbxwpemaillogger' ); ?></a>
		<a class="button button-secondary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemailloggersettings' )); ?>"><?php esc_html_e( 'Global Setting', 'cbxwpemaillogger' ); ?></a>
	</p>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<div class="inside">
							<?php
								$submission_msg = get_option('cbxwpemaillogger_testmsg');
								if($submission_msg):
									delete_option('cbxwpemaillogger_testmsg');

									$msg = isset($submission_msg['message'])? $submission_msg['message'] : '';
									$class = (isset($submission_msg['type']) && intval($submission_msg['type']) == 1)?  'notice-success inline' : 'notice-error inline';
								?>
									<div class="notice <?php echo esc_attr($class); ?>">
										<p>
											<?php
												echo $msg;
											?>
										</p>
									</div>
								<?php
								endif;

							?>
							<form class="emailtesting-form" action="<?php echo esc_url(admin_url('admin.php?page=cbxwpemailloggeremailtesting')); ?>" method="post" enctype="multipart/form-data">
								<div class="emailtesting-form-input">
									<label for="emailtesting-form-to"><?php esc_html_e('To', 'cbxwpemaillogger'); ?></label>
									<input required placeholder="<?php esc_html_e('To email', 'cbxwpemaillogger'); ?>" type="email" name="to" value="" class="regular-text" id="emailtesting-form-to" />
								</div>
								<div class="emailtesting-form-input emailtesting-form-input-subject">
									<label for="emailtesting-form-subject"><?php esc_html_e('Subject', 'cbxwpemaillogger'); ?></label>
									<input required placeholder="<?php esc_html_e('Email Subject', 'cbxwpemaillogger'); ?>" type="text" name="subject" value="" class="regular-text" id="emailtesting-form-subject" />
								</div>
								<div class="emailtesting-form-input emailtesting-form-input-message">
									<label for="emailtesting-form-message"><?php esc_html_e('Message', 'cbxwpemaillogger'); ?></label>
									<textarea required placeholder="<?php esc_html_e('Email Body Test', 'cbxwpemaillogger'); ?>" name="message" id="emailtesting-form-message" cols="30" rows="10"></textarea>
								</div>
								<input type="hidden" name="cbxwpemaillogger-email-testing" value="1" />
								<input type="hidden" name="cbxwpemaillogger-security" value="<?php echo  wp_create_nonce( 'cbxwpemaillogger' ); ?>" />
								<p>
									<input type="submit" class="button-primary" value="<?php esc_html_e('Send Test Email', 'cbxwpemaillogger'); ?>" />
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php
				include( cbxwpemaillogger_locate_template( 'admin/sidebar.php' ) );
			?>
		</div>
		<div class="clear"></div>
	</div>
</div>