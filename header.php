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

	<!-- Start of breadcrumb wrapper -->
	<div class="breadcrumb_wrapper">

		<!-- Start of breadcrumb -->
		<div class="breadcrumb">

			<ul>
				<?php echo wtm_breadcrumb(); ?>
			</ul>

		</div><!-- End of breadcrumb -->

		<!-- Clear Fix --><div class="clear"></div>

	</div><!-- End of breadcrumb wrapper -->