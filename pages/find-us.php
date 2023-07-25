<?php
/*   Template Name: Page Find Us */

$currentLang = pll_current_language();
get_header();
?>

<?php get_template_part('templates/page-banner') ?>
<section class="find-us">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 offset-lg-1 order-lg-last contact-info" data-aos="fade-up">
				<h2 class="title-section"><?php the_field('title_contact'); ?></h2>
				<div class="contact-desc">
					<?php the_field('description_contact'); ?>
				</div>
				<?php if ($currentLang=='en') {?>
              		<?php echo do_shortcode('[contact-form-7 id="288" title="Contact form"]'); ?>
              	<?php } elseif ($currentLang=='id') { ?>
              	   	<?php echo do_shortcode('[contact-form-7 id="384" title="Contact form ID"]') ?>
              	<?php } ?>
			</div>
			<div class="col-lg-4 offset-lg-1 order-lg-first find-us-info" data-aos="fade-up">
				<div class="img-holder">
					<?php $imgInfo = get_field('image_info');?>
					<img width="490" height="460" class="img-fit" src="<?php echo esc_url($imgInfo['url']); ?>">
				</div>
				<h2 class="title-section"><?php the_field('title_info'); ?></h2>
				<div class="address">
					<?php the_field('address'); ?>
				</div>
				<a href="<?php the_field('google_maps'); ?>" target="_blank" class="btn-standard">Google Maps</a>
			</div>
		</div>
	</div>
</section>

<div class="modal fade show_area" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<div class="modal-body">
	      		<img src="<?php echo get_stylesheet_directory_uri() . '/images/icon/circle-check.svg'?>" alt="Success">
	      		<h5 class="title-section" id="exampleModalLabel"><?php echo pll__('Message Sent')?>!</h5>
	    		<p><?php echo pll__('Thank you for getting in touch! Please check your email.')?></p>
	      	</div>
    	</div>
  	</div>
</div>

<section class="agent" data-aos="fade-up">
	<div class="container">
		<?php echo do_shortcode('[caf_filter id="304"]'); ?>
	</div>
</section>


<?php get_template_part('templates/breadcrumb') ?>

<!-- CONTACT FORM 7 -->
<?php 
	add_action( 'wp_footer', 'prevent_cf7_multiple_emails' );
	function prevent_cf7_multiple_emails() {
	?>
	<script>
		var disableSubmit = false;
		jQuery('input.wpcf7-submit[type="submit"]').click(function() {
			if (disableSubmit == true) {
				return false;
			}
			disableSubmit = true;
			return true;
		})

		jQuery('button.wpcf7-submit').click(function() {
			if (disableSubmit == true) {
			return false;
			}
			disableSubmit = true;
			return true;
		})

		var wpcf7Elm = document.querySelector( '.wpcf7' );
		wpcf7Elm.addEventListener( 'wpcf7_before_send_mail', function( event ) {
			disableSubmit = false;
		}, false );

		wpcf7Elm.addEventListener( 'wpcf7_before_send_mail', function( event ) {
			disableSubmit = false;
		}, false );

		wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {
			disableSubmit = false;
		}, false );

		wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {
			disableSubmit = false;
		}, false );
	</script>
	<?php	 
	}
?>

<?php
get_footer();
?>