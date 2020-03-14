<?php
/**
 * Breadcrumb options in customizer 
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */

if( !function_exists( 'power_business_acb_breadcrumb' ) ):
	/**
	* Active callback function for breadcrumb action.
	*
	* @return boolean
	* @since 1.0
	* @package Power Business WordPress Theme
	*/
	function power_business_acb_breadcrumb( $control ) {
		$value = $control->manager->get_setting( 'power-business-show-breadcrumb' )->value();
		return $value == 1 ? true : false;
	}
endif;

/**
* Register breadcrumb Options
*
* @return void
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_get_breadcrumb_options(){	
	return array(
		array(
		    'id'	  => 'show-breadcrumb',
		    'label'   => esc_html__( 'Show Breadcrumb', 'power-business' ),
		    'default' => true,
		    'type'    => 'toggle',
		),
		#bc - breadcrumb
		array(
		    'id'      		  => 'bc-separator',
		    'label'   		  => esc_html__( 'Separator', 'power-business' ),
		    'type'    		  => 'icon',
		    'active_callback' => 'acb_breadcrumb',
		    'default' 		  => 'f105',
		    'choices' 	=> array(
		        'f105' => 'fa fa-angle-right',
		        '002f' => 'fa-slash',
		        'f061' => 'fa fa-arrow-right',
		        'f178' => 'fa fa-long-arrow-right',
		        'f101' => 'fa fa-angle-double-right',
		     )
		),
	    array(
	        'id'	  	  => 'bc-size',
	        'label'   	  => esc_html__( 'Font Size', 'power-business' ),
	        'description' => esc_html__( 'The value is in px.  Defaults to 16px.' , 'power-business' ),
	        'default' => array(
	    		'desktop' => 16,
	    		'tablet'  => 16,
	    		'mobile'  => 16,
	    	),
			'input_attrs' =>  array(
	            'min'   => 1,
	            'max'   => 60,
	            'step'  => 1,
	        ),
	        'type' => 'slider'
	    ),
	);
}