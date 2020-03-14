<?php
/**
* Blog options
*
* @return array
* @since 1.0
* @package Power Business WordPress Theme
*/
if(! function_exists( 'power_business_get_post_options' ) ){
	function power_business_get_post_options(){
		return array(
            array(
                'id'      => 'post-category',
                'label'   =>  esc_html__( 'Show Categories', 'power-business' ),
                'default' => 1,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'post-date',
                'label'   => esc_html__( 'Show Date', 'power-business' ),
                'default' => 1,
                'type'    => 'toggle',
            ),
            array(
                'id'      => 'post-author',
                'label'   =>  esc_html__( 'Show Author', 'power-business' ),
                'default' => 1,
                'type'    => 'toggle',
            )
     	);
	}
}