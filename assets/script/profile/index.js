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
        this.setHeightMask();
        this.setBirthdateMask();
    }

    setWeightMask() {
        const weight = document.querySelector('#profile_weight');

        if(!weight) return;

        this.setDecimalMask(weight);
    }

    setHeightMask() {
        const height = document.querySelector('#profile_height');

        if(!height) return;

        this.setDecimalMask(height);
    }

    setBirthdateMask() {
        const age = document.querySelector('#profile_age');

        if(!age) return;

        IMask(
            age,
            {
                mask: '00/00/0000'
            }
        )
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