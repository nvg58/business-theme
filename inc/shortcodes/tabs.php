<?php
/**
 * Shortcode to display horizontal tabs
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_tabs_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'number_tabs' => ''
	), $atts ) );

	$inner_tabs = '';

	for ( $i = 1; $i <= intval( $number_tabs ); $i ++ ) {
		$inner_tabs .= sprintf( '<li><a href="#tab%1$s">Tab %1$s</a></li>', $i );
	}

	$out = sprintf(
		'<ul class="tabs">
			%s
		</ul>
		<div class="tab_container">
			%s
		</div>
		<div class="clear"></div>',
		$inner_tabs,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'tabs', 'wtm_tabs_shortcode' );


/**
 * Shortcode to display a tab with title and content
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_tab_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'title' => '',
	), $atts ) );

	$id = uniqid();

	$out = sprintf(
		'<div id="tab%s" class="tab_content">
			<h5>%s</h5>
			<p>%s</p>
		</div>',
		$id,
		$title,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'tab', 'wtm_tab_shortcode' );
