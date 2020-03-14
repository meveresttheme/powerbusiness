<?php
/**
 * Bind UI with settings
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !class_exists( 'Power_Business_Options' ) ){
	class Power_Business_Options extends Power_Business_Helper{

		/**
		 * constructor
		 *
		 * @since 1.0
		 * @package Power Business WordPress Theme
		 */
		public function __construct(){
			# show or hide category
			self::add_filter( 'show_post_category', array( __CLASS__ , 'show_post_category' ) );
			# show or hide date
			self::add_filter( 'show_post_date', array( __CLASS__ , 'show_post_date' ) );
			# show or hide author
			self::add_filter( 'show_post_author', array( __CLASS__ , 'show_post_author' ) );
			# show or hide breadcrumb
			self::add_filter( 'show_breadcrumb', array( __CLASS__ , 'show_breadcrumb' ) );
			# show or hide breadcrumb
			self::add_filter( 'show_preloader', array( __CLASS__ , 'show_preloader' ) );
			# show or hide blog title
			self::add_filter( 'blog_title', array( __CLASS__ , 'get_blog_title' ) );
			# disable footer widget
			self::add_filter( 'disable_footer_widget', array( __CLASS__ , 'get_footer_widget' ) );
		}

		/**
		* Check footer widget status from page
		*
		* @static
		* @access public
		* @since 1.0
		* @return bool
		*
		* @package Power Business WordPress Theme
		*/
		public static function get_footer_widget(){
			$disable_footer = self::get_meta( 'disable-footer-widget' );
			return is_page() && $disable_footer;
		}

		/**
		 * Show or Hide Breadcrumb
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function show_breadcrumb(){
			if( is_front_page() || is_home() ) {
			    return false;
			}
			return power_business_get( 'show-breadcrumb' );
		}

		/**
		 * Show or Hide Preloader
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function show_preloader(){
			return power_business_get( 'pre-loader' );
		}

		/**
		 * Show or Hide post author in post and archive page
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function show_post_author(){
			return power_business_get( 'post-author' );
		}

		/**
		 * Show or Hide post date in post and archive page
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function show_post_date(){
			return power_business_get( 'post-date' );
		}

		/**
		 * Show or Hide post categories in post and archive page
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function show_post_category(){
			return power_business_get( 'post-category' );
		}
	}

	new Power_Business_Options();
}