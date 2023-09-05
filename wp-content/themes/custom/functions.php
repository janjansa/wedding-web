<?php

require_once (trailingslashit( get_template_directory() ) . 'functions/setup.php');
require_once (trailingslashit( get_template_directory() ) . 'functions/admin.php');
require_once (trailingslashit( get_template_directory() ) . 'functions/cpt.php');
require_once (trailingslashit( get_template_directory() ) . 'functions/acf.php');
require_once (trailingslashit( get_template_directory() ) . 'functions/custom.php');

// function project_post_type(){
//     $args = array(

//         'labels' => array(
//             'name' => 'Projects',
//             'singular_name' => 'Project',
//         ),
//         // 'hierarchical' => true,
//         'public' => true,
//         'has_archive' => true,
//         'menu_icon' => 'dashicons-format-aside',
//         'supports' => array('title', 'thumbnail', 'slug'),
//         // 'taxonomies' => array('category'),
//     );

//     register_post_type('projects', $args);
// }

function case_studies_post_type(){
    $args = array(

        'labels' => array(
            'name' => 'Case-Studies',
            'singular_name' => 'Case-Study',
        ),
        // 'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array('title', 'thumbnail', 'slug'),
        'rewrite' => array('slug' => 'o-studio'),
        // 'taxonomies' => array('category'),
    );

    register_post_type('casestudy', $args);
}


function case_studies_archive_create_acf_pages() {
  if(function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
      'page_title'      => 'o.studio Settings',
      'parent_slug'     => 'edit.php?post_type=casestudy', /* Change "services" to fit your situation */
      'capability' => 'manage_options'
    ));
  }
}

function blog_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Blog',
            'singular_name' => 'Blog Post',
        ),
        // 'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array('title', 'thumbnail', 'slug'),
        'taxonomies' => array('blog_category'),
        'rewrite' => array('slug' => 'o-digest'),
        // 'show_in_rest' => true,
    );
    register_post_type('blog', $args);

    $taxonomy_args = array(
      'labels' => array(
          'name' => 'Blog Categories',
          'singular_name' => 'Blog Category',
      ),
      'public' => true,
      'hierarchical' => true,
  );

  register_taxonomy('blog_category', 'blog', $taxonomy_args);
}
function blog_archive_create_acf_pages() {
  if(function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
      'page_title'      => 'o.digest Settings',
      'parent_slug'     => 'edit.php?post_type=blog', /* Change "services" to fit your situation */
      'capability' => 'manage_options'
    ));
  }
}


function job_listing_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Job-listings',
            'singular_name' => 'Job-listing',
        ),
        // 'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'supports' => array('title', 'thumbnail', 'slug'),
        'taxonomies' => array('category'),
        'rewrite' => array('slug' => 'o-selected'),
        // 'show_in_rest' => true,
    );
    register_post_type('job-listing', $args);
}
function job_listing_archive_create_acf_pages() {
  if(function_exists('acf_add_options_page')) {
    acf_add_options_sub_page(array(
      'page_title'      => 'o.selected Settings',
      'parent_slug'     => 'edit.php?post_type=job-listing', /* Change "services" to fit your situation */
      'capability' => 'manage_options'
    ));
  }
}

add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );
function my_myme_types( $mime_types ) {
    // $mime_types['glb'] = 'model/gltf-binary';
    $mime_types['webp'] = 'image/webp';
    $mime_types['svg'] = 'image/svg';
    return $mime_types;
}

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// add_action('init', 'project_post_type');
add_action('init', 'case_studies_post_type');
add_action('init', 'case_studies_archive_create_acf_pages');
add_action('init', 'blog_post_type');
add_action('init', 'blog_archive_create_acf_pages');
add_action('init', 'job_listing_post_type');
add_action('init', 'job_listing_archive_create_acf_pages');
add_post_type_support( 'post', 'excerpt' );
add_action( 'admin_menu', 'remove_default_post_type' );


// Add the Blog Categories column to the admin screen before the date column
function add_blog_categories_column($columns) {
  $new_columns = array();
  foreach ($columns as $key => $value) {
      if ($key === 'date') {
          $new_columns['blog_categories'] = 'Blog Categories';
      }
      $new_columns[$key] = $value;
  }
  return $new_columns;
}
add_filter('manage_edit-blog_columns', 'add_blog_categories_column');

// Display the assigned categories in the Blog Categories column
function display_blog_categories_column($column, $post_id) {
  if ($column === 'blog_categories') {
      $terms = get_the_terms($post_id, 'blog_category'); // Replace 'blog_category' with your custom taxonomy slug

      if (!empty($terms)) {
          $categories = array();

          foreach ($terms as $term) {
              $categories[] = '<a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a>';
          }

          echo implode(', ', $categories);
      }
  }
}
add_action('manage_blog_posts_custom_column', 'display_blog_categories_column', 10, 2);

// Adjust the column position and spacing using CSS
function adjust_columns_position() {
  echo '<style>.column-blog_categories { width: 15%;}</style>';
  echo '<style>.column-blog_categories ~ .column-date { position: relative; left: auto; }</style>';
  echo '<style>.fixed .column-blog_categories { text-align: left; }</style>';
}
add_action('admin_head', 'adjust_columns_position');


add_filter( 'wpcf7_special_mail_tags', 'custom_wpcf7_special_mail_tag', 10, 3 );
function custom_wpcf7_special_mail_tag( $output, $name, $html ) {
    global $post;
    if ( '_site_title' == $name ) {
        $output = get_bloginfo( 'name' );
    } elseif ( '_page_title' == $name ) {
      $output = $post->ID;
    }
    return $output;
}