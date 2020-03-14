<?php
/**
 * Header hooks
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !class_exists( 'Power_Business_Header' ) ){
	class Power_Business_Header extends Power_Business_Helper{

		public function __construct(){
			# add open tag for header
			self::add_action( 'header', array( __CLASS__, 'before_header' ), 5 );

			self::add_action( 'header', array( __CLASS__, 'header' ) );
			# add closing tag for header
			# makek sure this function executes at last
			self::add_action( 'header', array( __CLASS__, 'after_header' ), 99 );

			# add preloader
			add_action( 'wp_body_open', array( __CLASS__, 'preloader' ) );
			# add skip to content markup for accessibility
			add_action( 'wp_body_open', array( __CLASS__, 'skip_content' ) );

			self::add_action( 'after_primary_menu', array( __CLASS__, 'add_search_icon' ) );
			self::add_action( 'after_primary_menu', array( __CLASS__, 'menu_toggler' ) );

			self::add_action( 'after_header', array( __CLASS__, 'banner' ) );
		}

		/**
		* Add a wrapper on inner banner and breadcrumb
		*
		* @static
		* @access public
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function banner(){
			# inner banner should not load in 404 page,
			if( 
				# don't load it in 404 page
				is_404() ||
				# don't load it if it is disabled
				( is_page() && self::get_meta( 'disable-inner-banner' ) ) || 
				# don't load it if static homepage is set
				( is_front_page() && !is_home() ) ||
				# don't load it if it is blog page and title is empty
				( is_home() && is_front_page() && !self::get_blog_title() )
			){ 
				return;
			}
			
			get_template_part( 'templates/content/content', 'banner' );
		}

		/**
		 * Adds Search icon inheader
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function add_search_icon(){ ?>	
			<div class="power-business-header-icons">
				<a href="#" class="power-business-search-icon power-business-toggle-search">
					<i class="fa fa-search"></i>
				</a>
			</div>
		<?php }

		/**
		 * Adds menu toggler for small devies
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function menu_toggler(){ ?>
			<button class="menu-toggler" id="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		<?php }

		/**
		 * print header
		 *
		 * @static
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function header(){
			get_template_part( 'templates/header/header', 'main' );
		}

		/**
		 * print open tag for header
		 *
		 * @since 1.0
		 * @return string
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function before_header(){
			?>
			<header id="masthead" <?php echo self::schema( 'header' ); ?> class="power-business-site-header" >
			<?php
		}

		/**
		 * print close tag for header
		 *
		 * @since 1.0
		 * @return string
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function after_header(){
			?>
			</header>
			<?php
		}

		/**
		 * print markup for skip to content
		 *
		 * @since 1.0
		 * @return string
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function skip_content(){
			?>
			<a class="skip-link screen-reader-text" href="#content">
				<?php esc_html_e( 'Skip to content', 'power-business' ); ?>
			</a>
			<?php
		}

		/**
		 * Adds the Preloader
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function preloader(){
		 	if( apply_filters( 'power_business_show_preloader', true ) ){ ?>
				<div id="loader-wrapper" class="power-business-loader-wrapper">
					<svg id="loaded" class="power-business-loader"><circle cx="70" cy="70" r="30" fill="#ddd" style=""></circle></svg>
				</div>
			<?php }
		}
	}

	new Power_Business_Header();
}