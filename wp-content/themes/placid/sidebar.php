<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package placid
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$sidebar = esc_attr( get_theme_mod( 'placid_sidebar-options' ) );
if( $sidebar == "right-sidebar" || $sidebar == "left-sidebar" || empty( $sidebar ) ) : ?>
<aside id="secondary" class="widget-area" role="complementary">
<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php endif; 