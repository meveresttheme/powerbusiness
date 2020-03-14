<?php
/**
 * Theme copyright template
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */ ?>
 <div class="col-xs-12 col-sm-4">
  	<span id="power-business-copyright">
     	<?php
     		$footer_text = power_business_get( 'footer-copyright-text' );
     		echo esc_html( $footer_text );
     	?>
  	</span>	                 	
 </div>