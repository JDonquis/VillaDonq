<?php 

//require_once "../model/request_model.php";
// header('Content-Type: application/json');
 require_once "../model/release_request_model.php";

class Request_controller
{
	
	function __construct()
	{	
	}



	static function get_Requests($status=0)
	{

		$release=new Release_request();

		$request=$release->get_all_request($status);

		return $request;
		
	}
	static function insert_Requests(Request $request)
	{

		$release=new Release_request();

		$r=$release->insert_requests($request);

		return $r;

		
		
	}

	static function get_id($position)
	{
		$release=new Release_request();

		$id=$release->get_id($position);

		return $id==NULL? 1: $id;
	}
}

if(isset($_POST['request'])){

	$r="";

	$last_id=Request_controller::get_id("LAST");

	$photo_name=$_POST['DNI_s']."-".$last_id."-photo";
	$birth_name=$_POST['DNI_s']."-".$last_id."-birth_certificate";
	$report_name=$_POST['DNI_s']."-".$last_id."-report_card";
	$conduct_name=$_POST['DNI_s']."-".$last_id."-certificate_conduct";
	$notes_name=$_POST['DNI_s']."-".$last_id."-certificate_notes";

	$request=new Request();

	 $request->set_name(htmlentities(addslashes($_POST['name_s'] ) ) );

	 $request->set_last_name(htmlentities(addslashes($_POST['lastname_s'] ) ) );

	 $request->set_date_birth(htmlentities(addslashes($_POST['date_s'] ) ) );

	 $request->set_age(htmlentities(addslashes($_POST['age'] ) ) );

	 $request->set_DNI(htmlentities(addslashes($_POST['DNI_s'] ) ) );

	 $request->set_phone(htmlentities(addslashes($_POST['phone_s'] ) ) );

	 $request->set_email(htmlentities(addslashes($_POST['email_s'] ) ) );

	 $request->set_state(htmlentities(addslashes($_POST['state'] ) ) );

	 $request->set_city(htmlentities(addslashes($_POST['city'] ) ) );

	 $request->set_address(htmlentities(addslashes($_POST['address'] ) ) );

	 $request->set_representative_name(htmlentities(addslashes($_POST['name_r'] ) ) );

	 $request->set_representative_DNI(htmlentities(addslashes($_POST['DNI_r'] ) ) );

	 $request->set_representative_phone_number(htmlentities(addslashes($_POST['phone_r'] ) ) );

	 $request->set_birth_certificate(htmlentities(addslashes( $birth_name ) ) );

	 $request->set_report_card(htmlentities(addslashes( $report_name ) ) );

	 $request->set_certified_notes(htmlentities(addslashes( $notes_name ) ) );

	 $request->set_certificate_conduct(htmlentities(addslashes( $conduct_name ) ) );

	 $request->set_photo(htmlentities(addslashes( $photo_name ) ) );


	require_once "../helpers/upload_docs.php";

		$resp=Request_controller::insert_Requests($request);

		// if($resp==1)
		// 	$r="Solicitud de incripcion, enviada correctamente";
		// else{
		// 	$r="Algo paso mal :(";
		// }
	

	echo $r;
}


// if(isset($_POST['request']))
// {	
// 	$r='';
	

	


// 	/*Crear un array asociativo con la respuesta
// 	 $r=array( 

// 	 	'name'=>$request->get_name(),
// 	 	'lastname'=>$request->get_last_name()

// 	 );

// 	 */


// 	/*
// 	ASI SI ENVIA UN OBJETO COMO RESPUESTA 
// 	 $r = (array) $request;  
// 	 $r=json_encode($r);
// */
 
// 	echo $r;	



	

	
	
// }






 ?>