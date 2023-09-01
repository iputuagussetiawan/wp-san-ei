import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { Offcanvas } from 'bootstrap';
gsap.registerPlugin(ScrollToPlugin);

class Navbar {
    constructor() {
        this.isClosed = false;
        this.body=document.querySelector("body");
        this.burgerMenu = document.querySelector("#hamburger")
        this.btnToggler=document.querySelector('.navbar-custom__toggler');
        this.navHeader = document.querySelector('.navbar-custom');
        this.dropdowns = document.querySelectorAll(".dropdown")
        this.scrollToTopBtn=document.querySelector(".scroll-up");
        this.lastScrollTop = 0;
        this.dropdowns = document.querySelectorAll(".dropdown")
        this.myOffcanvasMobileMenu = document.getElementById('offcanvasMobileMenu');
        this.bsOffcanvasMobileMenu = new Offcanvas(this.myOffcanvasMobileMenu);
        this.btnMobileMenuClose=document.querySelector('.offcanvas-mobilemenu__btn-close');

    }
    // 2. events
    events() {
        document.addEventListener("scroll", (event) => {
            let currentScrollPosition = window.scrollY;
            this.sticky(currentScrollPosition);
        });
        this.btnToggler.addEventListener('click', (event)=>{  
            event.preventDefault();
            this.burgerTime() 
        });
        this.btnMobileMenuClose.addEventListener('click', (event)=>{  
            event.preventDefault();
            this.closeSideMenu()
        });

        
        if(this.scrollToTopBtn){
            this.scrollToTopBtn.addEventListener('click', (event)=>{  
                event.preventDefault();
                gsap.to(window, {duration: 0.1, scrollTo: 0,ease: "power2.inOut"});
            });
        }

        this.myOffcanvasMobileMenu.addEventListener('hidden.bs.offcanvas', (event)=> {
            this.closeSideMenu()
        })

    }
    // 3. methods (function, action...)
    sticky(currentScrollPosition) {
        if(currentScrollPosition<=0){
            this.navHeader.classList.remove('hide');
            this.navHeader.classList.remove('show');
        }
        else if(currentScrollPosition > this.lastScrollTop){
            this.navHeader.classList.add('hide');
            this.navHeader.classList.remove('show');
        } else {
            this.navHeader.classList.add('show');
            this.navHeader.classList.remove('hide');
        }
        this.lastScrollTop = currentScrollPosition;
        if(currentScrollPosition>750){
            if(this.scrollToTopBtn){
                this.scrollToTopBtn.classList.add('active')
            }
        }else{
            if(this.scrollToTopBtn){
                this.scrollToTopBtn.classList.remove('active')
            }
        }
    }
    burgerTime() {
        if (this.isClosed== true) {
            this.closeSideMenu();
        } else {
            this.openSideMenu()
        }
    }
    openSideMenu(){
        this.burgerMenu.classList.remove("closed");
        this.burgerMenu.classList.add("open");
        this.body.classList.add('no-scroll');
        this.isClosed = true;

        this.bsOffcanvasMobileMenu.show();
    }
    closeSideMenu(){
        this.burgerMenu.classList.remove("open");
        this.burgerMenu.classList.add("closed");
        this.body.classList.remove('no-scroll');
        this.isClosed  = false;

        this.bsOffcanvasMobileMenu.hide();
    }
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
    scrollToSection(target){
        gsap.to(window, {duration: 0.1, scrollTo:target});
    }
}
export default Navbar