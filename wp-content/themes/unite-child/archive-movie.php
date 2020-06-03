<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			  	<div class="custom-post-movies">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
					
						<div>
							<small>Genres:</small>
						
							<?php var_dump($wp_the_query->post_count); ?>  
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
						
					</article>
				</div>
			
			<?php endwhile; ?>

			<?php unite_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
