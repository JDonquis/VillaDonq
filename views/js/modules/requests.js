



















import {request_action,see_details,exit_model,filter} from "../functions/request.js";

const d=document;

d.addEventListener("DOMContentLoaded",e=>{

request_action(".btn-request");
see_details(".btn-details");
exit_model("#exit-modal");
filter(".filter");


})
