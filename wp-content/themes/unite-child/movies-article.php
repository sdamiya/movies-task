    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="movie-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </div>

        <?php the_content(); ?>

        <div class="row-container">

            <div class="row">
                <div class="ml-2"><b>Genres:</b></div>
                <div class="ml-2">
                    <?php echo get_custom_taxonomies_icon( $post->ID, 'genres', 'genres_icon' ); ?>  
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
                    <?php echo get_custom_taxonomies_icon( $post->ID, 'countries', 'country_icon' ); ?>  
                </div>
            </div>

            <?php if ( $post->post_type === 'movie' ) : ?>
                
                <div class="row mt-2">
                    <i class="fa fa-money ml-2 custom-icon" aria-hidden="true"></i>
                    <div class="ml-2"><b>Budget:</b></div>
                    <span class="ml-4  label label-primary">
                        <?php the_field('budget'); ?>
                    </span>
                </div>

            <?php endif; ?>

            <?php if ( $post->post_type === 'movie' ) : ?>

                <div class="row mt-2">
                    <i class="fa fa-calendar ml-2 custom-icon" aria-hidden="true"></i>
                    <div class="ml-2"><b>Released year:</b></div>
                    <span class="ml-4 label label-primary">
                        <?php the_field('release_date'); ?>
                    </span>
                </div>
                
            <?php endif; ?>
        </div>

    </article>

    <div>
        <hr class="section-divider">
    </div>

