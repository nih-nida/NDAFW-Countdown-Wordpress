<?php
namespace Wordpress\IQSolution;

class n4t_ndafw_countdown_widget extends \WP_Widget {
	public function __construct() {
		parent::__construct(
			'n4t_ndafw_countdown_widget',
			__( 'N4T NDAFW Countdown' ),
			array(
				'classname' => 'n4t_ndafw_countdown_widget',
			) );
	}

	public function form( $instance ) {
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
			<label
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat"
			       id="<?php echo $this->get_field_id( 'title' ); ?>"
			       name="<?php echo $this->get_field_name( 'title' ); ?>"
			       type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );

		echo $before_widget;

		if ( ! empty( $instance['title'] ) ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'] ) . $after_title;
		}

		echo file_get_contents(N4T_NDAFW_COUNTDOWN_PLUGIN_DIR . 'countdown.html');

		echo $after_widget;
	}
}

/**
 * register countdown widget
 */
add_action( 'widgets_init', function () {
	register_widget( '\Wordpress\IQSolution\n4t_ndafw_countdown_widget' );
} );