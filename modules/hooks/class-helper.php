<?php
/**
 * A helper class for theme
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( !class_exists( 'Power_Business_Helper' ) ){
	class Power_Business_Helper{

		/**
		* know if the page is woocommerce category or not
		*
		* @static
		* @access public
		* @return bool
		* @since  1.0.5
		*
		* @package Gutenbiz WordPress Theme
		*/
		public static function is_woo_product_category(){
			if( self::is_active_plugin( 'woocommerce' ) && is_product_category() ){
				return true;
			}
		}

		/**
		* know if the page is woocommerce shop or not
		*
		* @static
		* @access public
		* @return bool
		* @since  1.0.5
		*
		* @package Gutenbiz WordPress Theme
		*/
		public static function is_woo_shop_page(){
			if( self::is_active_plugin( 'woocommerce' ) && is_shop() ){
				return true;
			}
		}

		/**
		* know if the page is woocommerce single or not
		*
		* @static
		* @access public
		* @return bool
		* @since  1.0.5
		*
		* @package Gutenbiz WordPress Theme
		*/
		public static function is_woo_single_page(){
			if( self::is_active_plugin( 'woocommerce' ) && is_product() ){
				return true;
			}
		}

		/**
		 * Get uri of given file
		 *
		 * @static
		 * @access public
		 * @return string
		 * @since  1.0.0
		 *
		 * @package Gutenbiz WordPress Theme
		 */
		public static function get_theme_uri( $file ){
			return get_theme_file_uri( $file );
		}

		/**
		 * when home page is latest posts this the custom title will be displayed.
		 *
		 * @static
		 * @access public
		 * @return string or false
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_blog_title(){
			$ib_blog_title = power_business_get( 'ib-blog-title' );
			if( empty( $ib_blog_title ) ) {
				return false;
			}else{
				return $ib_blog_title;
			}
		}

		/**
		 * Fallback for primary menu.
		 *
		 * @static
		 * @access public
		 * @return void
		 * @since  1.0.0
		 *
		 * @package Gutenbiz WordPress Theme
		 */
		public static function primary_menu_fb( $arg ) {
		    if( !$arg[ 'echo' ] ){
		        ob_start();
		    }
		    ?>
		    <ul>
		        <li>
		            <a href="<?php echo esc_url( home_url( '/' ) ) ?>"><?php esc_html_e( 'Home', 'power-business' ) ?></a>
		        </li>
		        <li><a href="#"><?php esc_html_e( 'About Us', 'power-business' ) ?></a></li>
		        <li><a href="#"><?php esc_html_e( 'Our Team', 'power-business' ) ?></a></li>
		        <li><a href="#"><?php esc_html_e( 'Quick Links', 'power-business' ) ?></a>
		        	<ul>
		        		<li><a href="#"><?php esc_html_e( 'Inner Engineering Programme', 'power-business' ) ?></a></li>
		        	</ul>
		        </li>
		        <li><a href="#"><?php esc_html_e( 'Contact Us', 'power-business' ) ?></a></li>
		    </ul>
		    <?php
		    if( !$arg[ 'echo' ] ){
		        $data = ob_get_contents();
		        ob_end_clean();
		        return $data;
		    }
		}

		/**
		 * Fallback for primary menu.
		 *
		 * @static
		 * @access public
		 * @return void
		 * @since  1.0.0
		 *
		 * @package Gutenbiz WordPress Theme
		 */
		public static function social_menu_fb( $arg ) {
		    if( !$arg[ 'echo' ] ){
		        ob_start();
		    }
		    ?>
		    <ul class="power-business-demo-social-menu">
		        <li><a href="#" target="_blank"></a></li>
		        <li><a href="#" target="_blank"></a></li>
		        <li><a href="#" target="_blank"></a></li>
		        <li><a href="#" target="_blank"></a></li>
		    </ul>
		    <?php
		    if( !$arg[ 'echo' ] ){
		        $data = ob_get_contents();
		        ob_end_clean();
		        return $data;
		    }
		}

		/**
		 * Get the comment number of post
		 *
		 * @since 1.0
		 * @return void
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_comment_number(){
			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
				echo '<span class="power-business-comments">';
				comments_popup_link(
					'<i class="fa fa-comment"></i> '.esc_html__( 'Leave a comment', 'power-business' ),		
					'<i class="fa fa-comment"></i> '.esc_html__( '1 response', 'power-business' ),
					'<i class="fa fa-comments"></i> % '. esc_html__( 'responses' , 'power-business' )
				);
				echo '</span>';
			}
		}		

		/**
		* Creats slug of the text 
		*
		* @static
		* @access public
		* @return string
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function uglify( $text, $condition = array() ){
			$defaults = array(
				'lowercase' => true,
				'separator' => '-',
			);
			# Parse incoming $args into an array and merge it with $defaults
			$args = wp_parse_args( $condition, $defaults );
			$text = str_replace ( ' ', $args[ 'separator' ] , $text );
			if( $args[ 'lowercase' ] ){
				$text = strtolower( $text );
			}			
			return $text;
		}

		/**
		* The post Navigation
		*
		* @static
		* @access public
		* @return object
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function posts_navigation( $echo = true ) {
			$infinity_module_active = false;
			if( get_option( 'jetpack_active_modules' ) ){
				if( in_array( 'infinite-scroll', get_option( 'jetpack_active_modules' ) ) ){
					$infinity_module_active = true;
				}
			}
			# Previous/next page navigation.
			if( !$infinity_module_active || !Power_Business_Helper::is_active_plugin( 'jetpack' ) ){				
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => esc_html__( 'Previous', 'power-business' ),
						'next_text' => esc_html__( 'Next', 'power-business' ),
					)
				);
			}
		}

		/**
		* Pagination for the content seperated by page break.
		*
		* @static
		* @access public
		* @return object
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function post_content_navigation(){
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'power-business' ),
                'after'       => '</div>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>'
			) );
		}

		/**
		* Pagination for single post in single page
		*
		* @static
		* @access public
		* @return object
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function single_post_navigation(){
			the_post_navigation( array(
				'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'power-business' ) . '</span><span class="nav-title">%title</span>',
				'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'power-business' ) . '</span><span class="nav-title">%title</span>',
			));
		}

		/**
		 * Displays an optional post thumbnail.
		 *
		 * Wraps the post thumbnail in an anchor element on index views, or a div
		 * element when on single views.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function post_thumbnail( $size = 'post-thumbnail' ) {
			if ( has_post_thumbnail() ) { ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail( $size ); ?>
				</figure>
			<?php }
		}

		/**
		* Returns the permalink of Post day
		*
		* @since 1.0
		* @return url
		*
		* Power Business WordPress Theme
		*/
		public static function get_day_link(){
			return get_day_link( get_the_time('Y'), get_the_time('m'), get_the_time('d') );
		}

		/**
		 * Author image
		 *
		 * @static
		 * @access public
		 * @return void
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_author_image(){
			if( apply_filters( 'power_business_show_post_author', true ) ){
				$author_id = get_the_author_meta( 'ID' );
				printf(
					'<div class="author-image">
						<a class="url fn n" href="%1$s">
								<img src="%2$s">
						</a>
					</div>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_attr( get_avatar_url( $author_id, array( 'size'=> 40 ) ) )
				);
			}
		}
		/**
		 * Prints HTML with meta information about theme author.
		 *
		 * @static
		 * @access public
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function posted_by(){
			if( apply_filters( 'power_business_show_post_author', true ) ):
				printf(
					/* translators:1-author link, 2-author image link, 
					 * 3- author text, 4- author name.
					 */
					'<span class="author-text">
						%2$s
					</span>
					<a class="url fn n" href="%1$s">
						<span class="author">
							%3$s
						</span>
					</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html__( 'By ', 'power-business' ),
					esc_html( get_the_author() )
				);
			endif;
		}

		/**
		 * Prints HTML with meta information for the current post-date/time.
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function the_date( $status = 'posted' ) {
			
			$show = apply_filters( 'power_business_show_post_date', true );

			if( $show ):
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

				if( $status == 'updated'){
					if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
						$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
					}				
				}

				$time_tag = sprintf(
					$time_string,
					esc_attr( get_the_date( DATE_W3C ) ),
					esc_html( get_the_date( get_option('date_format') ) ),
					esc_attr( get_the_modified_date( DATE_W3C ) ),
					esc_html( get_the_modified_date() )
				);

				printf(
					'<span class="posted-on">
						%2$s 
						<a href="%1$s" rel="bookmark">
							%3$s
						</a>
					</span>',
					esc_url( self::get_day_link() ),
					( 'posted' == $status ) ? esc_html__( 'On', 'power-business' ) : esc_html__( 'Updated on', 'power-business' ),
					$time_tag
				);
			endif;
		}

		/**
		 * Prints the category of the posts
		 *
		 * @static
		 * @access public
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function the_category(){
			$show = apply_filters( 'power_business_show_post_category', true );
			if( $show ){ 
				the_category(); 
			}
		}
		
		/**
		 * edit link on post if user is logged in
		 *
		 * @return void
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function edit_link(){
			edit_post_link(
				sprintf(
					'%1$s<span class="screen-reader-text">%2$s</span>',
					esc_html__( 'Edit', 'power-business' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}

		/**
		 * Displays the theme tags
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */		
		public static function display_tag_list(){
			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list ) {
				printf(
					/* translators: 1: posted in label, only visible to screen readers. 2: list of tags. */
					'<span class="tags-links"><span class="screen-reader-text">%2$s </span>%3$s</span>',
					esc_html__( 'Tags:', 'power-business' ),
					esc_html( $tags_list )
				); // WPCS: XSS OK.
			}
		}

		/**
		 * Replace dash by space
		 *
		 * @access public
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function beautify( $string ){
		    return ucwords( str_replace( '-', ' ', $string ) );
		}

		/**
		 * Check the plugin is active or not
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function is_active_plugin( $plugin_name ){
			switch( $plugin_name ){

				case 'woocommerce':
					return class_exists( 'WooCommerce' );
				break;

				case 'yoast':
					return class_exists( 'WPSEO_Primary_Term' );
				break;

				case 'jetpack':
					return class_exists( 'Jetpack' );
				break;
			}
			return false;
		}

		/**
		 * Get body font family.
		 *
		 * @static
		 * @access public
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_font( $value ){
			$fonts = self::get_font_family();
			return  $fonts[ $value ];
		}

		/**
		* Font family
		*
		* @static
		* @access public
		* @return object
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		*/
		public static function get_font_family( ){
			return apply_filters( 'power_business_standard_fonts_array', array(
				'font-1'  => esc_html__( 'Lato', 'power-business' ),
				'font-2'  => esc_html__( 'Oswald', 'power-business' ),
				'font-3'  => esc_html__( 'Montserrat', 'power-business' ),
				'font-4'  => esc_html__( 'Roboto', 'power-business' ),  
				'font-5'  => esc_html__( 'Raleway', 'power-business' ),  
				'font-6'  => esc_html__( 'Playfair Display', 'power-business' ),  
				'font-7'  => esc_html__( 'Fjalla One', 'power-business' ),  
				'font-8'  => esc_html__( 'Alegreya Sans', 'power-business' ),
				'font-9'  => esc_html__( 'PT Sans Narrow', 'power-business' ),
				'font-10' => esc_html__( 'Open Sans', 'power-business' ),
				'font-11' => esc_html__( 'Poppins', 'power-business' ),
				'font-12' => esc_html__( 'Hind', 'power-business' ),
				'font-13' => esc_html__( 'Quicksand', 'power-business' ),
			));
		}

		/**
		 * Google font url
		 *
		 * @static
		 * @access public
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */		
		public static function get_google_font(){
			$google_fonts = array();
			$condition = array(
				'lowercase' => false,
				'separator' => '+',
			);
			
			$google_fonts[] = self::uglify( self::get_font( power_business_get( 'body-font' ) ), $condition );
			$google_fonts[] = self::uglify( self::get_font( power_business_get( 'heading-font' ) ), $condition );
			$google_fonts[] = self::uglify( self::get_font( power_business_get( 'site-info-font' ) ), $condition );
			$fonts =  array_unique( $google_fonts );
			$fonts_weight = apply_filters( 'power_business_standard_fonts_weight', array(
				'Montserrat' => array( '100', '200', '300' ),
				'Lato' 		 => array( '100', '200', '300', '500' ),
				'Open+Sans'  => array( '100', '200', '300', '400' ),
				'Poppins' 	 => array( '400', '500', '600', '700', '800' ),
				'Hind' 	     => array( '400', '500', '600', '700', '800' ),
				'Quicksand'  => array( '400', '500', '600', '700', '800' )
			));
			foreach ( $fonts as $value ) {
				if( isset( $fonts_weight[ $value ] ) ){
					$font_wt[] = $value.':'.implode( ',', $fonts_weight[ $value ] );
				}else{
					$font_wt[] = $value;
				}
			}

			if( $font_wt ){
				$fonts_url = add_query_arg(
					array( 
						'family' => implode( '|', $font_wt ),
					), '//fonts.googleapis.com/css' 
				);
			}
			return $fonts_url;
		}

		/**
		 * Get the title
		 *
		 * @return string
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_title( $link = true ){ ?>
			<h2 class="post-title">
				<?php if( $link ) : ?>
					<a href="<?php the_permalink();?>">
						<?php the_title(); ?>
					</a>
				<?php else : ?>
					<?php the_title() ?>
				<?php endif; ?>
			</h2>
			<?php self::edit_link(); ?>
		<?php }

		/**
		 * Home page is latest post page
		 *
		 * @return string
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function is_latest_post_page(){
			return ( is_front_page() && is_home() );
		}

		/**
		 * Home page is static page
		 *
		 * @return string
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function is_static_front_page(){
			return ( is_front_page() && !is_home() );
		}

		/**
		 * display icons with respective post format
		 *
		 * @since 1.0
		 * @return void
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function post_format_icon(){
			switch ( get_post_format() ){

				case 'aside':
					$icon = 'fa fa-sitemap';
				break;

				case 'gallery':
					$icon = 'fa fa-file-image-o';
				break;

				case 'link':
					$icon = 'fa fa-link';
				break;

				case 'image':
					$icon = 'fa fa-picture-o';
				break;

				case 'quote':
					$icon = 'fa fa-quote-right';
				break;

				case 'status':
					$icon = 'fa fa-user';
				break;

				case 'video':
					$icon = 'fa fa-video-camera';
				break;

				case 'audio':
					$icon = 'fa fa-volume-up';
				break;

				default:
					$icon = false;
			}?>
			<?php if( $icon ): ?>
				<a class="power-business-post-type-icon" href="<?php the_permalink() ?>">
					<i class="<?php echo esc_attr( $icon ) ?>"></i>
				</a>
			<?php endif; ?>
		<?php }	
				
		/**
		 * wrapper for add action 
		 *
		 * @since 1.0
		 * @package Power Business WordPress Theme
		 */
		public static function add_action( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ){
			add_action( "power_business_{$tag}", $function_to_add, $priority, $accepted_args );
		}		

		/**
		 * wrapper for add filter
		 *
		 * @since 1.0
		 * @package Power Business WordPress Theme
		 */
		public static function add_filter( $tag, $function_to_add, $priority = 10, $accepted_args = 1 ){
			add_filter( "power_business_{$tag}", $function_to_add, $priority, $accepted_args );
		}

		/**
		 * Get class of sidebar to display in site
		 *
		 * @static
		 * @access public
		 * @return object
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_sidebar_class( $classes ){

			$page_template = is_page_template( 'page-templates/full-width.php' );

			if( $page_template || is_search() || self::is_woo_single_page() || self::is_woo_product_category() ){
				$classes[] = 'power-business-no-sidebar';
			}else{
				$customizer_position = power_business_get( 'sidebar-position' ); 

				$post_position       = self::get_meta( 'sidebar-position' );
				$post_position = $post_position == '' ? 'customizer' : $post_position;
				if( !self::is_woo_shop_page() && ( is_attachment() || is_archive() || self::is_latest_post_page() || 'customizer' == $post_position) ){ 
					$classes[] = "power-business-{$customizer_position}";
				}elseif( $post_position ){
					if( self::is_woo_shop_page() && 'customizer' == $post_position ) {
						$post_position = $customizer_position;
					} 
					$classes[] = "power-business-{$post_position}";
				}
			}

			return $classes;
		}

		/**
		 * Determines sidebar is active or not
		 *
		 * @static
		 * @access public
		 * @return boolean
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function is_sidebar_active(){
			$cls = self::get_sidebar_class( array() );
			return count( $cls ) > 0 && $cls[ 0 ] !== 'power-business-no-sidebar' ? true : false;
		}

		/**
		 * Adds sidebar in pages
		 *
		 * @static
		 * @access public
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function the_sidebar(){
			if( self::is_sidebar_active() ): ?>
				<div class="col-md-4 col-lg-4 sidebar-order">
					<?php get_sidebar(); ?>
				</div>
			<?php endif;
		}

		/**
		 * get post meta by Post ID
		 *
		 * @link https://developer.wordpress.org/reference/functions/get_post_meta/
		 * @return string || integer || array
		 * @since 1.0
		 *
		 * @package Power Business WordPress Theme
		 */
		public static function get_meta( $meta_key = false, $post_id = null,  $single = true  ){
			if( $meta_key ){
				$meta_key = "power-business-{$meta_key}";
				if( !is_front_page() && is_home() ){
					$post_id = get_option( 'page_for_posts' );
				}else{
					$post_id = $post_id ? $post_id : get_the_ID();
				}
				return get_post_meta( $post_id, $meta_key, $single );
			}
		}

		/**
		 * Adds schema tags to the body classes.
		 *
		* @static
		* @access public
		* @since 1.0
		*
		* @package Power Business WordPress Theme
		 */
		public static function schema( $type ) {
			$schema = '';
			switch ($type) {
				case 'body' :	
					# Check conditions.
					$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

					# Set up default itemtype.
					$itemtype = 'WebPage';

					# Get itemtype for the blog.
					$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

					# Get itemtype for search results.
					$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
					$schema = "itemtype='https://schema.org/{$itemtype}' itemscope='itemscope' ";
				break;
				case 'header' :
					$schema = "itemtype='https://schema.org/WPHeader' itemscope='itemscope' role='banner' ";
				break;

				case 'footer' :
					$schema = "itemtype='https://schema.org/WPFooter' itemscope='itemscope' role='contentinfo'";
				break;

				case 'article':
					$schema = "itemtype='https://schema.org/CreativeWork' itemscope='itemscope'";
				break;

				default :
				break;
			}

			return apply_filters( "power_business_schema_{$type}", $schema );
		}
	}
}