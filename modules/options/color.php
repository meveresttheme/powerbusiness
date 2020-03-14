<?php
/**
* Register Color Options
*
* @return array
* @since 1.0
* @package Power Business WordPress Theme
*/
if( ! function_exists( 'power_business_get_color_options' ) ){
	function power_business_get_color_options(){	
		return array(
			array(
				'id'      => 'primary-color',
				'label'   => esc_html__( 'Primary Color', 'power-business' ),
				'default' => '#1a55cb',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'body-paragraph-color',
				'label'   => esc_html__( 'Body Text Color', 'power-business' ),
				'default' => '#5f5f5f',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'primary-menu-item-color',
				'label'   => esc_html__( 'Primary Menu Item color', 'power-business' ),
				'default' => '#737373',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-1',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'link-color',
				'label'   => esc_html__( 'Link Color', 'power-business' ),
				'default' => '#145fa0',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'link-hover-color',
				'label'   => esc_html__( 'Link Hover Color', 'power-business' ),
				'default' => '#737373',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-2',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'sb-widget-title-color',
				'label'   => esc_html__( 'Sidebar Widget Title Color', 'power-business' ),
				'default' => '#000000',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'sb-widget-content-color',
				'label'   => esc_html__( 'Sidebar Widget Content Color', 'power-business' ),
				'default' => '#282835',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-3',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'footer-title-color',
				'label'   => esc_html__( 'Footer Widget Title Color', 'power-business' ),
				'default' => '#fff',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-content-color',
				'label'   => esc_html__( 'Footer Widget Content Color', 'power-business' ),
				'default' => '#a8a8a8',
				'type'    => 'color-picker',
			),
			array(
				'id'   => 'line-4',
				'type' => 'horizontal-line',
			),
			array(
				'id'      => 'footer-top-background-color',
				'label'   => esc_html__( 'Footer Background Color', 'power-business' ),
				'default' => '#28292a',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-copyright-background-color',
				'label'   => esc_html__( 'Footer Copyright Background Color', 'power-business' ),
				'default' => '#0c0808',
				'type'    => 'color-picker',
			),
			array(
				'id'      => 'footer-copyright-text-color',
				'label'   => esc_html__( 'Footer Copyright Text Color', 'power-business' ),
				'default' => '#ffffff',
				'type'    => 'color-picker',
			),
		);
	}
}