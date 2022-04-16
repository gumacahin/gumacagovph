<?php
/**
 * Plugin Name: Envato FlexSlider
 * Plugin URI:
 * Description: A simple plugin that integrates FlexSlider (http://flex.madebymufffin.com/) with WordPress using custom post types!
 * Author: Joe Casabona
 * Version: 0.5
 * Author URI: http://www.casabona.org
 *
 * @package Evanto FlexSlider
 */

// Some Set-up
define( 'EFS_PATH', get_template_directory_uri() . '/inc/vendors/' . basename( dirname( __FILE__ ) ) . '/' );
define( 'EFS_NAME', 'Envato FlexSlider' );
define( 'EFS_VERSION', '0.5' );

// Files to Include
require_once 'slider-img-type.php';


/**
 * Get the sliders.
 *
 * @return string
 */
function efs_get_slider() {
	 $efs_query = 'post_type=slider-image';
	query_posts( $efs_query );

	global $post_id;

	if ( have_posts() ) :
		$slider = '<div class="orbit" role="region" aria-label="Banner Slider" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out">
					<ul class="orbit-container">';

		$count = 0;
		$x     = 1;
		while ( have_posts() ) :
			the_post();
			$count++;
		endwhile;

		while ( have_posts() ) :
			the_post();
			$img = get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'orbit-image' ) );

			$slide_link = slider_link_get_meta_box_data( get_the_ID() );
			$caption    = get_the_title();

			if ( $x > $count ) {
				$x = 1;
			}

			$slider .= $post_id . '<li class="orbit-slide is-active"><div class="orbit-slide-number"><span>' . $x . '</span> of <span>' . $count . '</span></div><a href="' . $slide_link . '">' . $img . '</a><figcaption class="orbit-caption">' . $caption . '</figcaption></li>';
			$x++;
		endwhile;

		if ( $count > 1 ) {
			$slider .= '<button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
						<button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>';
		}
	endif;
	wp_reset_query();

	if ( $count > 1 ) {
		$slider .= '</ul>
		<nav class="orbit-bullets">';

		for ( $x = 0; $x < $count; $x++ ) {
			$class   = ( 0 === $x ) ? 'is-active' : '';
			$slider .= '<button class="' . $class . '" data-slide="' . $x . '"><span class="show-for-sr">Current Slide</span></button>';
		}

		$slider .= '</div></nav>';
	} else {
		$slider .= '</ul></div>';
	}

	return $slider;

}//end efs_get_slider()


/**
 * Insert sliders.
 *
 * @param  mixed $atts    attribute.
 * @param  mixed $content content.
 * @return string the slider.
 */
function efs_insert_slider( $atts, $content = null ) {
	$slider = efs_get_slider();
	return $slider;

}//end efs_insert_slider()


add_shortcode( 'ef_slider', 'efs_insert_slider' );


/**
 * Add template tag- for use in themes.
 *
 * @return void
 */
function efs_slider() {
	 print esc_html( efs_get_slider() );

}//end efs_slider()
