import IMask from "imask";

export class Exercises
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
        const height = document.querySelector('#exercise-weight');

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