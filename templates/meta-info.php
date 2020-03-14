<?php
/**
 * Displays the meta information
 *
 * @since 1.0
 *
 * @package Power Business WordPress Theme
 */?>

<?php if ( 'post' === get_post_type() ) : ?>
	<?php 
		$category = power_business_get( 'post-category' );
		$author   = power_business_get( 'post-author' );
		$date     = power_business_get( 'post-date' );
	if( $category || $author || $date ) : ?>
		<div class="entry-meta 
			<?php 
				if( is_single() ){
					echo esc_attr( 'single' );
				} 
			?>"
		>
			<?php Power_Business_Helper::get_author_image(); ?>
			<?php if( $author || $date ) : ?>
				<div class="author-info">
					<?php
						Power_Business_Helper::the_date();			
						Power_Business_Helper::posted_by();
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php Power_Business_Helper::the_category(); ?>	
	<?php endif; ?>
<?php endif; ?>