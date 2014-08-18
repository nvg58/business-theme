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

			<div class="left_content">

				<div class="blog_wrapper">
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();

							get_template_part( 'content', 'single' );

						endwhile;
					endif;
					?>
				</div>
				<!-- .blog_wrapper -->
			</div>
			<!-- .left_content -->

			<div class="right_content">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>

		</div>
		<!-- .content_wrapper -->

		<div class="clear"></div>

	</div><!-- #contentwrapper -->

<?php
get_footer();
