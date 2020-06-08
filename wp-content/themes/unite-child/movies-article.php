
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="movie-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></div>

            <?php the_content(); ?>

        <div class="row-container">

            <div class="row">
                <div class="ml-2"><b>Genres:</b></div>
            
                <div class="ml-2">
                    <?php echo get_custom_taxonomies( $post->ID, 'genres' ); ?>  
                </div>
            </div>

            <div class="row">
                <div class="ml-2"><b>Actors:</b></div>
                <div class="ml-2">
                    <?php echo get_custom_taxonomies( $post->ID, 'actors' ); ?>  
                </div>
            </div>

            <div class="row">
                <div class="ml-2"><b>Countries:</b></div>
                <div class="ml-2">
                    <?php echo get_custom_taxonomies( $post->ID, 'countries' ); ?>  
                </div>
            </div>

            <?php if ( $post->post_type === 'movie' ) : ?>
                
                <div class="row">
                    <i class="fa fa-money ml-2 custom-icon" aria-hidden="true"></i>
                    <div class="ml-2"><b>Budget:</b></div>
                    <div class="ml-2">
                        <?php the_field('budget'); ?>
                    </div>
                </div>

            <?php endif; ?>

            <?php if ( $post->post_type === 'movie' ) : ?>

                <div class="row">
                    <i class="fa fa-calendar ml-2 custom-icon" aria-hidden="true"></i>
                    <div class="ml-2"><b>Released year:</b></div>
                    <div class="ml-2">
                        <?php the_field('release_date'); ?>
                    </div>
                </div>
                
            <?php endif; ?>
        </div>

    </article>

    <div>
        <hr class="section-divider">
    </div>

