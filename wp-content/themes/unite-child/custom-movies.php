<?php
/*
template name:  Movies Catalog Template
*/

get_header(); ?>

	<div id="primary" class="content-area <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<?php
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

				$args_query = shortcode_atts( array(
					'post_type' => 'movie',
					'count' => '4',
					'paged' => $paged
				), $atts );

				$args = array(
					'post_type' => $args_query['post_type'],
					'order' => 'DESC',
					'posts_per_page' => $args_query['count'],
					'orderby' => 'date',
					'paged' => $paged
				);
				
				$query_movies = new WP_Query( $args );
				
			?>

		
			

				<div class="container-articles">
    				<div class="row display-flex ">
						<?php while ($query_movies ->have_posts() ) : $query_movies ->the_post(); ?>
							<div class="col-md-6">
								<?php get_template_part( 'movies-article', get_post_format() ); ?>
							</div>
						<?php endwhile; ?>
	    			</div>
				</div>

				
					
		

			<?php 
			$total_pages = $query_movies ->max_num_pages;

			if ($total_pages > 1) {
	
					$current_page = max(1, get_query_var('paged'));
					
					
					echo '<div class="row row-pagination">' . paginate_links(array(
							'base' => get_pagenum_link(1) . '%_%',
							'format' => '/page/%#%',
							'current' => $current_page,
							'total' => $total_pages,
							'prev_text'    => __('« PREV'),
							'next_text'    => __('NEXT »'),
					)) . '</div>';
			}
			wp_reset_postdata();
			?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>

