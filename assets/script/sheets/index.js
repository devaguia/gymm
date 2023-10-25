export class Sheets
{
    constructor() {
        addEventListener('DOMContentLoaded', () => {
            this.callEvents();
        })
    }

    callEvents() {
        this.selectExercise();
        this.searchExercises();
        this.handleShowExerciseList();
        this.handleHideExerciseList();
    }

    handleShowExerciseList() {
        const search = document.querySelector("#search-exercise");

        if (search) {
            search.addEventListener('focus', () => {
                this.showExerciseList(search)
            });
        }
    }

    handleHideExerciseList() {
        const search = document.querySelector("#search-exercise");

        if (search) {
            window.addEventListener('click', (e) => {
                if (!e.target.classList.contains('exercise-item') && e.target.id !== 'search-exercise') {
                    this.hideExerciseList(search);
                }
            });
        }
    }

    showExerciseList(search) {
        const exercises = document.querySelector("#exercise-list");

        if (search && exercises) {
            exercises.classList.remove('hidden');
            search.classList.remove('hover:cursor-pointer');
        }
    }

    hideExerciseList(search) {
        const exercises = document.querySelector("#exercise-list");

        if (search && exercises) {
            search.classList.add('hover:cursor-pointer');
            exercises.classList.add('hidden');
        }
    }

    selectExercise() {
        const exercises = document.querySelectorAll('.exercise-item');
        const search = document.querySelector("#search-exercise");

        if (exercises) {
            exercises.forEach( (item) => {
                item.addEventListener('click', () => {
                    if (search) {
                        search.setAttribute('data-id', item.getAttribute('data-id'));
                        search.value = item.innerText;

                        this.hideExerciseList(search);
                    }
                });
            });
        }
    }

    searchExercises() {
        const exercises = document.querySelectorAll('.exercise-item');
        const search = document.querySelector("#search-exercise");

        if (search) {
            search.addEventListener('keyup', () => {
                this.showExerciseList(search);
                exercises.forEach((exercise) => {
                    let searchValue = search.value.toUpperCase();
                    let exerciseName = exercise.innerText.toUpperCase();

                    exercise.classList.remove('hidden');

                    if (!exerciseName.includes(searchValue)) {
                        exercise.classList.add('hidden');
                    } else {
                        exercise.classList.remove('hidden');
                    }
                });
            })
        }
    }
}