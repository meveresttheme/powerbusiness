<?php
/**
 * ------------------------------------------------------
 *  Lists of files to be loaded for customizer module
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_customizer_files( $files ){

	$new_files = array(

		#framework
		'class-sanitizer.php',
		'class-framework.php',

		#lists of custom controls to be loaded
		'custom-control/toggle/toggle.php',
		'custom-control/radio-image/radio-image.php',

		'custom-control/slider/hook.php',
		'custom-control/slider/slider.php',
		
		'custom-control/page-repeater/page-repeater.php',
		'custom-control/icon-select/icon-select.php',
		'custom-control/buttonset/buttonset.php',
		'custom-control/color-picker/color-picker.php',
		'custom-control/reset/reset.php',
		'custom-control/horizontal-line/horizontal-line.php',
		'custom-control/range/range.php',
	);

	return array_merge( $files, $new_files );
}
add_filter( 'power_business_modules_customizer', 'power_business_customizer_files' );

/**
 * ------------------------------------------------------
 * Enqueue scripts and styles for customizer 
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_custom_controls_script(){

	$script = get_theme_file_uri( 'assets/js/customizer.js' );
	$deps   = array( 'jquery', 'customize-base', 'jquery-ui-slider', 'jquery-ui-button' );
	$style  = get_theme_file_uri( 'assets/css/customizer.css' );
	wp_enqueue_script( 'power-business-customizer-js', $script, $deps, '1.1', true );

	wp_enqueue_style( 'power-business-customizer-css', $style );

	wp_localize_script( 'power-business-customizer-js', 'powerBusinessColorPalette',
		array( 
			'colorPalettes' => array(
				'#000000',
				'#ffffff',
				'#dd3333',
				'#dd9933',
				'#eeee22',
				'#81d742',
				'#1e73be',
				'#8224e3',
			)
	 	)
	);
}
add_action( 'customize_controls_enqueue_scripts', 'power_business_custom_controls_script', 99	);

/**
 * ------------------------------------------------------
 * Modify default customizer placement
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_customize_register( $wp_customize ){
	$color_section = 'power-business-color-section';
	$wp_customize->get_control( 'header_textcolor' )->section = $color_section;
	$wp_customize->get_control( 'background_color' )->section = $color_section;		

	# changing header image to Inner Banner options and adding inside theme option panel
	$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Inner Banner', 'power-business' );
	$wp_customize->get_section( 'header_image' )->panel = 'power-business-panel';
}
add_action( 'customize_register', 'power_business_customize_register' );

/**
 * ------------------------------------------------------
 * Adds supports related with customizer
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_customizer_supports(){
	# Customize Selective Refresh Widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'power_business_customizer_supports' );