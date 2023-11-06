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
        const weight = document.querySelector('#exercise_weight');
        if(!weight) return;

        this.setDecimalMask(weight);
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