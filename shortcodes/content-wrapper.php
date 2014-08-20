<?php
/**
 * Shortcode to add wrapper to Site's main content
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_content_wrapper_shortcode( $atts, $content = '' ) {
	$out = sprintf(
		'<div id="contentwrapper">
			<div class="content_wrapper">
				%s
			</div>
			<!-- #contentwrapper -->
			<div class="clear"></div>
		</div>
		<!-- .content_wrapper -->
		<div class="clear"></div>',
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'content_wrapper', 'wtm_content_wrapper_shortcode' );
