<?php
/**
 * Shortcode to display an intro message
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_fancybox_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'img_url'   => '',
		'img_align' => '',
		'title'     => ''
	), $atts ) );

	$out = sprintf(
		'<p>
			<a class="fancybox" href="%s" data-fancybox-group="gallery" title="%s">
				<img src="%s" class="align%s" width="300" height="169"/>
			</a>
			%s
		</p>',
		$img_url,
		$title,
		$img_url,
		$img_align,
		do_shortcode( $content )
	);

	return $out;
}

add_shortcode( 'fancybox', 'wtm_fancybox_shortcode' );


