<section class="power-business-news-section">
	<svg class="power-business-frontpage-shape"
	 xmlns="http://www.w3.org/2000/svg"
	 xmlns:xlink="http://www.w3.org/1999/xlink"
	 width="743px" height="744px">							
	<path fill-rule="evenodd"  fill="#bde4fb"
	 d="M615.219,653.320 L344.787,743.081 L90.091,615.327 L0.329,344.894 L128.083,90.198 L398.516,0.437 L653.212,128.191 L742.973,398.624 L615.219,653.320 Z"/>
	</svg>
	<div class="container">
		<?php power_business_frontpage_title( 'blog' ); ?>
			<?php
				$query = new WP_Query(array(
					'posts_per_page' => power_business_get( 'blog-posts-per-page' ),
					'ignore_sticky_post' => true
				));
				if( $query->have_posts() ){
					$cls = "power-business-blog-col-" . power_business_get( 'blog-col' );
					?>
					<div class="row <?php echo esc_attr( $cls ); ?>">
					<?php
						while( $query->have_posts() ){
							$query->the_post();
							?>
							<div class="power-business-blog-col-inner ">
								<div class="power-business-news-box">
									<a href="<?php the_permalink(); ?>" class="power-business-news-img">
										<?php the_post_thumbnail(); ?>
										<div class="power-business-wave-buttom small-wave">
											<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="power-business-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path></svg>
										</div>
									</a>
									<div class="power-business-news-content">
										<h3> 
											<a href="<?php the_permalink(); ?>"> 
												<?php the_title(); ?> 
											</a> 
										</h3>
										<?php the_excerpt(); ?>

										<div class="power-business-news-box-meta">
											<h4><?php esc_html_e( 'Categories', 'power-business' ); ?></h4>
											<?php the_category(); ?>
										</div>
									</div>
									<div class="power-business-news-date">
										<?php 
											$date = get_the_date( 'M j Y' ); 
											$date = explode( ' ', $date );
										?>
										<a href="<?php echo esc_url( Power_Business_Helper::get_day_link() ); ?>">
											<span class="news-post-day"><?php echo esc_html( $date[0] ); ?></span>
											<span class="news-post-month"><?php echo esc_html( $date[1] ); ?></span>
											<span class="news-post-year"><?php echo esc_html( $date[2] ); ?></span>
										</a>
									</div>

								</div>
							</div>
							<?php
						}
					?>
					</div>
					<?php
				}
			?>

		<div class="power-business-news-more-btn">
			<a href="<?php echo esc_url( power_business_get_blog_page_url() ); ?>" class="power-business-btn-primary"> 
				<span> <?php esc_html_e( 'View All News', 'power-business' ); ?> <i class="fa fa-long-arrow-right"></i> </span> 
			</a>	
		</div>

	</div><!-- container -->

</section> <!-- news section -->