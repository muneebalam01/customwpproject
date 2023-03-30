<?php
// Register Custom Post Type courses
function create_courses_cpt() {

	$labels = array(
		'name' => _x( 'courses', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'courses', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'courses', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'courses', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'courses Archives', 'textdomain' ),
		'attributes' => __( 'courses Attributes', 'textdomain' ),
		'parent_item_colon' => __( 'Parent courses:', 'textdomain' ),
		'all_items' => __( 'All courses', 'textdomain' ),
		'add_new_item' => __( 'Add New courses', 'textdomain' ),
		'add_new' => __( 'Add New', 'textdomain' ),
		'new_item' => __( 'New courses', 'textdomain' ),
		'edit_item' => __( 'Edit courses', 'textdomain' ),
		'update_item' => __( 'Update courses', 'textdomain' ),
		'view_item' => __( 'View courses', 'textdomain' ),
		'view_items' => __( 'View courses', 'textdomain' ),
		'search_items' => __( 'Search courses', 'textdomain' ),
		'not_found' => __( 'Not found', 'textdomain' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
		'featured_image' => __( 'Featured Image', 'textdomain' ),
		'set_featured_image' => __( 'Set featured image', 'textdomain' ),
		'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
		'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
		'insert_into_item' => __( 'Insert into courses', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this courses', 'textdomain' ),
		'items_list' => __( 'courses list', 'textdomain' ),
		'items_list_navigation' => __( 'courses list navigation', 'textdomain' ),
		'filter_items_list' => __( 'Filter courses list', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'courses', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-media-default',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'courses', $args );

}
add_action( 'init', 'create_courses_cpt', 0 );