<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_about_shortcode_callback' ) ){
	function power_business_about_shortcode_callback(){
		return power_business_get( 'enable-about-shortcode' );
	}
}

if( !function_exists( 'power_business_about_callback' ) ){
	function power_business_about_callback(){
		return power_business_get( 'enable-about' );
	}
}

/**
* ------------------------------------------------------
*  Options for about section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_about_options' ) ){
	function power_business_get_about_options(){
		return array(
			array(
				'id'      => 'enable-about',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'about-page',
				'label' => esc_html__( 'Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_about_callback
				'active_callback' => 'about_callback'
			),
			array(
				'id'    => 'about-btn-text',
				'label' => esc_html__( 'Button Text', 'power-business' ),
				'type'  => 'text',
				'default' => esc_html__( 'Know More' ,'power-business' ),
				'active_callback' => 'about_callback'
			),
			array(
				'id'      => 'enable-about-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'about-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_about_shortcode_callback
				'active_callback' => 'about_shortcode_callback'
			)
		);
	}
}