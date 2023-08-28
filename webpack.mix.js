const mix = require("laravel-mix");

mix
  .js("source/js/layout.js", "assets/js/")
  .js("source/js/home.js", "assets/js/")
  .js("source/js/login.js", "assets/js/")
  .js("source/js/register.js", "assets/js/")
  .js("source/js/myaccount.js", "assets/js/")
  .sass("source/scss/layout.scss", "assets/css/")
  .sass("source/scss/pages/home.scss", "assets/css/")
  .sass("source/scss/pages/archive-products.scss", "assets/css/")
  .sass("source/scss/pages/single-product.scss", "assets/css/")
  .sass("source/scss/pages/my-account.scss", "assets/css/")
  .sass("source/scss/pages/wishlist.scss", "assets/css/")
  .sass("source/scss/pages/cart.scss", "assets/css/")
  .sass("source/scss/pages/checkout.scss", "assets/css/")
  .sourceMaps(true, "source-map");

mix.options({
  processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});
mix.disableNotifications();
