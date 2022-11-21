









































const d = document;
export default function confirmartion (table,btn,box_message,request)
{	

	 let t = d.querySelector(table); 
	 let box = d.querySelector(box_message);

	 var id ='';
	 var action = ';'
	 
	 d.addEventListener('click',e => {

	 	e.stopPropagation();
	 	
	 	if(e.target.matches(btn))
	 		{	

	 			
	 			const b = e.target;
	 			id = b.getAttribute('id-request');
	 			action = b.getAttribute('btn-action');
	 			box.classList.add('box-active');
	 		}

	 		if( e.target.matches('.box-confimation') || e.target.matches('#btn-cancel-confirmation') )
	 			box.classList.remove('box-active');

	 		if(e.target.matches('#btn-confirm-confirmation'))
	 		{	

	 			box.classList.remove('box-active');

	 					if(action == 'add')
	 						accept_request(id,request);
	 					
	 					else if(action == 'delete')		
							reject_request(id,request);
	 					
	 		}


	 })


}

function accept_request(id,request)
{	
	const data = {	_token: $('input[name=_token]').val(), request_id: id }

	$.ajax({ 
	   
	   	url:'/workspace/solicitudes/create',
	    type: 'POST', 
	    data:data,
	    dataType: 'json', 
	  	success:function(response){


	  			show_message(response.message); 

	  				
	  				request(1);
	  	},
	  	error:function(error)
	  	{	
	  		let e = error.responseJSON.message;
	  		if(e.includes('Duplicate entry'))
	  		 	show_message('Cedula de la solicitud ya existe');
	  			
	  	}

	  	 });
}

function reject_request(id,request)
{
	const data = {	_token: $('input[name=_token]').val(), request_id: id }

	$.ajax({ 
	   
	   	url:'/workspace/solicitudes/'+id,
	    type: 'put', 
	    data:data,
	    dataType: 'json', 
	  	success:function(response){
	  		console.log(response);
	  		show_message(response.message);
	  		request(1);
	  	},
	  	error:function(error)
	  	{	
	  		console.log(error)
	  	}

	  	 });
}

function show_message(message)
{
					let bm = document.querySelector('.message')
	  				let m = document.querySelector('.message>span')

	  				m.innerHTML = `${message}`;
				
	  				bm.classList.add('message-active');
	  				m.classList.add('text-white');



  					setTimeout(()=>{ 

       		 				bm.classList.remove('message-active');

         				}, 2500)
}