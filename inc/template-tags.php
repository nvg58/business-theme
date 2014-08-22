<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wtm_
 */

if ( ! function_exists( 'wtm_posted_on' ) ) : /**
 * Prints HTML with meta information for the current post-date/time and author.
 */ {
	function wtm_posted_on() {
		$time_string = '';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date( 'F jS, Y' ) ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date( 'F jS, Y' ) )
		);

		return $time_string;
	}
}
endif;


if ( ! function_exists( 'wtm_process_nav_menu' ) ) : /**
 * Process nav_menu
 */ {
	function wtm_process_nav_menu() {
		$param = '';
		if ( has_nav_menu( 'primary' ) ) {
			$param = 'primary';
		}

		wp_nav_menu( array(
			'theme_location' => $param,
			'container'      => false,
			'menu_class'     => 'sf-menu'
		) );
	}
}
endif;


if ( ! function_exists( 'wtm_breadcrumb' ) ) : /**
 *  Display breadcrumb
 */ {
	function wtm_breadcrumb() {
		$path      = ( $_SERVER['REQUEST_URI'] );
		$names     = explode( "/", $path );
		$trimnames = array_slice( $names, 1, - 1 );
		$length    = count( $trimnames ) - 1;
		$fixme     = array( ".php", "-" );
		$fixes     = array( "", " " );
		$url       = "";
		for ( $i = 0; $i <= $length; $i ++ ) {
			$url .= $trimnames[ $i ] . "/";
			if ( $i > 0 && $i != $length ) {
				echo '<li><a href="/' . $url . '">' . ucwords( str_replace( $fixme, $fixes, $trimnames[ $i ] ) . ' ' ) . '</a> &nbsp; / &nbsp;</li>';
			} elseif ( $i == $length ) {
				echo '<li>' . ucwords( str_replace( $fixme, $fixes, $trimnames[ $i ] ) . ' ' ) . '</li>';
			}
		}
	}
}

endif;


if ( ! function_exists( 'wtm_pagination' ) ) : /**
 *  Display Pagination
 */ {
	function wtm_pagination( $the_query ) {
		$big = 999999999; // need an unlikely integer

		$out = paginate_links( array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $the_query->max_num_pages
		) );

		return $out;
	}
}
endif;


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 *
 * @return string The filtered title.
 */
function wtm_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}

add_filter( 'wp_title', 'wtm_wp_title', 10, 2 );
