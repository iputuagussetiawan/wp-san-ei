<?php
    $bannerType=isset($args['banner-type']) ? $args['banner-type'] : null ;
    $bannerImageDesktop=isset($args['banner-image-desktop']) ? $args['banner-image-desktop'] : null ;
    $bannerImageMobile=isset($args['banner-image-mobile']) ? $args['banner-image-mobile'] : null ;
    $bannerTitle=isset($args['banner-title']) ? $args['banner-title'] : null ;
    $bannerDescription=isset($args['banner-description']) ? $args['banner-description'] : null ;
    $bannerVideo=isset($args['banner-video']) ? $args['banner-video'] : null ;
?>
<div class="swiper-slide">
    <?php 
        //print_r($args);
        if($bannerType=="image"):
            if(!$bannerImageMobile):
                ?>
                    <img class="home-banner__image" height="1080" width="1920" src="<?php echo $bannerImageDesktop  ?>" alt="<?php echo $bannerTitle; ?>">
                <?php
            else:
                ?>
                    <picture>
                        <source media="(max-width: 1024px)" srcset="<?php echo $bannerImageMobile; ?>" />
                        <img class="home-banner__image" src="<?php echo $bannerImageDesktop  ?>" alt="<?php echo $bannerTitle; ?>" />
                    </picture>
                <?php 
            endif;
            if($bannerTitle):
                ?>
                    <div class="home-banner__container">
                        <div class="home-banner__info">
                            <h3 class="home-banner__title"><?php echo $bannerTitle; ?></h3>
                            <div class="home-banner__description">
                                <?php echo $bannerDescription; ?>
                            </div>
                        </div>
                    </div>
                <?php 
            endif;
        else:
            ?>
                <video autoplay muted loop playsinline id="banner-video" class="home-banner__video">
                    <source src="<?php echo $bannerVideo?>" type="video/mp4">
                </video>
            <?php 
        endif;
    ?>
</div>