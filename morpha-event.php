<?php
/*
Plugin Name: Morpha Event
Plugin URI: http://www.morphaworks.com
Description: Event management for Dunamis Human Capital
Version: 1.0
Author: @rahmatawaludin
Author URI: http://twitter.com/rahmatawaludin
License: GPL
*/

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/

// Register Custom Post Type
function morpha_event_create_post_type() {

    $labels = array(
        'name'                => _x( 'Events', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Events', 'text_domain' ),
        'parent_item_colon'   => __( 'Parent Event:', 'text_domain' ),
        'all_items'           => __( 'All Events', 'text_domain' ),
        'view_item'           => __( 'View Event', 'text_domain' ),
        'add_new_item'        => __( 'Add New Event', 'text_domain' ),
        'add_new'             => __( 'Add Event', 'text_domain' ),
        'edit_item'           => __( 'Edit Event', 'text_domain' ),
        'update_item'         => __( 'Update Event', 'text_domain' ),
        'search_items'        => __( 'Search Event', 'text_domain' ),
        'not_found'           => __( 'Event not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Event not found in Trash', 'text_domain' ),
    );
    $args = array(
        'label'               => __( 'morpha_event', 'text_domain' ),
        'description'         => __( 'Event', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'custom-fields', 'page-attributes', ),
        'taxonomies'          => array( 'category' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => '',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'morpha_event', $args );

}

// Hook into the 'init' action
add_action( 'init', 'morpha_event_create_post_type', 0 );
?>