const d=document;

export function request_action(btn)
{
		

	d.addEventListener("click",e=>{

      if(e.target.matches(btn))
      {

      	const button=e.target;
       	const id=button.getAttribute("id-user");
       	const action=button.getAttribute("btn-action");

   
      		 $.ajax({
      	 		url: '../../controller/request_controller.php?id_user='+id+"&action="+action,
      	 		async:true,
      	 		dataType:"json",
      	 		success: function (resp) 
      	 		{		

      	 			switch (action)
      	 			 {
      	 				case 'add':

      	 					if( resp != null )
      	 					{	
      	 							
      	 						const request=Object.values(resp);

	      	 					const requests= request.map( el=> {	return el=Object.values(el); } );
	      	 					
	      	 					const table = $("#table-request")[0];

		      	 				table.innerHTML="";

		      	 				let btn_status="",status="";

		      	 				requests.forEach(el=>{

	      	 						if (el[1]==1) { status="Aceptado";	btn_status="disabled"; }

									else if(el[1]==2) {	status="Rechazado"; btn_status="disabled"; }

									else if(el[1]==3) { status="Sin revisar";	}

		      	 					table.innerHTML+=`

		      	 					<tr> 

	  	      	 					  <td>${el[0]}</td>
				                      <td>${status}</td>
				                      <td>${el[2]}</td>
				                      <td>${el[3]}</td>
				                      <td>${el[5]}</td>
				                      <td>${el[4]}</td>
				                      <td>${el[6]}</td>

		                      			 

				                      <td><button type="button" class="btn btn-primary btn-details"  id-user="${el[0]}">Detalles</button></td>
				                      <td><button type="button" class="btn btn-success btn-request"  btn-action="add" ${btn_status}  id-user="${el[0]}">Aceptar</button></td>
				                      <td><button type="button" class="btn btn-danger btn-request" btn-action="delete" ${btn_status}  id-user="${el[0]}">Rechazar</button></td>
				                       
	              				  </tr>`;
		      	 				})

      	 					}
      	 					else{ const table = $("#table-request")[0]; table.innerHTML=""; }     	 							

	      	 			
       	 				break;


      	 				case 'delete':

      	 					if(resp!=null)
      	 					{	

      	 						const request=Object.values(resp);

	      	 					const requests= request.map( el=> {	return el=Object.values(el); } );
	      	 					
	      	 					const table = $("#table-request")[0];

		      	 				table.innerHTML="";

		      	 				let btn_status="",status="";

		      	 				requests.forEach(el=>{

	      	 						if (el[1]==1) { status="Aceptado";	btn_status="disabled"; }

									else if(el[1]==2) {	status="Rechazado"; btn_status="disabled"; }

									else if(el[1]==3) { status="Sin revisar";	}

		      	 					table.innerHTML+=`

		      	 					<tr> 

	  	      	 					  <td>${el[0]}</td>
				                      <td>${status}</td>
				                      <td>${el[2]}</td>
				                      <td>${el[3]}</td>
				                      <td>${el[5]}</td>
				                      <td>${el[4]}</td>
				                      <td>${el[6]}</td>

		                      			 

				                      <td><button type="button" class="btn btn-primary btn-details"  id-user="${el[0]}">Detalles</button></td>
				                      <td><button type="button" class="btn btn-success btn-request"  btn-action="add" ${btn_status}  id-user="${el[0]}">Aceptar</button></td>
				                      <td><button type="button" class="btn btn-danger btn-request" btn-action="delete" ${btn_status}  id-user="${el[0]}">Rechazar</button></td>
				                       
	              				  </tr>`;
		      	 				})

      	 					}
      	 					else{ const table = $("#table-request")[0]; table.innerHTML=""; }


      	 				break;

      	 				default:
      	 					alert("No se encontro la accion");
      	 					break;
      	 			}
      	 			 
      	 			 
      	 		}

      	 		
      	 	});
      }


	})

}

