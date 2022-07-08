const d = document;

export default function send_data(form) 
	{	
		
	 const f=$(form)[0]; 
	 f.addEventListener("submit",function(e)
	   {
	   	
	   	e.preventDefault();
	    const dataform = new FormData(f);
	  	dataform.append('request',1);

	  	$.ajax({ 
	    type: 'POST', 
	    url:'../controller/request_controller.php',
	    dataType: "html",
	  	data: dataform,
	  	// cache: false,
	  	processData: false,
    	contentType: false, 
	    beforeSend: function()
	    {
	    	console.log("Enviando...");
	    },
	   	 success: function(resp) 
	      { alert(resp); },
	     error: function(e) 
	     {
	      alert('Error: No se ha podio Guardar o Actualizar la informacion !')
	     } 

	   });

	 
	   })
	}
	