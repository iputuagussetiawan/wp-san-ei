<?php
add_action('wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999);
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
}

// WISHLIST
if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
  function yith_wcwl_get_items_count() {
    ob_start();
    ?>
      <a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" class="nav-link">
        <div class="yith-wcwl-items-count">
          <i class="yith-wcwl-icon fa fa-heart-o"></i>
        </div>
        <span class='wishlist-count'><?php echo esc_html( yith_wcwl_count_all_products() ); ?></span>
      </a>
    <?php
    return ob_get_clean();
  }

  add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
  function yith_wcwl_ajax_update_count() {
    wp_send_json( array(
      'count' => yith_wcwl_count_all_products()
    ) );
  }

  add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}

if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
  function yith_wcwl_enqueue_custom_script() {
    wp_add_inline_script(
      'jquery-yith-wcwl',
      "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.wishlist-count').html( data.count );
            } );
          } );
        } );
      "
    );
  }

  add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
}


// REDIRECT LOGOUT TO HOME PAGE
function redirect_current_page_after_logout( $logout_url, $redirect ){
  return $logout_url . '&amp;redirect_to=' . home_url();
}
add_filter( 'logout_url', 'redirect_current_page_after_logout', 10, 2 );

// REDIRECT REGISTER TO SUCCESS
function custom_registration_redirect() {
  wp_logout();
  $currentLang = pll_current_language();
  if ($currentLang=='en') {
    return home_url('/login');
  } elseif ($currentLang=='id') {
    return home_url('/id/masuk');
  }
}
add_action('woocommerce_registration_redirect', 'custom_registration_redirect', 2);


// SETTING MINIMUM LENGHT USERNAME WOOCOMMERCE
add_filter( 'woocommerce_registration_errors', 'my_registration_errors', 10, 3 );
function my_registration_errors( $errors, $sanitized_user_login, $user_email ) 
{
  if ( strlen( $sanitized_user_login ) < 5 ) {
    $errors->add( 'username_too_short', __( 'Username must be at least 5 characters.' ) );
  }
  return $errors;
}


// REDIRECT USER TO CUSTUM URL BASED ON THEIR ROLE AFTER LOGIN
function wc_custom_user_redirect( $redirect, $user ) {
  // Get the first of all the roles assigned to the user
  $role = $user->roles[0];
  $dashboard = admin_url();
  $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
  if( $role == 'administrator' ) {
    //Redirect administrators to the dashboard
    $redirect = $dashboard;
  } elseif ( $role == 'shop-manager' ) {
    //Redirect shop managers to the dashboard
    $redirect = $dashboard;
  } elseif ( $role == 'editor' ) {
    //Redirect editors to the dashboard
    $redirect = $dashboard;
  } elseif ( $role == 'author' ) {
    //Redirect authors to the dashboard
    $redirect = $dashboard;
  } elseif ( $role == 'customer' || $role == 'subscriber' ) {
    //Redirect customers and subscribers to the "My Account" page
    $redirect = $myaccount;
  } else {
    //Redirect any other role to the previous visited page or, if not available, to the home
    $redirect = wp_get_referer() ? wp_get_referer() : home_url();
  }
  return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );


// REPLACE PRICE WITH VARIATION PRICE
add_action('woocommerce_before_add_to_cart_form', 'selected_variation_price_replace_variable_price_range');
function selected_variation_price_replace_variable_price_range(){
 global $product;

 if( $product->is_type('variable') ): 
 // Uncomment the <style> tag to hide the original variation price location
 ?>
 <!-- <style> .woocommerce-variation-price {display:none;} </style> -->
 <script>
 jQuery(function($) {
  var $variationsCont = $('.summary form.variations_form'),
    p_regular = p_sale = percent = '';

  $variationsCont.each(function() {
   $price = $(this).closest('.summary').find('p.price').html();
   $percent = $(this).closest('.summary').find('.onsale-percent').html();

   $variationsCont.on('show_variation', function( event, data ) {
    if ( data.price_html ) {
     $(this).closest('.summary').find('p.price').html(data.price_html);

     p_regular = data.display_regular_price;
     p_sale = data.display_price;

     if (p_regular && p_regular != p_sale) {
      percent = Math.round( ( ( p_regular - p_sale ) / p_regular ) * 100 );
      $(this).closest('.summary').find('.onsale-percent').html(percent);
      $(this).closest('.summary').find('.onsale').show();
     } else {
      $(this).closest('.summary').find('.onsale').hide();
     }
    }

   }).on('hide_variation', function( event ) {
    $(this).closest('.summary').find('p.price').html($price);
    $(this).closest('.summary').find('.onsale-percent').html($percent);
    $(this).closest('.summary').find('.onsale').show();
   });
  });
 });
 </script>
 <?php
 endif;
}


