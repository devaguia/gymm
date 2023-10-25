/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import {Singin} from "./script/singin";
import {Singup} from "./script/singup";
import {Admin} from "./script/admin";
import {Profile} from "./script/profile";
import {Exercises} from "./script/exercises";
import {Sheets} from "./script/sheets";

new Admin();
new Singin();
new Singup();
new Profile();
new Exercises();
new Sheets();