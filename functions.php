<?php
/**
 * Power Business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Power Business WordPress Theme
 */

define( 'POWER_BUSINESS_PREFIX', 'power-business' );
define( 'POWER_BUSINESS_VERSION', '1.0' );

require_once get_parent_theme_file_path( 'modules/modules-loader.php' );

/**
 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * ------------------------------------------------------
 * Add scripts and styles
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_scripts(){

	$theme_version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'power-business-style', get_stylesheet_uri(), array(), $theme_version );
	wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/vendor/bootstrap/bootstrap.css' ), array(), '4.3.1' );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/assets/css/vendor/font-awesome/css/font-awesome.css' ), array(), '4.7.0' );
	wp_enqueue_style( 'power-business-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array(), $theme_version );
	wp_enqueue_style( 'power-business-main-style', get_theme_file_uri( '/assets/css/main.css' ), array(), $theme_version );
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/vendor/slick/slick.css' ) );

	wp_enqueue_script( 'power-business-main-script', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), $theme_version );
	wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/js/vendor/slick/slick.js' ), array( 'jquery' ) );

	$fonts = Power_Business_Helper::get_google_font();
	wp_enqueue_style( 'power-business-google-font', esc_url( $fonts ) );

	# enqueue comment-reply.js in single page only
	if( ( is_single() || is_page() ) && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}

	# load rtl.css if site is RTL
	if( is_rtl() ){	
		wp_enqueue_style( 'power-business-rtl', get_theme_file_uri( '/rtl.css' ), array(), $theme_version );
	}
}
add_action( 'wp_enqueue_scripts', 'power_business_scripts' ); 

/**
 * ------------------------------------------------------
 * Add block assets
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_editor_assets(){
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'power-business-editor-style', get_template_directory_uri().'/assets/css/block-editor-styles.css', array(), $theme_version );
}
add_action( 'enqueue_block_editor_assets', 'power_business_editor_assets' );

/**
 * ------------------------------------------------------
 * Add css for backend
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_admin_scripts(){
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'power-business-admin-style', get_template_directory_uri().'/assets/css/admin.css', array(), $theme_version );
}
add_action( 'admin_enqueue_scripts', 'power_business_admin_scripts' );

/**
* ------------------------------------------------------
*  Theme supports
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_theme_support(){
	# Gutenberg wide images.
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	# Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	# Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	# Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	
	/*woocommerce support*/
	add_theme_support( 'woocommerce' );

	# Switch default core markup for search form, comment form, and comments.
	# to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
		)
	);

	# Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'power_business_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	)));

	# Post formats.
	add_theme_support(
		'post-formats',
		array(
			'gallery',
			'image',
			'link',
			'quote',
			'video',
			'audio',
			'status',
			'aside',
		)
	);

	# Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'       => 180,
			'height'      => 60,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'post-thumbnails' );

	/**
	 * This variable is intended to be overruled from themes.
	 * Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	 * phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	 */			
	$GLOBALS['content_width'] = apply_filters( 'power_business_content_width_setup', 640 );

	/**
	* Register Menu
	*/
	register_nav_menus(array(
		'primary' => esc_html__( 'Primary', 'power-business' ),
		'social-menu-footer' => esc_html__( 'Footer social menu', 'power-business' )
	));

	load_theme_textdomain( 'power-business', get_theme_file_path( 'languages' ) );

	# header options
	$args = array(
		'default-text-color' => '000000',
		'width'              => 1366,
		'height'             => 400,
		'flex-height'        => true,
		'wp-head-callback'   => 'power_business_header_style',
		'default-image'      => '',
	);
	add_theme_support( 'custom-header', apply_filters( 'power_business_custom_header_args' , $args ));
}
add_action( 'after_setup_theme', 'power_business_theme_support' );

/**
 * ------------------------------------------------------
 * Prints header styles
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if(! function_exists( 'power_business_header_style') ){
	function power_business_header_style(){
				
		$header_text_color = get_header_textcolor();
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
		$style = array();

		if ( ! display_header_text() ){
			$style[] = array(
				'selector' => '.site-title, .site-description',
				'props' => array(
					'position' => array(
						'value' => 'absolute',
						'unit'  => ''
					),
					'clip' => array(
						'value' => 'rect(1px, 1px, 1px, 1px)',
						'unit'  => ''
					)
				)
			);
		}else{
			
			$style[] = array(
				'selector' => '.site-branding .site-title a, .site-branding .site-description',
				'props' => array(
					'color' => array(
						'value' => '#' . esc_attr( $header_text_color ),
						'unit'  => ''
					),
				)
			);
		}

		Power_Business_Css::add_styles( $style );
	}
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Power Business 1.0
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function power_business_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'power_business_front_page_template' );

/**
 * ------------------------------------------------------
 * Returns alternative text for thumbnail
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if(! function_exists( 'power_business_get_the_post_thumbnail_text' ) ){
	function power_business_get_the_post_thumbnail_text(){
		$thumb_id = get_post_thumbnail_id( get_the_ID() );
		return get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
	}
}
/**
 * ------------------------------------------------------
 * Returns alternative text for thumbnail
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if(! function_exists( 'power_business_frontpage_title' ) ){
	function power_business_frontpage_title( $setting ){
		$page_id = power_business_get( "{$setting}-page" );
		if( $page_id ){
			$query = new WP_Query(array(
				'page_id' => $page_id
			));
			if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();
					?>
					<div class="power-business-content-center">
						<h2 class="power-business-section-title section-title-black">
							<?php the_title(); ?>
						</h2>
						<?php the_content(); ?>
					</div>
			<?php 
				}
				wp_reset_postdata();
			}
		}
	}
}

/**
 * ------------------------------------------------------
 * Returns permalink of blog page
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( ! function_exists( 'power_business_get_blog_page_url' ) ){
	function power_business_get_blog_page_url() {
		// If front page is set to display a static page, get the URL of the posts page.
		if ( 'page' === get_option( 'show_on_front' ) ) {
			return get_permalink( get_option( 'page_for_posts' ) );
		}
		// The front page IS the posts page. Get its URL.
		return get_home_url();
	}
}

/**
 * Register sidebar
 *
 * @return object
 * @since 1.0
 * @package Power Business WordPress Theme
 */
