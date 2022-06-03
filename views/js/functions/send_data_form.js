




function send_data(form) 
	{
	  const dataf = $(form).serialize();

	  console.log(dataf);

	  // $.ajax({ 
	  //   type: 'POST', 
	  //   url: "<?php echo base_url().'Alineacion/AddAlineacion'>",
	  //   data: dataf, 
	  //   success: function(dat) 
	  //   { 

	  //     var datos = eval("(" + dat + ")");
	  //     resp=datos.resp;
	  //     mensaje=datos.mensaje;ned

	  //     $("#Modal_add_alineacion").modal("hide");

	  //     Listar_alin(1);
	  //   },
	  //   error: function(e) 
	  //   {
	  //     $("#Modal_add_alineacion").modal("hide");
	  //     alert('Error: No se ha podio Guardar o Actualizar la informacion !')
	  //   } 

	  // }); 
	}
	