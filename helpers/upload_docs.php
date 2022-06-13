 <?php 


/*Max size file 2MB*/
$limit=2097152;


$destiny=$_SERVER['DOCUMENT_ROOT'].'/VillaDonq/request_images/';

$docs = array(

	'photo' => array("name"=>str_replace(" ","_",$_FILES['photo']['name'] ),"type"=>$_FILES['photo']['type'],"size"=>$_FILES['photo']['size'])
	,"birth_certificate"=> array('name' => str_replace(" ","_",$_FILES['birth_certificate']['name'] ),"type"=>$_FILES['birth_certificate']['type'],"size"=>$_FILES['birth_certificate']['size'])
	,"certificate_notes"=> array('name' => str_replace(" ","_",$_FILES['certificate_notes']['name'] ),"type"=>$_FILES['certificate_notes']['type'],"size"=>$_FILES['certificate_notes']['size'])
	,"report_card"=> array('name' => str_replace(" ","_",$_FILES['report_card']['name'] ),"type"=>$_FILES['report_card']['type'],"size"=>$_FILES['report_card']['size'])
	,"certificate_conduct"=> array('name' => str_replace(" ","_",$_FILES['certificate_conduct']['name'] ),"type"=>$_FILES['certificate_conduct']['type'],"size"=>$_FILES['certificate_conduct']['size'])

);


foreach ($docs as $doc => $value)
 {
	if($value["size"]>$limit || $value["size"]==0)
	{
		$r='Tamaño de archivo no permitido. Asegurese de ingresar todos los archivos y que sean menor de 2 MB';
		break 1;
	}
	else{

		if($value["type"]=='image/jpg' || $value["type"]=='image/jpeg' || $value["type"]=='image/png' || $value["type"]=='application/pdf' || $value["type"]=='application/vnd.oasis.opendocument.text' || $value["type"]=='application/msword' || $value["type"]=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' )
		{

			if(move_uploaded_file($_FILES[$doc]['tmp_name'],$destiny.$doc."/".$_POST['DNI_s']."-".$last_id."-".$doc."-".$value['name']) )
			{
				$r="work";
			}
			else{

				$r="Hubo un error al subir el archivo.";
				break 1;
			}
		}
		else{

			$r="El formato del archivo no es compatible.";
			break 1;
		}
	}
 }







 // $filename = $_FILES['photo']['name'];
	// $location = $_SERVER['DOCUMENT_ROOT'].'/VillaDonq/request_images/'.$filename;
	// if(move_uploaded_file($_FILES['photo']['tmp_name'],$location))
	// 	echo "si funciona, gracias a Dios";


 	// $filename = $_FILES['photo']['name'];

 	// echo $filename;

   // /* Location */
   // $location = $_SERVER['DOCUMENT_ROOT'].'/VillaDonq/request_images/'.$filename;
   // $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   // $imageFileType = strtolower($imageFileType);

   // /* Valid extensions */
   // $valid_extensions = array("jpg","jpeg","png","pdf","odt","doc","docx");

   // // $response = 0;
   // /* Check file extension */
   // // if(in_array(strtolower($imageFileType), $valid_extensions)) {
   //    /* Upload file */
     
   //    if(move_uploaded_file($_FILES['photo']['tmp_name'],$location)){
         
   //       $r = "FUNCIONA";
   //    }
   // // }

   




// foreach ($docs as $doc => $value) {
	
// 	if(move_uploaded_file($_FILES[]['tmp_name'],$destiny.$value['name']))
// 		echo "Movidos";
// 	else{
// 		echo "No movidos";
// 	}

	
	// else{

		// 
		// {
			
		// 	if(move_uploaded_file($_FILES[$doc]['tmp_name'],$destiny.$))
		// {
		// 	$r="Se ha Guardado con exito";

		// 	// require_once "/var/www/html/development/php/CRUD/connection.php";

		// 	// $sql="UPDATE data_users SET photo=:image WHERE id=5";
		// 	// $result=$db->prepare($sql);
		// 	// $result->execute(array(":image"=>$name_image));

		//  //        if ($result->rowCount()!=0)
		//  //            echo "<br>guardado exitosamente en la DB";  
		        
		//  }
		//  else{

		//  	$r="No se ha movido el archivo";

		//  }
		
	// 	}

	// 	$r="Tipo de archivo no permitido";

	// }
	
// }

/*

else
{

	if ($type_image=='image/jpg' || $type_image=='image/jpeg' || $type_image=='image/png' || $type_image=='image/gif') 
	{
		
		if(move_uploaded_file($_FILES['image']['tmp_name'],$destiny.$name_image))
		{
			echo "Se ha guardado con exito";

			require_once "/var/www/html/development/php/CRUD/connection.php";

			$sql="UPDATE data_users SET photo=:image WHERE id=5";
			$result=$db->prepare($sql);
			$result->execute(array(":image"=>$name_image));

		        if ($result->rowCount()!=0)
		            echo "<br>guardado exitosamente en la DB";  
		        
		 }
		else{

				echo "Ha ocurrido un error.";
			}
	}
	else{
		
		echo "Format no allowed :("; 
	}

}

*/


 ?> 


