<?php
/**
 * Shortcode to display a slider
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_slider_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'has_wrapper' => '',
	), $atts ) );

	$out = '';

	if ( $has_wrapper == 'true' ) {
		$out .= '<section class="slider_wrapper">';
	}

	$out .= sprintf(
		'<section class="slider">
			<ul class="slides">
				%s
			</ul>
		</section>',
		do_shortcode( $content )
	);

	if ( $has_wrapper == 'true' ) {
		$out .= '</section>';
	}

	return $out;
}

add_shortcode( 'slider', 'wtm_slider_shortcode' );


/**
 * Shortcode to display a slide
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_slide_shortcode( $atts, $content = null ) {
	$out = '<li>';

	$out .= do_shortcode( $content );

	$out .= '</li>';

	return $out;
}

add_shortcode( 'slide', 'wtm_slide_shortcode' );
