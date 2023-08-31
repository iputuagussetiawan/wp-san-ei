<?php 
require_once('functions/acf.php');
require_once('functions/seo.php');
require_once('functions/pagination.php');
require_once('functions/polylang.php');
require_once('functions/script_enqueue.php');
require_once('functions/WP_Bootstrap_Navwalker.php');
require_once('functions/woocommerce.php');
require_once('functions/backend.php');
require_once('functions/frontend.php');
/**
 * Themesetup
 * Add menus configuration
 *
 * @return void
 */
//GET YOUTUBE ID
function tmdr_youtube_id($url) {
    preg_match('%(?:youtube(?:-nocookie)?.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu.be/)([^"&?/ ]{11})%i', $url, $match);
    echo $match[1];
}


// PROGRESSIVE MARKET
function filter_projects() {
    $catSlug = $_POST['category'];
    $ajaxposts = new WP_Query([
        'post_type'     => 'agent', 
        'posts_per_page'  => -1,
        'tax_query'     => array(
        array(
            'taxonomy'  => 'agent_location',
            'field'   => 'slug',
            'terms'   => $catSlug
        )
        )
    ]);
    $response = '';
    if($ajaxposts->have_posts()) {
        while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        $response .= get_template_part('templates/agent-list');
        endwhile;
    } else {
        $response = '<div class="col-12">No agent</div>';
    }
    echo $response;
    exit;
}
add_action('wp_ajax_filter_projects', 'filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

// WOOCOMMERCE DISABLE SEARCH RESULT GO TO SINGLE PAGE
add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );

// custom text link account is already registered in checkout page
add_filter( 'woocommerce_registration_error_email_exists', function( $html ) {
    $url =  wc_get_page_permalink( 'myaccount' );
    $url = add_query_arg( 'redirect_checkout', 1, $url );
    $html = str_replace( 'An account is already registered with your email address. Please log in.', 'An account is already registered with your email address. <a href="'.$url.'">Please log in.</a>', $html );
    return $html;
});

// set address street validation minlength = 10
add_action('woocommerce_checkout_process', 'wh_addressStreetValidateCheckoutFields');
function wh_addressStreetValidateCheckoutFields() {
    $billing_address = filter_input(INPUT_POST, 'billing_address_1');
    if (strlen(trim(preg_replace('/^[6789]\d{9}$/', '', $billing_address))) <= 10) {
        wc_add_notice(__('<strong>Billing Street address</strong> field has a too short input (min: 10).'), 'error');
    }
}