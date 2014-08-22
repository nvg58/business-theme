<?php
/**
 * Shortcode to display an alert with text and color
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_alert_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'color' => ''
	), $atts ) );

	$out = sprintf(
		'<div class="alert_%s">
        	%s
    	</div>',
		$color,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'alert', 'wtm_alert_shortcode' );
