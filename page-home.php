<?php
/*   Template Name: Page Home */
$currentLang = pll_current_language();
get_header();
?>
<main>
	<?php
        get_template_part('template-parts/sections/home', 'banner');
		get_template_part('template-parts/sections/home', 'categories');
		get_template_part('template-parts/sections/home', 'about');
    ?>
</main>
<section class="featured-product">
	<div class="container">
		<h2 class="title-section" data-aos="fade-up"><?php echo pll__('Featured Product')?></h2>
		<?php
		$featured_posts = get_field('choose_product');
		if( $featured_posts ): ?>
		    <div class="row">
		    <?php foreach( $featured_posts as $post ): 

		        // Setup this post for WP functions (variable must be named $post).
		        setup_postdata($post); ?>
		        <div class="col-lg-3 col-md-4 col-sm-6 col-6 product-list" data-aos="fade-up">
		       		<?php wc_get_template_part('content', 'product');?>
		       	</div>
		    <?php endforeach; ?>
		    </div>
		    <?php 
		    // Reset the global post object so that the rest of the page works correctly.
		    wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</section>
<section class="other-link">
	<div class="container-fluid">
		<?php if( have_rows('other_link') ): ?>
		<div class="row">
			<?php while( have_rows('other_link') ): the_row(); 
      				$image = get_sub_field('other_link_image');
        	?>
			<div class="col-md-4 col-sm-6 col-12" data-aos="fade-up">
				<div class="box-other-link">
					<a href="<?php the_sub_field('other_link_url'); ?>">
						<div class="img-holder img-zoom">
							<picture>
		                        <source media="(max-width: 767px)" srcset="<?php echo esc_url($image['sizes']['medium_large']) ?>">
		                        <img height="620" width="609" class="img-fluid" src="<?php echo esc_url($image['sizes']['large']) ?>" alt="<?php the_sub_field('other_link_title'); ?>"/>
		                    </picture>
						</div>
						<h3 class="other-link-title"><?php the_sub_field('other_link_title'); ?></h3>
					</a>
					<div class="btn-holder">
						<a href="<?php the_sub_field('other_link_url'); ?>" class="btn-standard"><?php echo pll__('discover')?></a>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
      	<?php endif; ?>
	</div>
</section>
<?php
get_footer();
?>
