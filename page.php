<?php 
get_header(); 
$currentLang = pll_current_language(); 
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

get_footer(); 
?>