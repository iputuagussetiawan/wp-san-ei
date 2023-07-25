<?php 
get_header(); 
$currentLang = pll_current_language(); 
wp_enqueue_style('woocommerce-custom', get_stylesheet_directory_uri().'/dist/woocommerce-custom.css', array(), '1.0.0', 'all');
?>


<section class="default-page <?php if( is_page(array('login', 'masuk', 'register', 'daftar', 'my-account', 'akun-saya') ) ){ echo 'login-page'; } ?> <?php if( is_page(array('my-account', 'akun-saya') ) ){ echo 'myaccount-page'; } ?>">
	<div class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

			<?php the_content();?>

		<?php endwhile; ?>
	</div>
</section>


<?php get_template_part('templates/breadcrumb') ?>

<?php 
wp_enqueue_script('woocommerce-custom', get_stylesheet_directory_uri().'/dist/woocommerce-custom.js', array(), '1.0.0', true);
get_footer(); 
?>