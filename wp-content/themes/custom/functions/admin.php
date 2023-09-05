<?php //úprava administrace

//odstranění nápovědy/
add_action('admin_head', 'mytheme_remove_help_tabs');
function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}

/*odstranění komentářů*/

//ať se Editor (Šéfredaktor) dostane k editaci menu + úprava admin sloupce
function hide_menu() {
	$user = wp_get_current_user();
   
	if ( in_array( 'editor', (array) $user->roles ) ) {
		
		if ( ! current_user_can( 'edit_theme_options' ) ) {
			$role_object = get_role( 'editor' );
			$role_object->add_cap( 'edit_theme_options' );
		}
		
		// Hide the Themes page
		remove_submenu_page( 'themes.php', 'themes.php' );

		// Hide the Widgets page	
		remove_submenu_page( 'themes.php', 'widgets.php' );

		// Hide the Customize page
		remove_submenu_page( 'themes.php', 'customize.php' );
		remove_submenu_page( 'themes.php', 'customize.php?return=%2Fx%2Fwp-admin%2F' ); //Vzhled - Šablony

		//Nástroje
		remove_menu_page('tools.php', 'tools.php');

		global $submenu;
		unset($submenu['themes.php'][6]);
	}
}

add_action('admin_menu', 'hide_menu', 10);


//nastavení defaultních hodnot ve WYSIWYGU při vkládání obrázku
function custom_image_size() {

    update_option('image_default_align', 'none' );
	update_option('image_default_size', 'large' );
	update_option('image_default_link_type', 'none');

}
add_action('after_setup_theme', 'custom_image_size');


//Odstranění Přizpůsobit z admin baru
add_action( 'admin_bar_menu', 'remove_some_nodes_from_admin_top_bar_menu', 999 );
function remove_some_nodes_from_admin_top_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'customize' );
}



//skrytí WP verze (jen pro uživatele)
function my_footer_shh() {
    if ( ! current_user_can('update_core') ) {
		remove_filter( 'update_footer', 'core_update_footer' );
		add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
    }
}
add_action( 'admin_menu', 'my_footer_shh' );



//přemístění boxů u The SEO frameworku
add_filter( 'the_seo_framework_show_seo_column', '__return_false' );
add_filter( 'the_seo_framework_metabox_priority', function () { return 'low'; });


//úprava dashboardu
//odstranění defaultních widgetů
function wporg_remove_all_dashboard_metaboxes() {
    remove_action( 'welcome_panel', 'wp_welcome_panel' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'health_check_status', 'dashboard', 'normal' );
    //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
}
add_action( 'wp_dashboard_setup', 'wporg_remove_all_dashboard_metaboxes' );


add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
	global $wp_meta_boxes;
	// wp_add_dashboard_widget('custom_help_widget_start', 'Welcome to the web admin', 'custom_dashboard_help');
	// wp_add_dashboard_widget('custom_help_widget_prispevky', 'Posts', 'custom_dashboard_help_prispevky');
	// wp_add_dashboard_widget('custom_help_widget_media', 'Media', 'custom_dashboard_help_media');
	// wp_add_dashboard_widget('custom_help_widget_stranky', 'Pages', 'custom_dashboard_help_stranky');
	// wp_add_dashboard_widget('custom_help_widget_kontakt', 'Contact', 'custom_dashboard_help_kontakt');
	// wp_add_dashboard_widget('custom_help_widget_vzhled', 'Appearance -> Menu', 'custom_dashboard_help_vzhled');
	// wp_add_dashboard_widget('custom_help_widget_profil', 'Profile', 'custom_dashboard_help_profil');
	// wp_add_dashboard_widget('custom_help_widget_obecne', 'General settings', 'custom_dashboard_help_obecne');
	// wp_add_dashboard_widget('custom_help_widget_dalsi', 'Other sections', 'custom_dashboard_help_dalsi');
}