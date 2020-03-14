<?php 
/**
 * Common css for all devices
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_custom_width(){

	if( 'default' == power_business_get( 'container-width' ) ) :
		# container width
		$style = array(
			array(
				'selector' => '.container',
				'props' => array(
					'max-width' => 'container-custom-width',
				)
			)
		);

		Power_Business_Css::add_styles( $style, 'md' );
	endif;

}
add_action( 'init', 'power_business_custom_width' );
add_action( 'customize_preview_init', 'power_business_custom_width', 150 );

/**
 * Register dynamic css
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_all_device_css(){

	$style = array(
		array(
			'selector' => '%s-frontpage-shape path',
			'props' => array(
				'fill' => 'svg-bg-color'
			)
		),
		# Primary Color
		array(
			'selector' => '.pagination .nav-links > *.current, ::selection, %s-main-menu > ul > li > a:after, %s-btn-primary, #infinite-handle span,.power-business-btn-primary, .comment-respond .comment-form input[type="submit"], .no-results.not-found a,.power-business-news-section .power-business-news-box .power-business-news-img:after,.power-business-cta-section:after, .power-business-news-section .power-business-news-box .power-business-news-content .power-business-news-box-meta .post-categories a:hover',
			'props' => array(
				'background-color' => 'primary-color',
			)
		),
		array(
			'selector' => '#infinite-handle span',
			'props' => array(
				'color' => 'primary-color',
			)
		),	
		array(
			'selector' => '.power-business-arrow svg:hover',
			'props' => array(
				'fill' => 'primary-color',
			)
		),		
		array(
			'selector' => '.power-business-loader-wrapper .power-business-loader circle',
			'props' => array(
				'stroke' => 'primary-color',
			)
		),		
		array(
			'selector' => '.post-content-wrap .post-categories li a:hover, %s-post .entry-content-stat + a:hover, %s-post %s-comments a:hover, %s-bottom-header-wrapper %s-header-icons %s-search-icon, .pagination .nav-links > *, body .post-categories li a,.power-business-testimonials-section .power-business-testimonials-box h3,.power-business-team-section .power-business-team-box:hover h3,.power-business-news-section .power-business-news-box .power-business-news-date span.news-post-day,.power-business-news-section .power-business-news-box:hover h3 a',
			'props' => array(
				'color' => 'primary-color',
			)
		),
		array(
			'selector' => '.pagination .nav-links > *, %s-post.sticky, .power-business-news-section .power-business-news-box .power-business-news-content .power-business-news-box-meta .post-categories a',
			'props' => array(
				'border-color' => 'primary-color',
			)
		),

		# Typography
		array(
			'selector' => '.site-branding .site-title, .site-branding .site-description, .site-title a',
			'props'    => array(
				'font-family' => 'site-info-font'
			)
		),
		array(
			'selector' => 'body',
			'props'    => array(
				'font-family' => 'body-font'
			)
		),
		array(
			'selector'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
			'props'	=> array(
				'font-family' => 'heading-font',
			),
		),
		# Color Options
		array(
			'selector'  => 'body, body p, body div, .woocommerce-Tabs-panel, div#tab-description, .woocommerce-tabs.wc-tabs-wrapper',
			'props'		=> array(
				'color' => 'body-paragraph-color',
			),
		),
		array(
			'selector'  => '%s-main-menu > ul > li > a',
			'props'		=> array(
				'color' => 'primary-menu-item-color',
			),
		),
		array(
			'selector'  => 'body a, body a:visited',
			'props'		=> array(
				'color' => 'link-color',
			),
		),
		array(
			'selector'  => 'body a:hover',
			'props'		=> array(
				'color' => 'link-hover-color',
			),
		),
		array(
			'selector'  => '#secondary .widget-title',
			'props'		=> array(
				'color' => 'sb-widget-title-color',
			),
		),		
		array(
			'selector'  => '#secondary .widget, #secondary .widget a, #secondary .widget ul li a',
			'props'		=> array(
				'color' => 'sb-widget-content-color',
			),
		),
		array(
			'selector'  => '.footer-widget .widget-title',
			'props'		=> array(
				'color' => 'footer-title-color',
			),
		),
		array(
			'selector'  => '%s-main-footer-section',
			'props'		=> array(
				'background-color' => 'footer-top-background-color',
			),
		),		
		array(
			'selector'  => '%s-lower-footer-section',
			'props'		=> array(
				'background-color' => 'footer-copyright-background-color',
			),
		),		
		array(
			'selector'  => '.footer-widget, .footer-widget p, .footer-widget span, .footer-widget ul li a,  #calendar_wrap #wp-calendar th, #calendar_wrap td, #calendar_wrap caption, #calendar_wrap td a,  .footer-widget ul li',
			'props'		=> array(
				'color' => 'footer-content-color',
			),
		),
		array(
			'selector'  => '#power-business-copyright, .author-link, .author-link a',
			'props'		=> array(
				'color' => 'footer-copyright-text-color',
			),
		),		
		# inner banner
		array(
			'selector' => '%s-inner-banner-wrapper:after',
			'props'    => array(
				'background-color' => 'ib-background-color'
			)
		),
		array(
			'selector' => '%s-inner-banner-wrapper %s-inner-banner .entry-title',
			'props'    => array(
				'color' => 'ib-title-color'
			)
		),
		# Breadcrumb
		array(
			'selector'  => '.wrap-breadcrumb ul.trail-items li a:after',
			'props'		=> array(
				'content' => 'bc-separator',
			),
		),
		array(
			'selector'  => '.wrap-breadcrumb ul li a, .wrap-breadcrumb ul li span, .taxonomy-description p',
			'props'		=> array(
				'color' => 'ib-title-color'
			),
		),

		# Scroll to top
		array(
			'selector' => '%s-stt',
			'props'    => array(
				'background-color' => 'scroll-to-top-bg-color'
			)
		)
	);

	Power_Business_Css::add_styles( $style, 'md' );
}
add_action( 'init', 'power_business_all_device_css' );
