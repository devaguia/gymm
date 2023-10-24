export class SinginIndex
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.showPassword();
    }
    showPassword() {
        const eye = document.querySelector('#singin-eye-password');
        const password = document.querySelector('#singin-password');

        if (eye && password) {
            eye.addEventListener('click', () => {
                let type = password.getAttribute('type') === 'password' ? 'text' : 'password'
                password.setAttribute('type', type);
            });
        }
    }
}