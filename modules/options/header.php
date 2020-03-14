<?php
/**
* Register Header Options
*
* @return array
* @since 1.0
* @package Power Business WordPress Theme
*/
if( ! function_exists( 'power_business_get_header_options' ) ){
	function power_business_get_header_options(){	
		return array(
			array(
				'id'      	  => 'ib-blog-title',
				'label'   	  => esc_html__( 'Title' , 'power-business' ),
				'description' => esc_html__( 'When your homepage displays your latest posts. Leave it empty to hide it.' , 'power-business' ),
				'default' 	  => esc_html__( 'Latest Blog' , 'power-business' ),
				'type'	  	  => 'text',
				'priority'    => 10,
			),
		    array(
		        'id'	  	  => 'ib-title-size',
		        'label'   	  => esc_html__( 'Font Size', 'power-business' ),
		        'description' => esc_html__( 'The value is in px. Defaults to 40px.' , 'power-business' ),
		        'default' => array(
		    		'desktop' => 40,
		    		'tablet'  => 32,
		    		'mobile'  => 32,
		    	),
				'input_attrs' =>  array(
		            'min'   => 1,
		            'max'   => 60,
		            'step'  => 1,
		        ),
		        'type' => 'slider',
		        'priority' => 20
		    ),
		    array(
		        'id'      => 'ib-title-color',
		        'label'   => esc_html__( 'Text Color' , 'power-business' ),
		        'type'    => 'color',
		        'default' => '#ffffff',
		        'priority' => 30
		    ),
		    array(
		    	'id' 	   => 'ib-background-color',
		    	'label'    => esc_html__( 'Overlay Color', 'power-business' ),
		    	'default'  => 'rgba(10,10,10,0.7)',
		    	'type' 	   => 'color-picker',
		    	'priority' => 40,
		    ),
		    array(
		        'id'      => 'ib-text-align',
		        'label'   => esc_html__( 'Alignment' , 'power-business' ),
		        'type'    => 'buttonset',
		        'default' => 'banner-content-center',
		        'choices' => array(
		        	'banner-content-left'   => esc_html__( 'Left' , 'power-business'   ),
		        	'banner-content-center' => esc_html__( 'Center' , 'power-business' ),
		        	'banner-content-right'  => esc_html__( 'Right' , 'power-business'  ),
		         ),
		        'priority' => 50
		    ),
			array(
			    'id'      => 'ib-image-attachment', 
			    'label'   => esc_html__( 'Image Attachment' , 'power-business' ),
			    'type'    => 'buttonset',
			    'default' => 'banner-background-scroll',
			    'choices' => array(
			    	'banner-background-scroll'           => esc_html__( 'Scroll' , 'power-business' ),
			    	'banner-background-attachment-fixed' => esc_html__( 'Fixed' , 'power-business' ),
			    ),
		        'priority' => 60
			),
			array(
			    'id'      	=> 'ib-height',
			    'label'   	=> esc_html__( 'Height (px)', 'power-business' ),
			    'type'    	=> 'slider',
	            'description' => esc_html__( 'The value is in px. Defaults to 420px.' , 'power-business' ),
	            'default' => array(
	        		'desktop' => 420,
	        		'tablet'  => 420,
	        		'mobile'  => 420,
	        	),
	    		'input_attrs' =>  array(
	                'min'   => 1,
	                'max'   => 1000,
	                'step'  => 1,
	            ),
			),
		);
	}
}