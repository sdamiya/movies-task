<?php
/**
 * @package Movies Plugin
 * @version 1.0.0
 */
/*
Plugin Name: Movies
Plugin URI: 
Description: A simple plugin for Movies custom post type and Genres/Countries/Years/Actors taxonomies
Author: Stefan Damiyanov
Version: 1.0.0
Author URI: 
*/


defined ('ABSPATH') or die('You cannot access this file anymore!');

class Movies {

    public function __construct(){}
    
    /**
	 * A function for creation and register a Movie custom post type.
	*/

    function create_movie_cpt() {

        $labels = array(
            'name' => __( 'Movies', 'post type general name', 'movies' ),
            'singular_name' => __( 'Movie', 'post type singular name', 'movies' ),
            'menu_name' => __( 'Movies', 'movies' ),
            'name_admin_bar' => __( 'Movies', 'movies' ),
            'attributes' => __( 'Movies Attributes',  'movies' ),
            'archives' => __( 'Movies Archives', 'movies' ),
            'add_new' => __( 'Add New', 'movies' ),
            'add_new_item' => __( 'Add New Movie', 'movies' ),
            'new_item' => __( 'New Movie', 'movies' ),
            'edit_item' => __( 'Edit Movie', 'movies' ),
            'view_item' => __( 'View Movie', 'movies' ),
            'all_items' => __( 'All Movies', 'movies' ),
            'search_items' => __( 'Search Movies', 'movies' ),
            'parent_item_colon' => __( 'Parent Movie:', 'movies' ),
            'not_found' => __( 'No Movies found.', 'movies' ),
            'not_found_in_trash' => __( 'No Movies found in Trash.', 'movies' ),
            'featured_image' => __('Featured Image', 'movies'),
            'set_featured_image' => __('Set Featured Image', 'movies'),
            'remove_featured_image' => __('Remove Featured Image', 'movies'),
            'insert_into_item' => __('Insert Into Movie', 'movies'),
            'upload_to_this_item' => __('Upload To This Movie', 'movies'),
            'items_list' => __('Movies List', 'movies'),
            'items_list_navigation' => __('Movies List navigation', 'movies'),
            'filter_items_list' => __('Filter Movies List', 'movies'),
        );

        $args = array(
            'description' => __( 'Movie', 'movies' ),
            'labels' => $labels,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions', 'author' ), 
            'hierarchical' => false,
            'public' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'movies' ), 
            'show_ui' => true,
            'menu_icon' => 'dashicons-format-video',
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 4,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'capability_type' => 'post',
        );

