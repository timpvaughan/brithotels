<?php
	/**
	 * Functions which enhance the theme by hooking into WordPress
	 *
	 * @package Brit_Hotels
	 */

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 */
	function brithotels_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}

	add_filter( 'body_class', 'brithotels_body_classes' );

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function brithotels_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	add_action( 'wp_head', 'brithotels_pingback_header' );

	/**
	 * Contact form 7 form listing
	 *
	 * @return array
	 */
	function cf7List() {
		$forms = array();
		$forms[0] = esc_html__('Select Form','brithotels');
		//need to check if any specific plugin is activate to make the plugin compatible for it.
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
			if ( ! class_exists( 'WPCF7_Contact_Form_List_Table' ) ) {
				require_once WPCF7_PLUGIN_DIR . '/admin/includes/class-contact-forms-list-table.php';
			}

			if ( class_exists( 'WPCF7_Contact_Form_List_Table' ) ) {
				$items = WPCF7_ContactForm::find();  // includes/classes.php:33
				//echo '<pre>'; print_r($items); echo '</pre>'; die();

				if ( ! empty( $items ) ) {
					//$forms['multi'] = true;

					foreach ( $items as $item ) {
						$forms[$item->id() ] = $item->title();
					}

				} else {
					$forms = array();
				}
			} else {
				$forms = array();
			}
		}

		return $forms;
	}
