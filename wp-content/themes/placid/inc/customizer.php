<?php

/**
 *  Default Theme options
 *
 * @since placid 1.0.0
 *
 * @param null
 * @return array $placid_theme_layout
 *
 */
if ( !function_exists('placid_default_theme_options') ) :
    function placid_default_theme_options() {

        $default_theme_options = array(
            'placid-disable-search'=> 1,
            'placid-sticky-sidebar'=>1,
            'placid-meta-tag'=>1,
            'placid_sidebar-options'=>'right-sidebar',
            'placid-footer-copyright'=>esc_html__('All Right Reserved 2016','placid')
        );
        return apply_filters( 'placid_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since placid 1.0.0
 *
 * @param null
 * @return array placid_theme_options
 *
 */
if ( !function_exists('placid_get_theme_options') ) :
    function placid_get_theme_options() {

        $placid_default_theme_options = placid_default_theme_options();
        
    
        $placid_get_theme_options = get_theme_mod( 'placid_theme_options');
        if( is_array( $placid_get_theme_options )){
            return array_merge( $placid_default_theme_options, $placid_get_theme_options );
        }
        else{
            return $placid_default_theme_options;
        }

    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';
function placid_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';


    $default = placid_default_theme_options();
	/*adding sections for footer options*/
    
    $wp_customize->add_panel( 'placid_panel', array(
        'priority' => 100,
        'capability' => 'edit_theme_options',
        'title' => __( 'Theme Options', 'placid' ),
        ) );
    
/*
    ***************
    * Layout Section
    ***************
    */
    $wp_customize->add_section( 'placid_layout_section', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Layout &amp; Design Options', 'placid' ),
        'description' => '',
        'panel' => 'placid_panel',
        ) );

        $wp_customize->add_setting( 'placid_sidebar-options', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['placid_sidebar-options'],
            'sanitize_callback' => 'placid_sanitize_select'
        ) );
        $wp_customize->add_control( 'placid_sidebar-options', array(
            'choices'       => array(
                            'right-sidebar'         => __('Right Sidebar','placid'),
                            'left-sidebar'          => __('Left Sidebar','placid'),
                            'no-sidebar'        => __('No Sidebar','placid'),
            ),
            'label'         => __( 'Select Sitebar Options', 'placid' ),
            'description'   => __( 'Select Sidebar options', 'placid' ),
            'section'       => 'placid_layout_section',
            'settings'      => 'placid_sidebar-options',
            'type'          => 'select'
        ) );


    $wp_customize->add_section( 'placid_copyright_section', array(
        'priority'       => 170,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Copyright Text', 'placid' ),
        'panel' => 'placid_panel',
    ) );


     /*copyright*/
    $wp_customize->add_setting( 'placid_theme_options[placid-footer-copyright]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-footer-copyright'],
        'sanitize_callback' => 'wp_kses_post'
    ) );
    $wp_customize->add_control( 'placid-footer-copyright', array(
        'label'     => __( 'Copyright Text', 'placid' ),
        'description' => __('Your Own Copyright Text', 'placid'),
        'section'   => 'placid_copyright_section',
        'settings'  => 'placid_theme_options[placid-footer-copyright]',
        'type'      => 'text',
        'priority'  => 25
    ) );   

  
   $wp_customize->add_section( 'placid_hide_meta_section', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Hide Meta Tag', 'placid' ),
        'panel' => 'placid_panel',
    ) );


     /*Meta-Tag*/
    $wp_customize->add_setting( 'placid_theme_options[placid-meta-tag]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-meta-tag'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-meta-tag]', array(
        'label'     => __( 'Hide Meta Tags', 'placid' ),
        'section'   => 'placid_hide_meta_section',
        'settings'  => 'placid_theme_options[placid-meta-tag]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) );

    /*Sticky Sidebar*/
    $wp_customize->add_section( 'placid-disable-sticky-sidebar', array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Disable Sticky Sidebar', 'placid' ),
         'panel' => 'placid_panel',
     ) );

    $wp_customize->add_setting( 'placid_theme_options[placid-sticky-sidebar]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-sticky-sidebar'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-sticky-sidebar]', array(
        'label'     => __( 'Enable/Disable Sticky Sidebar', 'placid' ),
        'section'   => 'placid-disable-sticky-sidebar',
        'settings'  => 'placid_theme_options[placid-sticky-sidebar]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) ); 

    /*Enable disable Search on Header*/
    $wp_customize->add_section( 'placid-disable-search-header', array(
         'priority'       => 10,
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Enable/Disable Search', 'placid' ),
         'panel' => 'placid_panel',
     ) );

    $wp_customize->add_setting( 'placid_theme_options[placid-disable-search]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['placid-disable-search'],
        'sanitize_callback' => 'placid_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'placid-disable-search]', array(
        'label'     => __( 'Enable/Disable Search on Header', 'placid' ),
        'section'   => 'placid-disable-search-header',
        'settings'  => 'placid_theme_options[placid-disable-search]',
        'type'      => 'checkbox',
        'priority'  => 9
    ) );     

}
add_action( 'customize_register', 'placid_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function placid_customize_preview_js() {
	wp_enqueue_script( 'placid-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'placid_customize_preview_js' );



