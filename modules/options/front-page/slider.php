<?php
/**
* ------------------------------------------------------
*  Active callback functions for shortcode
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_slider_shortcode_callback' ) ){
	function power_business_slider_shortcode_callback(){
		return power_business_get( 'enable-slider-shortcode' );
	}
}

/**
* ------------------------------------------------------
*  Active callback functions for slider options
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_slider_callback' ) ){
	function power_business_slider_callback(){
		return power_business_get( 'enable-slider' );
	}
}

/**
* ------------------------------------------------------
*  Slider Options
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_slider_options' ) ){
	function power_business_get_slider_options(){
		return array(
			array(
				'id'      => 'enable-slider',
				'label'   => esc_html__( 'Enable Slider', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'slider-pages',
				'label' => esc_html__( 'Pages', 'power-business' ),
				'type'  => 'page-repeater',
				'limit' => 3,
				# framework will append prefix eg: power_business_slider_callback
				'active_callback' => 'slider_callback'
			),
			array(
				'id'    => 'slider-curve',
				'label' => esc_html__( 'Use Curve Style', 'power-business' ),
				'type'  => 'toggle',
				'default' => true,
				# framework will append prefix eg: power_business_slider_callback
				'active_callback' => 'slider_callback'
			),
			array(
				'id'    => 'slider-autoplay',
				'label' => esc_html__( 'Auto Play', 'power-business' ),
				'type'  => 'toggle',
				'default' => false,
				# framework will append prefix eg: power_business_slider_callback
				'active_callback' => 'slider_callback'
			),			
			array(
				'id'    => 'slider-dots',
				'label' => esc_html__( 'Dots', 'power-business' ),
				'type'  => 'toggle',
				'default' => true,
				# framework will append prefix eg: power_business_slider_callback
				'active_callback' => 'slider_callback'
			),			
			array(
				'id'    => 'slider-infinite',
				'label' => esc_html__( 'Infinite Scroll', 'power-business' ),
				'type'  => 'toggle',
				'default' => true,
				# framework will append prefix eg: power_business_slider_callback
				'active_callback' => 'slider_callback'
			),
			array(
				'id'      => 'enable-slider-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'slider-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_slider_shortcode_callback
				'active_callback' => 'slider_shortcode_callback'
			)
		);
	}
}