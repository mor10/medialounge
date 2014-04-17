<?php
/**
 * Plugin Name:  Media Taxonomies
 * Description: A simple plugin to add  taxonomies to a WordPress site. 
 * Version: 0.0.2
 * Author: Emily Carr uni
 * Author URI: http://ecuad.ca
 * License: GPL2
 */

add_action('init', 'mediaterm', 0);

function mediaterm() {
    
        // Format - hierarchical
	$labels = array(
		'name'              => _x( 'Formats', 'taxonomy general name' ),
		'singular_name'     => _x( 'Format', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Formats' ),
		'all_items'         => __( 'All Formats' ),
		'parent_item'       => __( 'Parent Format' ),
		'parent_item_colon' => __( 'Parent Format:' ),
		'edit_item'         => __( 'Edit Format' ),
		'update_item'       => __( 'Update Format' ),
		'add_new_item'      => __( 'Add New Format' ),
		'new_item_name'     => __( 'New Format Name' ),
		'menu_name'         => __( 'Format' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'format' ),
	);
        
        register_taxonomy( 'film-format', array( 'post' ), $args );

        // Genre - hierarchical
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Genres' ),
		'all_items'         => __( 'All Genres' ),
		'parent_item'       => __( 'Parent Genre' ),
		'parent_item_colon' => __( 'Parent Genre:' ),
		'edit_item'         => __( 'Edit Genre' ),
		'update_item'       => __( 'Update Genre' ),
		'add_new_item'      => __( 'Add New Genre' ),
		'new_item_name'     => __( 'New Genre Name' ),
		'menu_name'         => __( 'Genre' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);
        
        register_taxonomy( 'genre', array( 'post' ), $args );

        // Technique - hierarchical
	$labels = array(
		'name'              => _x( 'Techniques', 'taxonomy general name' ),
		'singular_name'     => _x( 'Technique', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Techniques' ),
		'all_items'         => __( 'All Techniques' ),
		'parent_item'       => __( 'Parent Technique' ),
		'parent_item_colon' => __( 'Parent Technique:' ),
		'edit_item'         => __( 'Edit Technique' ),
		'update_item'       => __( 'Update Technique' ),
		'add_new_item'      => __( 'Add New Technique' ),
		'new_item_name'     => __( 'New Technique Name' ),
		'menu_name'         => __( 'Technique' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'technique' ),
	);

	register_taxonomy( 'technique', array( 'post' ), $args );

	// Duration - hierarchical
	$labels = array(
		'name'              => _x( 'Durations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Duration', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Durations' ),
		'all_items'         => __( 'All Durations' ),
		'parent_item'       => __( 'Parent Duration' ),
		'parent_item_colon' => __( 'Parent Duration:' ),
		'edit_item'         => __( 'Edit Duration' ),
		'update_item'       => __( 'Update Duration' ),
		'add_new_item'      => __( 'Add New Duration' ),
		'new_item_name'     => __( 'New Duration Name' ),
		'menu_name'         => __( 'Duration' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'duration' ),
	);

	register_taxonomy( 'duration', array( 'post' ), $args );
    
     
     
        // Nationality - hierarchical
	$labels = array(
		'name'              => _x( 'Nationalities', 'taxonomy general name' ),
		'singular_name'     => _x( 'Nationality', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Nationalities' ),
		'all_items'         => __( 'All Nationalities' ),
		'parent_item'       => __( 'Parent Nationality' ),
		'parent_item_colon' => __( 'Parent Nationality:' ),
		'edit_item'         => __( 'Edit Nationality' ),
		'update_item'       => __( 'Update Nationality' ),
		'add_new_item'      => __( 'Add New Nationality' ),
		'new_item_name'     => __( 'New Nationality Name' ),
		'menu_name'         => __( 'Nationality' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'nationality' ),
	);

	register_taxonomy( 'nationality', array( 'post' ), $args );
        
        // Mood - non-hierarchical
        $labels = array(
		'name'                       => _x( 'Moods', 'taxonomy general name' ),
		'singular_name'              => _x( 'Mood', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Moods' ),
		'popular_items'              => __( 'Popular Moods' ),
		'all_items'                  => __( 'All Moods' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Mood' ),
		'update_item'                => __( 'Update Mood' ),
		'add_new_item'               => __( 'Add New Mood' ),
		'new_item_name'              => __( 'New Mood Name' ),
		'separate_items_with_commas' => __( 'Separate moods with commas' ),
		'add_or_remove_items'        => __( 'Add or remove moods' ),
		'choose_from_most_used'      => __( 'Choose from the most used moods' ),
		'not_found'                  => __( 'No moods found.' ),
		'menu_name'                  => __( 'Moods' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'mood' ),
	);

	register_taxonomy( 'mood', 'post', $args );

}