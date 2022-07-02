<?php 


require_once $_SERVER['DOCUMENT_ROOT']."/VillaDonq/model/release_request_model.php";

class Request_controller
{
	
	function __construct()
	{	
	}


	static function get_Requests($status=3)
	{

		$release=new Release_request();

		$request=$release->get_all_request($status);

		return $request;
		
	}

	static function get_one_Requests($id)
	{

		$release=new Release_request();

		$request=$release->get_one_request($id);

		return $request;
		
	}
	static function insert_Requests(Request $request)
	{

		$release=new Release_request();

		$r=$release->insert_requests($request);

		return $r;		
	}

	static function accept_Requests(Request $request)
	{
		$release=new Release_request();

		$r=$release->accept_request($request);

		return $r;
	}

	static function rejected_Requests(Request $request)
	{
		$release=new Release_request();

		$r=$release->rejected_request($request);

		return $r;

	}


	static function get_id($position)
	{
		$release=new Release_request();

		$id=$release->get_id($position);

		return $id==NULL? 1: $id;
	}

	static function setchars($cadena)
	{
		$resp=str_replace(array(
			"&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;",
			"&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;"),
			array("á","é","í","ó","ú","ñ","Á","É","Í","Ó","Ú","Ñ"),$cadena);

		return $resp;
	}


}

if(isset($_POST['request'])){

	$r="";

	$last_id=Request_controller::get_id("LAST");



	require_once $_SERVER['DOCUMENT_ROOT']."VillaDonq/helpers/upload_docs.php";

	if($r=="work")
	{	

		$photo_name=$_POST['DNI_s']."-".$last_id."-photo-".str_replace(" ","_", $_FILES['photo']['name']);
		$birth_name=$_POST['DNI_s']."-".$last_id."-birth_certificate-".str_replace(" ","_", $_FILES['birth_certificate']['name']);
		$report_name=$_POST['DNI_s']."-".$last_id."-report_card-".str_replace(" ","_", $_FILES['report_card']['name']);
		$conduct_name=$_POST['DNI_s']."-".$last_id."-certificate_conduct-".str_replace(" ","_", $_FILES['certificate_conduct']['name']);
		$notes_name=$_POST['DNI_s']."-".$last_id."-certificate_notes-".str_replace(" ","_",$_FILES['certificate_notes']['name'] );

		$request=new Request();

		 $request->set_name(Request_controller::setchars( htmlentities(addslashes($_POST['name_s'] ) ) ) );

		 $request->set_last_name(Request_controller::setchars( htmlentities(addslashes($_POST['lastname_s'] ) ) ) );

		 $request->set_date_birth(htmlentities(addslashes($_POST['date_s'] ) ) );

		 $request->set_age(htmlentities(addslashes($_POST['age'] ) ) );

		 $request->set_DNI(htmlentities(addslashes($_POST['DNI_s'] ) ) );

		 $request->set_phone(htmlentities(addslashes($_POST['phone_s'] ) ) );

		 $request->set_email(Request_controller::setchars( htmlentities(addslashes($_POST['email_s'] ) ) ) ) ;

		 $request->set_state(Request_controller::setchars( htmlentities(addslashes($_POST['state'] ) ) ) );

		 $request->set_city(Request_controller::setchars( htmlentities(addslashes($_POST['city'] ) ) ) );

		 $request->set_address(Request_controller::setchars( htmlentities(addslashes($_POST['address'] ) ) ) );

		 $request->set_representative_name(Request_controller::setchars( htmlentities(addslashes($_POST['name_r'] ) ) ) );

		 $request->set_representative_DNI(htmlentities(addslashes($_POST['DNI_r'] ) ) );

		 $request->set_representative_phone_number(htmlentities(addslashes($_POST['phone_r'] ) ) );

		 $request->set_birth_certificate(Request_controller::setchars( htmlentities(addslashes( $birth_name ) ) ) );

		 $request->set_report_card(Request_controller::setchars( htmlentities(addslashes( $report_name ) ) ) );

		 $request->set_certified_notes(Request_controller::setchars( htmlentities(addslashes( $notes_name ) ) ) );

		 $request->set_certificate_conduct(Request_controller::setchars( htmlentities(addslashes( $conduct_name ) ) ) );

		 $request->set_photo(Request_controller::setchars( htmlentities(addslashes( $photo_name ) ) ) );

		 $resp=Request_controller::insert_Requests($request);

		 if($resp==1)
		 	echo "Solicitud Enviada";
		 else
		 {	
		 	
		 	echo "Solicitud no enviada. Intente de nuevo";
		 }

	}
	else{ echo $r;	}
}



if(isset($_GET['id_user'] ) and isset($_GET['action']) )
{	
	$id=$_GET['id_user'];

	$request=Request_controller::get_one_Requests($id);

	switch ($_GET['action'])
	 {
		case 'details':
			
			$resp=(array) $request;

			$resp=json_encode($resp);
			
			echo $resp;


			break;

			case 'add':

				 $r=Request_controller::accept_Requests($request);

				 if($r==1)
				 {
				 	$objects=Request_controller::get_Requests();

				  	foreach ($objects as $object) {	$resp[]=(array) $object; }

				 	
				 	$resp=json_encode($resp);
				 	echo $resp;
				 }

				 else{ echo $r; }

			break;


			case 'delete':

				$r=Request_controller::rejected_Requests($request);

				if($r==1)
				 {
				 	$objects=Request_controller::get_Requests();

				  	foreach ($objects as $object) {	$resp[]=(array) $object; }

				 	
				 	$resp=json_encode($resp);
				 	echo $resp;
				 }

				 else{ echo $r; }

								
			break;

		
		default:
			echo "No se encontro";
			break;
	}
}


if(isset($_GET['filter']))
{
	$requests;
	$status;
	switch ($_GET['filter']) 
	{
		case 'filter-accept':
			$status=1;
		break;

		case 'filter-rejected':
			$status=2;
		break;

		case 'filter-no-check':
			$status=3;
		break;
		
		default:
			echo 0;
			break;
	}

			$requests = Request_controller::get_Requests($status);

			 if(!empty($requests))
			  {
			  	foreach ($requests as $request) {	$resp[]=(array) $request; } 	
			 	$resp=json_encode($resp);
			 	echo $resp;
			  }

			 else{ echo 0; }
	}


	



















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



	

	
	







 ?>