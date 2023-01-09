/**
***
	Import all functions for index.php
**
*/
import loader_screen from "../functions/loader_screen.js";
import file_validation from "../functions/f_size_validation.js"
import 
{	
	openModalDown,
	links_animation,
	transitionsElements,

}from "../functions/animations.js";

import { focus_input, show_hide_password } from "../functions/form_functions.js";

import feedbackMessage from "../functions/messages.js";

import consult_request from "../functions/consult_request.js";



const d= document;

d.addEventListener("DOMContentLoaded",e=>
{	

	consult_request("#btn-consult");
	loader_screen(".screenShow");
	file_validation("input[type='file']");
	openModalDown();
	transitionsElements("h1", "bottomToUp", .25)
	transitionsElements("form.inscribe span", "bottomToUp")
	transitionsElements(".progress_bar ", "leftToRight", .5)
	links_animation();
	feedbackMessage();
	focus_input();
	show_hide_password();

})

    const date_input = document.querySelector("#ins_date_birth")
    const age_input = document.querySelector("#ins_edad")

    let fecha = new Date(),
        añoA = fecha.getFullYear(),
        mesA = fecha.getMonth() + 1,
        diaA = fecha.getDate();

    function calculateAge(_nacimiento) {
        let n = 0;
        let añoN, mesN, diaN;
        [añoN, mesN, diaN] = _nacimiento.split('-')

        n = +añoA - +añoN
        if ((mesA < mesN) || ((mesA == mesN) && (diaA < diaN))) n--

        return n
    }
    date_input.onchange = () => {
        if (date_input.value) {
            age_input.value = calculateAge(date_input.value)
            age_input.nextElementSibling.classList.add('focus_valid')
        }

    }


