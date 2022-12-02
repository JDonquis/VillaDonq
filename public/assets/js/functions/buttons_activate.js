const d = document;
export default function buttons_activate (btn,...buttons) 
{	
		var before_element = [];
		let btns = [];

		btns.push(btn); 

		buttons.forEach( function(element)
		 {
			btns.push(element);
		});

		let b = btns;
		b.push('.btn-active');
		d.addEventListener('click',(e)=>{

			if(e.target.matches(btns))
			{	
				
				console.log(e.target)

				b.forEach((btn)=>{

					let button = btn.slice(1);
			
					if(e.target.classList.contains(button))
					{		
						console.log('si entra')
						let btnfor_disable = d.querySelectorAll(btn);
						let arr = Array.from(btnfor_disable);
						arr.some((b)=>{ 

								if(b.classList.contains('button_active')){
									b.classList.remove('button_active');
									return false;
								}

						 })
					}

				})

				e.target.classList.add('button_active');
			}

		})

}