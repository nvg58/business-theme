<?php
/**
 * Template to display a staff
 *
 * @package wtm_
 */
?>

	<div class="employee_image_single">
		<?php the_post_thumbnail(); ?>

	</div>
	<!-- .employee_image_single -->

	<h2><?php the_title(); ?></h2>

	<div class="employee_info">

		<div class="social_icons">

			<?php
			$icons = array(
				'dribbble',
				'facebook',
				'gplus',
				'instagram',
				'linkedin',
				'pinterest',
				'twitter'
			);

			foreach ( $icons as $icon ) {
				if ( get_post_meta( get_the_ID(), $icon, true ) != null ) {
					$social_link = sprintf(
						'<a href="%1$s"><img src="%2$simg/social/black/%3$s.gif" width="30" height="30" alt="%3$s" /></a> ',
						get_post_meta( get_the_ID(), $icon, true ),
						TEMLATE_PATH_URI,
						$icon
					);
					echo $social_link;
				}
			}
			?>

		</div>
		<!-- .social_icons -->

		<div class="employee_title">
			<?php echo get_post_meta( get_the_ID(), 'staff_position', true ); ?>
		</div>
		<!-- .employee_title -->

	</div>
	<!-- .employee_info -->

<?php
the_content();
