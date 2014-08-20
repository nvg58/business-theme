<?php
/*
 * Template Name: Right sidebar
 */
get_header();
?>
<div id="contentwrapper">
	<div class="content_wrapper">
<?php

if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
		<div class="left_content">

			<?php get_template_part( 'content', 'page' ); ?>

		</div>
<?php
	endwhile;
endif;
?>
		<div class="right_content">

			<?php dynamic_sidebar( 'sidebar' ); ?>

		</div>
	</div>

	<div class="clear"></div>
</div>

<?php
get_footer();


