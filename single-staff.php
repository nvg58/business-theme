<?php
/**
 * The template for displaying all single Staff post type.
 *
 * @package wtm_
 */
get_header();
?>

	<div id="contentwrapper">

		<div class="content_wrapper">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'staff' );

				endwhile;
			endif;
			?>

		</div>
		<!-- .content_wrapper -->

		<div class="clear"></div>

	</div>
	<!-- #contentwrapper -->

<?php
get_footer();
