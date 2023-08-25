<?php $currentLang = pll_current_language(); ?> 
<section class="about-section">
	<div class="container">
		<h2 class="title-section" data-aos="fade-up"><?php echo pll__('About Us')?></h2>
		<div class="row">
			<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => 57,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			);
			$parent = new WP_Query( $args );
			if ( $parent->have_posts() ) : ?>
				<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
					<div class="col-md-6 col-6 about-list" data-aos="fade-up">
						<a href="<?php the_permalink(); ?>">
							<div class="img-holder img-zoom">
								<?php $image = get_field('banner_image'); ?>
								<img width="490" height="460" class="img-fit" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_title(); ?>">
							</div>
							<h3 class="title-child-about"><?php the_field('title_page'); ?></h3>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; wp_reset_postdata(); ?>
		</div>
	</div>
</section>