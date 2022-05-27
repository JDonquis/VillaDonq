<?php 
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);


$limit=2097152; 
$destiny=$_SERVER['DOCUMENT_ROOT']."/VillaDonq/request_images";
$docs = array(

	'photo' => array("name"=>$_FILES['photo']['name'],"type"=>$_FILES['photo']['type'],"size"=>$_FILES['photo']['size'])
	,"birth"=> array('name' => $_FILES['birth_certificate']['name'],"type"=>$_FILES['birth_certificate']['type'],"size"=>$_FILES['birth_certificate']['size'])
	,"notes"=> array('name' => $_FILES['certificate_notes']['name'],"type"=>$_FILES['certificate_notes']['type'],"size"=>$_FILES['certificate_notes']['size'])
	,"card"=> array('name' => $_FILES['report_card']['name'],"type"=>$_FILES['report_card']['type'],"size"=>$_FILES['report_card']['size'])
	,"conduct"=> array('name' => $_FILES['certificate_conduct']['name'],"type"=>$_FILES['certificate_conduct']['type'],"size"=>$_FILES['certificate_conduct']['size'])

);

print_r($docs);



foreach ($docs as $doc => $value) {
	
	if($value["size"]>$limit || $value["size"]==0)
		header("location:../views/inscribe.php?fail-size=1");	
	
}

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