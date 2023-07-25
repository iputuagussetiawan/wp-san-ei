import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
gsap.registerPlugin(ScrollToPlugin);
class Navbar {
    constructor() {
        this.isClosed = false;
        this.body=document.querySelector("body");
        this.dropdowns = document.querySelectorAll(".dropdown")
        this.lastScrollTop = 0;
    }
    // 2. events
    events() {
    }
    // 3. methods (function, action...)
    hoverDropdown(){
        for (const dropdown of this.dropdowns) {
            dropdown.addEventListener('mouseenter', function(event) {
                let target=event.target
                let dropdownToggle=target.querySelector('.dropdown-toggle')
                let dropdownMenu=target.querySelector('.dropdown-menu')
                target.classList.add('show');
                dropdownToggle.classList.add('show');
                dropdownMenu.classList.add('show');

                let el_overlay = document.createElement('span');
                let body=document.querySelector("body");
                el_overlay.className = 'screen-darken';
                document.body.appendChild(el_overlay)
                body.classList.add('no-scroll');
            })
            dropdown.addEventListener('mouseleave', function(event) {
                let target=event.target
                let dropdownToggle=target.querySelector('.dropdown-toggle')
                let dropdownMenu=target.querySelector('.dropdown-menu')
                let body=document.querySelector("body");
                target.classList.remove('show');
                dropdownToggle.classList.remove('show');
                dropdownMenu.classList.remove('show');
                document.body.removeChild(document.querySelector('.screen-darken'));
                body.classList.remove('no-scroll');
            })
        }
    }
    getSectionId(){
        const params = new Proxy(new URLSearchParams(window.location.search), {
            get: (searchParams, prop) => searchParams.get(prop),
        });
        let value = params.section; 
        return value;
    }
}
export default Navbar