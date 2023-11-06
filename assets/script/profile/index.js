import IMask from "imask";
export class Profile
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.setWeightMask();
    }

    setWeightMask() {
        const weight = document.querySelector('#profile-weight');

        if(!weight) return;

        this.setDecimalMask(weight);
    }

    setHeightMask() {
        const height = document.querySelector('#profile-height');

        if(!height) return;

        this.setDecimalMask(height);
    }

    setDecimalMask(field) {
        IMask(
            field,
            {
                mask: [
                    { mask: '' },
                    {
                        mask: 'num',
                        lazy: false,
                        blocks: {
                            num: {
                                mask: Number,
                                scale: 2,
                                padFractionalZeros: true,
                                radix: '.',
                                mapToRadix: [','],
                            }
                        }
                    }
                ]
            }
        );
    }
}