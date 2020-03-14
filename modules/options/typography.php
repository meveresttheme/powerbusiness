<?php
if( ! function_exists( 'power_business_get_typography_options' ) ){
    function power_business_get_typography_options(){
        $message = esc_html__( 'The value is in px.', 'power-business' );
        return array(  
            array(
                'id'          => 'site-info-font',
                'label'       => esc_html__( 'Site Identity Font Family', 'power-business' ),
                'description' => esc_html__( 'Font family for site title and tagline. Defaults to Hind', 'power-business' ),
                'default'     => 'font-12', //Defaults to hind
                'type'        => 'select',
                'choices'     => Power_Business_Helper::get_font_family(),
            ),
            array(
                'id'      => 'body-font',
                'label'   =>  esc_html__( 'Body Font Family.', 'power-business' ),
                'description' => esc_html__( 'Defaults to Hind.', 'power-business' ),
                'default' => 'font-12', //Defaults to hind
                'type'    => 'select',
                'choices' => Power_Business_Helper::get_font_family(),
            ),
            array(
                'id'          => 'heading-font',
                'label'       =>  esc_html__( 'Headings Font Family.', 'power-business' ),
                'description' =>  esc_html__( 'h1 to h6. Defaults to Quicksand.', 'power-business' ),
                'default'     => 'font-13', //Defaults to quicksand
                'type'        => 'select',
                'choices'     => Power_Business_Helper::get_font_family(),
            ),
            array(
                'id'          => 'body-font-size',
                'label'       => esc_html__( 'Body Font Size.', 'power-business' ),
                'description' => $message . ' ' . esc_html__( 'Defaults to 15px.', 'power-business' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 15,
                    'tablet'  => 15,
                    'mobile'  => 15,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'post-title-size',
                'label'       => esc_html__( 'Post Title Font Size', 'power-business' ),
                'description' => $message . ' ' . esc_html__( 'Defaults to 21px.' , 'power-business' ),
                'default' => array(
                    'desktop' => 21,
                    'tablet'  => 21,
                    'mobile'  => 21,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
                'type' => 'slider',
            ),
            array(
                'id'          => 'primary-menu-font-size',
                'label'       => esc_html__( 'Primary Menu Font Size', 'power-business' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 15px.', 'power-business' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 15,
                    'tablet'  => 15,
                    'mobile'  => 15,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-title-font-size',
                'label'       => esc_html__( 'Widget Title Font Size', 'power-business' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 18px.', 'power-business' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 18,
                    'tablet'  => 18,
                    'mobile'  => 18,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-content-font-size',
                'label'       => esc_html__( 'Widget Content Font Size', 'power-business' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 16px.', 'power-business' ),
                'type'        => 'slider',
                'default' => array(
                    'desktop' => 16,
                    'tablet'  => 16,
                    'mobile'  => 16,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
        );
    }
}