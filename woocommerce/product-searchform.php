<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$currentLang = pll_current_language();

?>
<form role="search" method="get" class="searchform search-box" action="
<?php if ($currentLang=='en') {?>
    <?php echo esc_url( home_url( '/' ) ); ?>
<?php } elseif ($currentLang=='id') { ?>
    <?php echo esc_url( home_url( '/id/' ) ); ?>
<?php } ?>
">
    <div class="input-group mb-3">
        <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field form-control text search-input" placeholder="<?php echo esc_attr__( 'Search All Products', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button class="btn btn-outline-secondary" id="button-addon2" type="submit"><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon/magnifying-glass.svg'; ?>" alt="search button"></button>
        <input type="hidden" name="post_type" value="product" />
    </div>
</form>
