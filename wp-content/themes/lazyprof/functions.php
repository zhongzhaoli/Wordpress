<?php 
add_action( 'wp_enqueue_scripts', 'lazyprof_theme_css',999);
function lazyprof_theme_css() {
    wp_enqueue_style( 'lazyprof-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'lazyprof-child-style', get_stylesheet_uri(), array( 'parent-style' ) );
}
?>