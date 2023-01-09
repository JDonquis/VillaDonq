/**
***
	Import all functions for index.php
**
*/

import institution_info from "../functions/institution_info.js";



const d= document;

d.addEventListener("DOMContentLoaded",e=>
{

	institution_info('#form-institution-info','#btn-send');



})


