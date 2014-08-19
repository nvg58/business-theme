<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wtm_
 */
?>
	<?php get_header( 'home' )?>

	<div class="breadcrumb_wrapper">

		<div class="breadcrumb">

			<ul>
				<?php echo wtm_breadcrumb(); ?>
			</ul>

		</div><!-- .breadcrumb -->

		<div class="clear"></div>

	</div><!-- .breadcrumb_wrapper -->
	
