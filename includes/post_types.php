<?php

// create a post type

function post_type_products() {

    $labels = array(
        'name'                => _x( 'Products', 'Post Type General Name', 'post_types' ),
        'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'post_types' ),
        'menu_name'           => __( 'Products', 'post_types' ),
        'parent_item_colon'   => __( 'Parent Item:', 'post_types' ),
        'all_items'           => __( 'All Items', 'post_types' ),
        'view_item'           => __( 'View Item', 'post_types' ),
        'add_new_item'        => __( 'Add New Item', 'post_types' ),
        'add_new'             => __( 'Add New', 'post_types' ),
        'edit_item'           => __( 'Edit Item', 'post_types' ),
        'update_item'         => __( 'Update Item', 'post_types' ),
        'search_items'        => __( 'Search Item', 'post_types' ),
        'not_found'           => __( 'Not found', 'post_types' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'post_types' ),
    );
    $args = array(
        'label'               => __( 'Products', 'post_types' ),
        'description'         => __( 'Custom post type.', 'post_types' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'page-attributes', 'editor' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 11,
        'menu_icon'           => 'dashicons-admin-appearance',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'products', $args );

}
add_action( 'init', 'post_type_products', 0 );


function category_taxonomy_custom()  {
    $labels = array(
        'name'                       => 'Category',
        'singular_name'              => 'Category',
        'menu_name'                  => 'Category',
        'all_items'                  => 'All Category',
        'parent_item'                => 'Parent Category',
        'parent_item_colon'          => 'Parent Category:',
        'new_item_name'              => 'New Category Name',
        'add_new_item'               => 'Add New Category',
        'edit_item'                  => 'Edit Category',
        'update_item'                => 'Update Category',
        'separate_items_with_commas' => 'Separate Categories with commas',
        'search_items'               => 'Search Categories',
        'add_or_remove_items'        => 'Add or remove Categories',
        'choose_from_most_used'      => 'Choose from the most used Categories',
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'product_category', 'products', $args );
    register_taxonomy_for_object_type( 'product_category', 'products' );
}
add_action( 'init', 'category_taxonomy_custom' );



