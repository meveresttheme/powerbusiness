<?php
/*
 Template Name: Power Business Team Archive
*/
 get_header();
 ?>
 <div id="content" class="container">
 	<div class="row">
 		<div id="primary" class="col-lg-12">
 			<main id="main" class="site-main">
 				<?php 
 					while ( have_posts() ) : 
 						the_post(); 
 				?>
 						<article <?php Power_Business_Helper::schema( 'article' ); ?> 
 							id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
 							<div class="entry-content">
 								<?php the_content(); ?>		
 							</div><!-- .entry-content -->
 							<?php Power_Business_Helper::post_content_navigation(); ?>
 						</article>
 				<?php endwhile; ?>
				<section class="power-business-team-section">
				<?php 
					$pages = power_business_get( 'team-pages' ); 
					if( $pages ){
						$args = apply_filters( 'power_business_team_archive_args', array(
							'post_type' => 'page',
							'limit'     => 5,
							'post__in'  => json_decode( $pages )
						));
						$query = new WP_Query( $args );
						if( $query->have_posts() ){
							echo '<div class="row">';
							while( $query->have_posts() ){
								$query->the_post();
								$heading = get_the_title();
								$heading = explode( '|', $heading );
								$title = $designation = '';
								if( isset( $heading[0] ) ){
									$title = $heading[0];
								}
								if( isset( $heading[1] ) ){
									$designation = $heading[1];
								}
						?>
								<div class="col-12 col-xs-6 col-md-3">
									<div class="power-business-team-box">
										<div class="power-business-team-image">
											<?php the_post_thumbnail(); ?>
											<div class="power-business-wave-buttom small-wave">
												<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none"><path class="power-business-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7  c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4  c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path></svg>
											</div>
										</div>
										<div class="power-business-team-description">
											<h3><?php echo esc_html( $title ); ?></h3>
											<h4><?php echo esc_html( $designation ); ?></h4>
										</div>
										<a href="<?php the_permalink(); ?>"></a>
									</div>
								</div>
				<?php
							}
							wp_reset_postdata();
							echo '</div>';
						}
					}
				?>
				</section>
 			</main><!-- #main -->
 		</div><!-- #primary -->
 	</div>
 </div>		
 <?php
 get_footer();