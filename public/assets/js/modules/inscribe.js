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



const d= document;

d.addEventListener("DOMContentLoaded",e=>
{
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


