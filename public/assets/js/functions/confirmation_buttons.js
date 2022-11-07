









































const d = document;
export default function confirmartion (table,btn,box_message,request)
{	

	 let t = d.querySelector(table); 
	 let box = d.querySelector(box_message);

	 
	 t.addEventListener('click',e => {


	 	
	 	if(e.target.matches(btn))
	 		{	

	 			const b = e.target;
	 			var id = b.getAttribute('id-request');
	 			box.classList.add('box-active');
	 			box.addEventListener('click',e => {

	 				e.stopPropagation();

	 				if( e.target.matches('.box-confimation') || e.target.matches('#btn-cancel-confirmation') )
	 					box.classList.remove('box-active');

	 				if(e.target.matches('#btn-confirm-confirmation'))
	 				{
	 					box.classList.remove('box-active');

	 					accept_request(id,request);

	 				}

	 			})
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

	  		console.log(response);
	  		request();
	  	},
	  	error:function(error)
	  	{
	  		console.log(error);
	  	}

	  	 });
}