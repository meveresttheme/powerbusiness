<?php
/**
* ------------------------------------------------------
*  Template for about section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
?>
<section class="power-business-testimonials-section">
	<svg class="power-business-frontpage-shape"
	 xmlns="http://www.w3.org/2000/svg"
	 xmlns:xlink="http://www.w3.org/1999/xlink"
	 width="501px" height="501px">							
		<path fill-rule="evenodd"  fill="#bde4fb"
		 d="M427.562,427.686 L250.754,500.923 L73.945,427.686 L0.709,250.878 L73.945,74.069 L250.754,0.833 L427.562,74.069 L500.798,250.878 L427.562,427.686 Z"/>
	</svg>
	<div class="container">
		<?php power_business_frontpage_title( 'testimonial' ); ?>
		<?php
			$pages = power_business_get( 'testimonial-pages' );
			if( $pages ){
				$args = apply_filters( 'power_business_testimonial_args', array(
					'post_type' => 'page',
					'limit'     => 3,
					'post__in'  => json_decode( $pages )
				));
				$query = new WP_Query( $args );
				if( $query->have_posts() ){
					$settings = apply_filters( 'power_business_testimonial_slick_args', array(
						"centerMode" => true,
						"centerPadding" => '15px',
						"slidesToShow" => 3,
						"autoplay"  => false,
						"dots"   => false,
						"arrows" => false,
						"responsive" => array(
							array(
								"breakpoint" => 767,
								"settings"   => array(
									"slidesToShow" => 1,
									"slidesToScroll" => 1
								)
							),
							array(
								"breakpoint" => 992,
								"settings"   => array(
									"slidesToShow" => 2,
									"slidesToScroll" => 2
								)
							)
						)
					));
		?>
				<div class="power-business-testimonial" data-slick="<?php echo esc_attr( json_encode( $settings ) ); ?>">
					<?php 
						while( $query->have_posts() ){
							$query->the_post();
							$heading = power_business_get_piped_title();
					?>
							<div class="power-business-testimonials-box-wrapper">
								<div class="power-business-testimonials-box">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/quote.png" alt="quote" class="quote-img" />
									<?php the_content(); ?>
									<div class="power-business-testimonials-client-info">
										<div class="power-business-testimonials-image">
											<?php the_post_thumbnail(); ?>
										</div>
										<div class="power-business-testimonials-name">
											<h3><?php echo esc_html( $heading[0] ); ?></h3>
											<span><?php echo esc_html( $heading[1] ); ?></span>
										</div>
									</div>
								</div>
							</div>
					<?php  
						} 
						wp_reset_postdata(); 
					?>
				</div>
		<?php 
				} 
			}
		?>							
	</div><!-- container -->
</section><!-- section -->