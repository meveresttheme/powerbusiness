<?php
/**
 * Content for header
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */ 
?>
<div class="power-business-main-header-wrapper">
	<div class="container">
		<section class="power-business-main-header">

			<div class="power-business-header-search">
				<?php get_search_form(); ?>
				<button type="button" class="close power-business-toggle-search">
					<i class="fa fa-times" aria-hidden="true"></i>
				</button>
			</div>
			
			<div class="site-branding">
				<div>
					<?php the_custom_logo(); ?>
					<div>
						<?php if ( is_front_page() ) :
							?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<?php
						else :
							?>
							<p class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php bloginfo( 'name' ); ?>
								</a>
							</p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="power-business-navigation-n-options">
				<nav class="power-business-main-menu" id="site-navigation">
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'fallback_cb'    => array( 'Power_Business_Helper', 'primary_menu_fb' ),
							'echo'           => true,
							'container'      => false,
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'navigation clearfix'
						)); 
					?>
				</nav> 
				<?php do_action( 'power_business_after_primary_menu' ); ?>
			</div>				
		</section>

	</div>
</div>