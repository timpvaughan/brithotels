<?php
$service = Smartcrawl_Service::get( Smartcrawl_Service::SERVICE_CHECKUP );
$is_member = $service->is_member();
if ( $is_member ) {
	return;
}
?>

<section id="<?php echo esc_attr( Smartcrawl_Settings_Dashboard::BOX_UPGRADE ); ?>"
         class="sui-box wds-dashboard-widget">

	<div class="sui-box-header">
		<h3 class="sui-box-title">
			<i class="sui-icon-smart-crawl" aria-hidden="true"></i>
			<?php esc_html_e( 'SmartCrawl Pro', 'wds' ); ?>
		</h3>

		<span class="sui-tag sui-tag-pro sui-tooltip"
		      data-tooltip="<?php esc_attr_e( 'Get SmartCrawl Pro today Free', 'wds' ); ?>">
			<?php esc_html_e( 'Pro', 'wds' ); ?>
		</span>
	</div>

	<div class="sui-box-body">
		<p><?php esc_html_e( 'Get our full WordPress Search Engine Optimization suite with SmartCrawl Pro and additional benefits of a WPMU DEV membership.', 'wds' ); ?></p>

		<ul>
			<li><?php esc_html_e( 'Scheduled SEO Checkups & Sitemap Crawls', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Automatic linking', 'wds' ); ?></li>
			<li><?php esc_html_e( 'White label automated reporting', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Smush Pro for the best image optimization', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Premium WordPress plugins', 'wds' ); ?></li>
			<li><?php esc_html_e( 'Manage unlimited WordPress sites', 'wds' ); ?></li>
			<li><?php esc_html_e( '24/7 live WordPress support', 'wds' ); ?></li>
			<li><?php esc_html_e( 'The WPMU DEV guarantee', 'wds' ); ?></li>
		</ul>

		<a target="_blank" class="sui-button sui-button-purple"
		   href="https://premium.wpmudev.org/project/smartcrawl-wordpress-seo/?utm_source=smartcrawl&utm_medium=plugin&utm_campaign=smartcrawl_dashboard_upsellwidget_button">
			<?php esc_html_e( 'Try Pro Free Today!', 'wds' ); ?>
		</a>
	</div>

</section>