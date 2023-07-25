<section class="other-link section-padding">
	<div class="container-fluid">
		<?php if( have_rows('other_link') ): ?>
		<div class="other-link__grid">
			<?php while( have_rows('other_link') ): the_row(); 
					$image = get_sub_field('other_link_image');
			?>
				<div class="card-otherlink">
					<a href="<?php the_sub_field('other_link_url'); ?>">
						<div class="card-otherlink__image-container">
							<picture>
								<source media="(max-width: 767px)" srcset="<?php echo esc_url($image['sizes']['medium_large']) ?>">
								<img  height="620" width="609" class="card-otherlink__image" src="<?php echo esc_url($image['sizes']['large']) ?>" alt="<?php the_sub_field('other_link_title'); ?>"/>
							</picture>
						</div>
						<h3 class="card-otherlink__title"><?php the_sub_field('other_link_title'); ?></h3>
					</a>
					<div class="card-otherlink__action">
						<a href="<?php the_sub_field('other_link_url'); ?>" class="btn-standard--white"><?php echo pll__('discover')?></a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>