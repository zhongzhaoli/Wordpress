<?php 
/**
 * Custom widgets.
 */

if ( ! function_exists( 'placid_load_widgets' ) ) :

	/**
	 * Load widgets.
	 */
	function placid_load_widgets() {

		// Social.
		register_widget( 'Placid_Social_Widget' );
}

endif;

add_action( 'widgets_init', 'placid_load_widgets' );

if ( ! class_exists( 'Placid_Social_Widget' ) ) :

	/**
	 * Social widget class.
	 */
	class Placid_Social_Widget extends WP_Widget {

		/**
		 * Constructor.
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'placid-social-icons',
				'description' => esc_html__( 'Social Menu Widget', 'placid' ),
			);
			parent::__construct( 'placid-social-icons', esc_html__( 'PT Social', 'placid' ), $opts );
		}

		/**
		 * Echo the widget content.
		 */
		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if(  has_nav_menu( 'social' ) ){
				        wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'social-menu' ) ); 
					}

			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = sanitize_text_field( $new_instance['title'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title' => '',
			) );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'placid' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<?php if ( ! has_nav_menu( 'social' ) ) : ?>
	        <p>
				<?php esc_html_e( 'Please create menu and assign it.', 'placid' ); ?>
	        </p>
	        <?php endif; ?>
			<?php
		}
	}

endif;
