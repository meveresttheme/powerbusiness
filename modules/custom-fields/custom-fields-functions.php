<?php 
/**
* ------------------------------------------------------
*  Lists of files to be loaded for custom fields module
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_modules_custom_fields_files( $files ){
	$new_files = array( 'class-custom-fields.php' );
	return array_merge( $files, $new_files );
}
add_action( 'power_business_modules_custom-fields', 'power_business_modules_custom_fields_files' );

/**
* ------------------------------------------------------
*  create custom fields
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_custom_fields(){
	# meta box for sidebar options
	$post_types = array( 'page', 'post' );
	$label = esc_html__( 'Power Business Settings', 'power-business' );
	foreach ( $post_types as $type ) {

		$post = new Power_Business_Custom_Fields( $type );
		$options = array(
			'sidebar-position' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Sidebar Position:', 'power-business' ),
				'default' => 'customizer',
				'choices' => array(
					'customizer' 	=> esc_html__( 'From customizer', 'power-business' ),
					'left-sidebar' 	=> esc_html__( 'Left', 'power-business' ),
					'right-sidebar' => esc_html__( 'Right', 'power-business' ),
					'no-sidebar' 	=> esc_html__( 'Hide', 'power-business' ),
				),
			),
			'use-customizer-image-for-banner' => array(
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Use banner from customizer', 'power-business' )
			)
		);

		if( 'page' == $type ){
			$page_options = array(
				'disable-inner-banner' => array(
					'type'  => 'checkbox',
					'label' => esc_html__( 'Disable Banner', 'power-business' ),
				),
				'disable-footer-widget' => array(
					'type'  => 'checkbox',
					'label' => esc_html__( 'Disable Footer Widget', 'power-business' ),
				)
			);

			$options = array_merge( $options, $page_options );
		}

		$post->add_meta_box( $label, $options );
	}
}
add_action( 'init', 'power_business_custom_fields' );