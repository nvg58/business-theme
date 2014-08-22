<?php
/*
Template Name: Archives of Staffs
*/
get_header(); ?>

	<div id="contentwrapper">

		<div class="content_wrapper">

			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'page' );

				endwhile;
			endif;

			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$args = array(
				'post_type'      => 'staff',
				'posts_per_page' => 6,
				'paged'          => $paged
			);

			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ): $i = 0;
				while ( $loop->have_posts() ) : $loop->the_post();
					$class = 'one_third';

					if ( $i % 3 == 0 ) {
						$class = 'one_third_first';
					}
					?>
					<div class="<?php echo $class ?>">

						<div class="employee_image">
							<a href="<?php the_permalink(); ?>">
								<img src="<?php echo get_post_meta( get_the_ID(), 'preview_image', true ); ?>"
								     width="310"
								     height="400"
								     alt="employee 1"/>
							</a>
						</div>
						<!-- .employee_image -->

						<div class="employee_name">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</div>
						<!-- .employee_name -->

						<div class="employee_title">
							<?php echo get_post_meta( get_the_ID(), 'staff_position', true ); ?>
						</div>
						<!-- .employee_title -->

						<div class="employee_social">
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
						<!-- .employee_social -->

					</div>
					<?php
					$i ++;
				endwhile;
				wp_reset_postdata();
			endif; ?>

			<?php if ( $loop->max_num_pages > 1 ): ?>
				<div class="pagination">

					<?php echo wtm_pagination( $loop ); ?>

				</div>
				<!-- .pagination -->
			<?php endif;
			wp_reset_query( $loop );
			?>
		</div>
		<!-- .content_wrapper -->

		<div class="clear"></div>

	</div>
	<!-- .contentwrapper -->

<?php
get_footer();

