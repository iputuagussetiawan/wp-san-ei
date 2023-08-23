import { createPopper } from '@popperjs/core';
import * as bootstrap from 'bootstrap';

import Navbar from './modules/Navbar'
const navbar=new Navbar();

window.addEventListener("load", (event) => {
	navbar.hoverDropdown();
});

const searchToggle = document.querySelector('.search-toggle');
searchToggle.addEventListener("click", (event) => {
	let menu = document.querySelector('#searchform');
	menu.classList.toggle('open');
	searchToggle.classList.toggle('close');
});

