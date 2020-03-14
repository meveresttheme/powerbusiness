<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since 1.0
 *
 * @package Power Business WordPress Theme
 */

if ( ! is_active_sidebar( 'power_business_sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
		$sidebar = apply_filters( 'power_business_sidebar', 'power_business_sidebar' );
		dynamic_sidebar( $sidebar ); 
	?>
</aside><!-- #secondary -->