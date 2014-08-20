<?php
/**
 * The sidebar containing the main widgets area.
 *
 * @package wtm_
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="page-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</div>
