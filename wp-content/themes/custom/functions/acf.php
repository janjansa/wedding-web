<?php //úpravy týkající se ACF

//nastavení options stránek
if (function_exists('acf_add_options_page')) {

    // acf_add_options_page(array(
    //     'page_title'    => 'Base settings',
    //     'menu_title'    => 'Base settings',
    //     'menu_slug'     => 'nastaveni',
    //     'capability'    => 'edit_posts',
    //     'redirect'      => false
    // ));

    acf_add_options_page(array(
        'page_title'    => 'Pages settings',
        'menu_title'    => 'Pages settings',
        'menu_slug'     => 'nastaveni',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => '23.325',
    ));


    acf_add_options_sub_page(array(
        'page_title'    => 'Navbar',
        'menu_title'    => 'Navbar',
        'parent_slug'   => 'nastaveni',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Header',
        'menu_title'    => 'Header',
        'parent_slug'   => 'nastaveni',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Footer',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'nastaveni',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => '404',
        'menu_title'    => '404',
        'parent_slug'   => 'nastaveni',
    ));

}

//doporučené zrychlení ACF dle dokumentace
add_filter('acf/settings/remove_wp_meta_box', '__return_true');