<?php
/**
* Sidebar options
*
* @return array
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_sidebar_options' ) ){
	function power_business_get_sidebar_options(){
		return array(
			array(
			'id'      => 'sidebar-position',
			'label'   => esc_html__( 'Position' , 'power-business' ),
			'type'    => 'buttonset',
			'default' => 'right-sidebar',
			'choices' => array(
			    'left-sidebar'  => esc_html__( 'Left' , 'power-business' ),
			    'right-sidebar' => esc_html__( 'Right' , 'power-business' ),
			    'no-sidebar'    => esc_html__( 'None', 'power-business' ),
			)
		));
	}
}