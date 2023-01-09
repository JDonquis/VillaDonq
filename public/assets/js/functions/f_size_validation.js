
const d=document;

//Validation of all inputs file size
export default function file_validation(inputs) 
{	

	d.addEventListener("input",e=>
	{
		if(e.target.matches(inputs))
		{
			const fileSize = e.target.files[0].size /1024 /1024; //in MiB

			 if(fileSize > 2)
			  {
     			alert('File size exceeds 2 MiB');
    	 		$(e.target).val(''); //for clearing with Jquery
    	 	  } 

		}
	})
	
}