<?php
/**
 * @package wtm_
 */
?>

<h2><?php the_title(); ?></h2>

<div class="post_details">
	<div class="post_date">
		<?php the_time( 'Y/m/d' ) ?>
	</div>
	<!-- .post_date -->

	<div class="career_print">
		<a href="javascript:window.print()"><?php _e( 'Print this page', 'wtm_' ) ?> </a>
	</div>
	<!-- .career_print -->

	<div class="career_split"></div>

	<div class="pdf_download">
		<a href="#"><?php _e( 'Download PDF File', 'wtm_' ); ?></a>
	</div>
	<!-- .pdf_download -->

	<div class="clear"></div>

</div>
<!-- .post_details -->

<?php the_content(); ?>

<div class="clear"></div>

