const d = document;

export default function send_plan(form1,form2,button)
{
	const btn = $(button)[0];

	btn.addEventListener("click",e=>{

		e.preventDefault();

		const allData = $(form1+","+form2).serialize();

		console.log(allData);
		$.ajax({
				url: '../../../../controller/evaluation_plan_controller.php',
				type: 'post',
				data: allData,
				dataType:"json",
				success: function (data) {
					
					alert("Guardado Exitosamente");
				}
			});
    
     })
}