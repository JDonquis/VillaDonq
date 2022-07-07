const d = document;

export default function send_plan(form1,form2,button)
{
	const btn = $(button)[0];

	btn.addEventListener("click",e=>{

		e.preventDefault();

		const allData = $(form1+","+form2).serialize();

		$.ajax({
				url: '',
				type: 'post',
				data: {},
				success: function (data) {
					data
				}
			});
    
     })
}