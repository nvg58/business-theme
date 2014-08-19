<?php
/**
 * Shortcode to layout content into columns
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_column_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'class' => ''
	), $atts ) );

	$out = sprintf(
		'<div class="%s">
				%s
		</div>',
		$class,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'column', 'wtm_column_shortcode' );
