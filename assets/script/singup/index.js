import IMask from "imask";

export class Singup
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.showPassword();
        this.SetBirthdateMask();
    }

    showPassword() {
        const eye = document.querySelector('#singup-eye-password');
        const password = document.querySelector('#singup_password');

        if (eye && password) {
            eye.addEventListener('click', () => {
                let type = password.getAttribute('type') === 'password' ? 'text' : 'password'
                password.setAttribute('type', type);
            });
        }
    }

    SetBirthdateMask() {
        IMask(
            document.getElementById('singup_age'),
            {
                mask: '00/00/0000'
            }
        )
    }
}