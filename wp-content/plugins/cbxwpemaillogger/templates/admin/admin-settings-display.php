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
	<h1 class="wp-heading-inline"><?php esc_html_e( 'Global Setting', 'cbxwpemaillogger' ); ?></h1>
	<p>
		<a class="button button-primary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemaillogger' )); ?>"><?php esc_html_e( 'Log Listing', 'cbxwpemaillogger' ); ?></a>
		<a class="button button-secondary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemailloggeremailtesting' )); ?>"><?php esc_html_e( 'Email Testing', 'cbxwpemaillogger' ); ?></a>
	</p>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<div class="inside">
							<?php
								$this->settings_api->show_navigation();
								$this->settings_api->show_forms();
							?>
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