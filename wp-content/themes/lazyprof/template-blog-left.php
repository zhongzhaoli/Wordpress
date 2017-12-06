<?php 
//Template Name: Blog-left-sidebar
get_header();
get_template_part('index', 'bannerstrip');
?>
<!-- Blog & Sidebar Section -->
<section>		
	<div class="container">
		<div class="row">
			<!--Sidebar-->
			<?php get_sidebar(); ?>
			<!--/End of Sidebar-->
			
			<!--Blog Posts-->
			<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
				<div class="site-content">
					<?php 
					$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$paged );	
					$loop = new WP_Query( $args );
					?>
					
					<?php if( $loop->have_posts() ): ?>
					
						<?php while( $loop->have_posts() ): $loop->the_post(); ?>
						
							<?php get_template_part('content',''); ?>
					
						<?php endwhile; ?>
						
					<!-- Pagination -->			
					<div class="paginations">
						<?php
						$GLOBALS['wp_query']->max_num_pages = $loop->max_num_pages;
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => __('Previous','lazy-prof'),
						'next_text'          => __('Next','lazy-prof'),
						'screen_reader_text' => ' ',
						) ); ?>
					</div>
					<?php endif; ?>
					<!-- /Pagination -->
				</div>
			<!--/End of Blog Posts-->
			</div>
			<!--/End of Blog Posts-->
		
		</div>	
	</div>
</section>
<!-- End of Blog & Sidebar Section -->
<?php get_footer(); ?>