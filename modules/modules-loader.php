<?php
/**
 * ------------------------------------------------------
 *  Helper for loading modules
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !class_exists( 'Power_Business_Modules_Loader' ) ){

	class Power_Business_Modules_Loader{

		public function __construct( $modules ){
			$base = '/modules/';
			foreach( $modules as $module ){
				$file = $base . $module . '/' . $module . '-functions.php';
				require_once get_theme_file_path( $file );

				$module_files = apply_filters( "power_business_modules_{$module}", array() );
				if( count( $module_files ) > 0 ){
					foreach( $module_files as $file ){
						require_once  get_theme_file_path( $base . $module . '/' . $file );
					}
				}
			}
		}
	}
}

new Power_Business_Modules_Loader(array(
	'hooks',
	'customizer',
	'options',
	'css',
	'breadcrumb',
	'custom-fields'
));