<?php
/**
* ------------------------------------------------------
*  Active callback functions
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if( !function_exists( 'power_business_blog_shortcode_callback' ) ){
	function power_business_blog_shortcode_callback(){
		return power_business_get( 'enable-blog-shortcode' );
	}
}

if( !function_exists( 'power_business_blog_callback' ) ){
	function power_business_blog_callback(){
		return power_business_get( 'enable-blog' );
	}
}

/**
* ------------------------------------------------------
*  Options for blog section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_blog_options' ) ){
	function power_business_get_blog_options(){
		return array(
			array(
				'id'      => 'enable-blog',
				'label'   => esc_html__( 'Enable', 'power-business' ),
				'type'    => 'toggle',
				'default' => true
			),
			array(
				'id'    => 'blog-page',
				'label' => esc_html__( 'Content Page', 'power-business' ),
				'type'  => 'dropdown-pages',
				'default' => '0',
				# framework will append prefix eg: power_business_blog_callback
				'active_callback' => 'blog_callback'
			),
			array(
				'id'    => 'blog-posts-per-page',
				'label' => esc_html__( 'Total posts to show', 'power-business' ),
				'type'  => 'number',
				'input_attrs' => array( 'max' => 4, 'min' => 1 ),
				'default' => 4,
				# framework will append prefix eg: power_business_blog_callback
				'active_callback' => 'blog_callback'
			),
			array(
				'id'    => 'blog-col',
				'label' => esc_html__( 'Total column per row', 'power-business' ),
				'type'  => 'number',
				'input_attrs' => array( 'max' => 4, 'min' => 1 ),
				'default' => 4,
				# framework will append prefix eg: power_business_blog_callback
				'active_callback' => 'blog_callback'
			),
			array(
				'id'      => 'enable-blog-shortcode',
				'label'   => esc_html__( 'Enable Shortcode', 'power-business' ),
				'type'    => 'toggle',
				'default' => false
			),
			array(
				'id'    => 'blog-shortcode',
				'label' => esc_html__( 'Shortcode', 'power-business' ),
				'type'  => 'text',
				# framework will append prefix eg: power_business_blog_shortcode_callback
				'active_callback' => 'blog_shortcode_callback'
			)
		);
	}
}