// CUSTOM BUTTON QUANTITY PLUS MINUS
add_action( 'wp_head' , 'custom_quantity_fields_css' );
function custom_quantity_fields_css(){
  ?>
  <style>
  .quantity input::-webkit-outer-spin-button,
  .quantity input::-webkit-inner-spin-button {
    display: none;
    margin: 0;
  }
  .quantity input.qty {
    appearance: textfield;
    -webkit-appearance: none;
    -moz-appearance: textfield;
  }
  </style>
  <?php
}


add_action( 'wp_footer' , 'custom_quantity_fields_script' );
function custom_quantity_fields_script(){
  ?>
  <script type='text/javascript'>
  jQuery( function( $ ) {
    if ( ! String.prototype.getDecimals ) {
      String.prototype.getDecimals = function() {
        var num = this,
          match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        if ( ! match ) {
          return 0;
        }
        return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
      }
    }
    // Quantity "plus" and "minus" buttons
    $( document.body ).on( 'click', '.btn-plus, .btn-minus', function() {
      var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
        currentVal  = parseFloat( $qty.val() ),
        max         = parseFloat( $qty.attr( 'max' ) ),
        min         = parseFloat( $qty.attr( 'min' ) ),
        step        = $qty.attr( 'step' );

      // Format values
      if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
      if ( max === '' || max === 'NaN' ) max = '';
      if ( min === '' || min === 'NaN' ) min = 0;
      if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

      // Change the value
      if ( $( this ).is( '.plus' ) ) {
        if ( max && ( currentVal >= max ) ) {
            $qty.val( max );
        } else {
            $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
        }
      } else {
        if ( min && ( currentVal <= min ) ) {
          $qty.val( min );
        } else if ( currentVal > 0 ) {
          $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
        }
      }

      // Trigger change event
      $qty.trigger( 'change' );
    });
  });
  </script>
  <?php
}


// CHANGE NUMBER OF RELATED PRODUCT OUTPUT
function woo_related_products_limit() {
  global $product;
  
  $args['posts_per_page'] = 4;
  return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
  $args['posts_per_page'] = 4; // 4 related products
  $args['columns'] = 2; // arranged in 2 columns
  return $args;
}


// DISABLE UNIQUE SKU NUMBER
add_filter( 'wc_product_has_unique_sku', '__return_false' ); 

add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {

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
    } else {
        return $html;
    }
  }
  return '<span class="onsale">' . esc_html__( 'SALE', 'woocommerce' ) . ' ' . $percentage . '</span>';
}

// USER LOGIN/REGISTER REDIRECT TO MY ACCOUNT
add_action( 'template_redirect', 'redirect_to_myaccount_page' );
function redirect_to_myaccount_page() {
  if ( (is_page('login') || is_page('register' || is_page('masuk') || is_page('daftar'))) && is_user_logged_in()){
    $currentLang = pll_current_language();
    if ($currentLang=='en') {
      wp_redirect( home_url() . "/my-account" );
    } elseif ($currentLang=='id') {
      wp_redirect( home_url() . "/id/my-account" );
    }
    exit;
  }
}

