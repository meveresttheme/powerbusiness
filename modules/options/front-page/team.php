<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_team_shortcode_callback' ) ){
	function power_business_team_shortcode_callback(){
		return power_business_get( 'enable-team-shortcode' );
	}
}

if( !function_exists( 'power_business_team_callback' ) ){
	function power_business_team_callback(){
		return power_business_get( 'enable-team' );
	}
}

/**
* ------------------------------------------------------
*  Options for team section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_team_options' ) ){
	function power_business_get_team_options(){
		return array(
			array(
				'id'      => 'enable-team',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'team-page',
				'label' => esc_html__( 'Content Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_team_callback
				'active_callback' => 'team_callback'
			),
			array(
				'id'    => 'team-btn-text',
				'label' => esc_html__( 'Button Text', 'power-business' ),
				'type'  => 'text',
				'default' => esc_html__( 'View All Member' ,'power-business' ),
				'active_callback' => 'team_callback'
			),
			array(
				'id'    => 'team-pages',
				'label' => esc_html__( 'Sub Pages', 'power-business' ),
				'type'  => 'page-repeater',
				'limit' => 5,
				'active_callback' => 'team_callback'
			),
			array(
				'id'    => 'team-posts-per-page',
				'label' => esc_html__( 'Total team to show', 'power-business' ),
				'type'  => 'number',
				'input_attrs' => array( 'max' => 4, 'min' => 1 ),
				'default' => 3,
				# framework will append prefix eg: power_business_blog_callback
				'active_callback' => 'team_callback'
			),
			array(
				'id'    => 'team-col',
				'label' => esc_html__( 'Total column per row', 'power-business' ),
				'type'  => 'number',
				'input_attrs' => array( 'max' => 4, 'min' => 1 ),
				'default' => 3,
				# framework will append prefix eg: power_business_team_callback
				'active_callback' => 'team_callback'
			),		
			array(
				'id'    => 'team-archive-page',
				'label' => esc_html__( 'Select a Team Archive Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => 0,
				'active_callback' => 'team_callback'
			),
			
			array(
				'id'      => 'enable-team-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'team-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_team_shortcode_callback
				'active_callback' => 'team_shortcode_callback'
			)
		);
	}
}