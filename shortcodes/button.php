<?php
/**
 * Shortcode to display button with link, text and color
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_button_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'link'  => '',
		'text'  => '',
		'color' => ''
	), $atts ) );

	$out = sprintf(
		'<div class="button_%s">
        	<a href="%s">%s</a>
    	</div>
    	<div class="clear"></div>',
		$color,
		$link,
		$text
	);
	return $out;
}

add_shortcode( 'button', 'wtm_button_shortcode' );
