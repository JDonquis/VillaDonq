const d = document;

export function save_date (btn,f,message,url_f,confirmation_save) {

	let button = document.querySelector(btn);
	let form = document.querySelector(f);
	
	button.addEventListener("click",e => {

		e.preventDefault();
			
		confirmation_save().then( function(confirmation) {

			if(confirmation){
			
				const formD = new FormData(form);
				formD.append('field','date');
				
				console.log("Guardado")			
				$.ajax({
					
					url: url_f,
					type: 'post',
					data: formD,
					processData: false,
		    		contentType: false,
					success: function (data) {
						console.log(data['editable'])

						message(data['message']);
						button.classList.add("d-none");

						if(typeof data['editable'] != 'undefined' && data['editable'] == false){
							console.log(data['editable'])
							document.querySelector(".start.form-control").setAttribute("disabled","");
						}
														
						


					}
				});

			}

					
		

		}).catch();

		

		
		

	});	
}

export function save_quotas(btn,f,message){
	
	let button = d.querySelector(btn);
	let form = d.querySelector(f);

	button.addEventListener("click", e => {

		e.preventDefault();

		const formD = new FormData(form);

		formD.append('field','quota');

		$.ajax({
			
			url: '/workspace/inscripciones/configuracion/save',
			type: 'post',
			data: formD,
			processData: false,
    		contentType: false,
			success: function (data) {
				
				console.log(data);
				message(data);
				button.classList.add("d-none");

			}
		});

	});
}

export function save_docs (btn,f,message) {

	let button = document.querySelector(btn);
	let form = document.querySelector(f);

	button.addEventListener("click", e => {

		e.preventDefault();

		const formD = new FormData(form);

		formD.append('field','doc');

		
		console.log(formD);

		$.ajax({
			
			url: '/workspace/inscripciones/configuracion/save',
			type: 'post',
			data: formD,
			processData: false,
    		contentType: false,
			success: function (data) {
				
				message(data);
				button.classList.add("d-none");

			}
		});

	});
	
}
export async function confirmation_save(){


	 const confirmation_user = new Promise(function(resolve, reject) {
     const box = d.querySelector(".box-confimation");
	 box.classList.add('box-active');
	

	 box.addEventListener("click", e => {
	 	
	 	if(e.target.matches("#btn-confirm-confirmation")){
	 		box.classList.remove("box-active");
	 		resolve(true);
	 	}
	 	else{
	 		box.classList.remove("box-active");
	 		reject(false);
	 	}
	 	

	 })
  })
	  return await confirmation_user;
	 
}

