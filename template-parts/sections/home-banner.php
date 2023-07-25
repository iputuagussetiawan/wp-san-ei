<?php
$pageHomeID = get_field('home_link', 'page_link')->ID;
?>
<h1 class="sr-only">Always with joy</h1>
<section class="home-banner">
    <div class="swiper home-banner-slider">
        <?php if (have_rows('home_slider')) : ?>
			<div class="swiper-wrapper">
			<?php 
				while (have_rows('home_slider')) : the_row(); 
					$imageDesktop = get_sub_field('image');
					$imageMobile = get_sub_field('image_mobile');
					$bannerType=get_sub_field('banner_type');
					$bannerTitle=get_sub_field('banner_title');
					$bannerDescription=get_sub_field('banner_desc');
					$bannerVideo=get_sub_field('video');
					if ($imageDesktop ) :
						$urlImageDesktop  = $imageDesktop ['url'];
					else :
						$urlImageDesktop = get_template_directory_uri() . '/images/blank-image.svg';
					endif;
					if ($imageMobile ) :
						$urlImageMobile  = $imageMobile ['url'];
					else :
						$urlImageMobile = get_template_directory_uri() . '/images/blank-image.svg';
					endif;
					get_template_part('template-parts/components/sliders/slider', 'item-banner',array(
						'banner-type' =>$bannerType,
						'banner-image-desktop' =>$urlImageDesktop,
						'banner-image-mobile' =>$urlImageMobile ,
						'banner-title' =>$bannerTitle,
						'banner-description' =>$bannerDescription,
						'banner-video' =>$bannerVideo,
					));
				endwhile; 
			?>
			</div>
		<?php endif; ?>
        <div class="swiper-pagination"></div>
	</div>
    <div class="scroll-down">
		<div class="scroll-down__desc"><?php echo pll__('Scroll down')?></div>
		<svg class="scroll-down__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
			<!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
			<path d="M377.4 296.6l-168 176C204.8 477.3 198.6 480 192 480s-12.84-2.688-17.38-7.438l-168-176C-2.5 286.1-2.156 271.8 7.438 262.6c9.5-9.156 24.75-8.812 33.94 .8125L168 396.1V56.02c0-13.25 10.75-24.01 23.1-24.01S216 42.77 216 56.02v340.1l126.6-132.7c9.156-9.625 24.41-9.969 33.94-.8125C386.2 271.8 386.5 286.1 377.4 296.6z"/>
		</svg>
    </div>
</section>