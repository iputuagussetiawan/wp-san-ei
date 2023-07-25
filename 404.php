<?php
$currentLang = pll_current_language();
get_header();
?>

  <section class="error">
    <div class="img1"><img src="<?php echo get_stylesheet_directory_uri() . '/images/error4.jpg'?>"></div>
    <div class="container text-center error-page">
      <div class="img2"><img src="<?php echo get_stylesheet_directory_uri() . '/images/error3.jpg'?>"></div>
      <div class="fadeInUp row error-holder">
        <div class="col-xl-4 offset-xl-4 col-lg-6 offset-lg-3">
          <h1 class="section-title"><span class="error-title">404</span> <span class="separator">|</span> <?php echo pll__('Page Not Found')?></h2>
          <p class="error-desc"><?php echo pll__('Not Found Description')?></p>
          <a href="<?php echo site_url() ?>" class="btn btn-standard"><?php echo pll__('Go Back Home')?></a>
        </div>
      </div>
      <div class="img3"><img src="<?php echo get_stylesheet_directory_uri() . '/images/error1.jpg'?>"></div>
    </div>
    <div class="img4"><img src="<?php echo get_stylesheet_directory_uri() . '/images/error2.jpg'?>"></div>
  </section>

<?php get_footer(); ?>