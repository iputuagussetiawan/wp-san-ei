<?php

function script_enqueue() {
	$themeVersion = wp_get_theme()->get('Version');

	/* Css */
	wp_enqueue_style('layout', get_stylesheet_directory_uri().'/assets/css/layout.css', array(), $themeVersion, 'all');
	wp_enqueue_script('layout', get_stylesheet_directory_uri().'/assets/js/layout.js', array(), $themeVersion, true);
	// wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');


  	//CSS JS FOR HOME
	if( is_front_page() ){
		wp_enqueue_style('home', get_stylesheet_directory_uri().'/assets/css/home.css', array(), $themeVersion, 'all');
		wp_enqueue_script('home', get_stylesheet_directory_uri().'/assets/js/home.js', array(), $themeVersion, true);
	}
	if (is_page_template('page-login.php')) {
        //wp_enqueue_style('login_css', get_stylesheet_directory_uri() . '/assets/css/pages/login.css', array(), $themeVersion, 'all');
        wp_enqueue_script('login_js', get_stylesheet_directory_uri() . '/assets/js/login.js', array(), $themeVersion, true);
    }
	if (is_page_template('page-register.php')) {
        wp_enqueue_style('register_css', get_stylesheet_directory_uri() . '/assets/css/register.css', array(), $themeVersion, 'all');
        wp_enqueue_script('register_js', get_stylesheet_directory_uri() . '/assets/js/register.js', array(), $themeVersion, true);
    }
	if (is_page_template('page-login.php')) {
        wp_enqueue_style('login_css', get_stylesheet_directory_uri() . '/assets/css/login.css', array(), $themeVersion, 'all');
       // wp_enqueue_script('login_js', get_stylesheet_directory_uri() . '/assets/js/register.js', array(), $themeVersion, true);
    }
	if (is_page_template('page-myaccount.php')) {
        wp_enqueue_style('myaccount', get_stylesheet_directory_uri() . '/assets/css/my-account.css', array(), $themeVersion, 'all');
        wp_enqueue_script('myaccount', get_stylesheet_directory_uri() . '/assets/js/myaccount.js', array(), $themeVersion, true);
    }

	if (is_page_template('page-wishlist.php')) {
        wp_enqueue_style('wishlist', get_stylesheet_directory_uri() . '/assets/css/wishlist.css', array(), $themeVersion, 'all');
        //wp_enqueue_script('wishlist', get_stylesheet_directory_uri() . '/assets/js/wishlist.js', array(), $themeVersion, true);
    }

	if (is_page_template('page-cart.php')) {
        wp_enqueue_style('cart', get_stylesheet_directory_uri() . '/assets/css/cart.css', array(), $themeVersion, 'all');
    }

	if (is_page_template('page-checkout.php')) {
        wp_enqueue_style('checkout', get_stylesheet_directory_uri() . '/assets/css/checkout.css', array(), $themeVersion, 'all');
		wp_enqueue_script('checkout', get_stylesheet_directory_uri() . '/assets/js/checkout.js', array(), $themeVersion, true);
    }

  	// // ABOUT PAGE
  	// if( is_page(array('design', 'disain', 'system', 'sistem', 'process-qc', 'proses-kualitas-kontrol', 'public-good', 'barang-publik', 'progressive-market', 'pasar-progresif', 'philosophy', 'filosofi') ) ){
	//     wp_enqueue_style('about-us', get_stylesheet_directory_uri().'/dist/about-us.css', array(), '1.0.0', 'all');
	//     wp_enqueue_script('about-us', get_stylesheet_directory_uri().'/dist/about-us.js', array(), '1.0.0', true);
  	// }

  	// // CATALOGS PAGE
  	// if( is_page(array('catalogs', 'katalog', 'newsletter') ) ){
	//     wp_enqueue_style('catalogs', get_stylesheet_directory_uri().'/dist/catalogs.css', array(), '1.0.0', 'all');
	//     wp_enqueue_script('catalogs', get_stylesheet_directory_uri().'/dist/catalogs.js', array(), '1.0.0', true);
  	// }

  	// // HOW TO FIX PAGE
  	// if( is_page(array('how-to-fix', 'cara-memperbaiki') ) ){
	//     wp_enqueue_style('how-to-fix', get_stylesheet_directory_uri().'/dist/how-to-fix.css', array(), '1.0.0', 'all');
	//     wp_enqueue_script('how-to-fix', get_stylesheet_directory_uri().'/dist/how-to-fix.js', array(), '1.0.0', true);
  	// }

  	// // FIND US
  	// if( is_page(array('find-us', 'temukan-kami') ) ){
	//     wp_enqueue_style('find-us', get_stylesheet_directory_uri().'/dist/find-us.css', array(), '1.0.0', 'all');
	//     wp_enqueue_script('find-us', get_stylesheet_directory_uri().'/dist/find-us.js', array(), '1.0.0', true);
  	// }
}
add_action('wp_enqueue_scripts', 'script_enqueue');