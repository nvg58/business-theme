<?php
/**
 * Information shortcodes with image, title, description
 *
 * @param array     $atts       Shortcode attributes
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_infor_shortcode( $atts, $content = '' ) {
	$atts = shortcode_atts( array(
		'img_url'     => '',
		'img_align'   => '',
		'title'       => '',
		'title_color' => '',
		'title_hx'    => 'h2',
	), $atts );

	$out_img = sprintf(
		'<div class="%s">
			<img class="%s" src="%s" alt="Image">
		 </div>',
		$atts['img_align'] == 'left' ? 'one_half_first' : 'one_half',
		'align' . $atts['img_align'],
		$atts['img_url']
	);

	$out_txt = sprintf(
		'<div class="%1$s">
	    	<%2$s class="%3$s"><a href="#">%4$s</a></%2$s>
		    %5$s
		</div>',
		$atts['img_align'] == 'right' ? 'one_half_first' : 'one_half',
		$atts['title_hx'],
		$atts['title_color'],
		$atts['title'],
		do_shortcode( $content )
	);

	$out = $atts['img_align'] == 'left' ? $out_img . $out_txt : $out_txt . $out_img;

	$out .= '<div class="clear"></div>';

	return $out;
}

add_shortcode( 'infor', 'wtm_infor_shortcode' );
