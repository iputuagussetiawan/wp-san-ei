		<?php $currentLang = pll_current_language(); ?>
		<footer class="footer section-padding--top">
			<div class="container">
				<div class="footer__grid">
					<div class="footer__widget">
						<div class="footer__logo-container">
							<a href="<?php if ($currentLang=='en') {?>
								<?php echo get_option("siteurl"); ?>
								<?php } elseif ($currentLang=='id') { ?>
									<?php echo get_option("siteurl"); ?>/id
								<?php } ?>">
								<img class="footer__logo" src="<?php the_field('main_logo', 'option'); ?>" alt="San-Ei">
							</a>
						</div>
						<div class="footer__info">
							<?php if ($currentLang=='en') {?>
								<?php the_field('footer_description', 'option'); ?>
							<?php } elseif ($currentLang=='id') { ?>
								<?php the_field('footer_description_id', 'option'); ?>
							<?php } ?>
						</div>
					</div>
					<div class="footer__widget">
						<h6 class="footer__widget-title"><?php echo pll__('Contact')?></h6>
						<div class="footer__contact">
							<div class="footer__contact-label"><?php echo pll__('Phone')?></div>
							<?php if( have_rows('footer_phone', 'option') ): ?>
							<ul class="footer__contact-list">
								<?php while( have_rows('footer_phone', 'option') ): the_row(); ?>
								<li class="footer__contact-item"><a class="footer__contact-link" href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_text'); ?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
						<div class="footer__contact">
							<div class="footer__contact-label">Fax</div>
							<?php if( have_rows('footer_fax', 'option') ): ?>
							<ul class="footer__contact-list">
								<?php while( have_rows('footer_fax', 'option') ): the_row(); ?>
								<li  class="footer__contact-item"><a class="footer__contact-link" href="fax:<?php the_sub_field('fax_number'); ?>"><?php the_sub_field('fax_text'); ?></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
					<div class="footer__widget">
						<h6 class="footer__widget-title"><?php echo pll__('Products')?></h6>
						<ul class="footer-menu">
							<?php 
								$cat_args = array(
									'orderby'    	=> 'name',
									'order'      	=> 'asc',
									'hide_empty' 	=> false,
									'parent' 		=> 0
								);
								$product_categories = get_terms('product_cat', $cat_args);
								foreach ($product_categories as $category) {
								?>
									<li class="footer-menu__item"><a class="footer-menu__link" href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->name ?></a></li>
								<?php
								}
							?>
						</ul>
					</div>
				</div>
				<div class="footer__copyright">
						<div class="footer__copyright-left">
							<?php 
								echo get_template_part('template-parts/components/social', 'icons');
							?>	
							<!-- <?php if( have_rows('social_media', 'option') ): ?>
							<ul class="social-media">
								<?php while( have_rows('social_media', 'option') ): the_row(); ?>
								<li><a href="<?php the_sub_field('sosmed_url'); ?>" target="_blank"><img src="<?php the_sub_field('sosmed_icon'); ?>" alt="<?php the_sub_field('title');?>"></a></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?> -->
						</div>
						<div class="footer__copyright-right">
							<p class="footer__copyright-text">Copyright © <?php echo date('Y') ?> SAN-EI Indonesia. All Rights Reserved. 
								<?php if( is_front_page() ){ ?>
									 <a class="footer__copyright-link" href="https://timedoor.net/" target="_blank"> Powered by PT. Timedoor Indonesia.</a>
								<?php } else { ?>
									Powered by PT. Timedoor Indonesia
								<?php } ?>
							</p>
						</div>
				</div>
			</div>
		</footer>
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
			<div class="offcanvas-header">
				<h5 id="offcanvasRightLabel">Offcanvas right</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<div class="widget woocommerce widget_shopping_cart">
					<div class="widget_shopping_cart_content">
						<?php echo woocommerce_mini_cart() ?>
					</div>
				</div>
			</div>
		</div>
		<!-- MINI CART -->
		<!-- <div class="modal fade mini-cart-modal" id="mini-cart-window" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="header-holder">
							<h5 class="modal-title"><?php echo pll__('Shopping Cart');?></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
					</div>
					<div class="modal-body">
						<div class="widget woocommerce widget_shopping_cart">
							<div class="widget_shopping_cart_content">
								<?php echo woocommerce_mini_cart() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- <div class="floating-wa">
			<a href="https://api.whatsapp.com/send?phone=<?php if( have_rows('footer_whatsapp', 'option') ): ?>
				<?php while( have_rows('footer_whatsapp', 'option') ): the_row(); ?>
					<?php the_sub_field('whatsapp_number'); ?>
				<?php endwhile; ?>
			<?php endif; ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon/whatsapp.svg'?>" alt="whatsapp"><span> <?php echo pll__('Lets Chat')?></span></a>
		</div> -->
		<div class="scroll-up">
			<span class="scroll-up__text"><?php echo pll__('Scroll To top')?></span>
			<svg class="scroll-up__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path d="M12 3L12 21M5 10L12 3L5 10ZM12 3L19 10L12 3Z" stroke="#607D8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>