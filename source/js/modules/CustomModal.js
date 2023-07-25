import {Modal} from 'bootstrap';

class CustomModal {
    constructor() {
        this.modalSuperiorityTriggers = document.querySelectorAll(".modalSuperiorityTrigger")
        this.modalRegisterTriggers = document.querySelectorAll(".modalRegisterTrigger")
    }
    events(){
        for (const modalSuperiorityTrigger of this.modalSuperiorityTriggers) {
            modalSuperiorityTrigger.addEventListener('click', (event) => {
                event.preventDefault();
                let modalImage=modalSuperiorityTrigger.dataset.image;
                let modalTitle=modalSuperiorityTrigger.dataset.title;
                let modalContent=modalSuperiorityTrigger.dataset.content;

                let dataModal={
                    modalImage:modalImage,
                    modalTitle:modalTitle,
                    modalContent:modalContent
                }
                this.loadModalSuperiority(dataModal)
            })
        }
        for (const modalRegisterTrigger of this.modalRegisterTriggers) {
            modalRegisterTrigger.addEventListener('click', (event) => {
                event.preventDefault();
                this.loadModalRegister()
            })
        }
    } 
    loadModalSuperiority(dataModal){
        const modalSuperiorityImage=document.querySelector('#modalSuperiorityImage');
        const modalSuperiorityTitle=document.querySelector('#modalSuperiorityTitle');
        const modalSuperiorityContent=document.querySelector('#modalSuperiorityContent');

        modalSuperiorityImage.src=dataModal.modalImage;
        modalSuperiorityTitle.innerHTML=dataModal.modalTitle
        modalSuperiorityContent.innerHTML=dataModal.modalContent

        const modalSuperiority = new Modal('#superiorityModal', {
            keyboard: false
        });

        modalSuperiority.show();
    }
    loadModalRegister(){
        const modalRegister = new Modal('#registerModal', {
            keyboard: false
        });
        modalRegister.show();
    }
}
export default CustomModal