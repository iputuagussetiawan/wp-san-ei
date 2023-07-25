<?php
/*   Template Name: Page Catalogs */

$currentLang = pll_current_language();
get_header();
?>

<?php get_template_part('templates/page-banner') ?>

<section class="catalogs">
	<div class="container">
		<?php if( have_rows('catalogs') ): ?>
      	<div class="row">
      		<?php $i = 1; ?>
      		<?php while( have_rows('catalogs') ): the_row(); 	
      			$imageCover = get_sub_field('cover_image');	
        	?>
        	<div class="col-md-6 col-sm-6 col-12 catalogs-list" data-aos="fade-up">
	        	<a href="<?php the_sub_field('file_catalogs'); ?>" target="_blank">
		        	<div class="img-holder img-zoom">
		        		<?php 
				    	$flip = get_sub_field('flip_book'); 
				    	echo do_shortcode('' . $flip . '');
				    	?>

			        	<div class="catalogs-title">
			        		<h3 class="title"><?php the_sub_field('title_catalogs'); ?></h3>
			        	</div>
			        	<div class="btn-download">
			        		<a href="#" data-bs-toggle="modal" data-bs-target="#catalog<?php echo $i;?>"><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon/download.svg'?>" alt="Preview"></a>
			        	</div>
		        	</div>
		        </a>
	        </div>

	        <div class="modal fade catalog-modal" id="catalog<?php echo $i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  	<div class="modal-dialog modal-dialog-centered">
				    <div class="modal-content">
				      	<div class="modal-header">
					        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      	</div>
					    <div class="modal-body">
					    	<?php if ($currentLang=='en') {?>
						    	<?php echo do_shortcode('[contact-form-7 id="621" title="Download"]');?>
			              	<?php } elseif ($currentLang=='id') { ?>
			              	   	<?php echo do_shortcode('[contact-form-7 id="792" title="Download ID"]'); ?>
			              	<?php } ?>

			              	<div class="file-download file-catalog<?php echo $i;?>">
								<p class="title"><?php echo pll__('Submit email success!!!')?></p>
								<p class="subtitle"><?php echo pll__('Feel free to download our')?> <?php the_sub_field('title_catalogs'); ?> <?php echo pll__('catalog')?>.</p>
								<a href="<?php the_sub_field('file_catalogs'); ?>" class="download-catalog" download><?php echo pll__('Download')?></a>
							</div>
					    </div>
				    </div>
			  	</div>
			</div>
	        <?php $i++; endwhile; ?>
      	</div>
      	<?php endif; ?>
	</div>
</section>

<?php get_template_part('templates/breadcrumb') ?>
<!-- <?php if( have_rows('catalogs') ): ?>
	<?php $i = 1; ?>
	<?php while( have_rows('catalogs') ): the_row(); ?>
		<div class="file-download file-catalog<?php echo $i;?>">
			<p class="title">Submit email success!!!</p>
			<p class="subtitle">Feel free to download our <?php the_sub_field('title_catalogs'); ?> catalog.</p>
			<a href="<?php the_sub_field('file_catalogs'); ?>" class="download-catalog" download>Download</a>
		</div>
    <?php $i++; endwhile; ?>
<?php endif; ?> -->
<?php
get_footer();
?>
