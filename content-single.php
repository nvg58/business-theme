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

</div><!-- .post_details -->

<?php the_content(); ?>

<div class="clear"></div>

<!-- AddThis Button -->
<div class="addthis_toolbox addthis_default_style" style="margin-top:25px;">
	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
	<a class="addthis_button_tweet"></a>
	<a class="addthis_button_pinterest_pinit"></a>
</div>
<script type="text/javascript" src="../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-5137b5c920cf5f9f"></script>
