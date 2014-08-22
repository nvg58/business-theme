<?php
/**
 * Shortcode to display an accordion
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_accordion_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'status' => '',
		'title'  => ''
	), $atts ) );

	$out = sprintf(
		'<div class="accordionButton" id="%s">
			%s
		</div>

		<div class="accordionContent">
			<p>%s</p>
		</div>',
		$status,
		$title,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'accordion', 'wtm_accordion_shortcode' );
