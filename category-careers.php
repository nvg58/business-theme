<?php
/*
 * Template Name: Careers Template
 */

get_header();
?>
	<div id="contentwrapper">
		<div class="content_wrapper">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();

					get_template_part( 'content', 'page' );

				endwhile;
			endif;
			?>

			<div class="left_content">
				<?php
				//				if ( get_query_var( 'paged' ) ) {
				//					$paged = get_query_var( 'paged' );
				//				} elseif ( get_query_var( 'page' ) ) {
				//					$paged = get_query_var( 'page' );
				//				} else {
				//					$paged = 1;
				//				}


				//Protect against arbitrary paged values
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

				$args      = array(
					'category_name'  => 'careers',
					'posts_per_page' => 4,
					'paged'          => $paged
				);
				$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="blog_wrapper">
							<h5><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>

							<p><?php echo get_custom_excerpt( 33, '', '', false ); ?></p>

							<div class="post_details">
								<div class="post_date">
									<?php the_time( 'Y/m/d' ) ?>
								</div>
								<!-- .post_date -->

								<div class="post_read_more">
									<a href="<?php echo get_the_permalink(); ?>">Continue Reading<img
											src="<?php echo TEMPLATE_PATH_URI; ?>img/red-hoverarrow.png"
											width="15" height="15" alt="red arrow"/></a>
								</div>
								<!-- .post_read_more -->

								<div class="clear"></div>

							</div>
							<!-- .post_details -->
						</div>
					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.', 'wtm_' ); ?></p>
				<?php endif; ?>

			</div>

			<div class="right_content">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</div>

			<?php if ( $the_query->max_num_pages > 1 ): ?>
				<div class="pagination">

					<?php echo wtm_pagination( $the_query ); ?>

				</div>
				<!-- .pagination -->
			<?php endif;
			wp_reset_query( $the_query );
			?>
		</div>
		<div class="clear"></div>
	</div>

<?php
get_footer();


