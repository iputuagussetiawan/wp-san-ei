<?php
    $cardVideoGalleryThumb=isset($args['card-video-gallery-thumb']) ? $args['card-video-gallery-thumb'] : null ;
    $cardVideoGalleryALT=isset($args['card-video-gallery-alt']) ? $args['card-video-gallery-alt'] : null ;
    $cardVideoGalleryURL=isset($args['card-video-gallery-url']) ? $args['card-video-gallery-url'] : null ;
    $cardVideoGalleryDirection=isset($args['card-video-gallery-direction']) ? $args['card-video-gallery-direction'] : null ;
?>
<div class="gallery__item <?php echo $cardVideoGalleryDirection?>">
    <a href="<?php echo $cardVideoGalleryURL;?>" class="play-button glightboxVideo" aria-label="Play Our Video">
        <svg class="play-button__icon" width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="56" height="56" rx="28" fill="black" fill-opacity="0.7"/>
            <path d="M22.225 42.0584C21.4472 42.5639 20.6601 42.5935 19.8637 42.147C19.0672 41.7006 18.6682 41.0099 18.6667 40.075V15.925C18.6667 14.9917 19.0657 14.301 19.8637 13.853C20.6617 13.405 21.4488 13.4346 22.225 13.9417L41.2417 26.0167C41.9417 26.4834 42.2917 27.1445 42.2917 28C42.2917 28.8556 41.9417 29.5167 41.2417 29.9834L22.225 42.0584Z" fill="#EBEBEB"/>
        </svg>
    </a>
    <img class="gallery__image" src="<?php echo $cardVideoGalleryThumb;?>" alt="<?php echo  $cardVideoGalleryALT?>">
</div>