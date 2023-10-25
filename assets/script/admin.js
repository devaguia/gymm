export class Admin
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.openHeaderMenu()
    }

    openHeaderMenu() {
        const headerBtn = document.querySelector('#navbar-btn');
        const mobileHeader = document.querySelector('#navbar-mobile');

        if (headerBtn) {
            headerBtn.addEventListener('click', () => {
                mobileHeader.classList.toggle('gymm-mobile-menu-active');
            })
        }
    }
}