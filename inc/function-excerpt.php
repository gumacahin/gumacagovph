<?php
/**
 * Excerpt related functions.
 *
 * @package GWT
 */

/**
 * Replaces the excerpt "more" text by a link
 *
 * @param  mixed $more more.
 * @return string replacement link.
 */
function gwt_excerpt_more( $more ) {
	global $post;
	return '<a class="moretag" href="' . get_permalink( $post->ID ) . '"> continue reading : ' . get_the_title( $post->ID ) . ' </a>';
}
add_filter( 'excerpt_more', 'gwt_excerpt_more' );
