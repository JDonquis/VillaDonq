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

	
	
}






 ?>