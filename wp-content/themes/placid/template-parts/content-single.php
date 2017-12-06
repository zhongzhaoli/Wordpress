<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package placid
 */
global $placid_theme_options;
  $hide_meta_tag= $placid_theme_options['placid-meta-tag'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if( has_post_thumbnail( ) ){
		?>
		<!--post thumbnal options-->
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'full' ); ?>
			</a>
		</div><!-- .post-thumb-->
		<?php
	}
	?>
	<header class="entry-header">
		<?php
	    	the_title( '<h1 class="entry-title">', '</h1>' );
		
		if ( 'post' === get_post_type() && $hide_meta_tag==1 ) : ?>
		<div class="entry-meta">
			<?php placid_posted_on(); ?><?php placid_entry_footer(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'placid' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->