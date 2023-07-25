<?php
/*   Template Name: Page About */

$currentLang = pll_current_language();
get_header();
?>

<?php get_template_part('templates/page-banner') ?>

<?php $contentImg = get_field('content_image'); ?>
<?php if( is_page(array('design', 'disain', 'system', 'sistem', 'philosophy', 'filosofi') ) ){ ?>
	<section class="about-content">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 offset-lg-1 order-lg-last">
					<h2 class="title-section" data-aos="fade-up"><?php the_field('title_page'); ?></h2>
					<div class="about-desc" data-aos="fade-up">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-lg-6 order-lg-first" data-aos="fade-up">
					<img width="490" height="460" class="img-fluid" src="<?php echo esc_url($contentImg['url']); ?>" alt="<?php the_field('title_page'); ?>">
				</div>
			</div>
		</div>
	</section>
<?php } else if( is_page(array('public-good', 'barang-publik') ) ){ ?>
	<section class="about-content public-good">
		<div class="container">
			<div class="row align-items-center text-center">
				<div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
					<h2 class="title-section" data-aos="fade-up"><?php the_field('title_page'); ?></h2>
					<div class="about-desc" data-aos="fade-up">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix">
			<div class="col-md-11 offset-md-1 img-holder" data-aos="fade-up">
				<img width="490" height="460" class="img-fluid" src="<?php echo esc_url($contentImg['url']); ?>" alt="<?php the_field('title_page'); ?>">
			</div>
		</div>
	</section>
<?php } else if( is_page(array('process-qc', 'proses-kualitas-kontrol') ) ){ ?>
	<section class="about-content process-qc">
		<div class="container">
			<div class="row align-items-center text-center">
				<div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
					<h2 class="title-section" data-aos="fade-up"><?php the_field('title_page'); ?></h2>
					<div class="about-desc" data-aos="fade-up">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="col-md-12" data-aos="fade-up">
					<img width="490" height="460" class="img-fluid" src="<?php echo esc_url($contentImg['url']); ?>" alt="<?php the_field('title_page'); ?>">
				</div>
			</div>
		</div>
	</section>
<?php } else if( is_page(array('progressive-market', 'pasar-progresif') ) ){ ?>
	<section class="about-content progrev">
		<div class="container">
			<div class="row align-items-center text-center">
				<div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
					<h2 class="title-section" data-aos="fade-up"><?php the_field('title_page'); ?></h2>
					<div class="about-desc" data-aos="fade-up">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('templates/progressive-market') ?>
<?php }?>
<?php get_template_part('templates/about-template') ?>
<section class="breadcrumb-section">
	<div class="container">
		<nav aria-label="breadcrumb" data-aos="fade-up">
		  	<ol class="breadcrumb">
			    <li class="breadcrumb-item">
			    	<?php if ($currentLang=='en') {?>
			      		<a href="<?php echo get_option("siteurl"); ?>">Home</a>
			      	<?php } elseif ($currentLang=='id') { ?>
			      	   	<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
			      	<?php } ?>
			    </li>

				<?php 
				  	if (wp_get_post_parent_id(get_the_ID())) { ?>
				    	<li class="breadcrumb-item">
					      	<?php echo get_the_title($post->post_parent) ?>
					    </li>
				  	<?php } 
				?>
			    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
		  	</ol>
		</nav>
	</div>
</section>
  
<?php
get_footer();
?>
