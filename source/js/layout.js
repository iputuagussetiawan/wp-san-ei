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

