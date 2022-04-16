<?php
/**
 * Default widgets for gwt_wp.
 *
 * @package GWT
 * @since   Government Website Template 2.0
 */

/**
 * Class govph_widget_pst.
 */
class govph_widget_pst extends WP_Widget {


	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		// Instantiate the parent object.
		$widget_ops = array(
			'classname'   => 'pst_widget',
			'description' => 'A widget for Philippine Standard Time.',
		);
		parent::__construct( 'govph_widget_pst', 'Philippine Standard Time', $widget_ops );
	}

	/**
	 * Render widget.
	 *
	 * @param  mixed $args     arguments.
	 * @param  mixed $instance instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// Widget output.
		echo $args['before_widget'];
		echo '<div id="pst-container">
				<div>Philippine Standard Time:</div>
				<div id="pst-time"></div>
			</div>';
		echo $args['after_widget'];
	}
}

/**
 * Register PST widgets.
 *
 * @return void
 */
function pst_register_widgets() {
	register_widget( 'govph_widget_pst' );
}

add_action( 'widgets_init', 'pst_register_widgets' );



/**
 * GOVPH widget transparency.
 */
class govph_widget_transparency extends WP_Widget {


	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		// Instantiate the parent object.
		$widget_ops = array(
			'classname'   => 'transparency_widget',
			'description' => 'A widget for Transparency Seal logo.',
		);
		parent::__construct( 'govph_widget_transparency', 'Transparency Seal', $widget_ops );
	}

	/**
	 * Output widget.
	 *
	 * @param  mixed $args     widget args.
	 * @param  mixed $instance widget instance.
	 * @return void
	 */
	public function widget( $args, $instance ) {
		// Widget output.
		echo $args['before_widget'];
		if ( ! empty( $instance['url'] ) ) {
			echo '<a href="' . esc_url( $instance['url'] ) . '"><img id="tp-seal" src="' . esc_url( get_template_directory_uri() ) . '/images/transparency-seal-160x160.png" alt="transparency seal logo" title="Transparency Seal"></a>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Update widget
	 *
	 * @param  mixed $new_instance new instance.
	 * @param  mixed $old_instance old instance.
	 * @return array instance.
	 */
	public function update( $new_instance, $old_instance ) {
		// Save widget options.
		$instance        = array();
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? wp_strip_all_tags( $new_instance['url'] ) : 'http://domain.gov.ph/transparency';

		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param  mixed $instance widget instance.
	 * @return void
	 */
	public function form( $instance ) {
		// Output admin widget options form.
		$url = ! empty( $instance['url'] ) ? $instance['url'] : __( 'http://domain.gov.ph/transparency' );
		?>
		<p style="text-align:center;"><img id="tp-seal" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/transparency-seal-160x160.png" alt="transparency seal logo" title="Transparency Seal"/></p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php esc_html_e( 'URL:' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
			<span class="description"><em>insert the url of transparency page</em></span>
		</p>
		<?php
	}
}

/**
 * Register transparency widget.
 *
 * @return void
 */
function transparency_register_widgets() {
	register_widget( 'govph_widget_transparency' );
}

add_action( 'widgets_init', 'transparency_register_widgets' );
