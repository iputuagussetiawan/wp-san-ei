import { createPopper } from '@popperjs/core';
import * as bootstrap from 'bootstrap';

import Navbar from './modules/Navbar'
const navbar=new Navbar();

document.addEventListener("DOMContentLoaded", () => {
	navbar.hoverDropdown();
    navbar.events();
});

const searchToggle = document.querySelector('.search-toggle');
searchToggle.addEventListener("click", (event) => {
	let menu = document.querySelector('#searchform');
	let searchField=document.querySelector('.search-box__input');
	menu.classList.toggle('open');
	searchToggle.classList.toggle('close');
	searchField.focus();
});

document.addEventListener("DOMContentLoaded", function(){
	document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
		everydropdown.addEventListener('shown.bs.dropdown', function () {
			el_overlay = document.createElement('span');
			el_overlay.className = 'screen-darken';
			document.body.appendChild(el_overlay)
		});
		everydropdown.addEventListener('hide.bs.dropdown', function () {
			document.body.removeChild(document.querySelector('.screen-darken'));
		});
	});
}); 

