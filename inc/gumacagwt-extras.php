<?php
/**
 *  Additional featured for Gumaca.
 *
 * @package gumacagwt
 */

/**
 * Add gumacagwt to body classes.
 *
 * @param array $classes array of body classes.
 * @return array array of body classes with 'gumacagwt' appended.
 */
function gumacagwt_body_class( $classes ) {
	$classes[] = 'gumacagwt';
	return $classes;
}
add_filter( 'body_class', 'gumacagwt_body_class', 10, 1 );

/**
 * Hide some widgets or widget areas.
 *
 * @param  mixed $settings The widget instance setttings.
 * @param  mixed $widget The widget instance.
 * @param  mixed $args An array of default widget arguments.
 * @return array|boolean The widget settings or false.
 */
function gumacagwt_filter_widget_display_callback( $settings, $widget, $args ) {

	// Remove top panel widget area when we are not on the front page.
	if ( isset( $args['name'] ) && 'Panel Top 1' === $args['name'] ) {

		if ( ! is_front_page() ) {
			return false;
		}
	}

	// Remove bottom panel widget area when we are not on the front page.
	if ( isset( $args['name'] ) && 'Panel Bottom 1' === $args['name'] ) {

		if ( is_front_page() ) {
			return false;
		}
	}

	// Remove navigation widgets on the right sidebar when we are on the front page.
	if ( isset( $args['name'] ) && 'Right Sidebar' === $args['name'] && isset( $widget->name ) && 'Navigation Menu' === $widget->name ) {
		if ( is_front_page() ) {
			return false;
		}
	}

	return $settings;

}

add_filter( 'widget_display_callback', 'gumacagwt_filter_widget_display_callback', 10, 3 );

/**
 * Modifies the "Enter title here" placeholder.
 *
 * @param  mixed $text the placeholder text.
 * @param  mixed $post the post.
 * @return string modified placeholder text
 */
function gumacagwt_enter_title_here( $text, $post ) {
	if ( 'slider-image' === $post->post_type ) {
		return __( 'Title added here will appear in the slide show.' );
	}
	return $text;
}

// Displays notice as a place holder.
add_filter( 'enter_title_here', 'gumacagwt_enter_title_here', 10, 2 );


/**
 * Callback for the `menu` shortcode.
 *
 * @param  mixed $atts the attributes of the short code.
 * @param  mixed $content the content of the short code.
 * @return string the rendered menu.
 */
function gumacagwt_print_menu_shortcode( $atts, $content = null ) {
	$menu_args = shortcode_atts(
		array(
			'name'  => null,
			'class' => null,
		),
		$atts
	);

	$nav_menu = wp_nav_menu(
		array(
			'menu'       => $menu_args['name'],
			'menu_class' => 'shortcode_menu',
			'echo'       => false,
		)
	);
	return $nav_menu;
}

add_shortcode( 'menu', 'gumacagwt_print_menu_shortcode' );

/**
 * Callback to add widget area before the front page loop.
 *
 * @return void
 */
function gumacagwt_register_sidebars() {
	register_sidebar(
		array(
			'id'          => 'front-page-before-loop',
			'name'        => __( 'Front Page Before Loop' ),
			'description' => __( 'Front page widget area before loop, first page only.', 'gumacagwt' ),
			'before_widget' => '',
			'after_widget' => '',
		)
	);
}
// Adds widget area before front page loop.
add_action( 'widgets_init', 'gumacagwt_register_sidebars' );