export function see_details(btn)
{
	d.addEventListener("click",e=>{

      if(e.target.matches(btn))
      {

      	const button=e.target;
       	const id=button.getAttribute("id-user");
       	

   
      		 $.ajax({
      	 		url: '../../controller/request_controller.php?id_user='+id+"&action=details",
      	 		async:true,
      	 		dataType:"json",
      	 		success: function (resp) 
      	 		{		

  					const request=Object.values(resp);
  			 		$(".request-modal").fadeIn();

      			 	$(".photo_request").attr("src","../../request_images/photo/"+request[14]);
      	 			 $("#id_request").text(request[0]);
      	 			 $("#name_request").text(request[2]);
      	 			 $("#last_name_request").text(request[3]);
      	 			 $("#phone_request").text(request[4]);
      	 			 $("#email_request").text(request[5]);
      	 			 $("#DNI_request").text(request[6]);
      	 			 $("#address_request").text(request[7]);
      	 			 $("#age_request").text(request[8]);
      	 			 $("#date_b_request").text(request[9]);
      	 			 $("#birth_certificate").attr("href","../../request_images/birth_certificate/"+request[10]);
      	 			 $("#report_card_request").attr("href","../../request_images/report_card/"+request[11]);
      	 			 $("#certificate_notes").attr("href","../../request_images/certificate_notes/"+request[12]);
      	 			 $("#certificate_conduct").attr("href","../../request_images/certificate_conduct/"+request[13]);
      	 			 $("#DNI_repre").text(request[17]);
      	 			 $("#fullname_repre").text(request[18]);
      	 			 $("#phone_repre").text(request[19]);

      	 			 let status=""

      	 			 if(request[1]==1)
      	 			 	status="Aceptado";
      	 			 else if(request[1]==2)
      	 			 	status="Rechazado";
      	 			 else if(request[1]==3)
      	 			 	status="Sin Revisar";


      	 			 $("#status").text(status);

      	 			 
	   	 			/* Keys of array
      	 			 [0]=>id
      	 			 [1]=>id_status
      	 			 [2]=>name
      	 			 [3]=>last name
      	 			 [4]=>phone number
      	 			 [5]=>email 
      	 			 [6]=>DNI 
      	 			 [7]=> address
      	 			 [8]=>age 
      	 			 [9]=> date_birth
      	 			 [10]=> birth certificate
      	 			 [11]=> report card
      	 			 [12]=> certified notes 
      	 			 [13]=> Certificate conduct 
      	 			 [14]=> photo
      	 			 [15]=>city 
      	 			 [16]=>state 
      	 			 [17]=> representative DNI 
      	 			 [18]=> representative name 
     
      	 			 [19]=> representative phone number*/		
  	 
      	 		}	 
  	 		})

  		 }				
	
	})

}

export function exit_model(btn)
{
	

	d.addEventListener("click",e=>{


		if(e.target.matches(btn))
		{
			$(".request-modal").fadeOut();

		}

	

	})
}

export function filter(btn)
{
	d.addEventListener("click",e=>{

		if(e.target.matches(btn))
      {

      	const button=e.target;
       	const id=button.getAttribute("id");


       	
 	  
   
      	$.ajax({
      		url: '../../controller/request_controller.php?filter='+id,
      	 	async:true,
      	 	dataType:"json",
      	 	success: function (resp) 
      	 	{				
      	 			if(resp!=0)
      	 			{	

						const request=Object.values(resp);

  	 					const requests= request.map( el=> {	return el=Object.values(el); } );
	      	 					
  	 					const table = $("#table-request")[0];

      	 				table.innerHTML="";

      	 				let btn_status="",status="";

      	 				requests.forEach(el=>{

  	 						if (el[1]==1) { status="Aceptado";	btn_status="disabled"; }

							else if(el[1]==2) {	status="Rechazado"; btn_status="disabled"; }

							else if(el[1]==3) { status="Sin revisar";	}

      	 					table.innerHTML+=`

      	 					<tr> 

      	 					  <td>${el[0]}</td>
		                      <td>${status}</td>
		                      <td>${el[2]}</td>
		                      <td>${el[3]}</td>
		                      <td>${el[5]}</td>
		                      <td>${el[4]}</td>
		                      <td>${el[6]}</td>

	                      			 

		                      <td><button type="button" class="btn btn-primary btn-details"  id-user="${el[0]}">Detalles</button></td>
		                      <td><button type="button" class="btn btn-success btn-request"  btn-action="add" ${btn_status}  id-user="${el[0]}">Aceptar</button></td>
		                      <td><button type="button" class="btn btn-danger btn-request" btn-action="delete" ${btn_status}  id-user="${el[0]}">Rechazar</button></td>
				                       
              				  </tr>`;
		      	 				})

      	 					}
      	 					else{ const table = $("#table-request")[0]; table.innerHTML=""; }     
      	 			 
      	 			 
      	 	}

      	 		
      	 });
      }

	})
}
