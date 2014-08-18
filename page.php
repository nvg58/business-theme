<?php
/**
 * The template for displaying all pages.
 *
 * @package wtm_
 */
if ( is_front_page() ) {
	get_header( 'home' );
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

		endwhile;
	endif;
} else {
	get_header();
	?>
	<div id="contentwrapper">
		<div class="content_wrapper">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'page' );

				endwhile;
			endif;
			?>
		</div>
		<div class="clear"></div>
	</div>
<?php
}

get_footer();
