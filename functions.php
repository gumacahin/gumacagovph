<?php
/**
 * GWT wp functions and definitions
 *
 * @package gwt_wp
 */

$theme = wp_get_theme();
define( 'GUMACA_GWT_VERSION', $theme->version );

/**
 * Template Initialize
 */
require get_template_directory() . '/inc/function-initialize.php';

/*
 * Register widgetized area
 */
require get_template_directory() . '/inc/function-widget.php';

/*
 * Breadcrumbs
 */
require get_template_directory() . '/inc/function-breadcrumbs.php';

/*
 * Govph Excerpt
 */
require get_template_directory() . '/inc/function-excerpt.php';

/*
 * Enqueue scripts and styles
 */
require get_template_directory() . '/inc/function-enqueue_scripts.php';

/*
 * Disable comment functions
 */
require get_template_directory() . '/inc/function-disable_comments.php';

/*
 * GovPH default widgets
 */
require get_template_directory() . '/inc/govph-widget.php';

/*
 * Default sidebar contents
 */
// require get_template_directory() . '/inc/sidebar.php';

/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * Customizations for govph.
 */
require get_template_directory() . '/inc/govph-extras.php';

/*
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';
/*
 * Load Jetpack compatibility file.
 */
// require get_template_directory() . '/inc/jetpack.php';
/*
 * Theme Options Page.
 */
require get_template_directory() . '/inc/function-options.php';

/*
 * Custom Post Types
 */
// require get_template_directory() . '/inc/custom-post-types.php';
/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Envato Flexslider
 */
require get_template_directory() . '/inc/vendors/envato-flex-slider/envato-flex-slider.php';

/*
 * GWT only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	include get_template_directory() . '/inc/back-compat.php';
}

add_filter( 'rest_authentication_errors', function( $result ) {
	if ( ! empty( $result ) ) {
		return $result;
	}
	if ( ! is_user_logged_in() ) {
		return new WP_Error( 'rest_logged_out', 'Sorry, you must be logged in to make a request.', array( 'status' => 401 ) );
	}
	return $result;
});

function disable_api( $access ) {
	if ( ! is_user_logged_in() ) {
		$access = new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', [ 'status' => 401 ] );
	}

	return $access;
}