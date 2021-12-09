<?php
/**
 * REST implementation of the checkup service, v1.0
 *
 * @package wpmu-dev-seo
 */

/**
 * Checkup service REST implementation
 */
class Smartcrawl_Checkup_Rest_Service extends Smartcrawl_Checkup_Service_Implementation { // phpcs:ignore -- We have two versions of this class
	private $_ignores;

	public function __construct() {
		$this->_ignores = new Smartcrawl_Model_Ignores( Smartcrawl_Model_Ignores::IGNORES_CHECKUP_STORAGE );
	}

	/**
	 * Gets all verbs known by the service
	 *
	 * @return array
	 */
	public function get_known_verbs() {
		return array( 'start', 'result', 'emails', 'sync' );
	}

	/**
	 * Checks if service verb supports results caching
	 *
	 * @param string $verb Service verb.
	 *
	 * @return bool
	 */
	public function is_cacheable_verb( $verb ) {
		return 'emails' === $verb;
	}

	/**
	 * Gets full request URL for a service verb
	 *
	 * @param string $verb Service verb.
	 *
	 * @return string|bool
	 */
	public function get_request_url( $verb ) {
		if ( empty( $verb ) ) {
			return false;
		}
		if ( 'emails' === $verb ) {
			return $this->get_emails_request_url();
		}

		$domain = apply_filters(
			$this->get_filter( 'domain' ),
			network_site_url()
		);
		if ( empty( $domain ) ) {
			return false;
		}

		$query_url = http_build_query( array(
			'domain' => $domain,
		) );
		$query_url = $query_url && preg_match( '/^\?/', $query_url ) ? $query_url : "?{$query_url}";

		$request_url = trailingslashit( $this->get_service_base_url() ) .
		               $verb .
		               $query_url;

		return $request_url;
	}

	/**
	 * Returns emails-specific request URL
	 *
	 * @return string
	 */
	public function get_emails_request_url() {
		return trailingslashit( $this->get_service_base_url() ) .
		       'emails';
	}

	/**
	 * Gets service base URL
	 *
	 * @return string
	 */
	public function get_service_base_url() {
		$base_url = 'https://wpmudev.com/';

		if ( defined( 'WPMUDEV_CUSTOM_API_SERVER' ) && WPMUDEV_CUSTOM_API_SERVER ) {
			$base_url = trailingslashit( WPMUDEV_CUSTOM_API_SERVER );
		}

		$api = apply_filters(
			$this->get_filter( 'api-endpoint' ),
			'api'
		);

		$namespace = apply_filters(
			$this->get_filter( 'api-namespace' ),
			'seo-checkup/v1'
		);

		return trailingslashit( $base_url ) . trailingslashit( $api ) . trailingslashit( $namespace );
	}

	/**
	 * Gets request arguments array for a verb
	 *
	 * @param string $verb Service verb.
	 *
	 * @return array
	 */
	public function get_request_arguments( $verb ) {
		if ( 'emails' === $verb ) {
			return $this->get_emails_request_arguments();
		}

		$args = array(
			'method'    => 'GET',
			'timeout'   => $this->get_timeout(),
			'sslverify' => false,
		);

		$key = (string) $this->get_dashboard_api_key();
		if ( $key ) {
			$args['headers']['Authorization'] = "Basic {$key}";
		}

		if ( 'sync' === $verb ) {
			$args['method'] = 'POST';
			$args['body']['ignored_issue_ids'] = wp_json_encode( $this->_ignores->get_all() );
		}

		return $args;
	}

	/**
	 * Returns emails-specific request arguments
	 *
	 * @return array
	 */
	public function get_emails_request_arguments() {
		$key = $this->get_dashboard_api_key();
		if ( empty( $key ) ) {
			return false;
		}

		$emails = Smartcrawl_Checkup_Options::get_all_recipients();
		if ( empty( $emails ) ) {
			return false;
		}

		$domain = apply_filters(
			$this->get_filter( 'domain' ),
			network_site_url()
		);
		if ( empty( $domain ) ) {
			return false;
		}

		$args = array(
			'method'    => 'POST',
			'timeout'   => $this->get_timeout(),
			'sslverify' => false,
			'body'      => array(
				'emails' => $emails,
				'domain' => $domain,
			),
		);

		$key = (string) $this->get_dashboard_api_key();
		if ( $key ) {
			$args['headers']['Authorization'] = "Basic {$key}";
		}

		return $args;
	}

	/**
	 * Handles service error response
	 *
	 * @param object $response WP HTTP API response.
	 */
	public function handle_error_response( $response, $verb ) {
		if ( 'emails' === $verb ) {
			return false;
		}

		$body = wp_remote_retrieve_body( $response );
		if ( empty( $body ) ) {
			return false;
		}

		$error = json_decode( $body, true );
		if ( empty( $error['message'] ) ) {
			return false;
		}

		$this->set_cached_error( 'checkup', $error['message'] );
	}

	/**
	 * Gets crawl starting verb
	 *
	 * @return string
	 */
	public function get_start_verb() {
		return 'start';
	}

	/**
	 * Gets results fetching verb
	 *
	 * @return string
	 */
	public function get_result_verb() {
		return 'result';
	}

	/**
	 * Gets triggered after done method to ping the service with emails
	 */
	public function after_done( $data ) {
		$this->request( 'emails' );
		$this->set_ignores( $data );
	}

	private function set_ignores( $data ) {
		$ignored_issue_ids = empty( $data['seo']['ignored'] )
			? array()
			: $data['seo']['ignored'];

		$this->_ignores->set_ignores( $ignored_issue_ids );
	}
}