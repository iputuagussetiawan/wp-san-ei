<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// echo '<pre>';
// print_r($product);
// echo '</pre>';

do_action( 'woocommerce_before_shop_custom' );
?>
	<a href="<?php the_permalink(); ?>" class="product-hover">
		<div class="box-product">
			<div class="img-holder img-zoom">
				<?php the_post_thumbnail('full'); ?>
			</div>
			<h3 class="product-title"><?php the_title(); ?></h3>
            <p class="price"><?php woocommerce_template_loop_price(); ?></p>
		</div>
        <?php
        if( $product->is_on_sale() ) {
            if( $product->is_type('variable')){
                $percentages = array();

                // Get all variation prices
                $prices = $product->get_variation_prices();

                // Loop through variation prices
                foreach( $prices['price'] as $key => $price ){
                    // Only on sale variations
                    if( $prices['regular_price'][$key] !== $price ){
                        // Calculate and set in the array the percentage for each variation on sale
                        $percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
                    }
                }
                // We keep the highest value
                $percentage = max($percentages) . '%';

            } elseif( $product->is_type('grouped') ){
                $percentages = array();

                // Get all variation prices
                $children_ids = $product->get_children();

                // Loop through variation prices
                foreach( $children_ids as $child_id ){
                    $child_product = wc_get_product($child_id);

                    $regular_price = (float) $child_product->get_regular_price();
                    $sale_price    = (float) $child_product->get_sale_price();

                    if ( $sale_price != 0 || ! empty($sale_price) ) {
                        // Calculate and set in the array the percentage for each child on sale
                        $percentages[] = round(100 - ($sale_price / $regular_price * 100));
                    }
                }
                // We keep the highest value
                $percentage = max($percentages) . '%';

            } else {
                $regular_price = (float) $product->get_regular_price();
                $sale_price    = (float) $product->get_sale_price();

                if ( $sale_price != 0 || ! empty($sale_price) ) {
                    $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
                }
            }
            echo '<span class="onsale-badge">' . $percentage . ' Off</span>';
        }
        ?>
    </a>