<?php
  function add_meta_data_firefog() {
    // HOME
    if ( is_page('home') ) {?>
        <meta name="keywords" content="Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
    <?php }
    elseif (is_page('beranda')) {
      ?>      
      <meta name="keywords" content="Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // DESIGN
    elseif (is_page('design')) {
      ?>      
      <meta name="keywords" content="design, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    } 
    elseif (is_page('disain')) {
      ?>      
      <meta name="keywords" content="disain, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // SYSTEM
    elseif (is_page('system')) {
      ?>      
      <meta name="keywords" content="system, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('sistem')) {
      ?>      
      <meta name="keywords" content="sistem, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // PUBLIC GOOD
    elseif (is_page('public-good')) {
      ?>      
      <meta name="keywords" content="public good, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('public-good')) {
      ?>      
      <meta name="keywords" content="pemilik properti, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // PHILOSOPHY
    elseif (is_page('philosophy')) {
      ?>      
      <meta name="keywords" content="philosophy, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('filosofi')) {
      ?>      
      <meta name="keywords" content="filosofi, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // PROCESS & QC
    elseif (is_page('process-qc')) {
      ?>      
      <meta name="keywords" content="Process & Quality Control, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('proses-kualitas-kontrol')) {
      ?>      
      <meta name="keywords" content="Kontrol Proses dan Kualitas, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur
      ">
      <?php
    }

    // PROGRESSIVE MARKET
    elseif (is_page('progressive-market')) {
      ?>      
      <meta name="keywords" content="progressive market, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('pasar-progresif')) {
      ?>      
      <meta name="keywords" content="pasar progresif, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur
      ">
      <?php
    }

    // CATALOGS
    elseif (is_page('catalogs')) {
      ?>      
      <meta name="keywords" content="catalogs, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('katalog')) {
      ?>      
      <meta name="keywords" content="katalog, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // HOW TO FIX
    elseif (is_page('how-to-fix')) {
      ?>      
      <meta name="keywords" content="how to fix, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('cara-memperbaiki')) {
      ?>      
      <meta name="keywords" content="cara memperbaiki, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // FIND US
    elseif (is_page('find-us')) {
      ?>      
      <meta name="keywords" content="find us, contact, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('temukan-kami')) {
      ?>      
      <meta name="keywords" content="temukan kami, kontak, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // PRODUCT CATEGORIES
    elseif (is_page('product-categories')) {
      ?>      
      <meta name="keywords" content="product categories, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php
    }
    elseif (is_page('kategori-produk')) {
      ?>      
      <meta name="keywords" content="kategori produk, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php
    }

    // PRODUCT LIST
    elseif (is_tax( 'product_cat' )) {
      ?>
      <?php $currentLang = pll_current_language(); ?>
      <?php if ($currentLang=='en') {?>
        <?php if (is_product_category()) : 
        $productCategory = get_queried_object();
        $catId       = $productCategory->taxonomy . '_' . $productCategory->term_id;
        ?>
          <meta name="keywords" content="<?php echo $productCategory->name ?>, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
        <?php endif ?>
      <?php } elseif ($currentLang=='id') { ?>
        <?php if (is_product_category()) : 
        $productCategory = get_queried_object();
        $catId       = $productCategory->taxonomy . '_' . $productCategory->term_id;
        ?>
          <meta name="keywords" content="<?php echo $productCategory->name ?>, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
        <?php endif ?>
      <?php }
    }

    // SINGLE PRODUCT
    elseif (is_singular('product')) {
      ?>  
      <?php $currentLang = pll_current_language(); ?>
      <?php if ($currentLang=='en') {?>
        <meta name="keywords" content="<?php the_title(); ?>, Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php } elseif ($currentLang=='id') { ?>
        <meta name="keywords" content="<?php the_title(); ?>, Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php } 
    }
    else {
      ?>
      <?php $currentLang = pll_current_language(); ?>
      <?php if ($currentLang=='en') {?>
        <meta name="keywords" content="Faucet, Shower and Accessories, Shower Faucet, Kitchen Faucet, Tools and Spareparts, Kitchen sink faucet">
      <?php } elseif ($currentLang=='id') { ?>
        <meta name="keywords" content="Keran, Pancuran dan Aksesoris, Keran Pancuran, Keran Dapur, Alat dan Suku Cadang, Keran Wastafel Dapur">
      <?php }
    }
  }
  add_action('wp_head', 'add_meta_data_firefog');
?>