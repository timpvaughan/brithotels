<?php

/**
 * Outputs OG tags to the page
 */
class Smartcrawl_OpenGraph_Printer {

	/**
	 * Singleton instance holder
	 */
	private static $_instance;

	private $_is_running = false;
	private $_is_done = false;

	public function __construct() {
	}

	/**
	 * Boot the hooking part
	 */
	public static function run() {
		self::get()->_add_hooks();
	}

	private function _add_hooks() {
		// Do not double-bind
		if ( apply_filters( 'wds-opengraph-is_running', $this->_is_running ) ) {
			return true;
		}

		add_action( 'wp_head', array( $this, 'dispatch_og_tags_injection' ), 50 );
		add_action( 'wds_head-after_output', array( $this, 'dispatch_og_tags_injection' ) );

		$this->_is_running = true;
	}

	/**
	 * Singleton instance getter
	 *
	 * @return Smartcrawl_OpenGraph_Printer instance
	 */
	public static function get() {
		if ( empty( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * First-line dispatching of OG tags injection
	 */
	public function dispatch_og_tags_injection() {
		if ( ! ! $this->_is_done ) {
			return false;
		}

		$settings = Smartcrawl_Settings::get_component_options( Smartcrawl_Settings::COMP_SOCIAL );
		if ( empty( $settings['og-enable'] ) ) {
			return false;
		}
		$this->inject_global_tags();

		$this->_is_done = true;

		return $this->inject_og_tags();
	}

	/**
	 * Injects globally valid tags - regardless of context
	 */
	public function inject_global_tags() {
		$settings = Smartcrawl_Settings::get_component_options( Smartcrawl_Settings::COMP_SOCIAL );
		if ( ! empty( $settings['fb-app-id'] ) ) {
			$this->print_og_tag( 'fb:app_id', $settings['fb-app-id'] );
		}
	}

	/**
	 * Actually prints the OG tag
	 *
	 * @param string $tag Tagname or tagname-like string to print
	 * @param mixed $value Tag value as string, or list of string tag values
	 *
	 * @return bool
	 */
	public function print_og_tag( $tag, $value ) {
		if ( empty( $tag ) || empty( $value ) ) {
			return false;
		}

		$og_tag = $this->get_og_tag( $tag, $value );
		if ( empty( $og_tag ) ) {
			return false;
		}

		echo wp_kses( $og_tag, $this->get_allowed_tags() );

		return true;
	}

	/**
	 * Gets the markup for an OG tag
	 *
	 * @param string $tag Tagname or tagname-like string to print
	 * @param mixed $value Tag value as string, or list of string tag values
	 *
	 * @return string
	 */
	public function get_og_tag( $tag, $value ) {
		if ( empty( $tag ) || empty( $value ) ) {
			return false;
		}

		return '<meta property="' . esc_attr( $tag ) . '" content="' . esc_attr( $value ) . '" />' . "\n";
	}

	private function inject_type() {
		if ( is_front_page() || is_home() ) {
			$type = 'website';
		} elseif ( $this->is_woo_product() ) {
			$type = 'og:product';
		} elseif ( is_singular() ) {
			$type = 'article';
		} else {
			$type = 'object';
		}
		$this->print_og_tag( 'og:type', $type );
	}

	private function inject_url() {
		$helper = new Smartcrawl_Canonical_Value_Helper();
		$canonical_url = $helper->get_canonical();

		if ( ! empty( $canonical_url ) && ! is_wp_error( $canonical_url ) ) {
			$this->print_og_tag( 'og:url', $canonical_url );
		}
	}

	/**
	 * Attempt to use post-specific meta setup to resolve tag values
	 *
	 * Fallback to generic, global values
	 *
	 * @return bool
	 */
	public function inject_og_tags() {
		$value_helper = new Smartcrawl_OpenGraph_Value_Helper();
		if ( ! $value_helper->is_enabled() ) {
			return false;
		}

		$this->inject_type();
		$this->inject_url();
		$this->print_og_tag( 'og:title', $value_helper->get_title() );
		$this->print_og_tag( 'og:description', $value_helper->get_description() );
		$this->print_og_images( $value_helper->get_images() );

		if ( $this->is_woo_product() ) {
			$this->add_woo_product_tags( get_post() );
		} elseif ( is_singular() ) {
			$post = get_post();
			$date = get_the_date( 'Y-m-d\TH:i:s', $post );
			$this->print_og_tag( 'article:published_time', $date );

			$user_id = $post->post_author;
			if ( ! empty( $user_id ) ) {
				$user = Smartcrawl_Model_User::get( $user_id );
				$this->print_og_tag( 'article:author', $user->get_full_name() );
			}
		}

		return true;
	}

	private function is_woo_product() {
		return smartcrawl_woocommerce_active()
		       && function_exists( 'wc_get_product' )
		       && is_singular( array( 'product' ) );
	}

	private function add_woo_product_tags( $post ) {
		$product = wc_get_product( $post );
		$woo_options = ( new Smartcrawl_Woocommerce_Data() )->get_options();
		$woo_enabled = (bool) smartcrawl_get_array_value( $woo_options, 'woocommerce_enabled' );
		$woo_og_enabled = (bool) smartcrawl_get_array_value( $woo_options, 'enable_open_graph' );

		if ( $product && $woo_enabled && $woo_og_enabled ) {
			$price = $this->get_product_price( $product );
			if ( $price ) {
				$this->print_og_tag( 'product:price:amount', $price );
				$this->print_og_tag( 'product:price:currency', get_woocommerce_currency() );
			}

			$this->print_product_availability( $product );

			$brand = Smartcrawl_Controller_Woocommerce::get()->get_brand( $product );
			if ( $brand ) {
				$this->print_og_tag( 'product:brand', $brand->name );
			}
		}
	}

	private function get_product_price( $product ) {
		$price = $product->get_price();
		if ( $price === '' ) {
			return '';
		}

		if ( $product->is_type( 'variable' ) ) {
			$lowest = $product->get_variation_price( 'min', false );
			$highest = $product->get_variation_price( 'max', false );

			return $lowest === $highest
				? wc_format_decimal( $lowest, wc_get_price_decimals() )
				: '';
		} else {
			return wc_format_decimal( $price, wc_get_price_decimals() );
		}
	}

	public function print_og_images( $images ) {
		if ( empty( $images ) ) {
			return;
		}

		$images = is_array( $images ) && ! empty( $images )
			? $images
			: array();

		$image_tags = array();
		$included_urls = array();
		foreach ( $images as $image ) {
			$url = smartcrawl_get_array_value( $image, 0 );
			$width = smartcrawl_get_array_value( $image, 1 );
			$height = smartcrawl_get_array_value( $image, 2 );

			if ( ! $width || ! $height ) {
				$attachment = smartcrawl_get_attachment_by_url( trim( $url ) );
				if ( $attachment ) {
					$width = $attachment['width'];
					$height = $attachment['height'];
				}
			}

			if ( array_search( $url, $included_urls ) !== false ) {
				continue;
			}

			if ( $url ) {
				$image_tags[] = $this->get_og_tag( 'og:image', $url );
				$included_urls[] = $url;
			}
			if ( $width ) {
				$image_tags[] = $this->get_og_tag( 'og:image:width', $width );
			}
			if ( $height ) {
				$image_tags[] = $this->get_og_tag( 'og:image:height', $height );
			}
		}
		$markup = join( "", array_filter( $image_tags ) );
		echo wp_kses( $markup, $this->get_allowed_tags() );
	}

	/**
	 * @return array
	 */
	private function get_allowed_tags() {
		$allowed_tags = array(
			'meta' => array(
				'property' => array(),
				'content'  => array(),
			),
		);

		return $allowed_tags;
	}

	/**
	 * @param WC_Product $product
	 */
	private function print_product_availability( $product ) {
		$product_availability = $og_availability = false;
		$stock_status = $product->get_stock_status();
		if ( $stock_status === 'onbackorder' ) {
			$product_availability = 'available for order';
			$og_availability = 'backorder';
		} elseif ( $stock_status === 'instock' ) {
			$product_availability = $og_availability = 'instock';
		} elseif ( $stock_status === 'outofstock' ) {
			$product_availability = $og_availability = 'out of stock';
		}

		if ( $og_availability ) {
			$this->print_og_tag( 'og:availability', $og_availability );
		}
		if ( $product_availability ) {
			$this->print_og_tag( 'product:availability', $product_availability );
		}
	}
}