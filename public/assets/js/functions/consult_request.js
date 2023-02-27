
const d = document;

export default function consult_request(btn)
{	 
	let f = d.querySelector("#form-file");
	
	if(f.getAttribute('show') == 'desactive')
		f.classList.add("d-none");

	 d.addEventListener("click",e=>{

	 	if(e.target.matches(btn))
	 	{
	 		let data = { DNI:d.querySelector("#ins_ci").value, year:d.querySelector("#ins-year").value } 



		 	$.ajax({ 
		   
				   	url:'/inscribirse/consulta',
				    type: 'GET', 
				    dataType: 'json',
				    data:data,
				  	success:function(response){

	  					if(response.continue == "NO")
	  					{
	  						let c = d.querySelector(".consult-message");
	  						
	  						c.innerHTML = response.message;
	  						c.classList.add("active");
	  					}
	  					else{

	  						d.querySelector("#consult-form").classList.add('d-none');
	  						d.querySelector("#form-file").classList.remove('d-none');
	  						d.querySelector("#form-file input[name='year']").value = response.year;
	  						d.querySelector("#form-file input[name='DNI']").value = response.DNI;
	  						d.querySelector("#form-file input[name='DNI']").nextElementSibling.classList.add('focus_valid')
	  						

	  					}
				
				  	},
				  	error:function(error)
				  	{	
				  		console.log(error)
				  	}

		  	 });
	 	}


	 })
}

