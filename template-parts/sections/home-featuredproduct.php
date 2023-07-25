<section class="featured-product section-padding">
	<div class="container">
		<div class="featured-product__header">
			<h2 class="section-title" data-aos="fade-up"><?php echo pll__('Featured Product')?></h2>
		</div>
		<?php
		$featured_posts = get_field('choose_product');
		if( $featured_posts ): ?>
			<div class="featured-product__grid">
				<?php foreach( $featured_posts as $post ): 
					setup_postdata($post); ?>
						<?php wc_get_template_part('content', 'product');?>
				<?php endforeach; ?>
			</div>
			<?php 
			wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>