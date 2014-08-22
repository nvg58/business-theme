<?php
/**
 * Shortcode to display a quotation
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_quote_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'pos' => ''
	), $atts ) );

	if ( $pos == '' ) {
		$class = 'quote';
	} else {
		$class = 'pullquote' . $pos;
	}

	$out = sprintf(
		'<div class="%s">
           %s
		</div>',
		$class,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'quote', 'wtm_quote_shortcode' );

/**
 * Shortcode to display a quotation on the left
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_left_quote_shortcode( $atts, $content = '' ) {
	$out = sprintf(
		'<div class="pullquoteleft">
			%s
		</div>',
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'left_quote', 'wtm_left_quote_shortcode' );

/**
 * Shortcode to display a quotation on the right
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_right_quote_shortcode( $atts, $content = '' ) {
	$out = sprintf(
		'<div class="pullquoteright">
			%s
		</div>',
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'right_quote', 'wtm_right_quote_shortcode' );


