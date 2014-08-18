<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wtm_
 */
?>

<!-- Start of bottom wrapper -->
<div id="bottom_wrapper">

	<!-- Start of content wrapper -->
	<div class="content_wrapper">

		<?php dynamic_sidebar( 'footerbar' ); ?>

	</div>
	<!-- End of content wrapper -->

	<!-- Clear Fix -->
	<div class="clear"></div>

</div>
<!-- End of bottom wrapper -->


<!-- Start of copyright wrapper -->
<div id="copyright_wrapper">

	<!-- Start of content wrapper -->
	<div class="content_wrapper">

		<?php dynamic_sidebar( 'copyrightbar' ); ?>

	</div>
	<!-- End of content wrapper -->

	<!-- Clear Fix -->
	<div class="clear"></div>

</div>
<!-- End of copyright wrapper -->

<?php wp_footer(); ?>

</body>
</html>
