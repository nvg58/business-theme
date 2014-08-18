<?php
/**
 * The template used for display content
 * @package wtm_
 */

if ( has_post_thumbnail() )
the_post_thumbnail();
?>

<br><br>

<h2><?php echo get_the_title(); ?> </h2>

<?php
the_content();
