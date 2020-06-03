<?php

    // An action which will make the child to get the parent styles on enqueue script
    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

    // A function to enqueue parent styles
    function enqueue_parent_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }

    function add_movies_cpt_query($query) {
        if (is_home() && $query->is_main_query())
            $query->set('post_type', array('post', 'page', 'movies'));
            return $query;
    }

    add_action('pre_get_posts', 'add_movies_cpt_query');


    /**
	 * A function for getting the custom taxonomies and create a link for grouping.
    */

    function get_custom_taxonomies($postID, $term){
        
        $terms_list = wp_get_post_terms($postID, $term); 
        $output = '';
        
        $i = 0;
        foreach( $terms_list as $term ){ 
            $i++;
            if ( $i > 1 ) { 
                $output .= ', '; 
            }

            $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
        }

        return $output;
    }

    /**
	 * A function to have only 4 posts per page.
    */

    function custom_posts_per_page( $query ) {
        if ( $query->is_archive('movie') ) {
            set_query_var('posts_per_page', 4);
        }
    }

    add_action( 'pre_get_posts', 'custom_posts_per_page' );