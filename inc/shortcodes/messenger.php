<?php
/**
 * Shortcode to display a message with text and button
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_message_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'message'     => '',
		'button_link' => '',
		'button_text' => ''
	), $atts ) );

	$out = sprintf(
		'<div id="message_wrapper">
		    <div class="content_wrapper">
		        <div class="contentleft">
		        	<p>%s</p>
		        </div>
		        <div class="contentright">
		        	<div class="button_green_image">
		        		<a href="%s">%s</a>
					</div>
		        </div>
			</div>
			<div class="clear"></div>
		</div>',
		$message,
		$button_link,
		$button_text
	);

	return $out;
}

add_shortcode( 'messenger', 'wtm_message_shortcode' );
