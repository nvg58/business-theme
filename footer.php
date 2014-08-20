<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wtm_
 */
?>

<div id="bottom_wrapper">

	<div class="content_wrapper">

		<?php dynamic_sidebar( 'footerbar' ); ?>

	</div>
	<!-- .content_wrapper -->

	<div class="clear"></div>

</div>
<!-- .bottom_wrapper -->


<div id="copyright_wrapper">

	<div class="content_wrapper">

		<?php dynamic_sidebar( 'copyrightbar' ); ?>

	</div>
	<!-- .content_wrapper -->

	<div class="clear"></div>

</div>
<!-- .copyright_wrapper -->

<?php wp_footer(); ?>

</body>
</html>