        register_post_type( 'movie', $args );
    }

    /**
	 * Remove rewrite rules and then recreate rewrite rules.
	*/
    
    function rewrite_movies_flush() {
        create_movie_cpt();
        flush_rewrite_rules();
    }

    /**
	 * A function for creation of Genre taxonomy and its registration.
	*/

    function create_genres_taxonomies() {

        $labels = array(
            'name' => _x( 'Genres', 'taxonomy general name' ),
            'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
            'search_items' => __( 'Search Genres' ),
            'all_items' => __( 'All Genres' ),
            'parent_item' => __( 'Parent Genres' ),
            'parent_item_colon' => __( 'Parent Genres:' ),
            'edit_item' => __( 'Edit Genre' ),
            'update_item' => __( 'Update Genre' ),
            'add_new_item' => __( 'Add New Genre' ),
            'new_item_name' => __( 'New Genre Name' ),
            'add_or_remove_items' => __( 'Add or remove Genre' ),
            'choose_from_most_used' => __( 'Choose from the most used Genres' ),
            'not_found' => __( 'No Genre found.' ),
            'menu_name' => __( 'Genres' ),
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
        );

        $genres = array( 'rewrite' => array( 'slug' => 'genre' ) );
        $movie_args = array_merge( $args, $genres );

        register_taxonomy( 'genres', 'movie', $movie_args );
    }

    /**
	 * A function for creation of Country taxonomy and its registration.
	*/

    function create_countries_taxonomies() {

        $labels = array(
            'name' => __('Countries'),
            'singular_name' => __('Country'),
            'search_items' => __('Search Countries'),
            'all_items' => __('All Countries'),
            'parent_item' => __('Parent Country'),
            'parent_item_colon' => __('Parent Country:'),
            'edit_item' => __('Edit Country'),
            'update_item' => __('Update Country'),
            'add_new_item' => __('Add New Country'),
            'new_item_name' => __('New Country Name'),
            'separate_items_with_commas' => __('Separate Country with commas'),
            'add_or_remove_items' => __('Add or remove Country'),
            'choose_from_most_used' => __('Choose from the most used Country'),
            'not_found' => __('No Country found.'),
            'menu_name' => __('Countries'),
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
        );

        $countries = array('rewrite' => array('slug' => 'country'));
        $movie_args = array_merge($args, $countries);

        register_taxonomy('countries', 'movie', $movie_args);
    }

    /**
	 * A function for creation of Actors taxonomy and its registration.
	*/

    function create_actors_taxonomies() {

        $labels = array(
            'name' => _x( 'Actor', 'taxonomy general name' ),
            'singular_name' => _x( 'Actor', 'taxonomy singular name' ),
            'search_items' => __( 'Search Actors' ),
            'all_items' => __( 'All Actors' ),
            'parent_item' => __( 'Parent Actor' ),
            'parent_item_colon' => __( 'Parent Actor:' ),
            'edit_item' => __( 'Edit Actor' ),
            'update_item' => __( 'Update Actor' ),
            'add_new_item' => __( 'Add New Actor' ),
            'new_item_name' => __( 'New Actor Name' ),
            'separate_items_with_commas' => __( 'Separate Actors with commas' ),
            'add_or_remove_items' => __( 'Add or remove Actors' ),
            'choose_from_most_used' => __( 'Choose from the most used Actor' ),
            'not_found' => __( 'No Actor found.' ),
            'menu_name' => __( 'Actors' ),
        );

        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'public' => true,
            'publicly_queryable' => true,
            'has_archive' => true,
        );

        $actors = array( 'rewrite' => array( 'slug' => 'actors' ) );
        $movie_args = array_merge( $args, $actors  );

        register_taxonomy( 'actors', 'movie', $movie_args );
    }

    // Creating shortcode with multiple attributes
    function last_movies_by_number($atts){

        $args = shortcode_atts( array(
            'post_type' => 'movie',
            'count' => '5',
        ), $atts );

        $query_args = array(  
            'post_type' => $args['post_type'],
            'post_status' => 'publish',
            'posts_per_page' => $args['count'], 
            'orderby' => 'post_date', 
            'order' => 'DESC', 
         );
        
        $query = new WP_Query($query_args); 


        while ( $query->have_posts() ) : $query->the_post(); 
            
            $output .= 
                '<div class="container mt-4">
    				<div class="row">
                            <div class="col-md-6">
                                <article id="post-' . $query->post->ID . '">
                                    <div class="movie-title"><a href="' . $query->post->guid . '" rel="bookmark"> '. $query->post->post_title .'</a></div>

                                    <div>' . $query->post->post_content . '</div> 

                                    <div class="row">
                                        <div class="ml-2"><b>Genres:</b></div>
                                        <div class="ml-2">'. get_custom_taxonomies_icon( $query->post->ID, 'genres', 'genres_icon' ) .'</div>
                                    </div>

                                    <div class="row">
                                        <div class="ml-2"><b>Actors:</b></div>
                                        <div class="ml-2">'. get_custom_taxonomies( $query->post->ID, 'actors' ) .'</div>
                                    </div>

                                    <div class="row">
                                        <div class="ml-2"><b>Countries:</b></div>
                                        <div class="ml-2">'. get_custom_taxonomies_icon( $query->post->ID, 'countries', 'country_icon' ) .'</div>
                                    </div>
                                    
                                    <div class="row">
                                         <i class="fa fa-money ml-2 custom-icon" aria-hidden="true"></i>
                                        <div class="ml-2"><b>Budget:</b></div>
                                        <div class="ml-2">' . get_field('budget') . '</div>
                                    </div>

                                    <div class="row">
                                        <i class="fa fa-calendar ml-2 custom-icon" aria-hidden="true"></i>
                                        <div class="ml-2"><b>Released year:</b></div>
                                        <div class="ml-2">' . get_field('release_date') . '</div>
                                    </div>

                                </article>

                                <div>
                                    <hr class="section-divider">
                                </div>
                            </div>
                    	</div>
				</div>';
            
        
        endwhile;

        wp_reset_postdata();

        return $output;
    }
}

if (class_exists('Movies')) {

    $movies_cpt = new Movies();

    // Add and register the movies custom post type
    add_action('init', array( $movies_cpt, 'create_movie_cpt'));

    // Add and register Genre taxonomy
    add_action('init', array( $movies_cpt, 'create_genres_taxonomies'));

    // Add and register Contries taxonomy
    add_action('init', array( $movies_cpt, 'create_countries_taxonomies'));

    // Add and register Actors taxonomy
    add_action('init', array( $movies_cpt, 'create_actors_taxonomies'));

    register_activation_hook(__FILE__, 'rewrite_movies_flush');

    // Add a shortcode for last movies by number
    add_shortcode( 'movies-number' , array( $movies_cpt, 'last_movies_by_number'));
    
}