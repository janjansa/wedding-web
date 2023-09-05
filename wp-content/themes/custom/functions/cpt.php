<?php //registrace CPT v případě potřeby; níže jsou ukázkové funkce

/*function cpt_product() {
  $labels = array(
    'name'                => _x( 'Produkt', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Produkt', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Produkty', 'text_domain' ),
    'name_admin_bar'      => __( 'Produkty', 'text_domain' ),
    'parent_item_colon'   => __( 'Nadřazené produkty:', 'text_domain' ),
    'all_items'           => __( 'Všechny produkty', 'text_domain' ),
    'add_new_item'        => __( 'Přidat nové produkty', 'text_domain' ),
    'add_new'             => __( 'Nový produkt', 'text_domain' ),
    'new_item'            => __( 'Nový produkt', 'text_domain' ),
    'edit_item'           => __( 'Upravit produkt', 'text_domain' ),
    'update_item'         => __( 'Upravit produkt', 'text_domain' ),
    'view_item'           => __( 'Zobrazit produkt', 'text_domain' ),
    'search_items'        => __( 'Hledat produkt', 'text_domain' ),
    'not_found'           => __( 'Nenalezeno', 'text_domain' ),
    'not_found_in_trash'  => __( 'Nenalezeno v koši', 'text_domain' ),
  );

  $args = array(
    'label'               => __( 'Produkt', 'text_domain' ),
    'description'         => __( 'Produkt', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array('thumbnail'),
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => false,
    'exclude_from_search' => false,
    'menu_icon'           => 'dashicons-plus',
  );
  register_post_type( 'product', $args );
}
add_action( 'init', 'cpt_product', 0 );*/


// CPT taxonomie/

/*function my_taxonomies_product() {
  $labels = array(
    'name'              => _x( 'Product Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Product Categories' ),
    'all_items'         => __( 'All Product Categories' ),
    'parent_item'       => __( 'Parent Product Category' ),
    'parent_item_colon' => __( 'Parent Product Category:' ),
    'edit_item'         => __( 'Edit Product Category' ), 
    'update_item'       => __( 'Update Product Category' ),
    'add_new_item'      => __( 'Add New Product Category' ),
    'new_item_name'     => __( 'New Product Category' ),
    'menu_name'         => __( 'Product Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_admin_column' => true,
    'has_archive' => true,
  );
  register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );*/