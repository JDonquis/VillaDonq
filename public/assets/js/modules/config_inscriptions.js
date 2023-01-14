import { save_date,save_quotas,save_docs } from "../functions/save_inscription_config.js";
import show_message from "../functions/response_message.js"; 


const d = document;

d.addEventListener("DOMContentLoaded", e=>{

	save_date("#date_btn","#date-form",show_message);
  save_quotas("#cupos_btn","#quotas-form",show_message);
	save_docs("#docs_btn","#docs-form",show_message);
})
























  //----------- Date picker

  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
  //Money Euro
  $('[data-mask]').inputmask()

  //----------- Docs table 

        // start config date for inscribe *********************************************************************+
        const submit_date = document.querySelector('#date_btn')
        const inp_start = document.querySelector('.start')
        const inp_end = document.querySelector('.end')

        document.querySelector("#date-form").onchange = (e) => {
            if (e.target == inp_start) {
                inp_end.min = inp_start.value
                inp_end.disabled = false

                if (inp_start.value >= inp_end.value) {
                    inp_end.value = inp_start.value
                }
            }

            submit_date.classList.remove('d-none')
            submit_date.classList.add('opacity_1')

        }
        if (inp_start.value.length > 0  ) {
            inp_start.disabled = true
            inp_end.disabled = false
        }
        // inp_start.onchange = (e) => {


        // }





 //----------- ???  	 
        
        $('.selectyear').each(function() {

          var year = (new Date()).getFullYear();
          var current = year;
          year -= 3;
          for (var i = 0; i < 6; i++) {
            if ((year+i) == current)
              $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
            else
              $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
          }

        })
