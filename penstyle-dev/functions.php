<?php
    function penstyle_styles(){

        // wp_register_style('bxslider', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), true);
        // wp_enqueue_style('bxslider');
        wp_register_style('main-style', get_template_directory_uri().'/assets/css/main.css', array(), true);
        wp_enqueue_style('main-style');

        wp_deregister_script( 'jquery' );
        wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', true );
        wp_enqueue_script( 'popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true );
        wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true );
        wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/af8546367a.js', array(), '4.4.1', false );
        wp_enqueue_script( 'bxslider', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', false );
        wp_enqueue_script( 'mainjs', get_template_directory_uri().'/assets/js/main.min.js', array(), '1.0.0', false );
    }
    add_action('wp_enqueue_scripts', 'penstyle_styles');
?>