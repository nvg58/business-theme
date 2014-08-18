<?php
/**
 * The template used for display page content in page.php
 * @package wtm_
 */

if ( has_post_thumbnail() )
	the_post_thumbnail();

the_content();

