<?php
/**
 * Shortcode to display latest posts
 *
 * @param array     $atts       Shortcode attribute
 * @param string    $content    Shortcode content
 *
 * @return string
 */
function wtm_latest_posts_shortcode( $atts, $content = '' ) {
	extract( shortcode_atts( array(
		'title'       => 'Latest blog',
		'viewall_url' => 'blog',
		'post_count'  => 3
	), $atts ) );

	$out = sprintf(
		'<h3 class="blue">%s</h3>
	    <div class="viewall">
	        <a href="%s">View all</a>
	    </div>',
		$title,
		$viewall_url
	);

	$out .= '<div class="homepage_slider_section">';

	$out .= latest_posts_slides( $post_count );

	$out .= '</div>';

	return $out;
}

add_shortcode( 'latest_posts', 'wtm_latest_posts_shortcode' );


/**
 * @return string
 */
function latest_posts_slides( $post_count = 3 ) {
	$args     = array(
		'post_type' => 'post',
		'posts_per_page' => $post_count
	);
	$wp_query = new WP_Query( $args );
	$out      = '
		<section class="slider">
			<ul class="slides">
	';

	if ( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
			$out .= '<li>';
			if ( has_post_thumbnail( get_the_ID() ) ) {
				$out .= '<img src="' . get_the_post_thumbnail( get_the_ID() ) . '" alt="blog slide"/>';
			} else {
				$out .= '<img src="' . TEMPLATE_PATH_URI . 'img/blogentry1.png" alt="blog slide"/>';
			}
			$out .= '<div class="flex-caption">
                        <div class="contentright">';
			$out .= wtm_posted_on();
			$out .= '</div>';
			$out .= '<h4>' . get_the_title() . '</h4>';

			$out .= '<p>' . get_custom_excerpt( 24, 'Continue Reading', 'div', true ) . '</p>';
			$out .= '</div>';

			$out .= '</li>';
		endwhile;
	endif;
	$out .= '
			</ul>
		</section>
	';

	return $out;
}
