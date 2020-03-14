<?php

/**
* ------------------------------------------------------
*  Lists of files to be loaded for custom fields module
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_modules_hooks_files( $files ){
	$new_files = array( 'class-helper.php', 'class-header.php', 'class-footer.php', 'class-options.php' );
	return array_merge( $files, $new_files );
}
add_action( 'power_business_modules_hooks', 'power_business_modules_hooks_files' );