<?php
/**
* ------------------------------------------------------
*  Template for about section
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
$page_id = power_business_get( 'about-page' );
if( $page_id ){
	$query = new WP_Query(array(
		'page_id' => $page_id
	));
	if( $query->have_posts() ){
		while( $query->have_posts() ){
			$query->the_post();
			$btn_txt = power_business_get( 'about-btn-text' );
			$thumbnail = get_the_post_thumbnail_url();
			$alt = power_business_get_the_post_thumbnail_text();
			?>
			<section class="power-business-about-section">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="power-business-about-text-wrapper">
								
								<h2 class="power-business-section-title section-title-black"><?php the_title();  ?></h2>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="power-business-btn-primary"> 
									<span><?php echo esc_html( $btn_txt ); ?> <i class="fa fa-long-arrow-right"></i> </span> 
								</a>
							</div>
						</div><!-- col-6 -->
						<div class="col-12 col-md-6">
							<div class="power-business-about-image">
								<div class="power-business-about-image-overlay"></div><!-- overlay for hover -->
								<?php if( $thumbnail ): ?>
									<img src="<?php echo esc_url( $thumbnail ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="about-image-with-shadow" />
								<?php endif; ?>
							</div>
						</div><!-- col-6-->
					</div><!-- row -->
				</div><!-- container -->
			</section>
			<?php
		}
		wp_reset_postdata();
	}
}