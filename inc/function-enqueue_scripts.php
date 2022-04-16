<?php
/**
 * Enqueue scripts.
 *
 * @package GWT
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @return void
 */
function gwt_wp_scripts() {
	// Enqueue CSS.
	wp_enqueue_style( 'gumacagwt-main-style', get_template_directory_uri() . '/assets/css/app.css', array(), GUMACA_GWT_VERSION );
	wp_enqueue_style( 'gumacagwt-user-style', get_stylesheet_uri(), array( 'gumacagwt-main-style' ), GUMACA_GWT_VERSION );

	// Enqueue JS.
	wp_enqueue_script( 'gwt_wp-foundation', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), GUMACA_GWT_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gwt_wp_scripts' );
