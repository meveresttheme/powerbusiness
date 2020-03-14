<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @since 1.0
 *
 * @package Power Business WordPress Theme
 */

get_header();
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main container">
		<div class="error-404 not-found">
			<h1><?php echo esc_html__( '404', 'power-business' ) ?></h1>
			<p><?php echo esc_html__( 'Sorry, we couldn\'t find the requested page.', 'power-business' ) ?></p>
			<div class="mt-4">				
				<a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="power-business-btn-primary">
					<span><?php echo esc_html__( 'Goto Homepage', 'power-business' ) ?>
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
				</a>
			</div>
		</div><!-- .error-404 -->
	</main><!-- #main -->
</section><!-- #primary -->
<?php
get_footer();