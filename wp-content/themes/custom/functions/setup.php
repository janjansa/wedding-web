<?php

//načtení CSS a JS
function jpen_enqueue_assets() {
  
	//primary CSS
	// wp_enqueue_style( 'style' , get_template_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.class_implements'));   // old
  wp_enqueue_style( 'style' , get_template_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));                // new

  //odstranění css gutenbergu
  wp_dequeue_style( 'wp-block-library' );

	//primary JS
	wp_enqueue_script( 'functions' , get_template_directory_uri() . '/js/scripts.js' , array(), filemtime(get_stylesheet_directory() . '/js/scripts.js') , true );

  // add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);

  //přemístění zbytečných WP stylů z hlavičky do footeru
  // remove scripts from wp_head
  remove_action( 'wp_head', 'wp_print_scripts' );
  remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
  remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
  
  // add scripts to wp_footer
  add_action( 'wp_footer', 'wp_print_scripts', 5 );
  add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
  add_action( 'wp_footer', 'wp_print_head_scripts', 5 );

}
add_action( 'wp_enqueue_scripts' , 'jpen_enqueue_assets' );


/*základní nastavení*/
add_action( 'after_setup_theme', function () {
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'html5' );
  add_theme_support('menus'); 
  register_nav_menu('primary', 'Primary menu');
  

  add_image_size( 'thumbnail_retina', 2432, false);
  add_image_size( 'full_width', 1920, false);
  add_image_size( 'full_width_retina', 3840, false);
  add_image_size( '800x392', 800, 392);
  add_image_size( '172x86', 172, 86);



  remove_image_size( '2048x2048' );
  remove_image_size( '1536x1536' );
  
});


//pročistění WP od nepotřebných věcí
function custom_cleanup () {
  //odstranění emoji
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'emoji_svg_url', '__return_false' );
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

  /**
   * Disabled oEmbed
   */
  // Remove the REST API endpoint.
  remove_action('rest_api_init', 'wp_oembed_register_route');
  // Turn off oEmbed auto discovery.
  // Don't filter oEmbed results.
  remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
  // Remove oEmbed discovery links.
  remove_action('wp_head', 'wp_oembed_add_discovery_links');
  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action('wp_head', 'wp_oembed_add_host_js');
  // Remove the REST API lines from the HTML header
  remove_action('wp_head', 'rest_output_link_wp_head', 10);

  //pročištění <head>
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'wp_generator');
  remove_action('do_feed_rdf', 'do_feed_rdf', 10, 1);
  remove_action('do_feed_rss', 'do_feed_rss', 10, 1);
  remove_action('do_feed_rss2', 'do_feed_rss2', 10, 1);
  remove_action('do_feed_atom', 'do_feed_atom', 10, 1);
  remove_action('wp_head', 'feed_links_extra', 3 );
  remove_action('wp_head', 'feed_links', 2 );
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
  remove_action('wp_head', 'rel_canonical');
}
add_action( 'init', 'custom_cleanup' );


//fix česky pojmenovaných souborů při uploadu
function sanitize_accents ($filename) {
  return remove_accents( $filename );
}
add_filter('sanitize_file_name', 'sanitize_accents', 10);


//img-media file
function default_type_set_link( $settings ) {
  $settings['galleryDefaults']['link'] = 'file';
  return $settings;
}
add_filter('media_view_settings', 'default_type_set_link');


//odstraní verzi WP z RSS feedu
function roots_no_generator() { return ''; }
add_filter('the_generator', 'roots_no_generator');
function remove_version() {return '';}
add_filter('the_generator', 'remove_version');


//vypne emoji v tinymce
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}


//neposílat emaily adminovi po změně hesla
if ( ! function_exists( 'wp_password_change_notification' ) ) {
    function wp_password_change_notification( $user ) {
        return;
    }
}


//zákaz zmenšování obrázků od verze 5.3
add_filter( 'big_image_size_threshold', '__return_false' );





function add_type_attribute($tag, $handle, $src) {
  if ('your_handle_here' === $handle) {
      /** @var WP_Scripts $wp_scripts */
      global $wp_scripts;
      $before_handle = $wp_scripts->print_inline_script( $handle, 'before', false );
      $after_handle  = $wp_scripts->print_inline_script( $handle, 'after', false );
      if ( $before_handle ) {
          $before_handle = sprintf( "<script type='text/javascript' id='%s-js-before'>\n%s\n</script>\n", esc_attr( $handle ), $before_handle );
      }
      if ( $after_handle ) {
          $after_handle = sprintf( "<script type='text/javascript' id='%s-js-after'>\n%s\n</script>\n", esc_attr( $handle ), $after_handle );
      }
      $tag = $before_handle;
      $tag .= sprintf( "<script type='module' src='%s' id='%s-js'></script>\n", $src, esc_attr( $handle ));
      $tag .= $after_handle;
  }
  return $tag;
}