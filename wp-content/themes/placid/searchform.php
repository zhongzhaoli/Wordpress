<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package placid
 */
?>
<form method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="top-section-search">
    <input type="search" value="<?php echo get_search_query();?>" name="s" id="s" placeholder="<?php esc_attr_e('Search &hellip;','placid'); ?>" />
    <input type="submit" value="<?php esc_attr_e('search','placid'); ?>" class="search-subimit" />
  </div>
</form>