// USER NOT LOGIN REDIRECT MY ACCOUNT TO LOGIN PAGE (SAAT INI GAK AKTIF KARENA NGEBLOCK LOST PASSWORD)
// add_action( 'template_redirect', 'redirect_to_specific_page' );
// function redirect_to_specific_page() {
//   if ( is_page(array('my-account', 'akun-saya')) && ! is_user_logged_in() ) {
//     $currentLang = pll_current_language();
//     if ($currentLang=='en') {
//       wp_redirect( home_url() . "/login" );
//     } elseif ($currentLang=='id') {
//       wp_redirect( home_url() . "/id/masuk" );
//     } 
//     exit;
//   }
// }


// SUCCESS RESET PASSWORD
function woocommerce_new_pass_redirect( $user ) {
  $currentLang = pll_current_language();
  if ($currentLang=='en') {
    wp_redirect( home_url() . "/login/?password-reset=true" );
  } elseif ($currentLang=='id') {
    wp_redirect( home_url() . "/id/masuk/?password-reset=true" );
  } 
  exit;
}
add_action( 'woocommerce_customer_reset_password', 'woocommerce_new_pass_redirect' );


// CART COUNTER
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_cart_count');
function wc_refresh_cart_count($fragments){
    ob_start();
  $cart_count = WC()->cart->cart_contents_count;
    ?>
  <span class="mini-cart-count"><?php echo $cart_count; ?></span>
    <?php
  $fragments['.mini-cart-count'] = ob_get_clean();
    return $fragments;
};


// SHIPPING NOTIFICATION AMOUNT
function my_custom_wc_free_shipping_notice() {

  if ( ! is_cart() ) { // Remove partial if you don't want to show it on cart/checkout
    return;
  }

  $packages = WC()->cart->get_shipping_packages();
  $package = reset( $packages );
  $zone = wc_get_shipping_zone( $package );

  $cart_total = WC()->cart->get_displayed_subtotal();
  if ( WC()->cart->display_prices_including_tax() ) {
    $cart_total = round( $cart_total - ( WC()->cart->get_discount_total() + WC()->cart->get_discount_tax() ), wc_get_price_decimals() );
  } else {
    $cart_total = round( $cart_total - WC()->cart->get_discount_total(), wc_get_price_decimals() );
  }
  foreach ( $zone->get_shipping_methods( true ) as $k => $method ) {
    $min_amount = $method->get_option( 'min_amount' );

    if ( $method->id == 'free_shipping' && ! empty( $min_amount ) && $cart_total < $min_amount ) {
      $remaining = $min_amount - $cart_total;
      wc_add_notice( sprintf( 'Add <strong>%s</strong> more to get free shipping!', wc_price( $remaining ) ) );
    } else if ( $method->id == 'free_shipping') {
      wc_add_notice( sprintf( 'You get free shipping! Please apply <u>FreeShipping</u> coupon', wc_price( $remaining ) ) );
    }
  }
}
add_action( 'wp', 'my_custom_wc_free_shipping_notice' );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found
 *  for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
  $free = array();
  foreach ( $rates as $rate_id => $rate ) {
    if ( 'free_shipping' === $rate->method_id ) {
      $free[ $rate_id ] = $rate;
      break;
    }
  }
  return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

// CHANGE EXPEDITION LOGO
function get_expeditions() {
  $expeditions = [
    'jne' => [
      'image' => get_stylesheet_directory_uri() . '/images/jne.jpg',
      'data'  => []
    ]
  
  ];
  return $expeditions;
}
function build_shipping_method($shipping_metods) {
  $expeditions = get_expeditions();
  
  $shippingMethod = [];
  
  foreach($expeditions as $expedition_code => $expedition) {
    $shippingMethod[$expedition_code]['image'] = $expedition['image'];
    foreach($shipping_metods as $method) {
      $code = explode(":",$method->id);       
      if ($expedition_code == $code[2]) {
        $shippingMethod[$expedition_code]['data'][] = $method;
      }
    }
  }
  return $shippingMethod;
}

// max and min holder
add_filter('woocommerce_quantity_input_min', 'woocommerce_quantity_input_min_callback', 10, 2);
function woocommerce_quantity_input_min_callback($min, $product)
{
    $min = 1;
    return $min;
}