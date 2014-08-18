<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package wtm_
 */

if ( ! is_active_sidebar( 'right' ) ) {
	return;
}
?>

<div id="secondary" class="page-sidebar" role="complementary">
	<?php dynamic_sidebar( 'right' ); ?>
</div>
