<?php
/*
Template Name: Archives of Case Studies
*/
get_header(); ?>

	<div id="contentwrapper">

		<div class="content_wrapper">

			<?php
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}

			$args = array(
				'post_type'      => 'case_study',
				'posts_per_page' => 10,
				'paged'          => $paged
			);

			$loop = new WP_Query( $args );
			if ( $loop->have_posts() ): $i = - 1;
				while ( $loop->have_posts() ) : $loop->the_post();

					$size             = ( $i == - 1 ) ? 'full' : 'medium';
					$case_study_image = sprintf(
						'<div class="casestudy_image">
							<a href="%s">%s</a>
						</div>
						<!-- .casestudy_image -->',
						get_the_permalink(),
						get_the_post_thumbnail( get_the_ID(), $size )
					);

					if ( $i == - 1 ) {
						echo $case_study_image;
					} else {
						$class = 'one_third';

						if ( $i % 3 == 0 ) {
							$class = 'one_third_first';
						} ?>

						<div class="<?php echo $class ?>">
							<?php echo $case_study_image ?>
						</div>
					<?php
					}
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

