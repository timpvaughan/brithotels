<?php
/**
 * brithotels Theme Customizer
 *
 * @package brithotels
 */

add_action( 'init', 'brithotels_init_kirki_london' );


function brithotels_init_kirki_london() {
	if ( class_exists( 'Kirki' ) ) {
		//kirki config
		Kirki::add_config( 'brithotels_london_kirki_config', array(
			'option_type' => 'theme_mod',
			'capability'  => 'edit_theme_options',
		) );

		//panel
		Kirki::add_panel( 'brithotels_panel', array(
			'priority' => 10,
			'title'    => esc_html__( 'London Court Settings', 'brithotels' ),
		) );

		//section:pages
		Kirki::add_section( 'brithotels_pages_section', array(
			'title'    => esc_html__( 'Important Pages', 'brithotels' ),
			'panel'    => 'brithotels_panel',
			'priority' => 160,
		) );


		Kirki::add_field( 'brithotels_london_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_rooms',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Rooms Page', 'brithotels' )
		) );



		Kirki::add_field( 'brithotels_london_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_facility',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Facilities Page', 'brithotels' )
		) );

		Kirki::add_field( 'brithotels_london_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_gallery',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Gallery Page', 'brithotels' )
		) );


		Kirki::add_field( 'brithotels_london_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_page_contact',
			'type'     => 'dropdown-pages',
			'label'    => esc_html__( 'Contact Page', 'brithotels' )
		) );

		Kirki::add_field( 'brithotels_kirki_config', array(
			'section'  => 'brithotels_pages_section',
			'settings' => 'brithotels_contact_form',
			'type'     => 'select',
			'label'    => esc_html__( 'Contact Form', 'brithotels' ),
			'choices'     => cf7List()
		) );
	}
}
