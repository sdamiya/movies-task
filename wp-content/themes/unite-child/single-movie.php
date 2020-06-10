<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="container-articles">
				<div class="row display-flex ">
					<div>
						<?php get_template_part( 'movies-article', 'single' ); ?>
					</div>
				</div>
			</div>

			<?php unite_post_nav(); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>