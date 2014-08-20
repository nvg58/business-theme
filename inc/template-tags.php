<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wtm_
 */

if ( ! function_exists( 'wtm_paging_nav' ) ) : /**
 * Display navigation to next/previous set of posts when applicable.
 */ {
	function wtm_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'wtm_' ); ?></h1>

			<div class="nav-links">

				<?php if ( get_next_posts_link() ) : ?>
					<div
						class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wtm_' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
					<div
						class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wtm_' ) ); ?></div>
				<?php endif; ?>

			</div>
			<!-- .nav-links -->
		</nav><!-- .navigation -->
	<?php
	}
}
endif;


if ( ! function_exists( 'wtm_post_nav' ) ) : /**
 * Display navigation to next/previous post when applicable.
 */ {
	function wtm_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="navigation post-navigation" role="navigation">
			<div class="nav-links">
				<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'wtm_' ) );
				next_post_link( '<div class="nav-next">%link</div>', _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link', 'wtm_' ) );
				?>
			</div>
			<!-- .nav-links -->
		</nav><!-- .navigation -->
	<?php
	}
}
endif;


if ( ! function_exists( 'wtm_posted_on' ) ) : /**
 * Prints HTML with meta information for the current post-date/time and author.
 */ {
	function wtm_posted_on() {
		$time_string = ''; // '<time class="entry-date published" datetime="%1$s">%2$s</time>';
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


if ( ! function_exists( 'wtm_categorized_blog' ) ) : /**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */ {
	function wtm_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'wtm_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'wtm_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so wtm_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so wtm_categorized_blog should return false.
			return false;
		}
	}
}
endif;


if ( ! function_exists( 'wtm_category_transient_flusher' ) ) : /**
 * Flush out the transients used in wtm_categorized_blog.
 */ {
	function wtm_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'wtm_categories' );
	}
}
endif;
add_action( 'edit_category', 'wtm_category_transient_flusher' );
add_action( 'save_post', 'wtm_category_transient_flusher' );


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


if ( ! function_exists( 'wtm_blog_posts' ) ) : /**
 * Show latest blog posts
 */ {
	function wtm_blog_posts() {
		global $post;

		$out = '';

		$args     = array( 'post_type' => 'post' );
		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) : $i = 1;
			while ( $wp_query->have_posts() ) : $wp_query->the_post();

				$out .= '<article id="post-' . get_the_ID() . '" class= "' . implode( " ", get_post_class( "blog-post", $post->ID ) ) . '">';
				$out .= '<div class="tm-content-inner">';

				$out .= '<div class="entry-thumbnail">';
				if ( has_post_thumbnail( get_the_ID() ) ) {
					$out .= '<a href="' . get_permalink( get_the_ID() ) . '">';
					$out .= get_the_post_thumbnail( get_the_ID() );
					$out .= '</a>';
				}
				$out .= '</div>';

				$out .= '<div class="entry-container">';
				if ( get_post_type() == 'post' ) {
					$out .= '<div class="time">' . wtm_posted_on() . '</div>';
				}
				$out .= '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title() . '</a></h3>';

				$byline = '';
				if ( 'post' == get_post_type() ) {
					$byline = sprintf( _x( 'by %s', 'post author', 'wtm_' ),
						'<a class="author url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>' );
				}
				$categories_list = get_the_category_list( __( ', ', 'wtm_' ) );
				$meta            = '<span class="incategory">' . $byline . '</span> in ' . $categories_list;
				$out .= '<div class="meta">' . $meta . '</div>';

				if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
					$out .= '<span class="comments-link">' . get_comment_reply_link( __( 'Leave a comment', 'wtm_' ), __( '1 Comment', 'wtm_' ), __( '% Comments', 'wtm_' ) ) . '</span>';
				}

				$out .= get_the_content();
				$out .= '</div>';
				$out .= '</div>';
				$out .= '</article>';

			endwhile;

			wp_reset_query( $wp_query );
		else:
			$out .= '<h2>' . __( 'Nothing Found.', 'wtm_' ) . '</h2>';
			$out .= '<p>' . __( 'Apologies, but no results were found for the requested archive.', 'wtm_' ) . '</p>';
		endif;

		return $out;
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
