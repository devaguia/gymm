export class Admin
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.openHeaderMenu();
        this.removeNotificationMessage();
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

    removeNotificationMessage() {
        const notifications = document.querySelectorAll('.gymm-message-remove');

        notifications.forEach((notification) => {
            notification.addEventListener('click', () => {
                notification.parentNode.remove();
            })
        })
    }
}