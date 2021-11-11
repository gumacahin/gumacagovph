<?php
/**
 * Disable all comments functionalities
 *
 * @package gwt_wp
 */


/**
 * Disable support for comments and trackbacks in post types.
 *
 * @package gwt_wp
 */
function gwt_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ( $post_types as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}

}//end gwt_disable_comments_post_types_support()


add_action( 'admin_init', 'gwt_disable_comments_post_types_support' );


/**
 * Close comments on the front-end
 *
 * @package gwt_wp
 *
 * @return bool Always false.
 */
function gwt_disable_comments_status() {
	return false;

}//end gwt_disable_comments_status()


add_filter( 'comments_open', 'gwt_disable_comments_status', 20, 2 );
add_filter( 'pings_open', 'gwt_disable_comments_status', 20, 2 );


/**
 * Hide existing comments.
 *
 * @param  mixed $comments comments.
 * @return array an empty array.
 */
function gwt_disable_comments_hide_existing_comments( $comments ) {
	$comments = array();
	return $comments;

}//end gwt_disable_comments_hide_existing_comments()


add_filter( 'comments_array', 'gwt_disable_comments_hide_existing_comments', 10, 2 );


/**
 * Remove comments page in menu.
 *
 * @return void
 */
function gwt_disable_comments_admin_menu() {
	remove_menu_page( 'edit-comments.php' );

}//end gwt_disable_comments_admin_menu()


add_action( 'admin_menu', 'gwt_disable_comments_admin_menu' );


/**
 * Redirect any user trying to access comments page.
 *
 * @return void
 */
function gwt_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ( 'edit-comments.php' === $pagenow ) {
		wp_safe_redirect( admin_url() );
		exit;
	}

}//end gwt_disable_comments_admin_menu_redirect()


add_action( 'admin_init', 'gwt_disable_comments_admin_menu_redirect' );


/**
 * Remove comments metabox from dashboard
 *
 * @return void
 */
function gwt_disable_comments_dashboard() {
	 remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

}//end gwt_disable_comments_dashboard()


add_action( 'admin_init', 'gwt_disable_comments_dashboard' );


/**
 * Remove comments links from admin bar
 *
 * @return void
 */
function gwt_disable_comments_admin_bar() {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}

}//end gwt_disable_comments_admin_bar()


add_action( 'init', 'gwt_disable_comments_admin_bar' );
