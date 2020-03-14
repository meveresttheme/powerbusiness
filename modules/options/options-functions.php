<?php
/**
* ------------------------------------------------------
*  Lists of files to be loaded for theme options module
* ------------------------------------------------------
*
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_theme_options_files( $files ){

    $new_files = array(
        'typography.php',
        'color.php',
        'breadcrumb.php',
        'advanced-options.php',
        'sidebar.php',
        'footer.php',
        'blog.php',
        'header.php',

        'front-page/slider.php',
        'front-page/about.php',
        'front-page/service.php',
        'front-page/team.php',
        'front-page/call-to-action.php',
        'front-page/blog.php',
        'front-page/testimonial.php'
    );

    return array_merge( $files, $new_files );
}
add_filter( 'power_business_modules_options', 'power_business_theme_options_files' );

/**
 * ------------------------------------------------------
 *  Active callback for frontpage content
 * ------------------------------------------------------
 *
 * @since 1.0
 * @package Power Business WordPress Theme
 */
if( ! function_exists( 'power_business_show_frontpage_content_above' ) ){
    function power_business_show_frontpage_content_above(){
        return power_business_get( 'show-content' );
    }
}
/**
* Register typography Options
*
* @return void
* @since 1.0
* @package Power Business WordPress Theme
*/
function power_business_theme_options(){ 
   
    Power_Business_Customizer::set(array(
        'panel' => array(
            'id' => 'panel',
            'title'    => esc_html__( 'Theme Options', 'power-business' ),
            'priority' => 10,
            'sections' => array(
                array(
                    'id'     => 'typography',
                    'title'  => esc_html__( 'Typography','power-business' ),
                    'fields' => power_business_get_typography_options()
                ),
                array(
                    'id'     => 'color-section',
                    'title'  => esc_html__( 'Color' ,'power-business' ),
                    'fields' => power_business_get_color_options()
                ),
                array(
                    'id'     => 'breadcrumb-section',
                    'title'  => esc_html__( 'Breadcrumb' ,'power-business' ),
                    'fields' => power_business_get_breadcrumb_options()
                ),
                array(
                    'id'     => 'sidebar-section',
                    'title'  => esc_html__( 'Sidebar', 'power-business' ),
                    'fields' => power_business_get_sidebar_options()
                ),            
                array(
                    'id'     => 'post-section',
                    'title'  => esc_html__( 'Blog', 'power-business' ),
                    'fields' => power_business_get_post_options()
                ),                
                array(
                    'id'       => 'header_image',
                    'priority' => 27,
                    'prefix'   => false,
                    'fields' => power_business_get_header_options()
                ),   
                array(
                    'id'     => 'footer-section',
                    'title'  => esc_html__( 'Footer', 'power-business' ),
                    'fields' => power_business_get_footer_options()
                ),
                array(
                    'id'     => 'advanced-options-section',
                    'title'  => esc_html__( 'Advanced', 'power-business' ),
                    'fields' => power_business_get_advanced_options()
                )
            )
        )
    ));

    Power_Business_Customizer::set(array(
        'panel' => array(
            'id'       => 'frontpage',
            'title'    => esc_html__( 'Front Page Options', 'power-business' ),
            'priority' => 10,
            'sections' => array(
                array(
                    'id' => 'genral-frontpage-section',
                    'title' => esc_html__( 'General', 'power-business' ),
                    'fields' => array(
                        array(
                            'id'      => 'svg-bg-color',
                            'label'   => esc_html__( 'SVG Shape Color', 'power-business' ),
                            'type'    => 'color',
                            'default' => '#bfe5fc'
                        ),
                        array(
                            'id'      => 'show-content',
                            'label'   => esc_html__( 'Show Front Page Content', 'power-business' ),
                            'type'    => 'toggle',
                            'default' => false
                        ),
                        array(
                            'id' => 'show-content-above',
                            'label' => esc_html__( 'Show Content Above', 'power-business' ),
                            'type' => 'toggle',
                            'default' => true,
                            'active_callback' => 'show_frontpage_content_above'
                        )
                    )
                ),
                array(
                    'id'     => 'slider-section',
                    'title'  => esc_html__( 'Slider', 'power-business' ),
                    'fields' => power_business_get_slider_options()
                ),
                array(
                    'id'     => 'about-section',
                    'title'  => esc_html__( 'About', 'power-business' ),
                    'fields' => power_business_get_about_options()
                ),
                array(
                    'id'     => 'service-section',
                    'title'  => esc_html__( 'Service', 'power-business' ),
                    'fields' => power_business_get_service_options()
                ),
                array(
                    'id'     => 'team-section',
                    'title'  => esc_html__( 'Team', 'power-business' ),
                    'fields' => power_business_get_team_options()
                ),
                array(
                    'id'     => 'cta-section',
                    'title'  => esc_html__( 'Call to action', 'power-business' ),
                    'fields' => power_business_get_cta_options()
                ),
                array(
                    'id'     => 'testimonial-section',
                    'title'  => esc_html__( 'Testimonial', 'power-business' ),
                    'fields' => power_business_get_testimonial_options()
                ),
                array(
                    'id'     => 'blog-section',
                    'title'  => esc_html__( 'Blog', 'power-business' ),
                    'fields' => power_business_get_blog_options()
                )
            )
        )
    ));
}
add_action( 'init', 'power_business_theme_options' );