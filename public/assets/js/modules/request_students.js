/**
***
	Import all functions for request.php
**
*/

import {datatable_request,likn_documents,filter_request} from "../functions/datatable_request.js";
import confirmartion from "../functions/confirmation_buttons.js";
import feedbackMessage from "../functions/messages.js";
import buttons_activate from "../functions/buttons_activate.js";





const d= document;

d.addEventListener("DOMContentLoaded",e=>
{	

	datatable_request();
	confirmartion("#example",".btn-request",".box-confimation",datatable_request);
	feedbackMessage();
	filter_request(datatable_request,'.btn-filter');
	likn_documents('.link-document');
	buttons_activate('.btn-filter','.li-doc');
	
})







