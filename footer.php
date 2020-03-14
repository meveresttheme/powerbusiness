<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since 1.0
 * @package Power Business WordPress theme
 */
?>
	<section class="site-footer footer-area">

		<?php do_action( 'power_business_footer' ); ?>

	    <div class="footer-divider w-100"></div>
	    <footer <?php Power_Business_Helper::schema( 'footer' ); ?> class="power-business-lower-footer-section">
	        <div class="container-fluid">
	             <div class="row justify-content-between">
	             	<?php do_action( 'power_business_copyright' ); ?>
	            </div>
	        </div>
	    </footer>
	</section>
	<?php 
		do_action( 'power_business_after_footer' );  
		wp_footer(); 
	?>
 </body>
 </html>