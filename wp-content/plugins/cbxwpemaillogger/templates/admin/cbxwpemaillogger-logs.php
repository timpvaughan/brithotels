<?php
	/**
	 * Provide a dashboard rating log listing
	 *
	 * This file is used to markup the admin-facing rating log listing
	 *
	 * @link       https://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    cbxwpemaillogger
	 * @subpackage cbxwpemaillogger/templates
	 */

	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	$cbxwpemaillogger_logs = new CBXWPEmailLogger_List_Table();

	//Fetch, prepare, sort, and filter log data
	$cbxwpemaillogger_logs->prepare_items();
?>

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
	<h1 class="wp-heading-inline">
		<?php esc_html_e( 'Email Logs', 'cbxwpemaillogger' ); ?>
	</h1>
	<p>
		<a class="button button-primary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemailloggersettings' )); ?>"><?php esc_html_e( 'Global Setting', 'cbxwpemaillogger' ); ?></a>
		<a class="button button-secondary  cbxwpemaillogger_logs_btn" href="<?php echo esc_url(admin_url( 'admin.php?page=cbxwpemailloggeremailtesting' )); ?>"><?php esc_html_e( 'Email Testing', 'cbxwpemaillogger' ); ?></a>
	</p>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder">
			<!-- main content -->
			<div id="post-body-content">
				<div class="meta-box-sortables ui-sortable">
					<div class="postbox">
						<div class="inside">
							<form id="cbxwpemaillogger_logs" method="post">
								<?php $cbxwpemaillogger_logs->views(); ?>

								<input type="hidden" name="page" value="<?php echo esc_attr(wp_unslash($_REQUEST['page'])); ?>" />

								<?php $cbxwpemaillogger_logs->search_box( esc_html__( 'Search', 'cbxwpemaillogger' ), 'cbxscratingreviewlogsearch' ); ?>
								<p class="search-box">
									<input autocomplete="new-password" type="text" id="cbxscratingreviewlog-logdate-input" name="logdate" value="<?php echo isset( $_REQUEST['logdate'] ) ? esc_attr( wp_unslash( $_REQUEST['logdate'] ) ) : ''; ?>" placeholder="<?php esc_html_e( 'Date', 'cbxwpemaillogger' ); ?>" />
								</p>

								<?php $cbxwpemaillogger_logs->display() ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear clearfix"></div>
	</div>
</div>