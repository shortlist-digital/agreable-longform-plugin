<?php

/** @var  \Herbert\Framework\Application $container */
\add_action( 'init', function() {

  $labels = array(
    'name'                => _x('Longforms', 'Post Type General Name', 'text_domain'),
    'singular_name'       => _x('Longform', 'Post Type Singular Name', 'text_domain'),
    'menu_name'           => __('Longform', 'text_domain'),
    'parent_item_colon'   => __('Parent Item:', 'text_domain'),
    'all_items'           => __('All Longforms', 'text_domain'),
    'view_item'           => __('View Longform', 'text_domain'),
    'add_new_item'        => __('Add New Longform', 'text_domain'),
    'add_new'             => __('Add New', 'text_domain'),
    'edit_item'           => __('Edit Longform', 'text_domain'),
    'update_item'         => __('Update Longform', 'text_domain'),
    'search_items'        => __('Search Longforms', 'text_domain'),
    'not_found'           => __('Not found', 'text_domain'),
    'not_found_in_trash'  => __('Not found in Trash', 'text_domain'),
  );

  $args = array(
    'label'               => __('longform post', 'text_domain'),
    'description'         => __('Beautiful editorial longreads', 'text_domain'),
    'labels'              => $labels,
    'supports'            => array('title','thumbnail','revisions','author'),
    'taxonomies'          => array('category','post_tag'),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 4,
    'menu_icon'           => 'dashicons-format-quote',
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type' => 'longform',
    'capabilities' => array(
      'publish_posts' => 'publish_longforms',
      'edit_posts' => 'edit_longforms',
      'edit_others_posts' => 'edit_others_longforms',
      'delete_posts' => 'delete_longforms',
      'delete_private_posts' => 'delete_private_longforms',
      'delete_others_posts' => 'delete_others_longforms',
      'read_private_posts' => 'read_private_longforms',
      'edit_post' => 'edit_longform',
      'delete_post' => 'delete_longform',
      'read_post' => 'read_longform',
    ),
    'map_meta_cap' => true,
    'rewrite' => false,
    'query_var' => true,
  );
  \register_post_type('longform', $args);
}
,0);
