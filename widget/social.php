<?php

class Social_Icons_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'social_icons_widget', // Base ID
			__( 'Social Icons Widget', 'wtm_' ), // Name
			array( 'description' => __( 'Widget to display Social Icons in footer', 'wtm_' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'] . '<div class="social_icons">';

		$icons = array(
			'dribbble',
			'facebook',
			'gplus',
			'instagram',
			'linkedin',
			'pinterest',
			'twitter'
		);

		foreach ( $icons as $icon ) {
			if ( ! isset( $instance[ $icon ] ) || $instance[ $icon ] != '' ) {
				$social_link = sprintf(
					'<a href="%1$s"><img src="%2$s/img/social/white/%3$s.png" width="30" height="30" alt="%3$s" /></a> ',
					$instance[ $icon ],
					get_template_directory_uri(),
					$icon
				);
				echo $social_link;
			}
		}

		echo '</div>' . $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$icons = array(
			'dribbble',
			'facebook',
			'gplus',
			'instagram',
			'linkedin',
			'pinterest',
			'twitter'
		);
		?>
		<p>
			<?php
			foreach ( $icons as $icon ) {
				if ( ! isset( $instance[ $icon ] ) ) {
					$instance[ $icon ] = '';
				}
			}

			foreach ( $icons as $icon ) {
				?>
				<label
					for="<?php echo $this->get_field_id( $icon ); ?>"><?php _e( ucfirst( $icon . ':' ) ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( $icon ); ?>"
				       name="<?php echo $this->get_field_name( $icon ); ?>" type="text"
				       value="<?php echo esc_attr( $instance[ $icon ] ); ?>">

			<?php
			} ?>

		</p>
	<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$icons    = array(
			'dribbble',
			'facebook',
			'gplus',
			'instagram',
			'linkedin',
			'pinterest',
			'twitter'
		);
		foreach ( $icons as $icon ) {
			$instance[ $icon ] = ( ! empty( $new_instance[ $icon ] ) ) ? strip_tags( $new_instance[ $icon ] ) : '';
		}

		return $instance;
	}

}
