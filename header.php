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
				<div class="container-fluid">
					<a class="navbar-brand" href="
						<?php if ($currentLang=='en') {?>
							<?php echo get_option("siteurl"); ?>
						<?php } elseif ($currentLang=='id') { ?>
							<?php echo get_option("siteurl"); ?>/id
						<?php } ?>
					">
						<img src="<?php echo get_stylesheet_directory_uri() . '/images/logo.svg'?>" alt="Brand Logo">
					</a>
				
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</button>
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
				<!-- <div  id="searchform">
					<?php wc_get_template_part('product', 'searchform');?>
				</div>    -->
			</nav>
		</header>