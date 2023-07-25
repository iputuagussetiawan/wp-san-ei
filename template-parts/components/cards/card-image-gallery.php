<?php
    $cardImageGalleryThumb=isset($args['card-image-gallery-thumb']) ? $args['card-image-gallery-thumb'] : null ;
    $cardImageGalleryView=isset($args['card-image-gallery-view']) ? $args['card-image-gallery-view'] : null ;
    $cardImageGalleryALT=isset($args['card-image-gallery-alt']) ? $args['card-image-gallery-alt'] : null ;
    $cardImageGalleryDirection=isset($args['card-image-gallery-direction']) ? $args['card-image-gallery-direction'] : null ;
?>

<a href="<?php echo $cardImageGalleryView?>" class="gallery__item glightbox <?php echo  $cardImageGalleryDirection?>">
    <img class="gallery__image" src="<?php echo $cardImageGalleryThumb;?>" alt="<?php echo $cardImageGalleryALT?>">
</a>