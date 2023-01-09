


/**
***
	Import all functions for login.php
**
*/

import loader_screen from "../functions/loader_screen.js";

import feedbackMessage from "../functions/messages.js";

import { focus_input, show_hide_password } from "../functions/form_functions.js";

const d = document;

d.addEventListener("DOMContentLoaded", e=>{

	loader_screen(".screenShow");
	focus_input();
	show_hide_password();
	feedbackMessage();
})
