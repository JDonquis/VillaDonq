<?php 

//require_once "../model/request_model.php";
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
	static function insert_Requests($request)
	{

		$release=new Release_request();

		$request=$release->get_all_request($status);

		return $request;
		
	}
/*
	static function get_one($DNI)
	{
		$release=new Release_request();

		$request=$release->get_one_request($DNI);

		return $request;
	}
	
*/
}


if(isset($_POST['new_request']))
{
	$request=new Request();

	$request->set_name($_POST['name_s']);
	$request->set_last_name($_POST['lastname_s']);
	$request->set_date_birth($_POST['date_s']);
	$request->set_age($_POST['age']);
	$request->set_DNI($_POST['DNI_s']);
	$request->set_phone($_POST['phone_s']);
	$request->set_email($_POST['email_s']);
	$request->set_state($_POST['state']);
	$request->set_city($_POST['city']);
	$request->set_address($_POST['address']);
	$request->set_representative_name($_POST['name_r']);
	$request->set_representative_DNI($_POST['DNI_r']);
	$request->set_representative_phone_number($_POST['phone_r']);

	print_r($request);



	//require_once "../helpers/upload_docs.php";


	
	
}






 ?>