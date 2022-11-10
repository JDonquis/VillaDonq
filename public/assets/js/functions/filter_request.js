const d = document;
export default function filter_request (request,button)
{
		d.addEventListener('click',e => {

			if(e.target.matches(button))
			{
				let action = e.target.getAttribute('id-action');

				if(action == 3)
					request(1);
				else if(action == 2)
					filter_ajax(2);
				else if(action == 1)
					filter_ajax(1);


			}


		})
}

function filter_ajax(action)
{
		$.ajax({ 
	   
	   	url:'/workspace/solicitudes/filter/'+action,
	    type: 'GET', 
	    dataType: 'json', 
	  	success:function(response){

	  		const r = response;

	  		$('#example').DataTable().clear().rows.add(r).draw();
			  						
	
	  	},
	  	error:function(error)
	  	{	
	  		console.log(error);
	  	}

	  	 });
}