function power_business_sidebars(){
	# sidebar in post and pages
	register_sidebar( array(
        'name' 			=> esc_html__( 'Sidebar', 'power-business' ),
        'id' 			=> 'power_business_sidebar',
        'description' 	=> esc_html__( 'Widgets in this area will be shown on side of the page.', 'power-business' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
	));
	$description = esc_html__( 'Widgets in this area will be displayed in the {position} column in the footer. If empty then column will not be displayed.', 'power-business' );
	$layout = power_business_get( 'layout-footer' ) ? power_business_get( 'layout-footer' ) : 4;
	for( $i = 1; $i <= $layout; $i++ ){
		switch ($i){
			case '1':
				$position = esc_html__( 'first', 'power-business' );
			break;
			case '2':
				$position = esc_html__( 'second', 'power-business' );
			break;
			case '3':
				$position = esc_html__( 'third', 'power-business' );
			break;
			case '4':
				$position = esc_html__( 'fourth', 'power-business' );
			break;
			default:
				$position = esc_html__( 'first', 'power-business' );

		}
		$msg = str_replace( '{position}', $position , $description );
		register_sidebar( array(
			/* translators: %d: number of unexpected outputed characters */
	        'name' 			=> sprintf( esc_html__( 'Footer Widget Area %d ', 'power-business' ), $i ),
	        'id' 			=> 'power_business_footer_sidebar_' . $i,
	        'description' 	=> $msg,
	        'before_widget' => '<section id="%1$s" class="widget %2$s">',
	        'after_widget'  => '</section>',
	        'before_title'  => '<h2 class="widget-title">',
	        'after_title'   => '</h2>',
		));
	}
}
add_action( 'widgets_init', 'power_business_sidebars' );

/**
 * Add class to display blog ( list or grid ).
 *
 * @return array
 * @since 1.0
 * @package Power Business WordPress Theme
 */		
function power_business_get_body_classes ( $classes ){

	$classes = Power_Business_Helper::get_sidebar_class( $classes );
	# Container class
	if( 'box' == power_business_get( 'container-width' ) ){
		$classes[] = 'power-business-container-box';
	}
			
	return $classes;
}
add_filter( 'body_class' , 'power_business_get_body_classes' );

/**
 * Order for frontpage content
 *
 * @return array
 * @since 1.0
 * @package Power Business WordPress Theme
 */	
if( !function_exists( 'power_business_get_content_order' ) ){
	
	function power_business_get_content_order(){
		$order = array( 'slider', 'about', 'service', 'team', 'cta', 'blog', 'testimonial' );
		return apply_filters( 'power_business_content_order', $order );
	}
}

/**
* Separate pipe from title
*
* @return array
* @since Power Business 1.0
*/
if( !function_exists( 'power_business_get_piped_title' ) ){

	function power_business_get_piped_title(){
		$heading = get_the_title();
		$heading = explode( '|', $heading );
		$data = array( '', '' );
		if( isset( $heading[0] ) ){
			$data[0] = $heading[0];
		}
		if( isset( $heading[1] ) ){
			$data[1] = $heading[1];
		}

		return $data;
	}
}

/**
* Removes Pipes from the title
*
* @return string
* @since Power Business 1.0
*/
if( !function_exists( 'power_business_remove_pipe' ) ){
	function power_business_remove_pipe( $title, $force = false ){
		if( $force || ( is_page() && !is_front_page() && !is_page_template( 'page-templates/team-archive.php' ) ) ){

			$title = str_replace( "\|", "&exception", $title );
			$arr = explode( '|', $title );

			$title = str_replace( '&exception', '|', $arr[ 0 ] );
		}

		return $title;
	}
}
add_filter( 'the_title', 'power_business_remove_pipe', 9999 );
add_filter( 'single_post_title', 'power_business_remove_pipe', 9999 );

function power_business_remove_title_pipe( $title ){
	$title[ 'title' ] = power_business_remove_pipe( $title[ 'title' ], true );
	return $title;
}
add_filter( 'document_title_parts', 'power_business_remove_title_pipe', 9999 );