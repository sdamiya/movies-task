<?php

    // A function to enqueue parent styles
    function enqueue_parent_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    }

    // An action which will make the child to get the parent styles on enqueue script
    add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

?>
