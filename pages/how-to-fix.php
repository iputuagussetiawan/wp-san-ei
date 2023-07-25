<?php
/*   Template Name: Page How To Fix */

$currentLang = pll_current_language();
get_header();
?>

<?php get_template_part('templates/page-banner') ?>
<section class="how-to-fix">
	<div class="container">
		<?php if( have_rows('how_to_fix_list') ): ?>
		<div class="how-to-fix-holder row">
			<?php while( have_rows('how_to_fix_list') ): the_row(); ?>
			    <?php $image = get_sub_field('image'); ?>
				<?php if(get_sub_field('select', $curauth) == "image"): ?>
					<div class="list col-md-4 col-sm-6 col-6" data-aos="fade-up">
						<a class="gallery" href="<?php echo esc_url($image['url']); ?>" data-rel="lightcase">
							<div class="img-holder img-zoom">
								<img width="490" height="460" class="img-fit" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_sub_field('title'); ?>"/>
							</div>
						</a>
						<h3 class="title"><?php the_sub_field('title'); ?></h3>
					</div>
				<?php else:?>
					<div class="list col-md-4 col-sm-6 col-6" data-aos="fade-up">
						<a class="gallery" href="https://www.youtube.com/embed/<?php echo tmdr_youtube_id( get_sub_field( 'video' ) ); ?>" data-rel="lightcase">
							<div class="img-holder img-zoom">
								<img width="490" height="460" class="img-fit" src="<?php echo esc_url($image['url']); ?>" alt="<?php the_sub_field('title'); ?>"/>
							</div>
						</a>
						<h3 class="title"><?php the_sub_field('title'); ?></h3>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<?php get_template_part('templates/breadcrumb') ?>

<?php
get_footer();
?>