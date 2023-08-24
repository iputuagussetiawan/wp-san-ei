import '../scss/home.scss';
import Swiper from 'swiper';

window.addEventListener("load", function () {
	var swiper = new Swiper(".swiper-home", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      576: {
        direction: "vertical",
      }
    }
  });
});

// jQuery(function($){
//   $(".scroll-down").click(function() {
//     $('html,body').animate({
//       scrollTop: $(".home-categories").offset().top - $(".navbar").height()
//     },100);
//   });
// });

// document.addEventListener("DOMContentLoaded", function(){
//     // add padding-top to bady (if necessary)
//     let height = window.innerHeight + 60;
//     let navbar_height = document.querySelector('.navbar').offsetHeight;
//     let calc = height - navbar_height;
//     let homeBanner = document.querySelector('.home-banner');
//     document.body.style.paddingTop = navbar_height + 'px';
//     homeBanner.style.height = calc + 'px';
// });