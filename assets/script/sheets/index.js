import {data} from "autoprefixer";

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
        this.handleNewExerciseItem();
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
                search.removeAttribute('data-id');

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

    handleNewExerciseItem() {
        const button = document.querySelector("#add-exercise-button");
        const search = document.querySelector("#search-exercise");
        const list = document.querySelector("#exercises-selected > ul");

        if (button && list) {
            button.addEventListener("click", () => {

                if (search.value && !this.exerciseAlreadyExists(search)) {
                    let item = this.createExerciseItem(search.value, search.getAttribute('data-id'));
                    list.appendChild(item);
                }
            });
        }
    }

    createExerciseItem(itemName, id) {
        const li = document.createElement('li');
        li.classList.add('gymm-exercise-added-list');
        li.setAttribute('data-id', id || 'new');


        const div = document.createElement('div');
        div.classList.add('flex', 'flex-row', 'items-center')
        li.appendChild(div);

        const name = document.createElement('span');
        name.classList.add('text-[#fc612e]');
        name.innerText = itemName;
        div.appendChild(name);

        if (!id) {
            const notify = document.createElement('span');
            notify.innerText = '(new exercise)';
            notify.classList.add('text-black', 'text-xs', 'pl-[3px]');
            div.appendChild(notify);
        }

        const button = document.createElement('span');
        button.classList.add('gymm-exercise-added-trash', 'exercise-list-item');
        li.appendChild(button);
        this.removeExerciseItem(button, li);

        const img = document.createElement('img');
        img.setAttribute('src', '/images/icons/trash-can-regular.svg');
        button.appendChild(img);

        return li;
    }

    removeExerciseItem(button, li) {
        if (button && li) {
            button.addEventListener('click', () => {
                li.remove();
            });
        }
    }

    exerciseAlreadyExists(search) {
        if (!search) {
            return true;
        }

        let exists = false;
        const exercises = document.querySelectorAll('.gymm-exercise-added-list');

        exercises.forEach((exercise) => {
            let exerciseid = exercise.getAttribute('data-id');
            if (exerciseid === search.getAttribute('data-id') && exerciseid !== null) {
                exists = true;
            }
        });

        return exists
    }
}