<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_service_shortcode_callback' ) ){
	function power_business_service_shortcode_callback(){
		return power_business_get( 'enable-service-shortcode' );
	}
}

if( !function_exists( 'power_business_service_callback' ) ){
	function power_business_service_callback(){
		return power_business_get( 'enable-service' );
	}
}

/**
* ------------------------------------------------------
*  Options for service section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_service_options' ) ){
	function power_business_get_service_options(){
		return array(
			array(
				'id'      => 'enable-service',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'service-page',
				'label' => esc_html__( 'Content Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_service_callback
				'active_callback' => 'service_callback'
			),
			array(
				'id'    => 'service-btn-text',
				'label' => esc_html__( 'Button Text', 'power-business' ),
				'type'  => 'text',
				'default' => esc_html__( 'More Services' ,'power-business' ),
				'active_callback' => 'service_callback'
			),
			array(
				'id'    => 'service-pages',
				'label' => esc_html__( 'Sub Pages', 'power-business' ),
				'type'  => 'page-repeater',
				'limit' => 6,
				'active_callback' => 'service_callback'
			),
			array(
				'id'      => 'enable-service-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'service-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_service_shortcode_callback
				'active_callback' => 'service_shortcode_callback'
			)
		);
	}
}