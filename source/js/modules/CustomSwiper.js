import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

class CustomSwiper {
    superioritySwiper(){
        const fraction = document.getElementById("fraction");
        const slides = document.querySelectorAll(".swiperSuperiority .swiper-slide");
        const slideCount = slides.length;
        fraction.innerHTML = `<span class="swiper-fraction__current">1</span><span class="swiper-fraction__separator"></span><span class="swiper-fraction__from">${slideCount}</span>`;

        const superioritySwiper = new Swiper('.swiperSuperiority', {
            loop: false,
            slidesPerView: 1.5,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                slideChange: () => {
                    fraction.innerHTML = `<span class="swiper-fraction__current">${superioritySwiper.realIndex + 1}</span><span class="swiper-fraction__separator"></span><span class="swiper-fraction__from">${slideCount}</span>`;
                }
            }
        });
        return superioritySwiper
    } 

    bannerSwiper(){
        var bannerSwiper = new Swiper(".home-banner-slider", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
        return bannerSwiper
    }
}
export default CustomSwiper