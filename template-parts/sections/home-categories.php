<section class="home-categories section-padding">
	<div class="container">
		<div class="home-categories__header">
			<h2 class="section-title"><?php echo pll__('premium series')?></h2>
			<div class="home-categories__action">
				<a class="btn-standard" href="
				<?php if ($currentLang=='en') {?>
					<?php the_field('product_categories_en', 'option') ?>
				<?php } elseif ($currentLang=='id') { ?>
					<?php the_field('product_categories_en', 'option') ?>
				<?php } ?>
				">
				<?php echo pll__('more categories')?></a>
			</div>
		</div>
		<div class="home-categories__grid">
			<?php 
				$categoryID = get_field('select_category');
				$cat_args = array(
					'order'      	=> 'asc',
					'hide_empty' 	=> false,
					'parent'     	=> $categoryID->term_id,
					'number'     	=> 7
				);
				$product_categories = get_terms('product_cat', $cat_args);
				foreach ($product_categories as $category) {
					$catId	= $category->taxonomy . '_' . $category->term_id;
					$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
					$image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
					$imageThumb = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );
					$logoCat = get_field('cat_logo', $catId, 'full');
					?>
						<a class="card-category" href="../category/<?php echo $categoryID->slug; ?>/?swoof=1&product_cat=<?php echo $category->slug; ?>&really_curr_tax=<?php echo $categoryID->term_id; ?>-product_cat">
							<div class="card-category__image-container">
								<picture>
									<source media="(max-width: 767px)" srcset="<?php echo $imageThumb[0]; ?>">
									<img class="card-category__image" height="1024" width="683" src="<?php echo $image[0]; ?>" alt="<?php echo $category->name ?>"/>
								</picture>
							</div>
							<div class="card-category__logo-container">
								<img class="card-category__logo" height="23" width="186" src="<?php echo esc_url($logoCat['url']); ?>" alt="<?php echo $category->name ?>">
								<h3 class="card-category__logo-text"><?php echo $category->name ?></h3>
							</div>
						</a>
					<?php
				}
			?>
		</div>
		<div class="d-lg-none text-center">
			<a class="btn-standard" href="
			<?php if ($currentLang=='en') {?>
				<?php the_field('product_categories_en', 'option') ?>
			<?php } elseif ($currentLang=='id') { ?>
				<?php the_field('product_categories_id', 'option') ?>
			<?php } ?>
			"><?php echo pll__('more categories')?></a>
		</div>
	</div>
</section> 