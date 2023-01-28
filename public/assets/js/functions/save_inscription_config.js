const d = document;

export function save_date (btn,f,message,url_f) {

	let button = document.querySelector(btn);
	let form = document.querySelector(f);
	
	const message_box = d.querySelector(".message");
	

	button.addEventListener("click",e => {

		e.preventDefault();

		const formD = new FormData(form);
		formD.append('field','date');
		
		$.ajax({
			
			url: url_f,
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