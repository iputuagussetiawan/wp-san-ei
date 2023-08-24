<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body>
		<?php $currentLang = pll_current_language(); ?>
		<div class="spinner-container" id="loader">	
			<div class="spinner-loader"></div>
		</div>
		<header class="header">
			<div class="top-nav">
				<div class="container-fluid">
					<?php 
						wp_nav_menu(array(
							'theme_location' => 'top-nav',
							'depth'          => 3,
							'container'      => 'false',
							'menu_class'     => 'top-nav__holder',
							'add_li_class'   => 'top-nav__menu-item',
							'link_class'     => 'top-nav__menu-link',
							'fallback_cb' 	 => '__return_false',
							'walker'         => new bootstrap_5_wp_nav_menu_walker()
							)
						);
					?>
				</div>
			</div>
			<nav class="navbar navbar-expand-lg  navbar-custom">
				<div class="container-fluid bg-white">
					<div class="navbar-custom__logo-container">
						<?php
						if (function_exists('the_custom_logo')) {
							the_custom_logo();
						}
						?>
					</div>
					<div class="mobile-nav">
						<ul id="menu-secondary-navbar-id" class="mobile-nav__list">
							<li class="mobile-nav__item">
								<a class="mobile-nav__link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
									<svg class="mobile-nav__icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
										<path d="M21.3333 14.6667V9.33333C21.3333 7.91885 20.7713 6.56229 19.7712 5.5621C18.771 4.5619 17.4144 4 15.9999 4C14.5854 4 13.2289 4.5619 12.2287 5.5621C11.2285 6.56229 10.6666 7.91885 10.6666 9.33333V14.6667M6.66659 12H25.3333L26.6666 28H5.33325L6.66659 12Z" stroke="#607D8B" stroke-width="2" stroke-linecap="square"/>
									</svg>
								</a>
								<span class="mini-cart-count"> <?php echo WC()->cart->get_cart_contents_count()  ?></span>
							</li>
							<li class="mobile-nav__item"><?php echo do_shortcode('[yith_wcwl_items_count]')  ?></li>
						</ul>
						<button aria-label="navbar toggler" class="navbar-toggler navbar-custom__toggler" type="button" data-bs-toghdgle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
							<span class="burger-wrapper">
								<span id="hamburger" class="burger">
									<svg width="45" height="45" viewBox="0 0 100 100">
										<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
										<path class="line line2" d="M 20,50 H 80" />
										<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
									</svg>
								</span>
							</span>
						</button>
					</div>
					
					<div class="collapse navbar-collapse navbar-desktop">
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'primary',
								'depth'          => 3,
								'container'      => 'false',
								'menu_class'     => 'navbar-nav menu-left  me-auto mb-2 mb-lg-0',
								'fallback_cb' 	 => '__return_false',
								'walker'         => new bootstrap_5_wp_nav_menu_walker()
								)
							);
						?>
					</div>
					<div class="cart-wishlist-holder">
						<?php 
							wp_nav_menu(array(
								'theme_location' => 'secondary',
								'depth'          => 3,
								'container'      => 'false',
								'menu_class'     => 'navbar-nav menu-right mr-auto',
								'fallback_cb' 	 => '__return_false',
								'walker'         => new bootstrap_5_wp_nav_menu_walker()
								)
							);
						?>
					</div>
				</div>
				<div  id="searchform" class="search-box-container">
					<?php wc_get_template_part('product', 'searchform');?>
				</div>   
			</nav>
		</header>