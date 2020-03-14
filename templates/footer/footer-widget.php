<?php
/**
 * Content for footer widget
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
 if( !apply_filters( 'power_business_disable_footer_widget', false ) ): ?>
    <footer <?php Power_Business_Helper::schema( 'footer' ); ?> class="power-business-main-footer-section">
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                 	<?php
                 		$num_footer = power_business_get( 'layout-footer' );
                 		for( $i = 1; $i <= $num_footer ; $i++ ){ ?>
                 			<?php if ( is_active_sidebar( "power_business_footer_sidebar_{$i}" ) ) : ?>
		                 		<aside class="col footer-widget-wrapper py-5">
		                 	    	<?php dynamic_sidebar( "power_business_footer_sidebar_{$i}" ); ?>
		                 		</aside>
	                 		<?php endif; ?>
                 	<?php } ?>
                </div>
            </div>
        </div>
    </footer>
<?php endif;
