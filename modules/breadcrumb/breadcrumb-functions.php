<?php
/**
 * Shows a breadcrumb for all types of pages.  This is a wrapper function for the Breadcrumb_Trail class,
 * which should be used in theme templates.
 *
 * @since  0.1.0
 * @access public
 * @param  array $args Arguments to pass to Breadcrumb_Trail.
 * @return void|string
 */
if( !function_exists( 'power_business_breadcrumb_trail') ){
	function power_business_breadcrumb_trail( $args = array() ) {

		$breadcrumb = apply_filters( 'power_business_breadcrumb_trail_object', null, $args );

		if ( !is_object( $breadcrumb ) ) 
			$breadcrumb = new Power_Business_Breadcrumb_Trail( $args );

		return $breadcrumb->trail();
	}
}

/**
 * ------------------------------------------------------
 *  Lists of files to be loaded for theme options module
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_breadcrumb_files( $files ){

    $new_files = array( 'class-breadcrumb.php' );

    return array_merge( $files, $new_files );
}
add_filter( 'power_business_modules_breadcrumb', 'power_business_breadcrumb_files' );