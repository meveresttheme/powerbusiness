<?php
/**
 * Template part for displaying inner banner in pages
 *
 * @since 1.0
 * 
 * @package Power Business WordPress Theme
 */
$cls = 'power-business-inner-banner-wrapper';
$cls .= ' ' .  power_business_get( 'ib-text-align' );
if( has_header_image() ){
	$cls .= ' ' . power_business_get( 'ib-image-attachment' );
}

if( !is_attachment() && ( is_single() || is_page() ) && has_post_thumbnail() ){
	$src = get_the_post_thumbnail_url( get_the_ID(), 'full' );
}elseif( has_header_image() ){
	$src = get_header_image();
}

if( ( is_single() || is_page() ) && Power_Business_Helper::get_meta( 'use-customizer-image-for-banner' ) ){
	$src = get_header_image();
}

if( isset( $src ) ){
	$src = 'background-image: url( '. esc_url( $src ) .' )';
}
			
?>
<div class="<?php echo esc_attr( $cls ); ?>" style="<?php echo esc_attr( $src ); ?>"> 
	<div class="container">
		<div class="power-business-inner-banner">
			<header class="entry-header">
				<?php 
					if( is_page() || is_singular() ){
						the_title( '<h1 class="entry-title">', '</h1>' );
					}elseif(  is_archive() ){
						the_archive_title( '<h2 class="entry-title">', '</h2>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					}elseif( is_home() ){
						# when home page is latest posts the custom title.
						$blog_title = apply_filters( 'power_business_blog_title', true );
						?>
						<h2 class="entry-title"><?php echo esc_html( $blog_title ) ?></h2>
						<?php
					}elseif(  is_search() ){
						get_search_form();
						/* translators: %s: search page result */ 
						?>
						<h2 class="entry-title">
							<?php 
								printf( 
									esc_html__( 'Search Results for: %s', 'power-business' ), 
									'<span>' . get_search_query() . '</span>' 
								);
							?>
						</h2>
						<?php
					}
				?>
			</header><!-- .entry-header -->
		</div>

		<?php if( apply_filters( 'power_business_show_breadcrumb', true ) ):?>
		    <div id="power-business-breadcrumb" class="wrapper wrap-breadcrumb">
		    	<?php 
		    		$breadcrumb_args = array(
		    		    'container'   => 'div',
		    		    'show_browse' => false,
		    		);
		    		power_business_breadcrumb_trail( $breadcrumb_args ); 
		    	?>
			</div>
		<?php endif; ?>
	</div>
</div>
