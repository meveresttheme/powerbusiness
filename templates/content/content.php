<?php
/**
 * Template part for displaying page content in index.php and archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 1.0
 * @package Power Business WordPress Theme
 */
?>
<article <?php echo Power_Business_Helper::schema( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( 'power-business-post' ); ?> >
	<div class="image-full post-image" style="background-image: url( '<?php the_post_thumbnail_url( array( 360, 252 ) );?>') , url('<?php echo esc_attr( Power_Business_Helper::get_theme_uri( 'assets/img/default-image.jpg' ) ); ?>' )">
		<?php Power_Business_Helper::post_format_icon() ?>
	</div>	
	
	<div class="post-content-wrap">		
		<?php 
			Power_Business_Helper::get_title();
			get_template_part( 'templates/meta', 'info' );
			the_excerpt();	
			Power_Business_Helper::get_comment_number();
		?>
	</div>
</article>