/**
***
	Import all functions for index.php
**
*/
import loader_screen from "../functions/loader_screen.js";

import 
{	
	gsap_timeline
	,button_nav
	,close_nav
	,links_animation
	,nav_links_animation

}from "../functions/animations.js";

const d= document;

d.addEventListener("DOMContentLoaded", e=>{


	loader_screen(".screenShow");
	const timeline=gsap_timeline(".nav_content",".trigger_nav");
	button_nav(".trigger_nav",".nav-section",timeline);
	close_nav(timeline);
	links_animation(".screenShow");
	nav_links_animation(".nav_content>li>a",".nav-section",".screenShow",timeline);

})