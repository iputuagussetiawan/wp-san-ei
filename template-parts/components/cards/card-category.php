<?php
    $cardImageGalleryThumb=isset($args['card-image-gallery-thumb']) ? $args['card-image-gallery-thumb'] : null ;
    $cardImageGalleryView=isset($args['card-image-gallery-view']) ? $args['card-image-gallery-view'] : null ;
    $cardImageGalleryALT=isset($args['card-image-gallery-alt']) ? $args['card-image-gallery-alt'] : null ;
    $cardImageGalleryDirection=isset($args['card-image-gallery-direction']) ? $args['card-image-gallery-direction'] : null ;
?>

<a class="card-category" href="../category/<?php echo $categoryID->slug; ?>/?swoof=1&product_cat=<?php echo $category->slug; ?>&really_curr_tax=<?php echo $categoryID->term_id; ?>-product_cat">
    <div class="card-category__image-container">
        <picture>
            <source media="(max-width: 767px)" srcset="<?php echo $imageThumb[0]; ?>">
            <img class="card-category__image" height="1024" width="683" src="<?php echo $image[0]; ?>" alt="<?php echo $category->name ?>"/>
        </picture>
    </div>
    <div class="card-category__logo-container">
        <img class="card-category__logo" height="23" width="186" src="<?php echo esc_url($logoCat['url']); ?>" alt="<?php echo $category->name ?>">
        <h3 class="card-category__logo-text"><?php echo $category->name ?></h3>
    </div>
</a>