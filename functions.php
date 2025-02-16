<?php

// adding the CSS and JS files

function gt_setup(){
    wp_enqueue_style('google-fonts', "//fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
    wp_enqueue_style('fontawesome', "path/to/font-awesome/css/font-awesome.min.css");
    wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), "all");
    wp_enqueue_script('main', get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'gt_setup');

// Add Theme Support

function gt_init(){
    add_theme_support('post-thumbnails');
    add_theme_support('excerpt');
    add_theme_support('title-tag');
    add_theme_support('html5', 
        array('comment-list', 'comment-form', 'search-form')
    );
}
add_action('after_setup_theme', 'gt_init');


// Projects Post Type

function gt_custom_post_type(){
    register_post_type(
        'projects',
        array(
            'rewrite' => array('slug' => 'projects'),
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new' => 'Add New Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project'
            ),
            'menu_icon' => 'dashicons-clipboard',
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'excerpt',
                'comments'
            )
        )
    );
}

add_action('init', 'gt_custom_post_type');

