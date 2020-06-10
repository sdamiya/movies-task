<?php

    // // An action which will make the child to get the parent styles on enqueue script
    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

    // A function to enqueue parent styles
    function enqueue_parent_styles() {
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css', microtime());
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', microtime());
    }

  

    
    /**
	 * A function to add the custom post type to the main query.
    */

    function add_movies_cpt_query($query) {
        if (is_home() && $query->is_main_query())
            $query->set('post_type', array('post', 'page', 'movies'));
            return $query;
    }

    add_action('pre_get_posts', 'add_movies_cpt_query');


    /**
	 * A function for getting the custom taxonomies and create a link for grouping.
    */

    function get_custom_taxonomies_icon($postID, $term, $field_name){
        $terms_list = wp_get_post_terms($postID, $term); 
        $output = '';
        
        $i = 0;
        foreach( $terms_list as $term ){ 
            $i++;
            $term_field = $term->taxonomy . '_' . $term->term_id;
            $term_icon = get_field($field_name, $term_field);
            
            if ( $i > 1 ) { 
                $output .= ' '; 
            }

            $output .= '<a href="' . get_term_link( $term ) . '"><img src="' . $term_icon['url'] . '"></a>';
        }

        return $output;
    }

    /**
	 * A function for getting the custom taxonomies name only.
    */

    function get_custom_taxonomies($postID, $term){
        $terms_list = wp_get_post_terms($postID, $term); 
        $output = '';
        
        $i = 0;
        foreach( $terms_list as $term ){ 
            $i++;
            $term_field = $term->taxonomy . '_' . $term->term_id;
            $term_icon = get_field('genres_icon', $term_field);
            
            if ( $i > 1 ) { 
                $output .= ', '; 
            }

            $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
        }

        return $output;
    }

    /**
	 * A filter to split the content into two parts.
    */

    function split_content($article) {
        return $article;
    }

    add_filter('split-hook', 'split_content');