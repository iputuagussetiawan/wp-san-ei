<?php 

if ( function_exists('acf_add_options_page') ) {

	/*OPTION SETTING*/
	acf_add_options_page(array(
		'page_title'  => 'Options',
		'menu_title'  => 'Options',
		'menu_slug'   => 'option_setting',
		'capability'  => 'edit_posts',
		'redirect'    => true,
		'post_id'     => 'Options',
		'icon_url'    => 'dashicons-admin-generic',
		'position'    => '101'
	));

	acf_add_options_page(array(
        'page_title' => 'Profile Info',
        'menu_title' => 'Profile Info',
        'menu_slug' => 'company-setting',
        'post_id' => 'company-setting',
        'capability' => 'edit_posts',
        'redirect' => true,
        'icon_url' => 'dashicons-building',
        'position' => '3'
    ));

	acf_add_options_page(array(
        'page_title' => 'Page Link',
        'menu_title' => 'Page Link',
        'menu_slug' => 'page-link',
        'post_id' => 'page_link',
        'capability' => 'edit_posts',
        'redirect' => true,
        'icon_url' => 'dashicons-cloud-saved',
        'position' => '3'
    ));
}