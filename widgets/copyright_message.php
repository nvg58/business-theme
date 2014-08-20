<?php

class Copyright_Message_Widget extends WP_Widget {

	/**
	 * Register widgets with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'copyright_message_widget', // Base ID
			__( 'Copyright Message Widget', 'wtm_' ), // Name
			array( 'description' => __( 'Widget to display Copyright message', 'wtm_' ), ) // Args
		);
	}

	/**
	 * Front-end display of widgets.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'] . '<div class="copyright_message">';
		echo $message = $instance['message'];
		echo '</div>' . $args['after_widget'];
	}

	/**
	 * Back-end widgets form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance['message'] ) ) {
			$message = $instance['message'];
		} else {
			$message = __( '&copy;', 'wtm_' );
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Message:', 'wtm_' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'message' ); ?>"
			       name="<?php echo $this->get_field_name( 'message' ); ?>" type="text"
			       value="<?php echo esc_attr( $message ); ?>">
		</p>
	<?php
	}

	/**
	 * Sanitize widgets form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance            = array();
		$instance['message'] = ( ! empty( $new_instance['message'] ) ) ? strip_tags( $new_instance['message'] ) : '';

		return $instance;
	}

}
