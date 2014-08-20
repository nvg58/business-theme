<?php
/**
 * Shortcode to show clients as sliders
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_clients_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'title'       => 'Our Clients',
		'viewall_url' => '',
	), $atts ) );

	$out = sprintf(
		'<h3 class="blue">%s</h3>
		<div class="viewall">
			<a href="%s">View all</a>
		</div>
		<!-- .viewall -->

		<div class="homepage_slider_section">
	        %s
	    </div>
	    <!-- .homepage_slider_section -->',
		$title,
		$viewall_url,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'clients', 'wtm_clients_shortcode' );

