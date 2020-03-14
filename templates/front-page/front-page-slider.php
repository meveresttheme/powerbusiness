<?php
/**
* ------------------------------------------------------
*  Template for slider section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
$pages = power_business_get( 'slider-pages' );
if( $pages ){
	$args = apply_filters( 'power_business_slider_args', array(
		'post_type' => 'page',
		'limit'     => 3,
		'post__in'  => json_decode( $pages )
	));
	$query = new WP_Query( $args );
	$settings = apply_filters( 'power_business_slick_slider_args', array(
		"slidesToShow"   => 1,
		"slidesToScroll" => 1,
		"autoplay"       => power_business_get( 'slider-autoplay' ),
		"infinite"       => power_business_get( 'slider-infinite' ),
		"dots"           => power_business_get( 'slider-dots' ) 
	));
	?>
	<section class="power-business-feature-slider">
		<div class="power-business-feature-slider-init" data-slick='<?php echo esc_attr( json_encode( $settings ) ); ?>'>
			<?php if( $query->have_posts() ){
				while( $query->have_posts() ){
					$query->the_post();
					$thumb = get_the_post_thumbnail_url();
					?>
					<div class="power-business-feature-slider-inner" style="background: url(<?php echo esc_url( $thumb ); ?>)">
						<div class="power-business-feature-slider-inner-content">
							<h2>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a>
							</h2>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
			} ?>
		</div> <!-- slider init -->
		<?php if( power_business_get( 'slider-curve' ) ): ?>
			<div class="power-business-wave-buttom">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="power-business-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path></svg>
			</div>
		<?php endif; ?>
	</section> <!-- section -->
<?php }
?>