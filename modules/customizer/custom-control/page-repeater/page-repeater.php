<?php
/**
 * Customizer Control: icon.
 *
 * @since 1.0.0
 *
 * @package Power_Business WordPress theme
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class Power_Business_Page_Repeater extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 *
		 * @package Power_Business WordPress Theme
		 */
		public $type = 'page-repeater';

		public $limit = 1000;

		public $pro_link = '';

		public $pro_text = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package Power_Business WordPress Theme
		 */
		public function to_json() {

			parent::to_json();

			$this->json[ 'value' ] = ( '' == $this->value() ) ? json_encode( [ 0 ] ) : $this->value(); 

			$args = array( 'post_type' => 'page', 'posts_per_page' => -1 ); 
			$pages = get_posts( $args ); 
			$this->json[ 'pages' ] = array( 'Please Select a Page' ); 

			if( $pages && is_array( $pages ) ){
				foreach( $pages as $p ) { 
				   $this->json[ 'pages' ][ $p->ID ] = $p->post_title; 
				} 
			}

			$this->json[ 'link' ]  = $this->get_link();
			$this->json[ 'id' ]    = $this->id;
			$this->json[ 'limit' ] = $this->limit;		
			$this->json[ 'pro_link' ] = $this->pro_link;		
			$this->json[ 'pro_text' ] = $this->pro_text;		
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @access protected
		 * @since 1.0.0
		 *
		 * @package Power_Business WordPress Theme
		 */
		protected function content_template() {
			?>
			<div class="page-repeater-template hidden">
				<div>
					<select>
						<# _.each( data.pages, function( label, choice ) { #>
							<option value="{{ choice }}">{{ label }}</option>
						<# } ) #>
					</select>
					<button data-index="{#index}" data-limit="{{ data.limit }}" class="page-repeater-remove"> 
						<span class="dashicons dashicons-trash"></span> 
					</button>
				</div>
			</div>

			<label for="repeater_{{ data.id }}" class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>

			<div id="repeater_{{ data.id }}">
				<div class="page-repeater-selectors">
					<# var val = JSON.parse( data.value ); #>
					<#  _.each( val, function(l, c){ #>
						<div>
							<select>
								<# _.each( data.pages, function( label, choice ) { #>
									<option value="{{ choice }}" <# if ( l == choice ) { #> selected<# } #>> {{ label }}</option>
								<# }) #>
							</select>
							<button data-index="{{c}}" data-limit="{{ data.limit }}" class="page-repeater-remove">
								<span class="dashicons dashicons-trash"></span> 
							</button>
						</div>
					<# }) #>
				</div>

				<button data-pro-link="{{ data.pro_link }}" 
					data-pro-text="{{ data.pro_text }}" 
					data-limit="{{ data.limit }}" 
					class="page-repeater-add"
					style="display:<# if( val.length == data.limit ){ #>none<# }else{ #>block<# } #>;"
				>
					Add new
					<span class="dashicons dashicons-plus"></span> 
				</button>

				<input type="hidden" value="{{ data.value }}" {{{ data.link }}} />
			</div>
			<?php
		}

		public static function sanitize( $val ){

			if( json_decode($val) != null ){
				// is json
				return $val;
			}

			return '';
		}
	}
}

Power_Business_Customizer::add_custom_control( array(
    'type'     => 'page-repeater',
    'class'    => 'Power_Business_Page_Repeater',
    'sanitize' =>  array( 'Power_Business_Page_Repeater', 'sanitize' )
));

function power_business_page_repeater_control( $args, $section, $field ){

	if( isset( $field[ 'type' ] ) && 'page-repeater' == $field[ 'type' ] ){
		$args[ 'limit' ] = isset( $field[ 'limit' ] ) ? $field[ 'limit' ] : 1000;
	}

	return $args;
}
add_filter( 'power_business_customizer_get_control_arg', 'power_business_page_repeater_control', 10, 3 );

function power_business_page_repeater_get( $value, $id, $instance ){

	if( isset( $instance::$controls[ $id ] ) && 'page-repeater' == $instance::$controls[ $id ][ 'type' ] ){
		return json_decode( $value );
	}	

	return $value;
}
add_filter( 'power_business_customizer_get', 'power_business_page_repeater_get', 10, 3 );