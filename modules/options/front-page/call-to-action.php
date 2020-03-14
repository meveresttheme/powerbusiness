<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_cta_shortcode_callback' ) ){
	function power_business_cta_shortcode_callback(){
		return power_business_get( 'enable-cta-shortcode' );
	}
}

if( !function_exists( 'power_business_cta_callback' ) ){
	function power_business_cta_callback(){
		return power_business_get( 'enable-cta' );
	}
}

/**
* ------------------------------------------------------
*  Options for cta section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_cta_options' ) ){
	function power_business_get_cta_options(){
		return array(
			array(
				'id'      => 'enable-cta',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'cta-page',
				'label' => esc_html__( 'Content Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_cta_callback
				'active_callback' => 'cta_callback'
			),
			array(
				'id'    => 'cta-btn-link',
				'label' => esc_html__( 'Button Link', 'power-business' ),
				'type'  => 'text',
				'default' => '#',
				'active_callback' => 'cta_callback'
			),
			array(
				'id'    => 'cta-btn-text',
				'label' => esc_html__( 'Button Text', 'power-business' ),
				'type'  => 'text',
				'default' => esc_html__( 'GET IN TOUCH' ,'power-business' ),
				'active_callback' => 'cta_callback'
			),
			array(
				'id'      => 'enable-cta-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'cta-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_cta_shortcode_callback
				'active_callback' => 'cta_shortcode_callback'
			)
		);
	}
}