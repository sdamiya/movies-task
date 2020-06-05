<div class="custom-post-movies">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    
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
        <?php if ( $post->post_type === 'movie' ) : ?>

            <div>
                <small>Budget:</small>
                <small>
                <?php the_field('budget'); ?>
                </small>
            </div>

        <?php endif; ?>

        <?php if ( $post->post_type === 'movie' ) : ?>

            <div>
                <small>Released year:</small>
                <small>
                    <?php the_field('release_date'); ?>
                </small>
            </div>
            
        <?php endif; ?>

        <?php the_content(); ?>

        <hr class="section-divider">
        
    </article>
</div>


		

		

	


