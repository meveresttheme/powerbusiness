<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_testimonial_shortcode_callback' ) ){
	function power_business_testimonial_shortcode_callback(){
		return power_business_get( 'enable-testimonial-shortcode' );
	}
}

if( !function_exists( 'power_business_testimonial_callback' ) ){
	function power_business_testimonial_callback(){
		return power_business_get( 'enable-testimonial' );
	}
}

/**
* ------------------------------------------------------
*  Options for testimonial section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_testimonial_options' ) ){
	function power_business_get_testimonial_options(){
		return array(
			array(
				'id'      => 'enable-testimonial',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'testimonial-page',
				'label' => esc_html__( 'Content Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_testimonial_callback
				'active_callback' => 'testimonial_callback'
			),
			array(
				'id'    => 'testimonial-pages',
				'label' => esc_html__( 'Sub Pages', 'power-business' ),
				'type'  => 'page-repeater',
				'limit' => 3,
				'active_callback' => 'testimonial_callback'
			),
			array(
				'id'      => 'enable-testimonial-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'testimonial-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_testimonial_shortcode_callback
				'active_callback' => 'testimonial_shortcode_callback'
			)
		);
	}
}