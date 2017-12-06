<?php

/**

 * placid functions and definitions.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package placid

 */



if ( ! function_exists( 'placid_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function placid_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on placid, use a find and replace

	 * to change 'placid' to the name of your theme in all the template files.

	 */

	  load_theme_textdomain('placid');

	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );

	/*

	 * Let WordPress manage the document title.

	 * By adding theme support, we declare that this theme does not use a

	 * hard-coded <title> tag in the document head, and expect WordPress to

	 * provide it for us.

	 */

	add_theme_support( 'title-tag' );


	/*

	 * Custom Logo implemeted from WordPress Core

	 */

	add_theme_support( 'custom-logo', array(

            'height'      => 70,

            'width'       => 290,

            'flex-height' => true,

            'flex-width' => true

        ) );

	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/

	 */

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.

	register_nav_menus( array(

		'primary' => esc_html__( 'Primary', 'placid' ),

	) );

	register_nav_menus( array(

		'social' => esc_html__( 'Social Menu', 'placid' ),

	) );


	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*

	 * Set up the WordPress core custom background feature.

	 */
	add_theme_support( 'custom-background', apply_filters( 'placid_custom_background_args', array(
		'default-color' => '#f0f0f0',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'placid_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */

function placid_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'placid_content_width', 640 );
}
add_action( 'after_setup_theme', 'placid_content_width', 0 );



/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function placid_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'placid' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'placid' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="title-widget"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'placid' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'placid' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'placid' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'placid' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'placid' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here to display in footer.', 'placid' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Widget Area', 'placid' ),
		'id'            => 'top-area',
		'description'   => esc_html__( 'Add widgets here to display in top of the page', 'placid' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title-top-area">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'placid_widgets_init' );



/**

 * Enqueue scripts and styles.

 */

function placid_scripts() {
	global $placid_theme_options;
	/*google font  */
    wp_enqueue_style( 'placid-googleapis', '//fonts.googleapis.com/css?family=Lora:400,400i,700,700i', array(), null );
	/*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );
	/*Bootstrap CSS*/
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/css/bootstrap.min.css', array(), '3.3.7' );
	/*Style CSS*/
	wp_enqueue_style( 'placid-style', get_stylesheet_uri() );
    /*Bootstrap JS*/
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/framework/bootstrap/js/bootstrap.min.js', array('jquery'), '4.5.0' );
	/*placid custom*/
	wp_enqueue_script( 'placid-custom', get_template_directory_uri() . '/assets/js/placid-custom.js', array('jquery'), '20151215', true );
	/*Sticky Sidebar*/
	 if( 1 == $placid_theme_options['placid-sticky-sidebar'] ){
		wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    	wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'placid_scripts' );


/**

 * Custom template tags for this theme.

 */

require get_template_directory() . '/inc/template-tags.php';

/**

 * Custom functions that act independently of the theme templates.

 */

require get_template_directory() . '/inc/extras.php';

/**

 * Customizer additions.

 */

require get_template_directory() . '/inc/customizer.php';

/**

 * Load Jetpack compatibility file.

 */

require get_template_directory() . '/inc/jetpack.php';

/**

 * Load author widget

 */

require get_template_directory() . '/inc/widgets/author-widget.php';

/**

 * Load Social widget

 */

require get_template_directory() . '/inc/widgets/social.php';


/** ----------------------------------------*/

	
/*
	***************
	* Sanitization Fucntion
	***************
	*/

function placid_sanitize_select( $input, $setting ) {
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize checkbox field
 *
 * @since 1.0.0
 */
if ( !function_exists('placid_sanitize_checkbox') ) :
        function placid_sanitize_checkbox( $checked )
        {
            // Boolean check.
            return ( ( isset( $checked ) && true == $checked ) ? true : false );
        }
    endif;

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 */    

function placid_excerpt_more( $more ) {
	 if(!is_admin() ){
         return '&hellip;';
      }    
}
add_filter('excerpt_more', 'placid_excerpt_more');



/**
 * Excerpt length 25 return
 *
 * @since Placid 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('placid_alter_excerpt') ) :
    function placid_alter_excerpt( $length ){
  if(is_admin() ){
   return $length;
  }
        return 25;
    }
endif;
add_filter('excerpt_length', 'placid_alter_excerpt');

/**
 * Add sidebar class in body
 *
 * @since Placid 1.0.0
 *
 */

add_filter( 'body_class', 'placid_custom_class' );
function placid_custom_class( $classes ) {
	$classes[] = 'at-sticky-sidebar';
	$sidebar = esc_attr( get_theme_mod( 'placid_sidebar-options' ) );
    if ( $sidebar == 'no-sidebar' ) {
        $classes[] = 'no-sidebar';
    }
    elseif ( $sidebar == 'left-sidebar'){
    	$classes[] = 'left-sidebar';
    }
    else{
    	$classes[] = 'right-sidebar';
    }
    return $classes;
}


/**
 * custom header
 *
 * @since Placid 1.0.0
 *
 */
if ( ! function_exists( 'placid_custom_header_setup' ) ) :
	function placid_custom_header_setup() {
		add_theme_support( 'custom-header', apply_filters( 'placid_custom_header_args', array(
			'default-image'          => '',
			'width'                  => 1800,
			'height'                 => 450,
			'flex-height'            => true,
			'header-text'            => false
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'placid_custom_header_setup' );

/**
 * Goto Top functions
 *
 * @since Placid 1.0.0
 *
 */

if ( !function_exists('placid_go_to_top') ) :
function placid_go_to_top(){ ?>	
	<a id="toTop" href="#" title="<?php esc_attr_e('Go to Top','placid'); ?>">
	    <i class="fa fa-angle-double-up"></i>
	</a>
<?php } endif; 