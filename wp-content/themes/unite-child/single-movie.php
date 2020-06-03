<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<!-- <main id="main" class="site-main" role="main"> -->
		
		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
					
					<div>
						<small>Genres:</small>
					
						<small>
							<?php echo get_custom_taxonomies( $post->ID, 'genres' ); ?>  
						</small>
					</div>

					<div>
						<small>Actors:</small>
						<small>
							<?php echo get_custom_taxonomies( $post->ID, 'actors' ); ?>  
						</small>
					</div>

					<div>
						<small>Countries:</small>
						<small>
							<?php echo get_custom_taxonomies( $post->ID, 'countries' ); ?>  
						</small>
					</div>

					<div>
						<small>Budget:</small>
						<small>
						<?php the_field('budget'); ?>
						</small>
					</div>

					<div>
						<small>Released year:</small>
						<small>
							<?php the_field('release_date'); ?>
						</small>
					</div>
				
					<?php the_content(); ?>

					<hr class="section-divider">
					
					<div class="row">
						<div class="col-xs-6 text-left"><?php previous_post_link(); ?></div>
						<div class="col-xs-6 text-right"><?php next_post_link(); ?></div>
					</div>
					
				
				</article>

		<?php endwhile; // end of the loop. ?>

		<!-- </main>#main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>