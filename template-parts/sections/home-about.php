<section class="home-about section-padding">
	<div class="container">
		<div class="home-about__grid">
			<div class="home-about__info-container">
				<h2 class="section-title"><?php the_field('title_section'); ?></h2>
				<div class="section-content">
					<?php the_field('home_about_description'); ?>
				</div>
				<div class="home-about__action-container">
					<a href="<?php the_field('home-about-url'); ?>" class="btn-standard"><?php echo pll__('more details')?></a>
				</div>
			</div>
			<div class="home-about__image-container">
				<?php 
					$homeImgBig = get_field('big_image');
				?>
                <picture>
                    <source media="(max-width: 767px)" srcset="<?php echo esc_url($homeImgBig['sizes']['medium_large']) ?>">
                    <img class="home-about__image" height="378" width="910" class="img-fluid" src="<?php echo esc_url($homeImgBig['sizes']['large']) ?>" alt="San-Ei"/>
                </picture>
			</div>
		</div>
	</div>
</section>