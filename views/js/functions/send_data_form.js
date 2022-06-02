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
	      { 
	      	
	       // const r = JSON.parse(resp);
	       // resp==''?alert('Error: No se ha podido enviar la informacion.'):alert(resp);

	       console.log(resp);
	       
	       

	    },
	     error: function(e) 
	     {
	      alert('Error: No se ha podio Guardar o Actualizar la informacion !')
	     } 

	   });

	 
	   })
	}
	