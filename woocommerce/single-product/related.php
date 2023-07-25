<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$currentLang = pll_current_language();
if ( $related_products ) : ?>

	<section class="related products">
		<div class="holder">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<div class="me-auto"><h2 class="section-title"><?php echo esc_html( $heading ); ?></h2></div>
		<?php endif; ?>

			<div class="ms-auto d-lg-block d-none"><a class="btn-standard" href="
				<?php if ($currentLang=='en') {?>
	          		<?php echo get_option("siteurl"); ?>/product
	          	<?php } elseif ($currentLang=='id') { ?>
	          	   	<?php echo get_option("siteurl"); ?>/produk
	          	<?php } ?>
				"><?php echo pll__('more product')?></a>
			</div>
		</div>
		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
					?>
					<div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 col-6 product-list">
						<?php 
						wc_get_template_part( 'content', 'product' );
						?>
					</div>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
