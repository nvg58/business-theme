<?php
/*
 * Template Name: Left sidebar
 */
get_header();
?>
	<div id="contentwrapper">
		<div class="content_wrapper">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
					<div class="content_right">

						<?php get_template_part( 'content', 'page' ); ?>

					</div>
				<?php
				endwhile;
			endif;
			?>
			<div class="content_left">

				<?php dynamic_sidebar( 'sidebar' ); ?>

			</div>
		</div>

		<div class="clear"></div>
	</div>

<?php
get_footer();




