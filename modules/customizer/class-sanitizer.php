<?php
/**
 * Customizer Sanitization
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if(! class_exists( 'Power_Business_Customizer_Sanitizer' ) ){
	class Power_Business_Customizer_Sanitizer{

		/**
		* Sanitization function for numbers.
		*
		* @access public
		* @since 1.0
		* @return number
		*
		* @package Power Business WordPress Theme
		*/
	    public static function sanitize_number( $input, $setting ){
	    	$sanitized_text = sanitize_text_field( $input );
	    	# If the input is an number, return it; otherwise, return the default
	    	return ( is_numeric( $sanitized_text ) ? $sanitized_text : $setting->default );
	    }

	    /**
	    * Sanitization function for blank.
	    *
	    * @access public
	    * @since 1.0
	    * @return number
	    *
	    * @package Power Business WordPress Theme
	    */
	    public static function sanitize_number_blank( $val ){
	    	return is_numeric( $val ) ? $val : '';
	    }

		/**
		* Sanitization function for checkbox.
		*
		* @access public
		* @since 1.0
		* @return boolean
		*
		* @package Power Business WordPress Theme
		*/
	    public static function sanitize_checkbox( $checked ) {
	    	return ( ( isset( $checked ) && true === $checked ) ? true : false );
	    }

	    /**
	    * Sanitization function for select.
	    *
	    * @access public
	    * @since 1.0
	    * @return string
	    *
	    * @package Power Business WordPress Theme
	    */
	    public static function sanitize_choice( $input, $setting ){
	    	# Ensure input is a slug.
	    	$input = sanitize_key( $input );
	    	# Get list of choices from the control associated with the setting.
	    	$choices = $setting->manager->get_control( $setting->id )->choices;

	    	# If the input is a valid key, return it; otherwise, return the default.
	    	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }    

	    /**
	    * Sanitization function for hex color.
	    *
	    * @access public
	    * @since 1.0
	    * @return string
	    *
	    * @package Power Business WordPress Theme
	    */
	    public static function sanitize_hex_color( $input, $setting ){    	# Ensure input is a slug.
	    	$input = sanitize_hex_color( $input );
	    	
	    	# If $input is a valid hex value, return it; otherwise, return the default.
	    	$return = !is_null( $input ) ? $input : $setting->default;
	    	
	    	return $return;
	    }

	    /**
	    * Sanitization function for rgba.
	    *
	    * @access public
	    * @param  string $color
	    * @since 1.0
	    * @return string
	    *
	    * @package Power Business WordPress Theme
	    */
	    public static function sanitize_rgba( $color ) {
	        if ( '' === $color ){
	        	return '';
	        }

	        # If string does not start with 'rgba', then treat as hex
	        # sanitize the hex color and finally convert hex to rgba
	        if ( false === strpos( $color, 'rgba' ) ) {
	            return sanitize_hex_color( $color );
	        }

	        # By now we know the string is formatted as an rgba color so we need to further sanitize it.
	        $color = str_replace( ' ', '', $color );
	        sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
	        return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
	    }

        /**
    	* Returns Sanitization function
    	* 
    	* @since 1.0
    	* @access public
    	* @param  string $type
    	* @return string
    	*
    	* @package Power Business WordPress Theme
    	*/
    	public static function get_sanitize_callback( $type, $instance ){

    		$fn = '';
    		switch ( $type ) {
    			case 'text':
    				$fn = 'sanitize_text_field';
    			break;

    			case 'url':
    				$fn = 'esc_url_raw';
    			break;

    			case 'email':
    				$fn = 'sanitize_email';
    			break;

    			case 'number':
    				$fn = array( __CLASS__ , 'sanitize_number' );
    			break;

    			case 'checkbox':
    				$fn = array( __CLASS__ , 'sanitize_checkbox' );
    			break;

    			case 'select':
    			case 'radio':
    				$fn = array( __CLASS__ , 'sanitize_choice' );
    			break;

    			case 'textarea':
    				$fn = 'esc_textarea';
    			break;

    			case 'color':
    				$fn = array( __CLASS__ , 'sanitize_hex_color' );
    			break;

    			case 'dropdown-pages':
    				$fn = 'absint';
    			break;

    			default:
    				if( array_key_exists( $type, $instance::$custom_controls ) ){
    					$sanitize_callback = $instance::$custom_controls[ $type ][ 'sanitize' ];
    					if( $sanitize_callback ){
    						$fn = $sanitize_callback;
    					}
    				}
    			break;
    		}

    		return apply_filters( 'power_business_customizer_sanitizer', $fn, $type );
    	}
	}
}