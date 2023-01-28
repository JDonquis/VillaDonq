/**
***
	Import all functions for request.php
**
*/

import show_message from "../functions/response_message.js"; 
import {save_date} from "../functions/save_inscription_config.js";




const d= document;

d.addEventListener("DOMContentLoaded",e=>
{	
	save_date("#date_btn","#form-lapses",show_message,'/workspace/periodo/escolar/save');
	
})







