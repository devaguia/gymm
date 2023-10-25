export class Singup
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
        const eye = document.querySelector('#singup-eye-password');
        const password = document.querySelector('#singup-password');

        if (eye && password) {
            eye.addEventListener('click', () => {
                let type = password.getAttribute('type') === 'password' ? 'text' : 'password'
                password.setAttribute('type', type);
            });
        }
    }
}