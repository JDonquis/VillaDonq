const d = document;
export default function filter_request (request,button)
{
		d.addEventListener('click',e => {



			if(e.target.matches(button))
			{
				let action = e.target.getAttribute('id-action');

				filter_ajax(action);
			}

			e.stopPropagation();

		})
}

function filter_ajax(action)
{		
		let csrf = $('input[name="_token"]').attr('value');	

		let datos = {'_token':csrf,'year': $("select[name='year']").val() };

		$.ajax({ 
	   
	   	url:'/workspace/solicitudes/filter/'+action,
	    type: 'POST', 
	    dataType: 'json',
	    data: datos,
	  	success:function(response){

	  		const r = response;

	  		console.log(r);

	  		$('#example').DataTable().clear().rows.add(r).draw();
			  						
	
	  	},
	  	error:function(error)
	  	{	
	  		console.log(error);
	  	}

	  	 });
}