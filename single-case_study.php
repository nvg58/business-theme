<?php
/**
 * The template for displaying all single posts.
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

					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
					?>

					<br><br>

					<h2><?php the_title(); ?> </h2>

					<?php
					the_content();

				endwhile;
			endif;
			?>

		</div>
		<!-- .content_wrapper -->

		<div class="clear"></div>

	</div><!-- #contentwrapper -->

<?php
get_footer();
