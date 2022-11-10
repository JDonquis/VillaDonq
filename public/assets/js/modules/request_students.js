/**
***
	Import all functions for request.php
**
*/

import datatable_request from "../functions/datatable_request.js";
import confirmartion from "../functions/confirmation_buttons.js";
import feedbackMessage from "../functions/messages.js";
import filter_request from "../functions/filter_request.js";



const d= document;



d.addEventListener("DOMContentLoaded",e=>
{
	datatable_request();
	confirmartion("#example",".btn-request",".box-confimation",datatable_request);
	feedbackMessage();
	filter_request(datatable_request,'.btn-filter');
	
})


