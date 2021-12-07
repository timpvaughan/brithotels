<?php
/**
 * brithotels Theme Customizer
 *
 * @package brithotels
 */




$blog_id = get_current_blog_id();

if($blog_id == 1){

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function brithotels_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector'        => '.site-title a',
				'render_callback' => 'brithotels_customize_partial_blogname',
			) );
			$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
				'selector'        => '.site-description',
				'render_callback' => 'brithotels_customize_partial_blogdescription',
			) );
		}
	}
	add_action( 'customize_register', 'brithotels_customize_register' );

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	function brithotels_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	function brithotels_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function brithotels_customize_preview_js() {
		wp_enqueue_script( 'brithotels-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
	}
	add_action( 'customize_preview_init', 'brithotels_customize_preview_js' );

	add_action( 'init', 'brithotels_init_kirki' );
}


function brithotels_init_kirki() {
	if ( class_exists( 'Kirki' ) ) {
		//kirki config
		Kirki::add_config( 'brithotels_kirki_config', array(
			'option_type' => 'theme_mod',
			'capability'  => 'edit_theme_options',
		) );

		//panel
		Kirki::add_panel( 'brithotels_panel', array(
			'priority' => 10,
			'title'    => esc_html__( 'Brit Hotels Settings', 'brithotels' ),
		) );



		//section:pages
		Kirki::add_section( 'brithotels_home_section', array(
			'title'    => esc_html__( 'Home Page Information', 'brithotels' ),
			'panel'    => 'brithotels_panel',
			'priority' => 160,
		) );

		/*Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_home_section',
			'settings' => 'brithotels_tripadv_url',
			'type'     => 'url',
			'label'    => esc_html__( 'Tripadvisor Url', 'brithotels' )
		) );*/



		//section:pages
		Kirki::add_section( 'brithotels_pages_section', array(
			'title'    => esc_html__( 'Important Pages', 'brithotels' ),
			'panel'    => 'brithotels_panel',
			'priority' => 160,
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_contact',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Contact Page', 'brithotels' )
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_privacy',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Privacy Page', 'brithotels' )
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_terms',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Terms Page', 'brithotels' )
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_sitemap',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Sitemap Page', 'brithotels' )
		) );




		//section:pages
		Kirki::add_section( 'brithotels_common_section', array(
			'title'    => esc_html__( 'Global Information', 'brithotels' ),
			'panel'    => 'brithotels_panel',
			'priority' => 160,
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_common_section',
			'settings' => 'brithotels_header_title',
			'type'     => 'textarea',
			'default'    => __( 'Welcome to London and enjoy <br> affordable luxury.', 'brithotels' ),
			'label'    => esc_html__( 'Header Title', 'brithotels' ),
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_common_section',
			'settings' => 'brithotels_telephone',
			'type'     => 'text',
			'default'    => '#',
			'label'    => esc_html__( 'Telephone/Mobile Number', 'brithotels' ),
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_common_section',
			'settings' => 'brithotels_contact_form',
			'type'     => 'select',
			'label'    => esc_html__( 'Contact Form', 'brithotels' ),
			'choices'     => cf7List()
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_common_section',
			'settings' => 'brithotels_map_id',
			'type'     => 'text',
			'default'    => '1',
			'label'    => esc_html__( 'Map id', 'brithotels' ),
		) );
	}
}