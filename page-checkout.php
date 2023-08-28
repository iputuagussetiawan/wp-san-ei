<?php 
/*   Template Name: Page Checkout */
get_header(); 
?>
	<section class="checkout-page <?php if( is_page(array('login', 'masuk', 'register', 'daftar', 'my-account', 'akun-saya') ) ){ echo 'login-page'; } ?> <?php if( is_page(array('my-account', 'akun-saya') ) ){ echo 'myaccount-page'; } ?>">
		<div class="container">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_content();?>
			<?php endwhile; ?>
		</div>
	</section>
<?php 
	get_template_part('templates/breadcrumb');
	get_footer(); 
?>