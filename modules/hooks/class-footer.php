<?php
/**
 * Header hooks
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !class_exists( 'Power_Business_Footer' ) ){
	class Power_Business_Footer extends Power_Business_Helper{

		public function __construct(){
			self::add_action( 'footer', array( __CLASS__, 'footer_widget_content' ) );
			# hook to display copyright text
			self::add_action( 'copyright', array( __CLASS__, 'footer_copyright' ) );
			# hook to display social menu
			self::add_action( 'copyright', array( __CLASS__, 'footer_social_menu' ), 20 );
			# hook to display author name
			self::add_action( 'copyright', array( __CLASS__, 'footer_author' ), 30 );
			# hook to display scroll to top
			self::add_action( 'after_footer', array( __CLASS__, 'scroll_top' ) );
		}

		/**
		* Scroll Top 
		*
		* @static
		* @access public
		* @since  1.0
		* @package Power Business WordPress Theme
		*/
		public static function scroll_top(){
			if( power_business_get( 'enable-scroll-to-top' ) ): ?>
			 	<div class="power-business-stt scroll-to-top">
					<i class="fa fa-arrow-up"></i>
				</div>
			<?php endif;
		}

		/**
		* Get Footer widget content
		*
		* @static
		* @access public
		* @since  1.0
		* @package Power Business WordPress Theme
		*/
		public static function footer_widget_content(){
			get_template_part( 'templates/footer/footer', 'widget' );
		}

		/**
		* Get copyright text for footer
		*
		* @static
		* @access public
		* @since  1.0
		* @package Power Business WordPress Theme
		*/
		public static function footer_copyright(){
			get_template_part( 'templates/footer/footer', 'copyright' );
		}

		/**
		* Get social menu for footer
		*
		* @static
		* @access public
		* @since  1.0
		* @package Power Business WordPress Theme
		*/
		public static function footer_social_menu(){
			if( !power_business_get( 'footer-social-menu' ) ){
				return;
			}
			get_template_part( 'templates/footer/footer', 'social' );
		}

		/**
		* Get author section
		*
		* @static
		* @access public
		* @since  1.0
		* @package Power Business WordPress Theme
		*/
		public static function footer_author(){
			get_template_part( 'templates/footer/footer', 'author' );
		}
	}

	new Power_Business_Footer();
}