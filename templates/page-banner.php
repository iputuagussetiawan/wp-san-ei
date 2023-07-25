<?php $currentLang = pll_current_language(); ?> 
<section class="page-banner">
    <?php $image = get_field('banner_image'); ?>
	<div class="box-banner" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
		<div class="container">
			<h1 class="title-banner" data-aos="fade-up"><?php the_field('title_page'); ?></h1>
		</div>
	</div>
</section>