<?php
if( !function_exists( 'power_business_container_width_callback' ) ){
	function power_business_container_width_callback( $control ){
		return 'default' == power_business_get( 'container-width' );
	}
}

if( !function_exists( 'power_business_scroll_to_top_callback' ) ){
	function power_business_scroll_to_top_callback( $control ){
		return power_business_get( 'enable-scroll-to-top' );
	}
}
/**
 * ------------------------------------------------------
 *  Returns array fields for advanced options
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !function_exists( 'power_business_get_advanced_options' ) ){
	function power_business_get_advanced_options(){
		return array(
			array(
				'id'	=> 'pre-loader',
				'label' => esc_html__( 'Show Preloader', 'power-business' ),
				'type'  => 'toggle',
			),
			array(
				'id'      => 'enable-scroll-to-top',
				'label'   => esc_html__( 'Enable Scroll To Top', 'power-business' ),
				'default' => true,
				'type'    => 'toggle'
			),
			array(
				'id'      => 'scroll-to-top-bg-color',
				'label'   => esc_html__( 'Scroll To Top Background Color', 'power-business' ),
				'default' => '#1955ca',
				'type'    => 'color',
				'active_callback' => 'scroll_to_top_callback',
			),
			array(
			    'id'      =>  'container-width',
			    'label'   => esc_html__( 'Site Layout', 'power-business' ),
			    'type'    => 'buttonset',
			    'default' => 'default',
			    'choices' => array(
			        'default' => esc_html__( 'Default', 'power-business' ),
			        'box'	  => esc_html__( 'Boxed', 'power-business' ),
			    )
			),
		    array(
		        'id'          	  => 'container-custom-width',
		        'label'   	  	  => esc_html__( 'Container Width', 'power-business' ),
				# framework will append prefix eg: power_business_container_width_callback
		        'active_callback' => 'container_width_callback',
		        'type'        	  => 'range',
		        'default'     	  => '1140',
	    		'input_attrs' 	  =>  array(
	                'min'   => 400,
	                'max'   => 2000,
	                'step'  => 5,
	            ),
		    ),
		);
	}
}