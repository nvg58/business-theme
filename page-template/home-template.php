<?php
/*
 * Template Name: Home Template
 */

get_header( 'home' );

if ( have_posts() ) :
	while ( have_posts() ) : the_post();

		get_template_part( 'content', 'page' );

	endwhile;
endif;

get_footer();


