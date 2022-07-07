


























const d = document;

export default function lesson(input,selectMatter,selectYear)
{
	d.addEventListener("DOMContentLoaded", e=>{

		const inp = $(input).val();

		$.ajax({
				url: '../../../../controller/teacher_controller.php?lesson='+inp,
				type: 'get',
				success: function (data)
				 {	
				 	let objects = JSON.parse(data);
				 	let matters = [objects[0].name_matter];
				 	let years = [objects[0].name_course];

				
				 	objects.forEach( function(element, index)
				 	{
				 		matters.includes( element.name_matter)? 0 : matters.push(element.name_matter);
				 		years.includes( element.name_course)? 0 : years.push(element.name_course);
				 	});

				 	
				  	const selectM = $(selectMatter)[0];
				 	const selectY = $(selectYear)[0];

				 	selectM.innerHTML = `<option selected="selected">${matters[0]}</option>`;
				 	selectY.innerHTML = `<option selected="selected">${years[0]}</option>`;

				 	for( let i = 1; i < matters.length; i++)
				 	{		
				 		selectM.innerHTML += `<option>${matters[i]}</option>`;
				 		selectY.innerHTML += `<option>${years[i]}</option>`;

				 	}	
				 						 		
				 		
				 	


				 }
			});





	})
}