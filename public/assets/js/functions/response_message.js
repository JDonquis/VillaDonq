export default function show_message(message)
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