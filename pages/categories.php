<?php
/*   Template Name: Page Product Categories */

$currentLang = pll_current_language();
get_header();
wp_enqueue_style('product', get_stylesheet_directory_uri().'/dist/product.css', array(), '1.0.0', 'all');
?>

	<section class="page-banner">
		<?php $image = get_field('banner_image', 6); ?>
		<div class="box-banner" style="background-image: url('<?php echo esc_url($image['url']); ?>');">
			<div class="container">
				<h1 class="title-banner" data-aos="fade-up"><?php echo pll__('Products'); ?></h1>
			</div>
		</div>
	</section>

	<section class="product-category">
		<div class="container">
			<div class="row categories-holder">
			<?php 
				$cat_args = array(
			        'hide_empty' 	=> false,
			        
			    );

			    $product_categories = get_terms('product_cat', $cat_args);
			    foreach ($product_categories as $category) {
			    	$catId	= $category->taxonomy . '_' . $category->term_id;
			        $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
			        $image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
			        $imageThumb = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail' );

			        if($category->parent < 1) {
			        ?>
			        	<div class="col-lg-4 col-md-6 col-6 categories-list" data-aos="fade-up">
			        		<a href="<?php echo get_category_link($category->term_id) ?>">
								<div class="img-zoom categories-list__image-container">
									<picture>
				                        <source media="(max-width: 767px)" srcset="<?php echo $imageThumb[0]; ?>">
				                        <img width="490" height="460" class="img-fit" src="<?php echo $image[0]; ?>" alt="<?php echo $category->name ?>"/>
				                    </picture>
								</div>
								<div class="categories-title">
									<h3 class="category-title"><?php echo $category->name ?></h3>
								</div>
							</a>
			        	</div>
			        <?php
			    	}
			    }
			?>
			</div>
		</div>
	</section>

	<section class="breadcrumb-section">
		<div class="container">
			<nav aria-label="breadcrumb" data-aos="fade-up">
			  	<ol class="breadcrumb">
				    <li class="breadcrumb-item">
				    	<?php if ($currentLang=='en') {?>
				      		<a href="<?php echo get_option("siteurl"); ?>">Home</a>
				      	<?php } elseif ($currentLang=='id') { ?>
				      	   	<a href="<?php echo get_option("siteurl"); ?>/id">Beranda</a>
				      	<?php } ?>
				    </li>
				    <li class="breadcrumb-item active" aria-current="page"><?php the_field('title_page', 6); ?></li>
			  	</ol>
			</nav>
		</div>
	</section>
  
<?php get_footer(); ?>
