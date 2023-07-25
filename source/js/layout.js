import { createPopper } from '@popperjs/core';
import * as bootstrap from 'bootstrap';

import Navbar from './modules/Navbar'
const navbar=new Navbar();


window.addEventListener("load", (event) => {
	navbar.hoverDropdown();
});



// document.addEventListener("DOMContentLoaded", function(){
//   	// add padding-top to bady (if necessary)
//   	let height = window.innerHeight;
//   	let navbar_custom = document.querySelector('.navbar-custom').offsetHeight;
//   	let navbar_top = document.querySelector('.top-nav').offsetHeight;
//   	let navbar_height = navbar_top + navbar_custom;
//   	let calc = height - navbar_height;
//   	// document.body.style.paddingTop = navbar_height + 'px';
//   	// document.querySelector('.megamenu').style.height = calc + 'px';
//   	// document.querySelector('.collapse-mobile').style.height = calc + 'px';
// }); 
// document.onreadystatechange = function() {
// 	var body = document.querySelector("body");
// 	var loader = document.querySelector("#loader");a
//     if (document.readyState !== "complete") {
//     	body.style.visibility = "hidden";
//     	body.style.overflow = "hidden";
//         loader.style.visibility = "visible";
//     } else {
//         loader.style.display = "none";
//         body.style.visibility = "visible";
//         body.style.overflow = "auto";
//     }
// };

// jQuery(function($){
// 	// BACK TO TOP
// 	var btn = $(".back-to-top");
// 	$(window).scroll(function () {
// 	  if ($(window).scrollTop() > 500) {
// 	    btn.addClass("show");
// 	  } else {
// 	    btn.removeClass("show");
// 	  }
// 	});

// 	btn.on("click", function (e) {
// 	  e.preventDefault();
// 	  $("html, body").animate({ scrollTop: 0 }, 100);
// 	});
// });


// document.querySelector('.navbar-toggler').onclick = function() {
//     this.classList.toggle('is-active');
//     var collapse = document.querySelector('.collapse-mobile');
//     if(this.classList.contains('is-active')) {
//     	collapse.classList.add('show');
//     } else {
//     	collapse.classList.remove('show');
//     }
// }

// SEARCH
// const searchToggle = document.querySelector('.navbar-desktop .search-toggle');
// searchToggle.addEventListener("click", (event) => {
// 	var menu = document.querySelector('#searchform');
// 	menu.classList.toggle('open');
// 	searchToggle.classList.toggle('close');
// });



// SEPARATED LOGIN AND REGISTER FORM
// jQuery(document).ready(function($){
// 	var url = window.location.href;
// 	url = url.split("/");
// 	url = url[url.length-2];
// 	if(url == "login" || url == "masuk" || url == "my-account" || url == "akun-saya") {
// 		$("#customer_login .u-column2").remove(); //Remove Registration Div
// 	}
// 	if(url == "register" || url == "daftar") {
// 		$("#customer_login .u-column1").remove(); // Remove Login Div
// 	}
// })


// var miniCart = document.querySelector('.mini-cart');
// miniCart.addEventListener('click', () => {
//     document.querySelector('.collapse-mobile').classList.remove('show');
//     document.querySelector('.navbar-toggler').classList.remove('is-active');
// })

// find us page modal thank you
// const contactForm = document.querySelector(".wpcf7-form");
// const contactModal = document.getElementById('contactModal');
// if(contactModal) {
//     var contactModalBs = new bootstrap.Modal(contactModal, { keyboard: false })

//     contactForm.addEventListener('wpcf7mailsent', function (event) {
//         contactModalBs.show();
//     }, false);
// }