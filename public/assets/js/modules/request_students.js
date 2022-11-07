/**
***
	Import all functions for request.php
**
*/

import datatable_request from "../functions/datatable_request.js";
import confirmartion from "../functions/confirmation_buttons.js";




const d= document;



d.addEventListener("DOMContentLoaded",e=>
{
	datatable_request();
	confirmartion("#example",".btn-request",".box-confimation",datatable_request);
	
})


