<?php 
require_once('functions/acf.php');
require_once('functions/seo.php');
require_once('functions/pagination.php');
require_once('functions/polylang.php');
require_once('functions/script_enqueue.php');
require_once('functions/WP_Bootstrap_Navwalker.php');
require_once('functions/woocommerce.php');
/**
 * Themesetup
 * Add menus configuration
 *
 * @return void
 */
function theme_setup()
{
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Left Navigation');
    register_nav_menu('secondary', 'Primary Right Navigation');
    register_nav_menu('third', 'Footer Navigation');
    register_nav_menu('fourth', 'Mobile Language Navigation');
    register_nav_menu('top-nav', 'Top Navbar');
}
add_action('init', 'theme_setup');
// AUTOMATICALLY ADD CATEGORY PRODUCT ON MENU
function add_membership_in_menu($items, $args){
    if ($args->theme_location == 'primary') {
        $cat_args = array(
            'number'     => 7,
            'hide_empty' => false,
            'parent' => 0
        );
        $product_categories = get_terms('product_cat', $cat_args);
        $currentLang = pll_current_language();
        $item = '<li class="menu-item dropdown nav-item has-megamenu order-3">';
        if ($currentLang=='en') {
            $productEN = get_field('product_categories_en', 'option');
            $item .= '<a href="'. $productEN .'" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link"><span itemprop="name">Products</span></a>';
        } elseif ($currentLang=='id') {
            $productID = get_field('product_categories_id', 'option');
            $item .= '<a href="'. $productID .'" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle nav-link"><span itemprop="name">Produk</span></a>';
        }
        $item .= '<div class="dropdown-menu megamenu">';
            $item .= '<div class="megamenu__grid">';
            foreach ($product_categories as $category) {
                $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
                $item .= '<div class="menu-item nav-item megamenu-item">';
                $item .= '<a href="' . get_category_link($category->term_id) . '" class="dropdown-item megamenu-item__link">';
                $item .= '<div class="megamenu-item__image-container">';
                $item .= '<img class="megamenu-item__image" src="'. $image[0]. '" alt="'. $category->name .'">';
                $item .= '</div>';
                $item .= '<div class="megamenu-item__title">'. $category->name .'</div>';
                $item .= '</a>';
                $item .= '</div>';
            }
        $item .= '<div class="menu-item nav-item text-center megamenu-item">';
        if ($currentLang=='en') {
            $categoriPage = get_field('product_categories_en', 'option');
            $item .= '<a href="' . $categoriPage . '" class="btn-standard">explore more</a>';
        } elseif ($currentLang=='id') {
            $categoriPageID = get_field('product_categories_id', 'option');
            $item .= '<a href="' . $categoriPageID . '" class="btn-standard">selengkapnya</a>';
        }
        $item .= '</div>';
        $item .= '</div>';
        $item .= '</div>';
        $item .= '</li>';
        $items .= $item;
    }
    if ($args->theme_location == 'secondary') {
        $currentLang = pll_current_language();  
        // SEARCH
        $imgSearch = get_stylesheet_directory_uri() . '/images/icon/magnifying-glass.svg';
        $imgClose = get_stylesheet_directory_uri() . '/images/icon/close.svg';
        $item = '<li class="order-2 nav-item search">';
        $item .= '<a class="nav-link search-toggle">
                        <svg class="nav-link__img-search" xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                            <path d="M27.125 27.125L19.375 19.375L27.125 27.125ZM21.9583 12.9167C21.9583 14.104 21.7245 15.2798 21.2701 16.3768C20.8157 17.4737 20.1497 18.4705 19.3101 19.3101C18.4705 20.1497 17.4737 20.8157 16.3768 21.2701C15.2798 21.7245 14.104 21.9583 12.9167 21.9583C11.7293 21.9583 10.5536 21.7245 9.45657 21.2701C8.35959 20.8157 7.36284 20.1497 6.52324 19.3101C5.68365 18.4705 5.01764 17.4737 4.56326 16.3768C4.10887 15.2798 3.875 14.104 3.875 12.9167C3.875 10.5187 4.8276 8.21888 6.52324 6.52324C8.21888 4.8276 10.5187 3.875 12.9167 3.875C15.3147 3.875 17.6144 4.8276 19.3101 6.52324C21.0057 8.21888 21.9583 10.5187 21.9583 12.9167Z" stroke="#607D8B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        <img class="nav-link__img-close" src="'.$imgClose.'" alt="close icon">
                    </a>';
        $item .= '</li>';
        // CART
        $item .= '<li class="shop menu-item mini-cart nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <img src="'. get_stylesheet_directory_uri() . '/images/icon/cart.svg'.'" alt="Preview">
                    </a>
                    <span class="mini-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>
                </li>';
        // WISHLIST
        $item .= '<li class="shop menu-item wishlist nav-item">'. do_shortcode('[yith_wcwl_items_count]') .'</li>';
        $items .= $item;
    }
    if ($args->theme_location == 'fourth') {
        $currentLang = pll_current_language();
        if ($currentLang=='en') {
        if( have_rows('catalogs_navbar', 61) ):
            while( have_rows('catalogs_navbar', 61) ): the_row();
            $catalog = get_sub_field('title_nav_catalogs');
            $file = get_sub_field('file_nav_catalogs');

            $item = '<li class="order-1 nav-item catalog">';
            $item .= '<a itemprop="url" href="'. $file .'" class="nav-link" target="_blank"><span itemprop="name">'. $catalog . '</span></a>';
            $item .= '</li>';
            endwhile;
        endif;
        } elseif ($currentLang=='id') { 
        if( have_rows('catalogs_navbar', 63) ):
            while( have_rows('catalogs_navbar', 63) ): the_row();
            $catalog = get_sub_field('title_nav_catalogs');
            $file = get_sub_field('file_nav_catalogs');

            $item = '<li class="order-1 nav-item catalog">';
            $item .= '<a itemprop="url" href="'. $file .'" class="nav-link" target="_blank"><span itemprop="name">'. $catalog . '</span></a>';
            $item .= '</li>';
            endwhile;
        endif;
        }
        $imgSearch = get_stylesheet_directory_uri() . '/images/icon/magnifying-glass.svg';
        $index = isset( $index ) ? absint( $index ) : 0;
        $item .= '<li class="order-2 nav-item search">';
        $item .= '<form role="search" method="get" class="searchform search-box" action="'. esc_url( home_url( '/' ) ).'">
                    <div class="input-group mb-3">
                    <input type="search" id="woocommerce-product-search-field-' . $index .'" class="search-field form-control text search-input" placeholder="'. esc_attr__( 'Search All Products', 'woocommerce' ) .'" value="'. get_search_query() .'" name="s" />
                    <button class="btn btn-outline-secondary" id="button-addon2" type="submit"><img src="'.$imgSearch.'" alt="search icon"></button>
                    <input type="hidden" name="post_type" value="product" />
                    </div>
                </form>';
        $item .=  '</li>';
        $items .= $item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_membership_in_menu', 10, 2);


// LOGO IN LOGIN ADMIN
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
        height: 65px;
        width: 320px;
        background-size: 200px 65px;
        background-repeat: no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


// set url of login logo in login page  
function tmdr_login_logo_url() {  
    return home_url();  
} 
add_filter( 'login_headerurl', 'tmdr_login_logo_url' ); 
// custom login page title  
function tmdr_custom_login_title($origtitle) {  
    return get_bloginfo('name').' - Login'; 
} 
add_filter('login_title', 'tmdr_custom_login_title', 99);


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