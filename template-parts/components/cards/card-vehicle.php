<?php
    $cardVehicleImage=isset($args['card-vehicle-image']) ? $args['card-vehicle-image'] : null ;
    $cardVehicleTitle=isset($args['card-vehicle-title']) ? $args['card-vehicle-title'] : null ;
    $cardVehiclePricepermonth=isset($args['card-vehicle-pricepermonth']) ? $args['card-vehicle-pricepermonth'] : null ;
    $cardVehiclePriceperday=isset($args['card-vehicle-priceperday']) ? $args['card-vehicle-priceperday'] : null;
    $cardVehicleTransmition=isset($args['card-vehicle-transmition']) ? $args['card-vehicle-transmition'] : null ;
    $badgeClass='';
    $pageContactID = get_field('contact_link', 'page_link')->ID;
    $contactLink = get_permalink($pageContactID);
    $wa_number = get_field('wa_number', $pageContactID);


    $bannerButtonWaMessage="Hi Bali Batur Rental! I'm interested in renting a vehicle from your service. Can you please provide me with the " .$cardVehicleTitle;
?>

<div class="card-vehicle">
    <div class="card-vehicle__image-container">
        <img class="card-vehicle__image" src="<?php echo $cardVehicleImage?>" alt="<?php echo $cardVehicleTitle?>">
    </div>
    <div class="card-vehicle__body">
        <div class="card-vehicle__info-container">
            <h3 class="card-vehicle__name"><?php echo $cardVehicleTitle?></h3>
            <div class="card-vehicle__price">
                <div class="card-vehicle__price-month">
                    <span class="card-vehicle__curr">Rp</span>
                    <span class="card-vehicle__amount"><?php echo number_format($cardVehiclePricepermonth, 0, ',', '.');?></span>
                    <span class="card-vehicle__duration">/Month</span>
                </div>
                <div class="card-vehicle__price-day">
                    <span class="card-vehicle__curr">Rp</span>
                    <span class="card-vehicle__amount"><?php echo  number_format($cardVehiclePriceperday, 0, ',', '.'); ?></span>
                    <span class="card-vehicle__duration">/Day</span>
                </div>
            </div>
            <?php 
                foreach($cardVehicleTransmition as $trsm) :
                    if($trsm->slug=='manual'){
                        $badgeClass='card-vehicle__transmission-manual';
                    }elseif($trsm->slug=='matic'){
                        $badgeClass='card-vehicle__transmission-matic';
                    }else{
                        $badgeClass='';
                    }
            ?>
                <div class="<?php echo $badgeClass;?>">
                    <?php echo $trsm->name;?>
                </div>
            <?php 
                endforeach;
            ?>
        </div>
        <div class="card-vehicle__action-container">
        <a href="https://wa.me/<?php echo $wa_number?>?text=<?php echo urlencode($bannerButtonWaMessage)?>
" class="btn btn-primary card-vehicle__button" target="_blank" rel="noreferrer noopener nofollow" aria-label="Send Me WA">
                <svg class="btn__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_188_3781)">
                    <path d="M0 24L1.69627 17.8403C0.647564 16.0323 0.0974211 13.9848 0.103152 11.8916C0.103152 5.3327 5.46704 0 12.0516 0C15.2493 0 18.2521 1.23764 20.5043 3.48479C22.7622 5.73194 24.0057 8.72053 24 11.8973C24 18.4563 18.6361 23.789 12.0458 23.789H12.0401C10.0401 23.789 8.07449 23.2871 6.32664 22.3403L0 24ZM6.63037 20.1901L6.9914 20.4068C8.51575 21.308 10.2636 21.7814 12.0458 21.7871H12.0516C17.5243 21.7871 21.9828 17.3555 21.9828 11.903C21.9828 9.26236 20.9513 6.78137 19.0773 4.91065C17.2034 3.03992 14.7049 2.01331 12.0516 2.01331C6.57879 2.0076 2.12034 6.43916 2.12034 11.8916C2.12034 13.7567 2.64183 15.576 3.63897 17.1502L3.87392 17.5266L2.87106 21.1711L6.63037 20.1901Z" fill="white"/>
                    <path d="M0.418213 23.5836L2.05718 17.635C1.04285 15.8954 0.509903 13.9163 0.509903 11.8973C0.515634 5.56651 5.69041 0.416321 12.0514 0.416321C15.1403 0.416321 18.0342 1.61404 20.2119 3.78134C22.3895 5.94864 23.5872 8.83457 23.5872 11.903C23.5872 18.2338 18.4067 23.384 12.0514 23.384H12.0457C10.1145 23.384 8.21763 22.8992 6.53282 21.9867L0.418213 23.5836Z" fill="#00BF71"/>
                    <path d="M0 24L1.69627 17.8403C0.647564 16.0323 0.0974211 13.9848 0.103152 11.8916C0.103152 5.3327 5.46704 0 12.0516 0C15.2493 0 18.2521 1.23764 20.5043 3.48479C22.7622 5.73194 24.0057 8.72053 24 11.8973C24 18.4563 18.6361 23.789 12.0458 23.789H12.0401C10.0401 23.789 8.07449 23.2871 6.32664 22.3403L0 24ZM6.63037 20.1901L6.9914 20.4068C8.51575 21.308 10.2636 21.7814 12.0458 21.7871H12.0516C17.5243 21.7871 21.9828 17.3555 21.9828 11.903C21.9828 9.26236 20.9513 6.78137 19.0773 4.91065C17.2034 3.03992 14.7049 2.01331 12.0516 2.01331C6.57879 2.0076 2.12034 6.43916 2.12034 11.8916C2.12034 13.7567 2.64183 15.576 3.63897 17.1502L3.87392 17.5266L2.87106 21.1711L6.63037 20.1901Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.06576 6.91824C8.84226 6.42205 8.60731 6.41064 8.39527 6.40493C8.22335 6.39923 8.02278 6.39923 7.82221 6.39923C7.62163 6.39923 7.30072 6.47338 7.02564 6.76995C6.75057 7.06653 5.98267 7.78516 5.98267 9.25094C5.98267 10.711 7.0543 12.1255 7.2033 12.3251C7.35229 12.5247 9.27206 15.6217 12.3036 16.8137C14.8251 17.8061 15.3408 17.6065 15.8852 17.5551C16.4297 17.5038 17.6503 16.8365 17.9024 16.1407C18.1488 15.4449 18.1488 14.8517 18.0743 14.7262C17.9998 14.6008 17.7993 14.5266 17.5013 14.3783C17.2033 14.23 15.7362 13.5114 15.4612 13.4087C15.1861 13.3118 14.9855 13.2604 14.7907 13.557C14.5901 13.8536 14.017 14.5209 13.8451 14.7205C13.6732 14.9201 13.4956 14.943 13.1976 14.7947C12.8996 14.6464 11.9368 14.3327 10.7964 13.3175C9.90816 12.5304 9.30645 11.5551 9.13453 11.2585C8.96261 10.962 9.11733 10.8023 9.26633 10.654C9.39814 10.5228 9.56432 10.3061 9.71332 10.135C9.86232 9.96387 9.91389 9.8384 10.0113 9.63878C10.1087 9.43916 10.0629 9.26805 9.98839 9.11976C9.91389 8.97718 9.32937 7.5057 9.06576 6.91824Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath>
                    <rect width="24" height="24" fill="white"/>
                    </clipPath>
                    </defs>
                </svg>
                <span class="btn__text">Order Via Whatsapp</span>
            </a>
        </div>
    </div>
</div>