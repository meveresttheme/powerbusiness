<?php
/**
 * ------------------------------------------------------
 *  Lists of files to be loaded for css module
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_css_files( $files ){

	$new_files = array(
		'class-css.php',
		'common.php',
		'responsive.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'power_business_modules_css', 'power_business_css_files' );