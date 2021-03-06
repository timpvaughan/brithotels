<?php
/**
 * Handles export
 *
 * @package wpmu-dev-seo
 */

/**
 * Settings export class
 */
class Smartcrawl_Export {

	/**
	 * Model instance
	 *
	 * @var Smartcrawl_Model_IO
	 */
	protected $_model;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->_model = new Smartcrawl_Model_IO();
	}

	/**
	 * Loads all options
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public static function load() {
		$me = new self();

		$me->load_all();

		return $me->_model;
	}

	/**
	 * Loads everything
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_all() {
		$this->_model->set_version( SMARTCRAWL_VERSION );
		$this->_model->set_url( home_url() );

		foreach ( $this->_model->get_sections() as $section ) {
			$method = array( $this, "load_{$section}" );
			if ( ! is_callable( $method ) ) {
				continue;
			}

			call_user_func( $method );
		}

		return $this->_model;
	}

	/**
	 * Loads options
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_options() {
		$options = array();

		$components = Smartcrawl_Settings::get_all_components();
		foreach ( $components as $component ) {
			$options[ $this->get_option_name( $component ) ] = Smartcrawl_Settings::get_component_options( $component );
		}

		$options['wds_settings_options'] = Smartcrawl_Settings::get_local_settings();

		$options['wds_blog_tabs'] = get_site_option( 'wds_blog_tabs' );

		$this->_model->set( Smartcrawl_Model_IO::OPTIONS, $options );

		return $this->_model;
	}

	/**
	 * Gets option name
	 *
	 * @param string $comp Partial.
	 *
	 * @return string Options key
	 */
	public function get_option_name( $comp ) {
		if ( in_array( $comp, Smartcrawl_Settings::get_all_components(), true ) ) {
			return "wds_{$comp}_options";
		}
	}

	/**
	 * Loads ignores
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_ignores() {
		$model = new Smartcrawl_Model_Ignores();
		$this->_model->set( Smartcrawl_Model_IO::IGNORES, $model->get_all() );

		return $this->_model;
	}

	/**
	 * Loads extra sitemap URLs
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_extra_urls() {
		$this->_model->set( Smartcrawl_Model_IO::EXTRA_URLS, Smartcrawl_Sitemap_Utils::get_extra_urls() );

		return $this->_model;
	}

	/**
	 * Loads ignore sitemap URLs
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_ignore_urls() {
		$this->_model->set( Smartcrawl_Model_IO::IGNORE_URLS, Smartcrawl_Sitemap_Utils::get_ignore_urls() );

		return $this->_model;
	}

	/**
	 * Loads extra sitemap post IDs
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_ignore_post_ids() {
		$this->_model->set( Smartcrawl_Model_IO::IGNORE_POST_IDS, Smartcrawl_Sitemap_Utils::get_ignore_ids() );

		return $this->_model;
	}

	/**
	 * Loads all stored postmeta
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_postmeta() {
		return $this->_model;
	}

	/**
	 * Loads all stored taxmeta for the current site
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_taxmeta() {
		return $this->_model;
	}

	/**
	 * Loads all stored redirects for the current site
	 *
	 * @return Smartcrawl_Model_IO instance
	 */
	public function load_redirects() {
		$model = new Smartcrawl_Model_Redirection();
		$this->_model->set( Smartcrawl_Model_IO::REDIRECTS, $model->get_all_redirections() );

		return $this->_model;
	}

	public function load_redirect_types() {
		$model = new Smartcrawl_Model_Redirection();
		$this->_model->set( Smartcrawl_Model_IO::REDIRECT_TYPES, $model->get_all_redirection_types() );

		return $this->_model;
	}
}