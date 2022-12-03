
const d = document;

export default function institution_info(form,btn)
{	
	d.addEventListener("click",e =>{

		if(e.target.matches(btn))
		{
			e.preventDefault();

			const data = new FormData(d.querySelector(form));

			$.ajax({ 
	   
			   	url:'/workspace/institucion',
			    type: 'POST', 
			    dataType: 'json',
			    data:data,
			     processData: false,
    			 contentType: false, 
			  	success:function(response){

			  		let r = response.message;

			  		show_message(r);			  						
	
	  	},
	  	error:function(error)
	  	{	
	  		let r = '';

	  		console.log(error)

	  		let errors = error.responseJSON.errors;

	  		let e = Object.values(errors);

	  		e.every( error => { 
	  			r = error[0]; 
	  			return false;
	  		 });

	  		show_message(r);
	  	}

	  	 });

		
		}

	})






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