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
