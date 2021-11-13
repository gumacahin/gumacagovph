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
	wp_enqueue_style( 'gwt_wp-user-style', get_stylesheet_uri(), array(), '20160530' );

	// Enqueue JS.
	wp_enqueue_script( 'gwt_wp-foundation', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), '20160530', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'gwt_wp-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160530', false );
	}
}
add_action( 'wp_enqueue_scripts', 'gwt_wp_scripts' );
