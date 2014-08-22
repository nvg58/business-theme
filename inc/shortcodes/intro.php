<?php
/**
 * Shortcode to display an intro message
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_intro_shortcode( $atts, $content = '' ) {
	$out = sprintf(
		'<div class="intro">
           %s
		</div>',
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'intro', 'wtm_intro_shortcode' );
