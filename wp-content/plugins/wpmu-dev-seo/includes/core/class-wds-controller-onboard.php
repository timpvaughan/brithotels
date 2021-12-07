<?php

class Smartcrawl_Controller_Onboard extends Smartcrawl_Base_Controller {

	const ONBOARDING_DONE_OPTION = 'wds-onboarding-done';
	private static $_instance;

	/**
	 * Obtain instance without booting up
	 *
	 * @return Smartcrawl_Controller_Onboard instance
	 */
	public static function get() {
		if ( empty( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Dispatches action listeners for admin pages
	 *
	 * @return bool
	 */
	public function dispatch_actions() {
		add_action( 'wds-dshboard-after_settings', array( $this, 'add_onboarding' ) );

		add_action( 'wp_ajax_wds-boarding-toggle', array( $this, 'process_boarding_action' ) );
		add_action( 'wp_ajax_wds-boarding-skip', array( $this, 'process_boarding_skip' ) );
	}

	public function process_boarding_skip() {
		Smartcrawl_Settings::update_specific_options( self::ONBOARDING_DONE_OPTION, true );

		wp_send_json_success();
	}

	public function process_boarding_action() {
		$data = $this->get_request_data();
		$target = ! empty( $data['target'] ) ? sanitize_key( $data['target'] ) : false;

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error();

			return;
		}

		// Throw the switch on onboarding
		Smartcrawl_Settings::update_specific_options( self::ONBOARDING_DONE_OPTION, true );

		switch ( $target ) {
			case 'checkup-run':
				$service = Smartcrawl_Service::get( Smartcrawl_Service::SERVICE_CHECKUP );
				$service->start();
				wp_send_json_success();

				return;
			case 'analysis-enable':
				$opts = Smartcrawl_Settings::get_specific_options( 'wds_settings_options' );
				$opts['analysis-seo'] = true;
				$opts['analysis-readability'] = true;
				Smartcrawl_Settings::update_specific_options( 'wds_settings_options', $opts );
				wp_send_json_success();

				return;
			case 'opengraph-twitter-enable':
				$opts = Smartcrawl_Settings::get_component_options( Smartcrawl_Settings::COMP_SOCIAL );
				$opts['og-enable'] = true;
				$opts['twitter-card-enable'] = true;
				Smartcrawl_Settings::update_component_options( Smartcrawl_Settings::COMP_SOCIAL, $opts );
				wp_send_json_success();

				return;
			case 'sitemaps-enable':
				$opts = Smartcrawl_Settings::get_specific_options( 'wds_settings_options' );
				$opts['sitemap'] = true;
				Smartcrawl_Settings::update_specific_options( 'wds_settings_options', $opts );
				// Trigger a new crawl
				$service = Smartcrawl_Service::get( Smartcrawl_Service::SERVICE_SEO );
				$service->start();
				wp_send_json_success();

				return;

			case 'robots-txt-enable':
				$opts = Smartcrawl_Settings::get_specific_options( 'wds_settings_options' );
				$opts['robots-txt'] = true;
				Smartcrawl_Settings::update_specific_options( 'wds_settings_options', $opts );
				wp_send_json_success();
				return;

			default:
				wp_send_json_error();
				return;
		}
	}

	public function add_onboarding() {
		$done = (boolean) Smartcrawl_Settings::get_specific_options( self::ONBOARDING_DONE_OPTION );
		if ( $done ) {
			return false;
		}

		Smartcrawl_Simple_Renderer::render( 'dashboard/onboarding' );
	}

	/**
	 * Bind listening actions
	 *
	 * @return bool
	 */
	public function init() {
		add_action( 'admin_init', array( $this, 'dispatch_actions' ) );

		return true;
	}

	/**
	 * Unbinds listening actions
	 *
	 * @return bool
	 */
	protected function terminate() {
		remove_action( 'admin_init', array( $this, 'dispatch_actions' ) );

		return true;
	}

	private function get_request_data() {
		return isset( $_POST['_wds_nonce'] ) && wp_verify_nonce( $_POST['_wds_nonce'], 'wds-onboard-nonce' ) ? stripslashes_deep( $_POST ) : array();
	}
}